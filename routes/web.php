<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\sitecontroller;
use App\Http\Middleware\Wearvibesmiddleware;
use App\Http\Middleware\CheckAdmin;
use App\Http\Controllers\AuthController;


Route::controller(sitecontroller::class)->group(function(){

    
    Route::get('/','index');
    Route::get('/product/{id}','product');
    Route::get('/add-to-cart','addToCart');
    Route::get('/remove-cart','removeCart');
    Route::get('/cart','cart');
    Route::get('/cart-update','cartUpdate');
    Route::get('/checkout','checkout');
    Route::get('/login','login');
    Route::get('/logout','logout');
    Route::post('/check-login','checkLogin');
    Route::get('/register','register');
    Route::post('/register-profile','registerProfile');
    Route::get('/profile','profile');
    Route::post('/place-order','placeOrder');
    Route::post('/update-profile','updateProfile');

    // Route::get('/login', [AuthController::class, 'login'])->name('login');
    // Route::post('/admin-validation', [AuthController::class, 'adminValidation'])->name('adminValidation');
    // Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

    // // Protected profile and admin routes (basic session check inside controller)
    // Route::get('/profile', [AuthController::class, 'profile'])->name('profile');
    // // Route::get('/admin', [AuthController::class, 'adminPage'])->name('admin');
    // Route::get('/admin', [AuthController::class, 'adminPage'])->middleware('check.admin')->name('admin');



    // Route::get('/', 'index');
    Route::get('/Mens', 'shop');
    // Route::get('/product', 'product');
    Route::get('/404', 'errorPage');
    // Route::get('/check-out', 'checkOut');

    Route::get('/login', [sitecontroller::class,'login'])->name('user.login');
    Route::post('/login', [sitecontroller::class,'logindatavalidate']);

     

    Route::get('/Register', [sitecontroller::class, 'register'])->name('register.show');
    Route::post('/Register', [sitecontroller::class , 'registerData']);

    Route::get('/Log-out', [sitecontroller::class , 'logout'])->middleware(Wearvibesmiddleware::class);

    Route::get('/dashboard',[sitecontroller::class,'dashboardPage'])->middleware(Wearvibesmiddleware::class);

    // Route::get('/admin', 'admin');
    Route::get('/admin', [sitecontroller::class,'adminpage'])->middleware(Wearvibesmiddleware::class);
    Route::post('/login',[sitecontroller::class,'adminValidation']);

    Route::get('/Cart', 'cart');
    Route::get('/category', 'category');


    Route::get('/addproduct', [sitecontroller::class,'addproduct'])->name('add.product')->middleware(Wearvibesmiddleware::class);
    Route::post('/addproduct', [sitecontroller::class,'adproductValidation']);

    Route::get('/product-list', [sitecontroller::class,'productList']);



    Route::get('/users', 'users');
    Route::get('/user-detail', 'userDetail');
    Route::get('/order', 'order');
    Route::get('/order-detail', 'orderDetail');
    Route::get('/refunds', 'refunds');
    Route::get('/main-banner', 'mainBanner');




    // Route::get('/login', [sitecontroller::class, 'logIn']);
}); 
