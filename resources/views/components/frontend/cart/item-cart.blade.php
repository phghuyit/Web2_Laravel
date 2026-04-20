@php
    $product = $attributes->get('product');
@endphp

<div class="flex flex-col gap-6 border-b border-gray-200 pb-6 last:border-0 last:pb-0 sm:flex-row">
    <div class="w-full overflow-hidden rounded-md border border-gray-100 bg-gray-50 sm:h-32 sm:w-32 shrink-0">
        <img src="{{ !empty($product->image) ? $product->image : 'https://via.placeholder.com/150' }}"
            alt="{{ $product->name }}" class="h-full w-full object-cover">
    </div>

    <div class="flex flex-1 flex-col justify-between">
        <div>
            <div class="flex items-start justify-between">
                <h3 class="line-clamp-2 text-lg font-medium text-gray-900">
                    <a href="#" class="transition-colors hover:text-orange-600">{{ $product->name }}</a>
                </h3>
                <p class="text-lg font-bold text-gray-900 sm:hidden">{{ number_format($product->price, 0, ',', '.') }} đ</p>
            </div>
            <p class="mt-1 text-sm text-gray-500">Phân loại: Mặc định</p>
            <p class="mt-2 text-xs text-green-600"><i class="fa-solid fa-check mr-1"></i>Còn hàng</p>
        </div>

        <div class="mt-4 flex items-center justify-between gap-6 sm:justify-start">
            <div class="flex h-8 items-center overflow-hidden rounded-md border border-gray-300">
                <button type="button"
                    class="flex h-full w-8 items-center justify-center text-gray-600 transition-colors hover:bg-gray-100">
                    <i class="fa-solid fa-minus text-xs"></i>
                </button>
                <input type="number" name="qty[{{ $product->id }}]" value="{{ $product->qty }}" min="1"
                    class="h-full w-10 border-x border-y-0 border-gray-300 p-0 text-center text-sm focus:ring-0">
                <button type="button"
                    class="flex h-full w-8 items-center justify-center text-gray-600 transition-colors hover:bg-gray-100">
                    <i class="fa-solid fa-plus text-xs"></i>
                </button>
            </div>

            <a href="{{ route('site.cart.del', ['id' => $product->id]) }}"
                class="text-sm font-medium text-red-600 transition-colors hover:text-red-500">Xóa</a>
        </div>
    </div>

    <div class="hidden shrink-0 text-right sm:block">
        <p class="text-lg font-bold text-gray-900">{{ number_format($product->price, 0, ',', '.') }} đ</p>
    </div>
</div>
