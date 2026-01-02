<?php

namespace App\Http\Controllers;

use GrahamCampbell\ResultType\Success;
use Illuminate\Http\Request;
use App\Models\user;
use App\Models\CartTable;
use App\Models\OrdersTable;
use App\Models\productTable;
use App\Http\Middleware\Wearvibesmiddleware;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\hash;
use Illuminate\Support\Facades\DB;

use function Laravel\Prompts\alert;

class sitecontroller extends Controller
{

    public function index(){
        return view('index');
    }

    // public function login(){
    //     return view('login');
    // }

    // public function logindatavalidate(Request $request){
    //    $request->validate([
    //         'email' => 'email|required',
    //         'password' => 'required|min:8'
    //     ]);     

    //     $check_user = user::where('email',$request->email)->first();
    //     if($check_user){
    //         if(hash::check($request->password, $check_user->password)){
    //             Session::put('logined',$check_user->id);
    //             if ($check_user->email === 'admin@wearvibes.com') {
    //                 return redirect('/admin');
    //             }else{
    //                 return redirect('/dashboard');
    //             }  
    //         }else{
    //         Session::flash('error','Incorrect password');
    //         return redirect('/login');
    //         }
    //     }else{
    //         Session::flash('error','Incorrect email');
    //         return redirect('/login');
    //     }        
    // }

    public function adminValidation(Request $request){
        $request->validate([
            'email' => 'email|required',
            'password' => 'required|min:8'
        ]);
        $check_admin = user::where('email',$request->email)->first();
        if($check_admin){
            if(hash::check($request->password, $check_admin->password)){
                Session::put('logined',$check_admin->id);
                if ($check_admin->email === 'admin@wearvibes.com') {
                    return redirect('/admin');
                }else{
                    return redirect('/profile');
                }                
            }else{
            Session::flash('error','Incorrect password');
            return redirect('/login');
            }
        }else{
            Session::flash('error','Incorrect email');
            return redirect('/login');
        }    
        
    }

     public function adminpage() {
        Session::flash('success','Session created successfully');
        if(Session::has('success')){
            echo Session::get('Success');
        }
        return view('Admin/admin');        
    }


    public function shop(){
        return view('shop');
    }

    public function product($id){
        $check = productTable::where('status',1)->find($id);
        if($check){
            return view('product', compact('id'));
        }else{
            return redirect('/404');
        }
    }
    // public function checkOut(){
    //     return view('checkout');
    // }
    public function errorPage(){
        return view('errorPage');
    }

    // public function register()
    // {
    //     // $data = user::all();
    //     // dd($data);
    //     return view('register');
    // }


    // public function registerData(Request $request)
    // {
    //     $request->validate([
    //         'username' => 'required',
    //         'email' => 'email|required|unique:users,email',
    //         'phone' => 'required|max:10|min:10|unique:users,phone',
    //         'condition' => 'accepted',
    //         'password' => 'required|min:8'
    //     ]);

    //     $userId = user::insertGetId([
    //         'name' => $request->username,
    //         'email' => $request->email,
    //         'phone' => $request->phone,
    //         'address' => $request->address,
    //         'password' => hash::make( $request->password),
    //         'created_at' => date('Y-m-d h:i:sa')
    //     ]) ;

    //     Session::flash('success',"Registration Successful");
    //     Session::put('logined',$userId);
    //     return redirect('/dashboard');

        // user::create([
        //     'name' => $request->username,
        //     'email' => $request->email,
        //     'phone' => $request->phone,
        //     'address' => $request->address,
        //     'password' => $request->password,
        //     'created_at' => date('Y-m-d h:i:sa')
        // ]) ;

        
        // ->back()->with('success','Registration Successfully')
    // }

    // public function logout(){
    //     Session::forget('logined'); 
    //     return redirect('/');
    // }
    


    // public function cart(){
    //     return view('cart');
    // }
    public function admin(){
        return view('Admin/admin');
    }

    public function dashboardPage() {
        Session::flash('success','Session created successfully');
        if(Session::has('success')){
            echo Session::get('Success');
        }
        return view('dashboard');        
    }



