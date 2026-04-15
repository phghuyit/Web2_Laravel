<x-frontend.layout>
    <x-slot:title>Giỏ Hàng</x-slot:title>
    <main class="py-8 mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 text-[#0f1111]">
        <div class="flex flex-col gap-8 lg:flex-row lg:items-start">

            <div class="flex-[3] bg-white p-6 rounded-lg shadow-sm border border-gray-200">
                <div class="mb-4 flex justify-between items-end border-b border-[#d3d3d3] pb-2">
                    <h1 class="capitalize font-bold text-3xl">Giỏ hàng</h1>
                    <span class="text-gray-500 text-sm hidden sm:block">Giá</span>
                </div>

                <div class="my-6 space-y-6">
                    //Card Cart San pham
                </div>
            </div>

            <div class="flex-1 w-full lg:w-auto bg-white p-6 rounded-lg shadow-sm border border-gray-200 sticky top-24">
                <h2 class="text-xl font-bold mb-4 border-b border-[#d3d3d3] pb-2">Tóm tắt đơn hàng</h2>

                <div class="space-y-3 mb-6 text-base">
                    <div class="flex justify-between">
                        <span class="text-gray-600">Tạm tính (2 sản phẩm):</span>
                        <span class="font-medium">333,333 đ</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-600">Giảm giá:</span>
                        <span class="font-medium text-green-600">-0 đ</span>
                    </div>
                    <div class="border-t border-gray-200 pt-3 flex justify-between items-center mt-2">
                        <span class="font-bold text-lg">Tổng cộng:</span>
                        <span class="font-bold text-2xl text-orange-700">333,333 đ</span>
                    </div>
                    <p class="text-xs text-gray-500 mt-2 text-right">Phí vận chuyển sẽ được tính lúc thanh toán.</p>
                </div>

                <div class="w-full">
                    <div class="rounded-lg p-3 text-center my-3 whitespace-nowrap bg-orange-400 hover:bg-orange-500 transition-color duration-300">
                        <a href="#"><p class="capitalize">Tiến hành Thanh Toán</p></a>
                    </div>
                </div>

                <div class="mt-4 text-xs text-gray-500 flex items-center justify-center gap-1">
                    <i class="fa-solid fa-shield-halved"></i> Thanh toán an toàn & bảo mật
                </div>
            </div>
        </div>


    </main>
</x-frontend.layout>
