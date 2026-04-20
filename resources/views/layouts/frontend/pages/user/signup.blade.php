<x-frontend.layout>
    <x-slot:title>
        Đăng ký Amazin
    </x-slot:title>

    <div class="flex-1 flex flex-col items-center my-12 justify-center px-4">
        <div class="border border-[#d5d9d9] bg-white p-8 rounded-lg w-full max-w-[450px] shadow-sm">
            <h1 class="font-semibold text-3xl mb-5 uppercase">Tạo tài khoản</h1>
            <form action="{{ route('site.user.doregister') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="space-y-3">
                    <div>
                        <label for="name" class="font-bold text-base text-[#111]">Họ và tên</label>
                        <input type="text" id="name" name="name" required
                            class="border border-[#a6a6a6] focus:ring-orange-200 focus:ring-2 focus:border-orange-100 outline-none h-9.5 px-3 rounded-[3px] w-full text-base duration-300 mt-1 transition-all">
                    </div>
                    <div>
                        <label for="username" class="font-bold text-base text-[#111]">Tên đăng nhập</label>
                        <input type="text" id="username" name="username" required
                            class="border border-[#a6a6a6] focus:ring-orange-200 focus:ring-2 focus:border-orange-100 outline-none h-9.5 px-3 rounded-[3px] w-full text-base duration-300 mt-1 transition-all">
                    </div>
                    <div>
                        <label for="email" class="font-bold text-base text-[#111]">Email</label>
                        <input type="email" id="email" name="email" required
                            class="border border-[#a6a6a6] focus:ring-orange-200 focus:ring-2 focus:border-orange-100 outline-none h-9.5 px-3 rounded-[3px] w-full text-base duration-300 mt-1 transition-all">
                    </div>
                    <div>
                        <label for="phone" class="font-bold text-base text-[#111]">Số điện thoại</label>
                        <input type="text" id="phone" name="phone" required
                            class="border border-[#a6a6a6] focus:ring-orange-200 focus:ring-2 focus:border-orange-100 outline-none h-9.5 px-3 rounded-[3px] w-full text-base duration-300 mt-1 transition-all">
                    </div>
                    <div>
                        <label for="password" class="font-bold text-base text-[#111]">Mật Khẩu</label>
                        <input type="password" id="password" name="password" required
                            class="border border-[#a6a6a6] focus:ring-orange-200 focus:ring-2 focus:border-orange-100 outline-none h-9.5 px-3 rounded-[3px] w-full text-base duration-300 mt-1 transition-all">
                    </div>
                    <div>
                        <label for="password_confirmation" class="font-bold text-base text-[#111]">Xác nhận mật
                            khẩu</label>
                        <input type="password" id="password_confirmation" name="password_confirmation" required
                            class="border border-[#a6a6a6] focus:ring-orange-200 focus:ring-2 focus:border-orange-100 outline-none h-9.5 px-3 rounded-[3px] w-full text-base duration-300 mt-1 transition-all">
                    </div>
                    <div>
                        <label for="address" class="font-bold text-base text-[#111]">Địa chỉ (Không bắt buộc)</label>
                        <input type="text" id="address" name="address"
                            class="border border-[#a6a6a6] focus:ring-orange-200 focus:ring-2 focus:border-orange-100 outline-none h-9.5 px-3 rounded-[3px] w-full text-base duration-300 mt-1 transition-all">
                    </div>
                    <div>
                        <label for="image" class="font-bold text-base text-[#111]">Ảnh đại diện (Không bắt
                            buộc)</label>
                        <input type="file" id="image" name="image" accept="image/*"
                            class="border border-[#a6a6a6] focus:ring-orange-200 focus:ring-2 focus:border-orange-100 outline-none px-3 py-1.5 rounded-[3px] w-full text-base duration-300 mt-1 transition-all bg-white cursor-pointer">
                    </div>
                </div>
                <button type="submit"
                    class="bg-[#ffd814] hover:bg-[#f7ca00] border border-[#fcd200] rounded-2xl w-full py-2.5 text-base shadow font-medium mt-6 cursor-pointer capitalize">tạo
                    tài khoản</button>
            </form>

            <div class="border-[#d5d9d9] border-b my-6"></div>
            <div class="text-base text-[#111]">Đã có tài khoản? <a href="{{ route('site.user.login') }}"
                    class="text-[#0066c0] hover:text-[#c45500] hover:underline font-bold">Đăng nhập</a></div>
        </div>
    </div>
</x-frontend.layout>
