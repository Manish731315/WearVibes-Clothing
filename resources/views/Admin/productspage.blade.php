@extends('Admin/adminlayout.adminpage')
@section('productsList')

@php
    $PopularProducts = App\Models\productTable::where('status',1)->get();
@endphp

<div class="px-5 py-3">
    <div class="font-bold text-4xl leading-relaxed">
        <h1>Products</h1>
    </div>
    <div class="flex gap-8 mt-5 font-semibold items-start">
        <div>
            <p>All <span>(1233)</span></p>
        </div>
        <div>
            <p>Published <span>(123)</span></p>
        </div>
        <div>
            <p>Drafted <span>(133)</span></p>
        </div>
        <div>
            <p>On discount <span>(12)</span></p>
        </div>
    </div>
    <div class="flex gap-3 justify-between px-2 items-center mt-5 f-full w-full">
        <div class="border rounded-lg h-full px-3 w-1/3 py-2 flex items-center gap-2">
            <input type="text" class="outline-none" placeholder="Search products...">
        </div>
        <div class="border rounded-lg h-full px-3 py-2">
            <select name="category" id="category" class="outline-none rounded-lg">
                <option value="Men" name="category">Men</option>
                <option value="Women" name="category">Women</option>
                <option value="Kids" name="category">Kids</option>
            </select>
        </div>
        <div class="border rounded-lg h-full px-3 py-2  outline-none">
            <select name="brands" id="category" class="outline-none rounded-lg">
                <option value="Vendor" name="brands">Vendor</option>
                <option value="Raymond" name="brands">Raymond</option>
                <option value="Niki" name="brands">Niki</option>
            </select>
        </div>
        <div >
            <a href="/addproduct">
                <button type="submit" class="bg-blue-500 px-4 py-2 font-bold text-white cursor-pointer shadow-lg mx-1.5 rounded-lg w-fit whitespace-nowrap active:scale-95 hover:bg-blue-600 ">Add product</button>
            </a>
        </div>
    </div>
</div>

    <table class="shadow-lg border w-full rounded-2xl mt-4">
        <thead>
            <th>
                <tr class="p-8 bg-amber-500 py-3 text-center w-full rounded-2xl">
                    <td class="py-3 px-4  text-white font-semibold text-sm"><input type="checkbox"></td>
                    <td class="py-3 px-4  text-white font-semibold text-sm">Image</td>
                    <td class="py-3 px-4  text-white font-semibold text-sm">Name</td>
                    <td class="py-3 px-4  text-white font-semibold text-sm">Category</td>
                    <td class="py-3 px-4  text-white font-semibold text-sm">Brand</td>
                    <td class="py-3 px-4  text-white font-semibold text-sm">Product Code</td>
                    <td class="py-3 px-4  text-white font-semibold text-sm">Review</td>
                    <td class="py-3 px-4  text-white font-semibold text-sm">Availability</td>
                    <td class="py-3 px-4  text-white font-semibold text-sm">Stock</td>
                    <td class="py-3 px-4  text-white font-semibold text-sm">Status</td>
                    <td class="py-3 px-4  text-white font-semibold text-sm">Created At</td>
                    <td class="py-3 px-4  text-white font-semibold text-sm">Updated At</td>
                    <td class="py-3 px-4  text-white font-semibold text-sm">Action</td>
                </tr>
            </th>
        </thead>
        <tbody >
            @foreach($PopularProducts as $product)
            <tr class="p-3 text-center border-b-amber-300 hover:bg-gray-100 transition duration-300 ease-in-out">
                <td class="my-2 p-4 "><input type="checkbox"></td>
                <td class="my-2 p-4 ">
                    <img src="{{$product->image1}}" alt="" class="w-15 mask-cover">
                </td>
                <td class="my-2 p-4 ">{{$product->name}}</td>
                <td class="my-2 p-4 ">{{$product->category}}</td>
                <td class="my-2 p-4 ">{{$product->brand}}</td>
                <td class="my-2 p-4 ">{{$product->product_code}}</td>
                <td class="my-2 p-4 ">{{$product->review}}</td>
                <td class="my-2 p-4 ">{{$product->availability}}</td>
                <td class="my-2 p-4 ">{{$product->stock}}</td>
                <td class="my-2 p-4 ">{{$product->status}}</td>
                <td class="my-2 p-4 whitespace-nowrap">{{$product->created_at}}</td>
                <td class="my-2 p-4 ">{{$product->updated_at}}</td>
                <td class="my-2 p-4 ">
                    <div>
                        <a href="" class="text-sm font-medium text-yellow-500 mt-2">Edit</a>
                        <a href="" class="text-sm font-medium text-red-500 mt-2">Delete</a>
                        <a href="" class="text-sm font-medium text-green-500 mt-2">View</a>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

@endsection