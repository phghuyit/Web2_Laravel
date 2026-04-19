<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Đăng nhập Amazin</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="flex flex-col min-h-screen bg-white text-[#111] select-none">

    <header class="py-4 flex justify-center">
        <div class="font-bold text-4xl text-center tracking-wide">
            <a href="{{ route('site.home') }}" class="text-[#0f1111]">amazin<span
                    class="text-orange-400">ebook</span></a>
        </div>
    </header>
    <main class="flex-1 flex flex-col items-center mt-2  justify-center">
        <div class="border border-[#d5d9d9] bg-white p-8 rounded-lg w-[400px]">
            <h1 class="font-semibold text-3xl mb-5 uppercase">Đăng nhập</h1>
            <form action="post">
                @csrf
                <div class="space-y-2">
                    <label for="email" class="font-bold text-base text-[#111]">Email hoặc số điện thoại di
                        động</label>
                    <input type="text" id="email"
                        class="border border-[#a6a6a6] focus:ring-orange-200 focus:ring-2 focus:border-orange-100 outline-none h-9.5 px-3 rounded-[3px] w-full text-base  duration-300 mt-2 transition-all">
                    <label for="email" class="font-bold text-base text-[#111]">Mật Khẩu</label>
                    <input type="text" id="password"
                        class="border border-[#a6a6a6] focus:ring-orange-200 focus:ring-2 focus:border-orange-100 outline-none h-9.5 px-3 rounded-[3px] w-full text-base  duration-300 mt-2 transition-all">
                </div>
                <button type="button"
                    class="bg-[#ffd814] hover:bg-[#f7ca00] border border-[#fcd200] rounded-2xl w-full py-2.5 text-base shadow font-medium mt-5 cursor-pointer capitalize">đăng
                    nhập</button>
            </form>

            <p class="text-sm text-[#111] mt-5 leading-relaxed">
                Bằng cách tiếp tục, bạn đồng ý với <a href="#"
                    class="text-[#0066c0] hover:text-[#c45500] hover:underline">Điều kiện sử dụng</a> và <a
                    href="#" class="text-[#0066c0] hover:text-[#c45500] hover:underline">Thông báo bảo mật</a> của
                Amazin.
            </p>
            <details class="text-base mt-3 group">
                <summary class="cursor-pointer text-[#0066c0] hover:text-[#c45500] list-none flex items-center">
                    <i
                        class="fa-solid fa-angle-down transition-transform duration-300 group-open:rotate-180 text-xs"></i>
                    <span class="group-hover:underline">Cần trợ giúp?</span>
                </summary>
                <div class="pl-4 mt-2 space-y-2 flex flex-col translate-x-2 items-start">
                    <a href="{{ route("site.user.forgot") }}" class="text-[#0066c0] hover:text-[#c45500] hover:underline text-sm">Quên mật
                        khẩu</a>
                    <a href="#" class="text-[#0066c0] hover:text-[#c45500] hover:underline text-sm">Vấn đề khác
                        với
                        đăng nhập</a>
                </div>
            </details>
            <div class="border-[#d5d9d9] border-b my-6"></div>
            <div class="text-base font-bold text-[#111]">Lần đầu đến với Amazin?</div>
            <a href="{{ route('site.user.signup') }}"
                class="text-base text-[#0066c0] hover:text-[#c45500] hover:underline block mt-1">Tạo tài khoản cá nhân
                của bạn</a>
        </div>
    </main>

    <footer class="mt-12 relative flex flex-col items-center space-y-3 pb-12">
        <div
            class="absolute inset-0 top-0 h-[4px] w-full bg-gradient-to-b from-[rgba(0,0,0,0.05)] to-transparent -z-10">
        </div>
        <div class="pt-8 flex space-x-8 text-sm text-[#0066c0]">
            <a href="#" class="hover:underline">Điều kiện sử dụng</a>
            <a href="#" class="hover:underline">Thông báo bảo mật</a>
            <a href="#" class="hover:underline">Trợ giúp</a>
        </div>
        <p class="text-sm text-[#555]">
            © 2026, Amazin.com, Inc. hoặc các chi nhánh của nó
        </p>
    </footer>
</body>

</html>
