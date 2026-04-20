<x-frontend.layout>
    <x-slot:title>Thanh toán đơn hàng</x-slot:title>
    <main class="py-8 mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 text-[#0f1111]">
        <h1 class="font-bold text-3xl mb-6">Tiến hành Thanh toán</h1>
        <div class="flex flex-col gap-8 lg:flex-row lg:items-start">

            <div class="flex-[2] bg-white p-6 rounded-lg shadow-sm border border-gray-200">
                <h2 class="text-xl font-bold mb-4 border-b border-[#d3d3d3] pb-2">Thông tin giao hàng</h2>
                <form action="{{ route('site.cart.docheckout') }}" method="POST" id="checkout-form">
                    @csrf
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Họ và tên</label>
                            <input type="text" name="name" required
                                class="mt-1 p-2 block w-full rounded-md border border-gray-300 shadow-sm focus:border-orange-500 focus:ring-orange-500">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Số điện thoại</label>
                            <input type="text" name="phone" required
                                class="mt-1 p-2 block w-full rounded-md border border-gray-300 shadow-sm focus:border-orange-500 focus:ring-orange-500">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Email</label>
                            <input type="text" name="email" required
                                class="mt-1 p-2 block w-full rounded-md border border-gray-300 shadow-sm focus:border-orange-500 focus:ring-orange-500">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Địa chỉ giao hàng</label>
                            <textarea name="address" required rows="3"
                                class="mt-1 p-2 block w-full rounded-md border border-gray-300 shadow-sm focus:border-orange-500 focus:ring-orange-500"></textarea>
                        </div>
                    </div>
                </form>
            </div>

            <div class="flex-1 w-full bg-white p-6 rounded-lg shadow-sm border border-gray-200 sticky top-24">
                <h2 class="text-xl font-bold mb-4 border-b border-[#d3d3d3] pb-2">Tóm tắt đơn hàng</h2>
                @php
                    $totalPrice = 0;
                @endphp
                <div class="space-y-3 mb-4">
                    @foreach ($cart as $item)
                        @php $totalPrice += $item['price'] * $item['qty']; @endphp
                        <div class="flex justify-between text-sm">
                            <span class="truncate pr-2 text-gray-600">{{ $item['name'] }} (x{{ $item['qty'] }})</span>
                            <span
                                class="font-medium whitespace-nowrap">{{ number_format($item['price'] * $item['qty'], 0, ',', '.') }}
                                đ</span>
                        </div>
                    @endforeach
                </div>
                <div class="border-t border-gray-200 pt-3 flex justify-between items-center mt-2 mb-6">
                    <span class="font-bold text-lg">Tổng cộng:</span>
                    <span class="font-bold text-2xl text-orange-700">{{ number_format($totalPrice, 0, ',', '.') }}
                        đ</span>
                </div>
                <button type="submit" form="checkout-form"
                    class="w-full rounded-lg p-3 text-center text-white font-medium bg-orange-500 hover:bg-orange-600 transition-colors shadow-sm">
                    Đặt hàng ngay
                </button>
            </div>
        </div>
    </main>
</x-frontend.layout>
