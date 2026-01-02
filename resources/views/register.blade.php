@extends('layouts.app')
@section('register')

<section id="register-login-page" class="bg-white py-16">
        <div class="container mx-auto px-4">
            <div class="flex flex-col justify-center md:flex-row gap-4">
                <div class="md:w-1/2 bg-white rounded-lg shadow-md p-4 md:p-10 md:m-10">
                    <h2 class="text-2xl font-semibold mb-4">Register</h2>
                    <form action="/register-profile" method="post">
                        @csrf
                        @if(Session::has('error'))
                        <p class="text-red-500">{{Session::get('error')}}</p>
                        @endif
                        <div class="mb-3">
                            <label for="register-name" class="block ">Name</label>
                            <input type="name" name="name" id="register-name" class="w-full px-3 py-1 border focus:border-transparent rounded-full focus:outline-none focus:ring-2 focus:ring-primary" required>
                        </div>
                        <div class="mb-3">
                            <label for="register-email" class="block ">Email</label>
                            <input type="email" name="email" id="register-email" class="w-full px-3 py-1 border focus:border-transparent rounded-full focus:outline-none focus:ring-2 focus:ring-primary" required>
                        </div>
                        <div class="mb-3">
                            <label for="register-phone" class="block ">Phone</label>
                            <input type="text" name="phone" id="register-phone" class="w-full px-3 py-1 border focus:border-transparent rounded-full focus:outline-none focus:ring-2 focus:ring-primary" required>
                        </div>
                        <div class="mb-3">
                            <label for="register-address" class="block ">Address</label>
                            <input type="text" name="address" id="register-address" class="w-full px-3 py-1 border focus:border-transparent rounded-full focus:outline-none focus:ring-2 focus:ring-primary" required>
                        </div>
                        <div class="mb-3">
                            <label for="register-city" class="block ">City</label>
                            <input type="text" name="city" id="register-city" class="w-full px-3 py-1 border focus:border-transparent rounded-full focus:outline-none focus:ring-2 focus:ring-primary" required>
                        </div>
                        <div class="mb-3">
                            <label for="register-state" class="block ">State</label>
                            <input type="text" name="state" id="register-state" class="w-full px-3 py-1 border focus:border-transparent rounded-full focus:outline-none focus:ring-2 focus:ring-primary" required>
                        </div>
                        <div class="mb-3">
                            <label for="register-zipcode" class="block ">Zip Code</label>
                            <input type="number" name="zipcode" id="register-zipcode" class="w-full px-3 py-1 border focus:border-transparent rounded-full focus:outline-none focus:ring-2 focus:ring-primary" required>
                        </div>
                        <div class="mb-3">
                            <label for="register-password" class="block ">Password</label>
                            <input type="password" name="password" id="register-password" class="w-full px-3 py-1 border focus:border-transparent rounded-full focus:outline-none focus:ring-2 focus:ring-primary" required>
                        </div>
                        <div class="mb-3">
                            <label for="register-confirm-password" class="block ">Confirm Password</label>
                            <input type="password" name="confirm_password" id="register-confirm-password" class="w-full px-3 py-1 border focus:border-transparent rounded-full focus:outline-none focus:ring-2 focus:ring-primary" required>
                        </div>
                        <button type="submit" class="bg-primary text-white border border-primary hover:bg-transparent hover:text-primary py-2 px-3 rounded-full w-full">Register</button>
                        <div class="mt-3">
                            <a href="/login" class="text-primary hover:underline">Already have an account?</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

@endsection