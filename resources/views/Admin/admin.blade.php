@extends('/admin/adminlayout.adminpage')
@vite('resources/css/app.css')
@section('admincontent')


{{-- @if(Session::has('success'))
<div class="flex justify-center items-center pt-2 bg-[#06335d]">
    <div class="bg-green-500 text-white p-4 rounded mb-4 w-1/3 text-center">
     success!   {{Session::get('success')}} <br>
        <a href="/login" class="text-red-500! font-bold">Go to login page</a> 
    </div>
</div>
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
@endif  --}}

<div class="p-4">
    
    <div>
        <div>
            <input type="text">
        </div>
        <div>

        </div>
    </div>





<h1 class="text-2xl font-bold leading-relaxed ">Admin</h1>
@if(Session::has('logined'))
@php
    $user = App\Models\user::find(Session::get('logined'));
@endphp
@if($user)
    Hello!, {{$user->name}}
@endif
@endif



<a href="/Log-out"><br><button type="submit" class="text-xl font-bold bg-red-800 rounded-full px-5 py-3 text-white text-center mt-3 shadow-gray-400 hover:cursor-pointer">Log out</button></a>

    <section class="">
        <div>
            <h3 class="text-white">sajhdjshdb</h3>
        </div>

</div>


    </section>
@endsection