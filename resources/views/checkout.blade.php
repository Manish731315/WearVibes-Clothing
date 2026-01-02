@extends('layouts.app')
@section('checkout')
@php
    $user = App\Models\User::find(Session::get('login_user'));
    $total = 0;
    foreach(Session::get('cart') as $cart_item){
        $product = App\Models\productTable::where('status',1)->find($cart_item['id']);
        // dd($product);
        $total += number_format($product->discounted_price * $cart_item['qty'],2);
    }
@endphp
<section id="checkout-page" class="bg-white py-16">
        <form class="container mx-auto px-4" action="/place-order" method="post">
            @csrf
            <h1 class="text-2xl font-semibold mb-8">Checkout</h1>
            <div class="flex flex-col md:flex-row gap-4">
                <!-- Billing and Shipping Details -->
                <div class="md:w-2/3 bg-white rounded-lg shadow-md p-4">
                    <h2 class="text-xl font-semibold mb-4">Billing Details</h2>
                    <div>
                        <div class="mb-4">
                            <label for="billing-name" class="mb-4">Full Name</label>
                            <input value="{{$user->name}}" name="name" type="text" id="billing-name" class="w-full px-3 mt-2 py-2 border focus:border-transparent rounded-full focus:outline-none focus:ring-2 focus:ring-primary" required>
                        </div>
                        <div class="mb-4">
                            <label for="billing-email" class="mb-4">Email</label>
                            <input value="{{$user->email}}" name="email" type="email" id="billing-email" class="w-full px-3 mt-2 py-2 border focus:border-transparent rounded-full focus:outline-none focus:ring-2 focus:ring-primary" required>
                        </div>
                        <div class="mb-4">
                            <label for="billing-address" class="mb-4">Address</label>
                            <input value="{{$user->address}}" name="address" type="text" id="billing-address" class="w-full px-3 mt-2 py-2 border focus:border-transparent rounded-full focus:outline-none focus:ring-2 focus:ring-primary" required>
                        </div>
                        <div class="mb-4">
                            <label for="billing-city" class="mb-4">City</label>
                            <input value="{{$user->city}}" name="city" type="text" id="billing-city" class="w-full px-3 mt-2 py-2 border focus:border-transparent rounded-full focus:outline-none focus:ring-2 focus:ring-primary" required>
                        </div>
                        <div class="mb-4 flex gap-4">
                            <div class="w-1/2">
                                <label for="billing-state" class="mb-4">State</label>
                                <input value="{{$user->state}}" name="state" type="text" id="billing-state" class="w-full px-3 mt-2 py-2 border focus:border-transparent rounded-full focus:outline-none focus:ring-2 focus:ring-primary" required>
                            </div>
                            <div class="w-1/2">
                                <label for="billing-zip" class="mb-4">ZIP Code</label>
                                <input value="{{$user->zip_code}}" name="zip_code" type="text" id="billing-zip" class="w-full px-3 mt-2 py-2 border focus:border-transparent rounded-full focus:outline-none focus:ring-2 focus:ring-primary" required>
                            </div>
                        </div>
                        <div class="mb-4">
                            <label for="billing-phone" class="mb-4">Phone Number</label>
                            <input value="{{$user->phone}}" name="phone" type="tel" id="billing-phone" class="w-full px-3 mt-2 py-2 border focus:border-transparent rounded-full focus:outline-none focus:ring-2 focus:ring-primary" required>
                        </div>
                    </div>
                </div>
                <!-- Order Summary -->
                <div class="md:w-1/3 bg-white rounded-lg shadow-md p-4">
                    <h2 class="text-xl font-semibold mb-4">Order Summary</h2>
                    <div class="flex justify-between mb-4">
                        <p>Subtotal</p>
                        <p>${{$total}}</p>
                    </div>
                    <div class="flex justify-between mb-4">
                        <p class="font-semibold">Total</p>
                        <p class="font-semibold">${{$total}}</p>
                    </div>
                    <button class="bg-primary text-white border border-primary hover:bg-transparent hover:text-primary py-2 px-4 rounded-full w-full">Place Order</button>
                </div>
            </div>
        </form>

@endsection