<?php

namespace App\Http\Controllers\Api;

use App\Models\Brand;
use App\Models\Product;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductsController extends Controller
{
    public function index()
    {

        $products = Product::all();

        return response()->json(compact('products'));

    }

    public function create()
    {
        $brands = Brand::select('id','name_en')->orderBy('name_en','ASC')->get();

        $subcategories = Subcategory::select('id','name_en')->orderBy('name_en','ASC')->get();

        return response()->json(compact('subcategories','brands'));

    }

    public function store(Request $request)
    {

        $request->validate([
            'name_en'=>['required','string','between:3,512'],
            'name_ar'=>['required','string','between:3,512'],
            'price'  =>['required','numeric','between:1,999999,99'],
            'details_en'=>['required','string'],
            'details_ar'=>['nullable','string'],
            'quantity'=> ['nullable','numeric','between:1,9999'],
            'status'=>['nullable','in:1,0'],
            'subcategory_id'=>['required','integer','exists:subcategories,id'],
            'brand_id'=>['required','integer','exists:brands,id'],
            'image'=>['required','mimes:jpeg,jpg,png','max:2048']
        ]);


        $newImgName = $request->file('image')->hashName();
        $request->file('image')->move(public_path('images\products',$newImgName));
        $valueOfInputes = $request->except('image','_token');
        $valueOfInputes['image'] = $newImgName;
        Product::create($valueOfInputes);

        return response()->json(['message'=>'product created successfully','success'=>'true']);


    }

    public function edit($id)
    {

        $product = Product::findOrFail($id);

        $brands  = Brand::select('id','name_en')->orderBy('name_en','ASC')->get();

        $subcategories = Subcategory::select('id','name_en')->orderBy('name_en','ASC')->get();



        return response()->json(compact('product','subcategories','brands'));

    }

    public function update(Request $request , $id)
    {

        $request->validate([
            'name_en'=>['required','string','between:3,512'],
            'name_ar'=>['required','string','between:3,512'],
            'price'  =>['required','numeric','between:1,999999,99'],
            'details_en'=>['required','string'],
            'details_ar'=>['nullable','string'],
            'quantity'=> ['nullable','numeric','between:1,9999'],
            'status'=>['nullable','in:1,0'],
            'subcategory_id'=>['integer','exists:subcategories,id'],
            'brand_id'=>['integer','exists:brands,id'],
            'image'=>['mimes:jpeg,jpg,png','max:2048']
        ]);


    }
}
