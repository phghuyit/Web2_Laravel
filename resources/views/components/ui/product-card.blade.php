<a href="{{ route('site.product.detail', $product->slug) }}" class="outline-none h-full block">
    {{-- {{ dd($product) }} --}}
    <div
        class="group hover:-translate-y-2 flex flex-col h-full rounded-lg border border-transparent p-6 shadow-md transition duration-200 hover:border-orange-500 hover:ring-2 hover:ring-orange-200">
        <!-- Be present above all else. - Naval Ravikant -->
        <div class="self-center w-full flex justify-center">
            <div class="m-1 rounded-xl bg-[#f7f7f7] px-1 2xl:p-2  2xl:h-64 flex justify-center xl:w-[50%]">
                <img src="{{ $product->image }}" alt="Bia sach" class="max-h-full object-contain h-50 2xl:h-full">
            </div>
        </div>

        <div class="my-4 flex-grow">
            <p class="font-bold text-xl leading-tight">{{ $product->name }}</p>
            <p>{{ $product->brand?->name }}</p>
            @if ($product->is_sale == 1)
                <p class="text-gray-500 line-through text-sm"><span
                        class="font-bold">{{ number_format($product->price_buy) }}</span> vnd</p>
                <p class="text-red-600"><span class="font-bold text-xl">{{ number_format($product->price_sale) }}</span>
                    vnd</p>
            @else
                <p class="text-red-600"><span class="font-bold text-xl">{{ number_format($product->price_buy) }}</span>
                    vnd</p>
            @endif
        </div>

        <div
            class="hidden border border-[#d3d3d3] transition-colors duration-200 lg:block group-hover:border-orange-400 group-focus-within:border-orange-400">
        </div>

        <div class="m-2 hidden items-center gap-1 md:flex md:justify-between">
            <div
                class="flex w-full justify-center whitespace-nowrap pr-3 text-xs 2xl:px-3 lg:w-auto lg:justify-start lg:border-r lg:border-[#d3d3d3]">
                <span class="fa fa-star text-yellow-500"></span>
                <span class="fa fa-star text-yellow-500"></span>
                <span class="fa fa-star text-yellow-500"></span>
                <span class="fa fa-star text-yellow-500"></span>
                <span class="fa fa-star"></span>
            </div>
            <div class="whitespace-nowrap">
                <p class="hidden px-3 text-sm lg:block"><span class="hidden lg:inline">Đã bán</span> 333</p>
            </div>
        </div>
    </div>
</a>
