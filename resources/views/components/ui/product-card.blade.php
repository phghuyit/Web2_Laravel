<a href="{{ route('site.product.detail', $product->slug) }}" class="block outline-none">
    {{-- {{ dd($product) }} --}}
    <div class="group flex flex-col rounded-[5px] border border-transparent p-6 text-lg shadow transition duration-200 hover:border-orange-400 hover:ring-2 hover:ring-orange-100">
        <!-- Be present above all else. - Naval Ravikant -->
        <div class="h-64 self-center">
            <img src="{{ $product->image }}" alt="Bia sach" class="max-h-full object-contain">
        </div>

        <div class="mb-12 mt-6">
            <p class="font-semibold">{{ $product->name }}</p>
            <p>{{ $product->brand?->name }}</p>
            <p class="text-red-400"><span class="font-semibold">{{ number_format($product->price_buy) }}</span> vnd</p>
        </div>

        <div class="hidden border border-[#d3d3d3] transition-colors duration-200 lg:block group-hover:border-orange-300 group-focus-within:border-orange-300"></div>

        <div class="m-2 hidden items-center gap-1 md:flex">
            <div class="flex w-full justify-center whitespace-nowrap pr-3 text-xs 2xl:px-3 lg:w-auto lg:justify-start lg:border-r lg:border-[#d3d3d3]">
                <span class="fa fa-star text-amber-300"></span>
                <span class="fa fa-star text-amber-300"></span>
                <span class="fa fa-star text-amber-300"></span>
                <span class="fa fa-star text-amber-300"></span>
                <span class="fa fa-star"></span>
            </div>
            <div class="whitespace-nowrap">
                <p class="hidden px-3 text-sm lg:block"><span class="hidden lg:inline">Da ban</span> 333</p>
            </div>
        </div>
    </div>
</a>