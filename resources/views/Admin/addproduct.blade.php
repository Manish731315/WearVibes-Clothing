@extends('Admin/adminlayout.adminpage')
@section('addproductform')

@if(Session::has('success'))
{{-- <div class="flex justify-center items-center pt-2 bg-[#06335d]">
    <div class="bg-green-500 text-white p-4 rounded mb-4 w-1/3 text-center">
     success!   {{Session::get('success')}} <br>
    </div>
</div> --}}
@if(Session::has('error'))
<div>
    Error! {{Session::get('error')}}
</div>
@endif
@endif

@if($errors->any())
@foreach($errors->all() as $error)
<div class="flex justify-center items-center pt-2 bg-[#06335d]">
    <div class=" bg-red-500 text-white p-4 rounded mb-2 w-1/3 text-center">
        {{$error}}
    </div>
</div>
@endforeach
@endif

<form action="{{route('add.product')}}" method="POST" enctype="multipart/form-data" class="p-4" id="myForm">
    @csrf
    <div class="flex justify-between items-center mb-3">
        <div>
            <h1 class="font-bold text-3xl">Add a product</h1>
            <h4 class="font-md text-gray-400 font-semibold">Orders placed across your store</h4>
        </div>
        <div>
            <button id="discardBtn" type="button" class="bg-blue-500 p-3 font-bold text-white cursor-pointer shadow-lg mx-1.5 rounded-lg">Discard</button>
            <a href="/addproduct"><button type="submit"  class="bg-blue-500 p-3 font-bold text-white cursor-pointer shadow-lg mx-1.5 rounded-lg">Add Product</button></a>
        </div>
    </div>
    <div class="flex justify-between gap-8">
        <div class="flex flex-col w-full ">
            <div>
                <label for="name" class="font-bold">Product Name</label><br>
                <input type="text" name="name" id="name" value="{{old('name')}}" class="border mt-1 mb-3 px-4 py-2 rounded-lg w-full">
            </div>
            <div>
                <label for="description" class="font-bold">Product Description</label><br>
                <textarea name="description" id="description" value="{{old('description')}}" cols="30" rows="8" class="border mt-1 mb-3 px-4 py-2 rounded-lg w-full"></textarea>
            </div>
            <div>
                <label for="description" class="font-bold">Product Code</label><br>
                <input type="text" name="productcode" value="{{old('productcode')}}" class="border mt-1 mb-3 px-4 py-2 rounded-lg w-full">
            </div>
            <div>
                <label for="description" class="font-bold">Product Review</label><br>
                <input type="text" name="review" value="{{old('review')}}" class="border mt-1 mb-3 px-4 py-2 rounded-lg w-full">
            </div>
            <div>
                <label for="description" class="font-bold">Product Original Price</label><br>
                <input type="text" name="originalprice" value="{{old('originalprice')}}" class="border mt-1 mb-3 px-4 py-2 rounded-lg w-full">
            </div>
            <div>
                <label for="description" class="font-bold">Product Discounted Price</label><br>
                <input type="text" name="discountedprice" value="{{old('discountedprice')}}" class="border mt-1 mb-3 px-4 py-2 rounded-lg w-full">
            </div>
            <div>
                <label for="description" class="font-bold">Product Stock</label><br>
                <input type="text" name="stock" value="{{old('stock')}}" class="border mt-1 mb-3 px-4 py-2 rounded-lg w-full">
            </div>
        </div>
        <div class="flex flex-col gap-5 justify-between h-fit">
            <div class="border rounded-lg h-fit p-5">
                <label for="images" class="font-bold">Display images</label>
                <div class="flex flex-col justify-between items-start">
                    <label for="img1" class="font-semibold text-gray-400 mt-2">Image 1</label>
                    <input type="file" id="img1" name="img1" class="w-full border mt-2 rounded-lg p-3 cursor-pointer font-semibold">
                    <label for="img2" class="font-semibold text-gray-400 mt-2">Image 2</label>
                    <input type="file" id="img2" name="img2" class="w-full border mt-2 rounded-lg p-3 cursor-pointer font-semibold">
                    <label for="img3" class="font-semibold text-gray-400 mt-2">Image 3</label>
                    <input type="file" id="img3" name="img3" class="w-full border mt-2 rounded-lg p-3 cursor-pointer font-semibold">
                    <label for="img4" class="font-semibold text-gray-400 mt-2">Image 4</label>
                    <input type="file" id="img4" name="img4" class="w-full border mt-2 rounded-lg p-3 cursor-pointer font-semibold">
                    <label for="img5" class="font-semibold text-gray-400 mt-2">Image 5</label>
                    <input type="file" id="img5" name="img5" class="w-full border mt-2 rounded-lg p-3 cursor-pointer font-semibold">
                </div>
            </div>

            <div class="border rounded-lg h-fit p-5">
                <div>
                    <label for="description" class="font-bold">Product category</label>
                    <select name="category" id="category" class="border mt-1 mb-3 px-4 py-2 rounded-lg w-full">
                        <option value="" name="category">Select Category </option>
                        <option value="Men" name="category">Men</option>
                        <option value="Women" name="category">Women</option>
                        <option value="Kids" name="category">Kids</option>
                    </select>
                </div>
                <div>
                    <label for="description" class="font-bold">Product Status</label>
                        <select name="status" id="status" class="border mt-1 mb-3 px-4 py-2 rounded-lg w-full">
                            <option value="" name="status">Select Status </option>
                            <option value="1" name="status">Visible</option>
                            <option value="0" name="status">Hidden</option>
                        </select>
                </div>
                <div>
                    <label for="description" class="font-bold">Product Brand</label>
                    <select name="brands" id="brand" class="border mt-1 mb-3 px-4 py-2 rounded-lg w-full">
                        <option value="">Select brand</option>
                        <option value="Niki" name="brands">Niki</option>
                        <option value="Diseal" name="brands">Diseal</option>
                        <option value="Raymon" name="brands">Raymon</option>
                        <option value="Calvine" name="brands">Calvine</option>
                    </select>
                </div>
                <div>
                    <label for="description" class="font-bold">Product Availability</label>
                    <select name="availability" id="brand" class="border mt-1 mb-3 px-4 py-2 rounded-lg w-full">               
                        <option value="Niki" name="availability">Availability Status</option>
                        <option value="1" name="availability">In stock</option>
                        <option value="2" name="availability">Out of stock</option>
                    </select>
                </div>
                <div>
                    <label for="description" class="font-bold">Product Price Color</label><br>
                    <select name="color" id="brand" class="border mt-1 mb-3 px-4 py-2 rounded-lg w-full">               
                        <option value="Niki" name="color">color</option>
                        <option value="text-lg font-bold text-primary" name="color">Red</option>
                        <option value="text-lg font-bold text-gray-900" name="color">Black</option>
                    </select>
                </div>
            </div>
        </div>
    </div>
</form>

<script>
    document.getElementById('discardBtn').addEventListener('click', function() {
        document.getElementById('myForm').reset(); // Clears all inputs
    });
</script>
@endsection