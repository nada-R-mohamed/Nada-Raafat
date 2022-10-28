<?php

namespace App\Http\Controllers;

use App\Http\Requests\Products\StoreProductRequest;
use App\Http\Requests\Products\UpdateProductRequest;
use App\Models\Brand;
use App\Models\Product;
use App\Services\Media;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index()
    {
        $products = Product::all();

        return view('products.index', compact('products'));
    }

    public function create()
    {
        $brands = Brand::select('id', 'name_en')->orderBy('name_en', 'ASC')->get();
        $subcategories = Subcategory::select('id', 'name_en')->orderBy('name_en', 'ASC')->get();
        return view('products.create', compact('subcategories', 'brands'));

    }

    public function store(StoreProductRequest $request)
    {


        $newImgName = $request->file('image')->hashName();

        $request->file('image')->move(public_path('images\products', $newImgName));

        $valueOfInputes = $request->except('image', '_token');

        $valueOfInputes['image'] = $newImgName;

        Product::create($valueOfInputes);

        return redirect()->route('dashboard.products.index')->with('success', 'Product Created Successfully');
    }

    public function edit($id)
    {

        $product = Product::findOrFail($id);

        $brands  = Brand::select('id', 'name_en')->orderBy('name_en', 'ASC')->get();

        $subcategories = Subcategory::select('id', 'name_en')->orderBy('name_en', 'ASC')->get();


        return view('products.edit', compact('product', 'subcategories', 'brands'));
    }

    public function update(UpdateProductRequest $request, $id)
    {

        $data = $request->except('_token', '_method', 'image');

        $product = Product::findOrFail($id);

        if ($request->hasFile('image')) {

            $newImageName = Media::upload($request->file('image'), 'product');

            $data['image'] = $newImageName;

            Media::delete(public_path('images\products\\' . $product->image));
        }


        $product->update($data);
        return redirect()->route('dashboard.products.index')->with(' success ', ' Product Updated Successfully');
    }

    public function delete($id)
    {
        $product = Product::findOrFail($id);

        Media::delete(public_path('images\products\\' . $product->image));

        $product->delete();

        return redirect()->route('dashboard.products.index')->with('success', 'Product Deleted Successfully ');
    }
}
