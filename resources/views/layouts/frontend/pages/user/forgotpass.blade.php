<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Hỗ trợ mật khẩu - Amazin</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="flex flex-col min-h-screen bg-white text-[#111] select-none">

    <header class="py-4 flex justify-center">
        <div class="font-bold text-4xl text-center tracking-wide">
            <a href="{{ route('site.home') }}" class="text-[#0f1111]">amazin<span
                    class="text-orange-400">ebook</span></a>
        </div>
    </header>
    <main class="flex-1 flex flex-col items-center mt-2 justify-center pb-8">
        <div class="border border-[#d5d9d9] bg-white p-8 rounded-lg w-[400px]">
            <h1 class="font-semibold text-3xl mb-4">Hỗ trợ mật khẩu</h1>
            <p class="text-sm mb-4 leading-relaxed">Nhập địa chỉ email hoặc số điện thoại di động liên kết với tài khoản
                Amazin của bạn.</p>
            <form action="" method="POST">
                @csrf
                <div class="space-y-3">
                    <div>
                        <label for="email_or_phone" class="font-bold text-base text-[#111]">Email hoặc số điện
                            thoại</label>
                        <input type="text" id="email_or_phone" name="email_or_phone" required
                            class="border border-[#a6a6a6] focus:ring-orange-200 focus:ring-2 focus:border-orange-100 outline-none h-9.5 px-3 rounded-[3px] w-full text-base duration-300 mt-1 transition-all">
                    </div>
                </div>
                <button type="submit"
                    class="bg-[#ffd814] hover:bg-[#f7ca00] border border-[#fcd200] rounded-2xl w-full py-2.5 text-base shadow font-medium mt-6 cursor-pointer capitalize">Tiếp
                    tục</button>
            </form>

            <div class="border-[#d5d9d9] border-b my-6"></div>
            <div class="text-base text-[#111]">Đã nhớ mật khẩu? <a href="{{ route("site.user.login") }}"
                    class="text-[#0066c0] hover:text-[#c45500] hover:underline font-bold">Đăng nhập</a></div>
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
