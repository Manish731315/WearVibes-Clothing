
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@200..800&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://kit.fontawesome.com/367278d2a4.css" crossorigin="anonymous">
  @vite('resources/css/app.css')
<title>Admin Page</title>
</head>
<body class="bg-[#0f111a]">

  <div class="flex w-full">
    <div class="flex flex-col justify-between items-center gap-4 p-6 my-1.5 bg-[#010717] text-white h-full w-xs">
      <div class="flex justify-center items-center">
        <a href="/">
          <div class="">
              <img src="{{asset('images/WearVibes.png')}}" alt="Logo" class="h-14 w-auto mr-4">
          </div>
        </a>
        <div class="hidden">
           <i class="fa-solid fa-align-justify"></i>
        </div>
      </div>

      <div >
        <div class="flex flex-col justify-between font-bold p-5 gap-4 mt-4">
          <div class="flex justify-start items-center gap-4 mb-2 p-3 hover:text-red-600 hover:bg-[#141824] rounded-lg shadow-lg transition duration-700 ease-in-out hover:translate-x-2">
            <i class="fa-solid fa-user-tie text-2xl"></i>
            <a href="/admin" >Admin</a>
          </div>
          <div class="flex justify-start items-center gap-4 mb-2 p-3 hover:text-red-600 hover:bg-[#141824] rounded-lg shadow-lg transition duration-700 ease-in-out hover:translate-x-2">
            <i class="fa-brands fa-product-hunt text-2xl"></i>
            <a href="/addproduct" >Add Products</a>
          </div>
          <div class="flex justify-start items-center gap-4 mb-2 p-3 hover:text-red-600 hover:bg-[#141824] rounded-lg shadow-lg transition duration-700 ease-in-out hover:translate-x-2">
            <i class="fa-solid fa-truck text-2xl"></i>
            <a href="/product-list" >Products</a>
          </div>
          <div class="flex justify-start items-center gap-4 mb-2 p-3 hover:text-red-600 hover:bg-[#141824] rounded-lg shadow-lg transition duration-700 ease-in-out hover:translate-x-2">
            <i class="fa-solid fa-users-line text-2xl"></i>
            <a href="" >Users</a>
          </div>
          <div class="flex justify-start items-center gap-4 mb-2 p-3 hover:text-red-600 hover:bg-[#141824] rounded-lg shadow-lg transition duration-700 ease-in-out hover:translate-x-2">
            <i class="fa-solid fa-users-viewfinder text-2xl"></i>
            <a href="" >User Details</a>
          </div>
          <div class="flex justify-start items-center gap-4 mb-2 p-3 hover:text-red-600 hover:bg-[#141824] rounded-lg shadow-lg transition duration-700 ease-in-out hover:translate-x-2">
            <i class="fa-solid fa-bag-shopping text-2xl"></i>
            <a href="" >Orders</a>
          </div>
          <div class="flex justify-start items-center gap-4 mb-2 p-3 hover:text-red-600 hover:bg-[#141824] rounded-lg shadow-lg transition duration-700 ease-in-out hover:translate-x-2">
            <i class="fa-regular fa-bags-shopping text-2xl"></i>
            <a href="" >Order Details</a>
          </div>
          <div class="flex justify-start items-center gap-4 mb-2 p-3 hover:text-red-600 hover:bg-[#141824] rounded-lg shadow-lg transition duration-700 ease-in-out hover:translate-x-2">
            <i class="fa-solid fa-indian-rupee-sign text-2xl"></i>
            <a href="" >Refunds</a>
          </div>
          <div class="flex justify-start items-center gap-4 mb-2 p-3 hover:text-red-600 hover:bg-[#141824] rounded-lg shadow-lg transition duration-700 ease-in-out hover:translate-x-2">
            <i class="fa-solid fa-flag-pennant text-2xl"></i>
            <a href="" >Main Banner</a>
          </div>
          <div class="flex justify-start items-center gap-4 mb-2 p-3 hover:text-red-600 hover:bg-[#141824] rounded-lg shadow-lg transition duration-700 ease-in-out hover:translate-x-2">
            <i class="fa-regular fa-icons text-2xl"></i>
            <a href="" >Categories</a>
          </div>
        </div>
      </div>
    </div>
    <div class="bg-white w-full">
      @yield('admincontent')
      @yield('addproductform')
      @yield('productsList')
    </div>
  </div>

</body>
</html>