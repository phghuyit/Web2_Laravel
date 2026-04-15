<header class="text-white pt-16 ">
    <div class="bg-[#131921] fixed top-0 w-full z-50 flex gap-4 items-center px-4 py-3 ">

        <!-- Logo -->
        <div class="font-bold text-2xl tracking-wide">
            <a href="{{ route('site.home') }}">amaz<span class="text-orange-400">in</span></a>
        </div>

        <!-- Search -->
        <div class="flex flex-1 relative">
            <input type="text" placeholder="Search Kindle eBooks" id="live-search-input"
                class="bg-white px-4 py-2 rounded-l-md text-black w-full focus:outline-none">
            <button class="bg-orange-400 font-semibold px-5 rounded-r-md text-black hover:bg-orange-500">
                <i class="fa-magnifying-glass fa-solid"></i>
            </button>

            <div id="search-result-container"
                class="absolute top-full mt-2 left-0 w-full bg-white border border-gray-200 shadow-xl rounded-2xl text-black z-100 overflow-hidden hidden">
                @fragment('search-results')
                    @isset($products)
                        <ul class="py-2 max-h-100 overflow-y-auto">
                            @foreach ($products as $product)
                                <li class="p-3 hover:bg-gray-100">
                                    <x-ui.search-product :product="$product" />
                                </li>
                            @endforeach
                            @if ($products->isEmpty())
                                <li class="px-4 py-6 text-center text-gray-500 italic">
                                    Chưa tìm thấy sản phẩm nào khớp với từ khóa.
                                </li>
                            @endif
                        </ul>

                        <div class="bg-gray-100 p-2 text-center">
                            <a href="{{ route('site.product.index') }}" class="text-blue-600 text-xs hover:underline">Xem tất cả
                                kết quả</a>
                        </div>
                    @endisset
                @endfragment
            </div>
        </div>

        <!-- Menu Right -->
        <div class="gap-6 hidden items-center text-sm md:flex">

            <div class="cursor-pointer hover:underline">
                <a href="{{ route('site.user.login') }}">
                    <p class="text-xs">Hello, Sign in</p>
                    <p class="font-semibold">Account & Lists</p>
                </a>
            </div>

            <div class="cursor-pointer hover:underline">
                <p class="text-xs">Returns</p>
                <p class="font-semibold">& Orders</p>
            </div>

            <div class="cursor-pointer relative">
                <a href="{{ route('site.cart.index') }}">
                    <span class="text-xl">🛒</span>
                    <span class="-right-3 -top-2 absolute bg-orange-500 px-1 rounded text-xs">
                        2
                    </span>
                </a>
            </div>

        </div>

    </div>
    <div
        class="bg-[#ffff] border-[#d3d3d3] border-b flex font-semibold gap-4 items-center justify-center mx-auto px-4 py-3 shadow text-[#414c59]">
        <div class="border-[#d3d3d3] border-r px-6">
            <a href="{{ route('site.home') }}"><img
                    src="https://m.media-amazon.com/images/G/01/books-voyager/subnav/Subnav_BooksLogo.svg"
                    alt="logo_ebook_amazon"></a>
        </div>
        @foreach ($menu as $e)
            @if ($loop->last)
                <div class="pr-6 lg:border-[#d3d3d3] lg:border-r hover:text-[#1880e8]">
                    <a href="{{ $e->link ? route($e->link) : '#' }}">
                        <p><span class="font-[15px] pl-0.5 text-[#131921]"><i
                                    class="{{ $e->icon }}"></i></span>{{ $e->name }}</p>
                    </a>
                </div>
            @else
                <div class="hidden lg:block hover:text-[#1880e8]">
                    <a href="{{ $e->link ? route($e->link) : '#' }}">
                        <p><span class="font-[15px] pl-0.5 text-[#131921]"><i
                                    class="{{ $e->icon }}"></i></span>{{ $e->name }}</p>
                    </a>
                </div>
            @endif
        @endforeach
        <div class="hidden lg:block hover:text-[#1880e8]">
            <a href="#">
                <p>Sách Của Bạn<span class="font-[15px] pl-0.5 text-[#131921]">&#11206;</span></p>
            </a>
        </div>
    </div>
</header>
