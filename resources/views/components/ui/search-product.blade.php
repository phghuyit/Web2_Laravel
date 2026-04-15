<a href="{{ route('site.product.detail', $product->slug) }}"
    class="flex items-center gap-3 p-3 ">
    <div class="shrink-0">
        <img src="{{ asset('storage/' . $product->image) }}"
            class="w-10 h-14 object-cover rounded shadow-sm " alt="{{ $product->name }}">
    </div>
    <div class="flex-1 min-w-0">
        <p class="font-bold text-sm text-[#131921] truncate">{{ $product->name }}</p>
        <p class="text-xs text-gray-500 truncate mt-0.5">{{ $product->brand->name ?? 'Unknown Author' }}</p>
    </div>
</a>
