<x-frontend.layout>
    <x-slot:title>Giỏ Hàng</x-slot:title>
    @php
        $totalQty = 0;
        $totalPrice = 0;
        foreach ($cart as $item) {
            $totalQty += $item['qty'];
            $totalPrice += $item['price'] * $item['qty'];
        }
    @endphp
    <main class="py-8 mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 text-[#0f1111]">
        <div class="flex flex-col gap-8 lg:flex-row lg:items-start">

            <div class="flex-[3] bg-white p-6 rounded-lg shadow-sm border border-gray-200">
                <div class="mb-4 flex justify-between items-end border-b border-[#d3d3d3] pb-2">
                    <h1 class="capitalize font-bold text-3xl">Giỏ hàng</h1>
                    <span class="text-gray-500 text-sm hidden sm:block">Giá</span>
                </div>

                <form action="{{ route('site.cart.update') }}" method="POST">
                    @csrf
                    <div class="my-6 space-y-6">
                        @forelse($cart as $id => $item)
                            @php
                                $product = (object) array_merge(['id' => $id], $item);
                            @endphp
                            <x-frontend.cart.item-cart :product="$product" />
                        @empty
                            <p class="text-center text-gray-500 py-8">Giỏ hàng của bạn đang trống.</p>
                        @endforelse
                    </div>
                    @if (count($cart) > 0)
                        <div class="flex justify-between items-center mt-4">
                            <a href="{{ route('site.cart.delall') }}"
                                class="text-sm font-medium text-red-600 transition-colors hover:text-red-800"
                                onclick="return confirm('Bạn có chắc chắn muốn xóa toàn bộ sản phẩm trong giỏ hàng không?')">Xóa
                                tất cả</a>
                            <button type="submit"
                                class="bg-gray-200 hover:bg-gray-300 px-4 py-2 rounded-md transition-colors text-sm font-medium">Cập
                                nhật giỏ hàng</button>
                        </div>
                    @endif
                </form>
            </div>

            <div class="flex-1 w-full lg:w-auto bg-white p-6 rounded-lg shadow-sm border border-gray-200 sticky top-24">
                <h2 class="text-xl font-bold mb-4 border-b border-[#d3d3d3] pb-2">Tóm tắt đơn hàng</h2>

                <div class="space-y-3 mb-6 text-base">
                    <div class="flex justify-between">
                        <span class="text-gray-600">Tạm tính ({{ $totalQty }} sản phẩm):</span>
                        <span class="font-medium">{{ number_format($totalPrice, 0, ',', '.') }} đ</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-600">Giảm giá:</span>
                        <span class="font-medium text-green-600">-0 đ</span>
                    </div>
                    <div class="border-t border-gray-200 pt-3 flex justify-between items-center mt-2">
                        <span class="font-bold text-lg">Tổng cộng:</span>
                        <span class="font-bold text-2xl text-orange-700">{{ number_format($totalPrice, 0, ',', '.') }}
                            đ</span>
                    </div>
                    <p class="text-xs text-gray-500 mt-2 text-right">Phí vận chuyển sẽ được tính lúc thanh toán.</p>
                </div>

                <div class="w-full">
                    <div
                        class="rounded-lg p-3 text-center my-3 whitespace-nowrap bg-orange-400 hover:bg-orange-500 transition-color duration-300">
                        <a href="{{ route("site.cart.checkout") }}">
                            <p class="capitalize">Tiến hành Thanh Toán</p>
                        </a>
                    </div>
                </div>

                <div class="mt-4 text-xs text-gray-500 flex items-center justify-center gap-1">
                    <i class="fa-solid fa-shield-halved"></i> Thanh toán an toàn & bảo mật
                </div>
            </div>
        </div>


    </main>
</x-frontend.layout>
