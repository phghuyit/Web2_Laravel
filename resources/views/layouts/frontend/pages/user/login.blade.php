


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
        <div class="font-bold text-3xl text-center tracking-wide">
            <a href="{{ route('site.home') }}">amazin<span class="text-orange-400">ebook</span></a>
        </div>
    </header>
    <main class="flex-1 mt-12">
        <div class="border border-[#d3d3d3] flex flex-col justify-center mx-auto p-6 rounded-lg text-lg w-[60%] md:w-[40%]">
            <div class="mx-auto space-y-3 lg:w-[90%]">
                <p class="font-semibold text-2xl">Đăng nhập hoặc tạo tài khoản</p>
                <p class="font-bold text-xl">Nhập địa chỉ email</p>
                <form action="" class="">
                    <input type="text" placeholder="example@mail.com" class="border border-[#d3d3d3] h-10 mx-auto p-3 rounded-lg w-full">
                </form>
                <x-ui.btn content="Tiếp tục"/>
                <div class="border-[#d3d3d3] border-[0.5px] my-3"></div>
                <p>Sau nhúng login bằng fb,google</p>
            </div>
        </div>
    </main>
    <footer class="border-gray-300 border-t py-6 text-center text-gray-600 text-sm">

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
