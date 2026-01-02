@vite('resources/css/app.css')


<h1 class="text-2xl font-bold leading-relaxed ">User Dashboard</h1>
@if(Session::has('logined'))
@php
    $user = App\Models\user::find(Session::get('logined'));
@endphp
@if($user)
Hello!, {{$user->name}}
@endif
@endif

<a href="/Log-out"><br><button type="submit" class="text-xl font-bold bg-red-800 rounded-full px-5 py-3 text-white text-center mt-3 shadow-gray-400 hover:cursor-pointer">Log out</button></a>