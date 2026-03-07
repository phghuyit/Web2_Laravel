<div class="flex flex-col overflow-hidden shadow rounded-[5px] p-6 text-lg ">
    <!-- Be present above all else. - Naval Ravikant -->
    <div class="self-center">
        <img src="{{ $img }}" alt="Bìa sách" class="object-contain ">
    </div>
    
    <div class="mt-6 mb-12">
        <p class="font-semibold">{{$title}}</p>
        <p class="">{{$author}}</p>
        <p class="text-red-400"><span class="font-semibold">{{$price}} </span>vnđ</p>
    </div>

    <div class="hidden lg:block border border-[#d3d3d3]"></div>

    <div class="hidden md:flex m-2  gap-1 items-center ">
        <div class="whitespace-nowrap pr-3 text-xs
                    2xl:px-3 lg:border-r lg:border-[#d3d3d3]
        ">

            <span class="fa fa-star text-amber-300"></span>
            <span class="fa fa-star text-amber-300"></span>
            <span class="fa fa-star text-amber-300"></span>
            <span class="fa fa-star text-amber-300"></span>
            <span class="fa fa-star"></span>

        </div>
        <div class="">
            <p class="hidden lg:block px-3 text-sm"><span class="hidden xl:inline">Đã bán</span> {{$sold}}</p>
        </div>
        
    </div>
</div>