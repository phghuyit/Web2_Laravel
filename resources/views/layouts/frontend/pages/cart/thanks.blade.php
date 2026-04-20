<x-frontend.layout>
    <x-slot:title>Đặt hàng thành công</x-slot:title>

    <main class="py-16 mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 text-[#0f1111]">
        <div class="max-w-2xl mx-auto bg-white p-10 rounded-xl shadow-sm border border-gray-200 text-center">
            <div class="flex justify-center mb-6">
                <i class="fa-solid fa-circle-check text-6xl text-green-500"></i>
            </div>
            <h1 class="text-3xl font-bold mb-4 text-gray-900">Cảm ơn bạn đã đặt hàng!</h1>
            <p class="text-gray-600 mb-8 leading-relaxed">
                Đơn hàng của bạn đã được tiếp nhận thành công và đang được chúng tôi xử lý.
                Chúng tôi sẽ sớm liên hệ lại với bạn thông qua số điện thoại để xác nhận thông tin giao hàng.
            </p>

            <div class="flex flex-col sm:flex-row justify-center gap-4">
                <a href="{{ route('site.product.index') }}"
                    class="bg-gray-100 hover:bg-gray-200 text-gray-800 px-6 py-3 rounded-lg transition-colors font-medium">Tiếp
                    tục mua sắm</a>
                <a href="{{ route('site.home') }}"
                    class="bg-orange-400 hover:bg-orange-500 text-white px-6 py-3 rounded-lg transition-colors font-medium">Về
                    trang chủ</a>
            </div>
        </div>
    </main>
</x-frontend.layout>
