@extends('layouts.app')
@section('login')
<section id="register-login-page" class="bg-white py-16">
        <div class="container mx-auto px-4">
            <div class="flex flex-col justify-center md:flex-row gap-4">
                <div class="md:w-1/2 bg-white rounded-lg shadow-md p-4 md:p-10 md:m-10">
                    <h2 class="text-2xl font-semibold mb-4">Login</h2>
                    <form action="/check-login" method="post">
                        @csrf
                        @if(Session::has('error'))
                        <p class="text-red-500">{{Session::get('error')}}</p>
                        @endif
                        <div class="mb-3">
                            <label for="login-email" class="block ">Email</label>
                            <input type="email" name="email" id="login-email" class="w-full px-3 py-1 border  rounded-full focus:border-transparent focus:outline-none focus:ring-2 focus:ring-primary" required>
                        </div>
                        <div class="mb-3">
                            <label for="login-password" class="block ">Password</label>
                            <input type="password" name="password" id="login-password" class="w-full px-3 py-1 border  rounded-full focus:border-transparent focus:outline-none focus:ring-2 focus:ring-primary" required>
                        </div>
                        <button type="submit" class="bg-primary text-white border border-primary hover:bg-transparent hover:text-primary py-2 px-3 rounded-full w-full">Login</button>
                        <div class="mt-3">
                            <a href="/register" class="text-primary hover:underline">Didn't have an account?</a>
                        </div>
                    </form>
                </div>
                
            </div>
        </div>
@endsection