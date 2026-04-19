<div {{ $attributes->merge(['class' => 'flex flex-col sm:flex-row gap-6 border-b border-gray-200 pb-6 last:border-0 last:pb-0']) }}>
    <!-- Image -->
    <div class="w-full sm:w-32 sm:h-32 shrink-0 bg-gray-50 rounded-md border border-gray-100 overflow-hidden">
        <img src="{{ $image ?? '<https://via.placeholder.com/150>' }}" alt="{{ $name ?? 'Tên sản phẩm mẫu' }}" class="w-full h-full object-cover">
    </div>

    <!-- Details -->
    <div class="flex-1 flex flex-col justify-between">
        <div>
            <div class="flex justify-between items-start">
                <h3 class="text-lg font-medium text-gray-900 line-clamp-2">
                    <a href="#" class="hover:text-orange-600 transition-colors">{{ $name ?? 'Tên sản phẩm mẫu' }}</a>
                </h3>
                <p class="text-lg font-bold text-gray-900 sm:hidden">{{ $price ?? '166,666 đ' }}</p>
            </div>
            <p class="text-sm text-gray-500 mt-1">{{ $variant ?? 'Phân loại: Mặc định' }}</p>
            <p class="text-xs text-green-600 mt-2"><i class="fa-solid fa-check mr-1"></i>Còn hàng</p>
        </div>

        <div class="flex items-center justify-between sm:justify-start gap-6 mt-4">
            <!-- Quantity -->
            <div class="flex items-center border border-gray-300 rounded-md overflow-hidden h-8">
                <button type="button" class="w-8 h-full text-gray-600 hover:bg-gray-100 flex items-center justify-center transition-colors"><i class="fa-solid fa-minus text-xs"></i></button>
                <input type="text" value="{{ $quantity ?? 1 }}" class="w-10 h-full text-center border-x border-y-0 border-gray-300 text-sm focus:ring-0 p-0" readonly>
                <button type="button" class="w-8 h-full text-gray-600 hover:bg-gray-100 flex items-center justify-center transition-colors"><i class="fa-solid fa-plus text-xs"></i></button>
            </div>

            <!-- Actions -->
            <button type="button" class="text-sm font-medium text-red-600 hover:text-red-500 transition-colors">Xóa</button>
        </div>
    </div>

    <!-- Price Desktop -->
    <div class="hidden sm:block text-right shrink-0">
        <p class="text-lg font-bold text-gray-900">{{ $price ?? '166,666 đ' }}</p>
        @if(isset($oldPrice))
            <p class="text-sm text-gray-500 line-through">{{ $oldPrice }}</p>
        @endif
    </div>
</div>
