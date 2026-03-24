<div class="flex flex-col shadow rounded-[5px] p-6 text-lg ">
    <!-- Be present above all else. - Naval Ravikant -->
    <div class="self-center h-64">
        <img src="{{ $product->image }}" alt="Bìa sách" class="object-contain max-h-full">
    </div>

    <div class="mt-6 mb-12">
        <p class="font-semibold">{{$product->name}}</p>
        <p class="">{{$product->brand->name}}</p>
        <p class="text-red-400"><span class="font-semibold">{{number_format($product->price_buy)}} </span>vnđ</p>
    </div>

    <div class="hidden lg:block border border-[#d3d3d3]"></div>

    <div class="hidden md:flex m-2  gap-1 items-center ">
        <div class="flex w-full whitespace-nowrap pr-3 text-xs justify-center
                    2xl:px-3 lg:border-r lg:border-[#d3d3d3] lg:justify-start lg:w-auto
        ">

            <span class="fa fa-star text-amber-300"></span>
            <span class="fa fa-star text-amber-300"></span>
            <span class="fa fa-star text-amber-300"></span>
            <span class="fa fa-star text-amber-300"></span>
            <span class="fa fa-star"></span>

        </div>
        <div class="whitespace-nowrap">
            <p class="hidden lg:block px-3 text-sm"><span class="hidden lg:inline">Đã bán</span> 333</p>
        </div>

    </div>
</div>
