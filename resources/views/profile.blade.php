@extends('layouts.app')
@section('content')
@php
	$user = App\Models\User::where('status',1)->find(Session::get('login_user'));
@endphp
<div class="grid grid-cols-[1fr_3fr] max-w-[1250px] my-5 mx-auto gap-3">
	<form class="bg-white shadow rounded-lg p-3" action="/update-profile" method="post">
		@csrf
		<p class="font-black text-[18px]">Profile</p>
		<div class="mt-3">
			<label class="text-gray-700 block mb-1">Name</label>
			<input type="text" name="name" required value="{{$user->name}}" class="block bg-white border !border-slate-300 w-full shadow-sm py-2 px-4 rounded-full text-black text-[13px]">
		</div>
		<div class="mt-3">
			<label class="text-gray-700 block mb-1">Email</label>
			<input type="text" readonly required value="{{$user->email}}" class="block bg-white border !border-slate-300 w-full shadow-sm py-2 px-4 rounded-full text-black text-[13px]">
		</div>
		<div class="mt-3">
			<label class="text-gray-700 block mb-1">Phone</label>
			<input type="text" name="phone" required value="{{$user->phone}}" class="block bg-white border !border-slate-300 w-full shadow-sm py-2 px-4 rounded-full text-black text-[13px]">
		</div>
		<div class="mt-3">
			<label class="text-gray-700 block mb-1">Address</label>
			<input type="text" name="address" required value="{{$user->address}}" class="block bg-white border !border-slate-300 w-full shadow-sm py-2 px-4 rounded-full text-black text-[13px]">
		</div>
		<div class="mt-3">
			<label class="text-gray-700 block mb-1">City</label>
			<input type="text" name="city" required value="{{$user->city}}" class="block bg-white border !border-slate-300 w-full shadow-sm py-2 px-4 rounded-full text-black text-[13px]">
		</div>
		<div class="mt-3">
			<label class="text-gray-700 block mb-1">State</label>
			<input type="text" name="state" required value="{{$user->state}}" class="block bg-white border !border-slate-300 w-full shadow-sm py-2 px-4 rounded-full text-black text-[13px]">
		</div>
		<div class="mt-3">
			<label class="text-gray-700 block mb-1">Zip Code</label>
			<input type="text" name="zip_code" required value="{{$user->zip_code}}" class="block bg-white border !border-slate-300 w-full shadow-sm py-2 px-4 rounded-full text-black text-[13px]">
		</div>
		<div class="mt-3">
			<label class="text-gray-700 block mb-1">Change Password (Optional)</label>
			<input type="text" name="password" class="block bg-white border !border-slate-300 w-full shadow-sm py-2 px-4 rounded-full text-black text-[13px]">
		</div>
		<div class="mt-3">
			<button type="submit" class="block !bg-red-500 w-full py-2 px-4 rounded-full text-white text-[13px]">Update</button>
		</div>
	</form>
	<div class="bg-white shadow rounded-lg p-3">
		<p class="font-black text-[18px]">My Orders</p>
		@php
			$all_orders = App\Models\OrdersTable::where('user_id', $user->id)->get();
			$statuses = [
				0=>['Pending','text-yellow-600'],
				1=>['Processed','text-blue-500'],
				2=>['In-Transit','text-indigo-500'],
				3=>['Delivered','text-green-500'],
				4=>['Cancelled','text-red-500'],
			]; 
		@endphp
		@foreach($all_orders as $order)
		@php
			$cart = App\Models\CartTable::where('order_id', $order->order_id)->get();
		@endphp
		<div class="grid mt-3 grid-cols-2 gap-3 bg-white shadow-sm border !border-slate-200 rounded-lg p-4">
			<div class="bg-white shadow p-4 border !border-slate-200 rounded-lg">
				<p class="font-black text-[18px]">Order Details</p>
				<p class="text-[14px] text-gray-700 mt-2">Order Id: {{$order->order_id}}</p>
				<p class="text-[14px] text-gray-700 mt-2">Name: {{$order->name}}</p>
				<p class="text-[14px] text-gray-700 mt-2">Email: {{$order->email}}</p>
				<p class="text-[14px] text-gray-700 mt-2">Phone: {{$order->phone}}</p>
				<p class="text-[14px] text-gray-700 mt-2">Address: {{$order->address}}</p>
				<p class="text-[14px] text-gray-700 mt-2">City: {{$order->city}}</p>
				<p class="text-[14px] text-gray-700 mt-2">State: {{$order->state}}</p>
				<p class="text-[14px] text-gray-700 mt-2">State: {{$order->order_id}}</p>
				<p class="text-[14px] text-gray-700 mt-2">Grand total: ${{$order->grand_total}}</p>
				<p class="text-[14px] mt-2 {{$statuses[$order->status][1]}}">Status: {{$statuses[$order->status][0]}}</p>
			</div>
			<div class="bg-white shadow border border-slate-200! rounded-lg p-4">
				@foreach($cart as $cart_item)
				@php
	                $product = App\Models\ProductTable::where('status',1)->find($cart_item->product_id);
	                $main_img = '';
	                if($product->main_image == 1){
	                  $main_img = $product->image1;
	                }elseif($product->main_image == 2){
	                  $main_img = $product->image2;
	                }elseif($product->main_image == 3){
	                  $main_img = $product->image3;
	                }elseif($product->main_image == 4){
	                  $main_img = $product->image4;
	                }elseif($product->main_image == 5){
	                  $main_img = $product->image5;
	                }
				@endphp
				<div class="bg-white mb-2 border shadow p-3 grid grid-cols-[1fr_3fr] !border-slate-200 rounded-lg gap-3">
					<div>
						<img class="h-16 w-16 md:h-24 md:w-24 sm:mr-8 mb-4 sm:mb-0" src="{{$main_img}}" alt="Product image">
					</div>
					<div>
						<p class="text-sm md:text-base font-bold">{{$product->name}}</p>
						<p class="text-[14px] text-gray-700">Price: ${{$product->discounted_price}}</p>
						<p class="text-[14px] text-gray-700">Quantity: {{$cart_item->qty}}</p>
						<p class="text-[14px] text-gray-700">Total: ${{$cart_item->total}}</p>
					</div>
				</div>
				@endforeach
			</div>
		</div>
		@endforeach
	</div>
</div>
@endsection