<x-frontend.layout>
    <x-slot:title>
        Đăng nhập Amazin
    </x-slot:title>

    <div class="flex-1 flex flex-col items-center my-12 justify-center px-4">
        <div class="border border-[#d5d9d9] bg-white p-8 rounded-lg w-100 shadow-sm">
            <h1 class="font-semibold text-3xl mb-5 uppercase">Đăng nhập</h1>
            @if (session('error'))
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg relative mb-4 text-sm"
                    role="alert">
                    {{ session('error') }}
                </div>
            @endif
            <form action="{{ route('site.user.dologin') }}" method="POST">
                @csrf
                <div class="space-y-2">
                    <label for="username" class="font-bold text-base text-[#111]">Email hoặc số điện thoại di
                        động</label>
                    <input type="text" id="username" name="username" value="{{ old('username') }}" required
                        class="border border-[#a6a6a6] focus:ring-orange-200 focus:ring-2 focus:border-orange-100 outline-none h-9.5 px-3 rounded-[3px] w-full text-base  duration-300 mt-2 transition-all">
                    <label for="password" class="font-bold text-base text-[#111]">Mật Khẩu</label>
                    <input type="password" id="password" name="password" required
                        class="border border-[#a6a6a6] focus:ring-orange-200 focus:ring-2 focus:border-orange-100 outline-none h-9.5 px-3 rounded-[3px] w-full text-base  duration-300 mt-2 transition-all">
                </div>
                <button type="submit"
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
                    <a href="{{ route('site.user.forgot') }}"
                        class="text-[#0066c0] hover:text-[#c45500] hover:underline text-sm">Quên mật
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
    </div>
</x-frontend.layout>
