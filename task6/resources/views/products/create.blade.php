@extends('layouts.parent')

@section('title', 'Create Product')


@section('content')



    <div class="container">
        <form action="{{ route('dashboard.products.store') }}" method="post" enctype="multipart/form-data">

            @csrf

            <div class="form-row">
                <div class="col-md-6 mb-3">
                    <label for="validationTooltip01">Name English :</label>
                    <input type="text" name="name_en"  class="form-control" value="{{ old('name_en') }}" >
                    @error('name_en')
                        <div class="text-danger font-weight-bold my-2">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6 mb-3">
                    <label for="validationTooltip02">Name Arabic :</label>
                    <input type="text" name="name_ar" class="form-control"  value="{{ old('name_ar') }}" >
                    @error('name_ar')
                        <div class="text-danger font-weight-bold my-2">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6 mb-3">
                    <label for="validationTooltip02">Price :</label>
                    <input type="number" name="price" class="form-control"  value="{{ old('price') }}"  >
                    @error('price')
                        <div class="text-danger font-weight-bold my-2">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-3 mb-3">
                    <label for="validationTooltip05">Quantity :</label>
                    <input type="number" name="quantity" class="form-control" id="validationTooltip05" value="{{ old('quantity') }}"  >
                    @error('quantity')
                        <div class="text-danger font-weight-bold my-2">{{ $message }}</div>
                    @enderror
                </div>

            </div>
            <div class="form-row">
                <div class="col-md-6 mb-3">
                    <label for="validationTooltip03">Details English :</label>
                    <textarea class="form-control" name="details_en"> {{ old('details_en') }} </textarea>
                    @error('details_en')
                        <div class="text-danger font-weight-bold my-2">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6 mb-3">
                    <label for="validationTooltip03">Details Arabic : </label>
                    <textarea class="form-control" name="details_ar"> {{ old('details_ar') }} </textarea>
                    @error('details_ar')
                        <div class="text-danger font-weight-bold my-2">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-3 mb-3">
                    {{-- DB --}}
                    <label for="validationTooltip04">Subcatgory</label>
                    <select name="subcategory_id" class="custom-select" id="validationTooltip04" >
                        @foreach ($subcategories as $subcategory )
                        <option @selected ( old('subcategory_id') == $subcategory->id ) value="{{$subcategory->id}}" >{{ $subcategory->name_en }}</option>
                        @endforeach
                    </select>
                    @error('subcategory_id')
                        <div class="text-danger font-weight-bold my-2">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-3 mb-3">
                    {{-- DB --}}
                    <label for="validationTooltip04">Brand</label>
                    <select  name ="brand_id" class="custom-select" id="validationTooltip04" >

                        @foreach ($brands as $brand )
                         <option  @selected ( old('brand_id') == $brand->id ) value="{{$brand->id}}" > {{ $brand->name_en }} </option>
                        @endforeach
                    </select>
                    @error('brand_id')
                        <div class="text-danger font-weight-bold my-2">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-3 mb-3">
                    <label for="validationTooltip04">Status</label>
                    <select name="status" class="custom-select" id="validationTooltip04">
                        <option @selected(old('status') === '1')  value="1">Active</option>
                        <option @selected(old('status') === '0')  value="0">Not Active</option>
                    </select>
                    @error('status')
                        <div class="text-danger font-weight-bold my-2">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-row">
                    <label for="validationTooltip05">Image</label>
                    <input type="file" class="form-control"  name="image">
                    @error('image')
                        <div class="text-danger font-weight-bold my-2">{{ $message }}</div>
                    @enderror

                </div>


            </div>
            <div class="col-md-3 mb-3">
                <button class="btn btn-primary mt-4 " name="submit" type="submit">Create Product</button>
            </div>

        </form>

    </div>

@endsection
{{--
@section('js')

<script>
    function showPreview(event)
    {
        if (event.target.files.length > 0) {
            var src = URL.createObjectURL(event.target.files[0]);
            var preview = document.getElementById("file-ip-1-preview");
            preview.src = src;
            preview.style.display = "block";
        }
    }
</script>

@endsection --}}
