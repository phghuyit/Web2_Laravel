<div class="border border-transparent duration-200 flex flex-col group outline-none p-6 rounded-[5px] shadow text-lg transition hover:border-orange-400 hover:ring-2 hover:ring-orange-100"
>
    <!-- Be present above all else. - Naval Ravikant -->
    {{-- {{ dd($product) }} --}}
    <div class="h-64 self-center">
        <img src="{{ $product->image }}" alt="Bìa sách" class="max-h-full object-contain">
    </div>

    <div class="mb-12 mt-6">
        <p class="font-semibold">{{$product->name}}</p>
        <p class="">{{$product->brand->name}}</p>
        <p class="text-red-400"><span class="font-semibold">{{number_format($product->price_buy)}} </span>vnđ</p>
    </div>

    <div class="border border-[#d3d3d3] duration-200 hidden transition-colors lg:block group-hover:border-orange-300 group-focus:border-orange-300"></div>

    <div class="gap-1 hidden items-center m-2 md:flex">
        <div class="flex justify-center pr-3 text-xs w-full whitespace-nowrap lg:border-[#d3d3d3] lg:border-r lg:justify-start lg:w-auto 2xl:px-3">

            <span class="fa fa-star text-amber-300"></span>
            <span class="fa fa-star text-amber-300"></span>
            <span class="fa fa-star text-amber-300"></span>
            <span class="fa fa-star text-amber-300"></span>
            <span class="fa fa-star"></span>

        </div>
        <div class="whitespace-nowrap">
            <p class="hidden px-3 text-sm lg:block"><span class="hidden lg:inline">Đã bán</span> 333</p>
        </div>

    </div>
</div>