    public function addproduct(){ 
        // $data = productTable::all();
        // dd($data);       
        return view('Admin/addproduct');
    }
    public function adproductValidation(Request $request){
        // dd($request->all());    //To show data of form 
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'productcode' => 'required',
            'review' => 'required',
            'originalprice' => 'required',
            'discountedprice' => 'required',
            'stock' => 'required',
            'img1' => 'required',
            'img2' => 'required',
            'img3' => 'required',
            'img4' => 'required',
            'img5' => 'required',
            'category' => 'required',
            'status' => 'required',
            'brands' => 'required',
            'availability' => 'required',
            'color' => 'required',
        ]);

        $productId = productTable::insertGetId([
            'name' => $request->name,
            'description' => $request->description,
            'product_code' => $request->productcode,
            'review' => $request->review,
            'original_price' => $request->originalprice,
            'discounted_price' => $request->discountedprice,
            'stock' => $request->stock,
            'image1' => $request->img1,
            'image2' => $request->img2,
            'image3' => $request->img3,
            'image4' => $request->img4,
            'image5' => $request->img5,
            'category' => $request->category,
            'status' => $request->status,
            'brand' => $request->brands,
            'availability' => $request->availability,
            'price_color' => $request->color,
            'created_at' => date('Y-m-d h:i:sa'),
        ]) ;

        Session::flash('success',"Product added Successfully!");
        return redirect()->back();   

    }


    public function productList() {
        return view('admin/productspage');
    }




















    public function addToCart(Request $request)
    {
        $cart = [];
        if(Session::has('cart')){
            $cart = Session::get('cart');
        }
        if(isset($cart[$request->p_id])){
            $cart[$request->p_id]['qty'] += $request->qty; 
        }else{
            $cart[$request->p_id] = [
                'id'=>$request->p_id,
                'qty'=>$request->qty,
            ];
        }
        Session::put('cart', $cart);
        return redirect()->back();
    }
    public function removeCart(Request $request){
        $cart = [];
        if(Session::has('cart')){
            $cart = Session::get('cart');
        }
        if(isset($cart[$request->p_id])){
            unset($cart[$request->p_id]);
        }
        Session::put('cart', $cart);
        return redirect()->back();
    }
    public function cartUpdate(Request $request){
        $cart = [];
        if(Session::has('cart')){
            $cart = Session::get('cart');
        }
        if(isset($cart[$request->p_id])){
            $cart[$request->p_id]['qty'] = $request->qty;
        }
        Session::put('cart', $cart);
        return redirect()->back();
    }
    public function cart(){
        return view('cart');
    }

    public function checkout(){
        if(Session::has('login_user')){
            if(!Session::has('cart')){
                return redirect('/cart');
            }else{
                if(empty(Session::get('cart'))){
                    return redirect('/cart');
                }
            }
            $user = User::where('status',1)->find(Session::get('login_user'));
            if($user){
                return view('checkout');
            }else{
                return redirect('/login');
            }
        }else{
            return redirect('/login');
        }
    }
    public function login(){
        if(Session::has('login_user')){
            return redirect('/profile');
        }else{
            return view('login');
        }
    }
    public function logout(){
        Session::forget('login_user');
        return redirect('/login');
    }
    public function checkLogin(Request $request){
        if(Session::has('login_user')){
            return redirect('/profile');
        }else{
            $check_admin = User::where('email', $request->email)->first();
            if ($check_admin) {
            // check hashed password
                if (Hash::check($request->password, $check_admin->password)) {
                    // use a single consistent session key
                    Session::put('login_user', $check_admin->id);

                    // Preferably use a flag on the user (is_admin) — but if you only have email:
                        if ($check_admin->email === 'admin@wearvibes.com') {
                            return redirect('/admin');
                        } else {
                            return redirect('/profile');
                        }
                    } else {
                        Session::flash('error', 'Incorrect password');
                        return redirect('/login')->withInput($request->only('email'));
                    }
                } else {
                Session::flash('error', 'Incorrect email');
                return redirect('/login')->withInput();
            }
        }
    }
    public function registerProfile(Request $request){
        if(Session::has('login_user')){
            return redirect('/profile');
        }else{
            $check_user = User::where('email', $request->email)->first();
            if(!$check_user){
                if($request->password !== $request->confirm_password){
                    Session::flash('error','Password does not match!');
                    return redirect('/register');
                }
                $id = User::insertGetId([
                    'name'=>$request->name,
                    'email'=>$request->email,
                    'password'=>Hash::make($request->password),
                    'status'=>1,
                    'created_at'=>date('Y-m-d H:i:s')
                ]);
                Session::put('login_user',$id);
                return redirect('/profile');
            }else{
                Session::flash('error','Account with ths email already exists!');
                return redirect('/register');
            }
        }
    }
    public function register(){
        if(Session::has('login_user')){
            return redirect('/profile');
        }else{
            return view('register');
        }
    }
    public function profile(){
        if(Session::has('login_user')){
            $user = User::where('status',1)->find(Session::get('login_user'));
            if($user){
                return view('profile');
            }else{
                return redirect('/logout');
            }
        }else{
            return redirect('/login');
        }
    }
    public function placeOrder(Request $request)
{
    if (!Session::has('login_user')) {
        return redirect('/cart');
    }

    $cart = Session::get('cart', []);

    if (empty($cart)) {
        return redirect('/cart');
    }

    $user = User::where('status', 1)->find(Session::get('login_user'));
    if (!$user) {
        return redirect('/cart');
    }

    // generate order id
    $order_id = rand(1111, 9999) . time() . rand(1111, 9999);

    // calculate grand total using floats
    $grand_total = 0.0;
    foreach ($cart as $cart_item) {
        $product = ProductTable::where('status', 1)->find($cart_item['id']);
        if (!$product) {
            // skip missing product or handle error as you prefer
            continue;
        }
        $grand_total += (float) $product->discounted_price * (int) $cart_item['qty'];
    }

    DB::beginTransaction();

    try {
        OrdersTable::insert([
            'order_id'    => $order_id,
            'user_id'     => $user->id,
            'name'        => $request->name,
            'email'       => $request->email,
            'phone'       => $request->phone,
            'address'     => $request->address,
            'city'        => $request->city,
            'state'       => $request->state,
            'zip_code'    => $request->zip_code,
            'grand_total' => $grand_total,             
            'status'      => 0,
            'created_at'  => now()
        ]);

        // Insert cart items
        foreach ($cart as $cart_item) {
            $product = ProductTable::where('status', 1)->find($cart_item['id']);
            if (!$product) {
                continue;
            }

            $item_total = (float) $product->discounted_price * (int) $cart_item['qty'];

            CartTable::insert([
                'order_id'   => $order_id,
                'product_id' => $product->id,
                'qty'        => (int) $cart_item['qty'],
                'price'      => $product->price,
                'total'      => $item_total,
                'created_at' => now()
            ]);
        }

        // update user address/phone
        $user->phone    = $request->phone;
        $user->address  = $request->address;
        $user->city     = $request->city;
        $user->state    = $request->state;
        $user->zip_code = $request->zip_code;
        $user->save();

        DB::commit();

        // remove only the cart key from session (important: do this BEFORE redirect)
        Session::forget('cart');

        return redirect('/profile')->with('success', 'Order placed successfully.');
    } catch (\Throwable $e) {
        DB::rollBack();
        // Log the error in real app: \Log::error($e);
        return redirect('/cart')->with('error', 'Failed to place order. Try again.');
    }
}
    public function updateProfile(Request $request){
        if(Session::has('login_user')){
            $user = User::where('status',1)->find(Session::get('login_user'));
            if($user){
                $user->name = $request->name;
                $user->phone = $request->phone;
                $user->address = $request->address;
                $user->city = $request->city;
                $user->state = $request->state;
                $user->zip_code = $request->zip_code;
                if(!empty($request->password)){
                    $user->password = Hash::make($request->password);                
                }
                $user->save();

                return redirect()->back();
            }else{
                return redirect('/logout');
            }
        }else{
            return redirect('/login');
        }
    }
}
