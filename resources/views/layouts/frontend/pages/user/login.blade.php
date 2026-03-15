


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="flex flex-col min-h-screen">

    <header>
        <div class="text-3xl font-bold tracking-wide text-center">
            <a href="{{ route('site.home') }}">amazin<span class="text-orange-400">ebook</span></a>
        </div>
    </header>
    <main class="flex-1 mt-12">
        <div class="flex flex-col justify-center border rounded-lg border-[#d3d3d3] p-6 text-lg w-[60%] md:w-[40%] mx-auto ">
            <div class="lg:w-[90%] mx-auto space-y-3">
                <p class="text-2xl font-semibold">Đăng nhập hoặc tạo tài khoản</p>
                <p class="font-bold text-xl">Nhập địa chỉ email</p>
                <form action="" class="">
                    <input type="text" placeholder="example@mail.com" class="border rounded-lg border-[#d3d3d3] w-full mx-auto h-10 p-3">
                </form>
                <x-btn content="Tiếp tục"/>
                <div class="border-[0.5px] border-[#d3d3d3] my-3"></div>
                <p>Sau nhúng login bằng fb,google</p>
            </div>
        </div>
    </main>
    <footer class="border-t border-gray-300 py-6 text-center text-sm text-gray-600">
    
        <div class="space-x-6">
            <a href="#" class="text-blue-600 hover:underline">Conditions of Use</a>
            <a href="#" class="text-blue-600 hover:underline">Privacy Notice</a>
            <a href="#" class="text-blue-600 hover:underline">Help</a>
        </div>

        <p class="mt-2">
            © 2026, Amazin.com, Inc. or its affiliates
        </p>

    </footer>
</body>
</html>