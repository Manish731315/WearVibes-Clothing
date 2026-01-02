@extends('layouts.app')
@section('cart')

<!-- Cart -->
<section id="cart-page" class="bg-white py-16">
        <div class="container mx-auto px-4">
            <h1 class="text-2xl font-semibold mb-4">Shopping Cart</h1>
            <div class="flex flex-col md:flex-row gap-4">
                <div class="md:w-3/4">
                    <div class="bg-white rounded-lg shadow-md p-6 mb-4">
                        <div class="overflow-x-auto">
                            <table class="w-full">
                                <thead>
                                    <tr>
                                        <th class="text-center md:text-left font-semibold">Product</th>
                                        <th class="text-center font-semibold">Price</th>
                                        <th class="text-center font-semibold">Quantity</th>
                                        <th class="text-center md:text-right font-semibold">Total</th>
                                    </tr>
                                </thead>
                                <tbody id="cart-items">
                                    @if(Session::has('cart'))
                                    @foreach(Session::get('cart') as $cart_item)
                                    @php
                                        $product = App\Models\productTable::where('status',1)->find($cart_item['id']);
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
                                    <tr class="pb-4 border-b border-gray-line">
                                        <td class="px-1 py-4">
                                            <div class="flex items-center flex-col sm:flex-row text-center sm:text-left">
                                                <img class="h-16 w-16 md:h-24 md:w-24 sm:mr-8 mb-4 sm:mb-0" src="{{$main_img}}" alt="Product image">
                                                <p class="text-sm md:text-base md:font-semibold">{{$product->name}}</p>
                                            </div>
                                        </td>
                                        <td class="px-1 price_ms py-4 text-center">
                                            <input type="hidden" class="p_ids" value="{{$cart_item['id']}}">
                                            <input type="hidden" class="stocks" value="{{$product->stock}}">
                                            ${{number_format($product->discounted_price,1)}}</td>
                                        <td class="px-1 py-4 text-center">
                                            <div class="flex items-center justify-center">
                                                <button class="cart-decrement border border-primary bg-primary text-white hover:bg-transparent hover:text-primary rounded-full w-10 h-10 flex items-center justify-center">-</button>
                                                <p class="quantity qty_ms text-center w-8">{{$cart_item['qty']}}</p>
                                                <button class="cart-increment border border-primary bg-primary text-white hover:bg-transparent hover:text-primary rounded-full w-10 h-10 flex items-center justify-center">+</button>
                                            </div>
                                        </td>
                                        <td class="px-1 py-4 item_sub_total_ms text-right"></td>
                                    </tr>
                                    @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="md:w-1/4">
                    <div class="bg-white rounded-lg shadow-md p-6">
                        <h2 class="text-lg font-semibold mb-4">Summary</h2>
                        <div class="flex justify-between mb-4">
                            <p>Subtotal</p>
                            <p id="subtotal_ms"></p>
                        </div>
                        <div class="flex justify-between mb-2">
                            <p class="font-semibold">Total</p>
                            <p id="total_ms" class="font-semibold"></p>
                        </div>
                        <a href="/checkout" class="bg-primary text-white border hover:border-primary hover:bg-transparent hover:text-primary py-2 px-4 rounded-full mt-4 w-full text-center block">Proceed to checkout</a>
                    </div>
                </div>
            </div>
        </div>
        <div id="cart-updater" class="hidden"></div>
</section>
    <script>
        function calculate_ms(){
            var all_qty = document.querySelectorAll('.qty_ms');
            var all_price = document.querySelectorAll('.price_ms');
            var all_item_sub_total_ms = document.querySelectorAll('.item_sub_total_ms');
            var all_p_ids = document.querySelectorAll('.p_ids');
            var all_stocks = document.querySelectorAll('.stocks');
            var total = 0;
            all_qty.forEach((item, index)=>{
                if(all_stocks[index].value < item.innerText){
                    item.innerText = all_stocks[index].value;
                }
                var p_id = all_p_ids[index].value;
                fetch('/cart-update?p_id='+p_id+'&qty='+parseInt(item.innerText));
                all_item_sub_total_ms[index].innerText = '$' + (parseInt(item.innerText) * parseFloat(all_price[index].innerText.replace('$','')));
                total += parseInt(item.innerText) * parseFloat(all_price[index].innerText.replace('$',''));
            });
            document.getElementById('subtotal_ms').innerText = '$'+total;
            document.getElementById('total_ms').innerText = '$'+total;
        }
        calculate_ms();
    </script>

@endsection