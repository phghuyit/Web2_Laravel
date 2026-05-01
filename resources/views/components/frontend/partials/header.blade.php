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
            @if (Auth::check())
                <div class="cursor-pointer hover:underline">
                    <a href="{{ route('site.user.profile') }}">
                        <p class="text-xs">Hello, {{ Auth::user()->name }}</p>
                        <p class="font-semibold">Profile Detail</p>
                    </a>
                </div>
                <div class="cursor-pointer hover:underline">
                    <a href="{{ route('site.user.logout') }}"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <p class="font-semibold">Logout</p>
                    </a>
                    <form id="logout-form" action="{{ route('site.user.logout') }}" method="POST" class="hidden">
                        @csrf
                    </form>
                </div>
            @else
                <div class="cursor-pointer hover:underline">
                    <a href="{{ route('login') }}">
                        <p class="text-xs">Hello, Sign in</p>
                        <p class="font-semibold">Account & Lists</p>
                    </a>
                </div>
            @endif

            <div class="cursor-pointer hover:underline">
                <p class="text-xs">Returns</p>
                <p class="font-semibold">& Orders</p>
            </div>

            <div class="cursor-pointer relative">
                <a href="{{ route('site.cart.index') }}">
                    <span class="text-xl">🛒</span>
                    <span class="-right-3 -top-2 absolute bg-orange-500 px-1 rounded text-xs">
                        {{ collect(session('cart', []))->sum('qty') }}
                    </span>
                </a>
            </div>

        </div>

    </div>
    <div
        class="bg-[#ffff] border-[#d3d3d3] border-b flex font-semibold gap-4 items-center justify-center mx-auto px-4 py-3 shadow text-[#414c59]">
        <div class="border-[#d3d3d3] border-r px-6">
            <a href="{{ route('site.home') }}">
                <img
                    src="https://m.media-amazon.com/images/G/01/books-voyager/subnav/Subnav_BooksLogo.svg"
                    alt="logo_ebook_amazon">
            </a>
        </div>
        @foreach ($header->where('parent_id', 0) as $e)
            <div class="relative group {{ $loop->last ? 'pr-6 lg:border-[#d3d3d3] lg:border-r' : 'hidden lg:block' }} hover:text-[#1880e8] h-8">
                <a href="{{ $e->link && $e->link!='#' ? route($e->link) : '#' }}" class="h-full px-2 py-2 flex items-center gap-1 after:absolute after:content-[''] after:w-full after:h-4 after:left-0 after:top-full">
                    <p><span class="font-[15px] pl-0.5 text-[#131921]"><i class="{{ $e->icon }}"></i></span>{{ $e->name }}</p>
                    @if ($header->where('parent_id', $e->id)->isNotEmpty())
                        <span class="inline-block ">&#9662;</span>
                    @endif
                </a>

                @if ($header->where('parent_id', $e->id)->isNotEmpty())
                    <ul class="absolute left-0 top-full mt-1 hidden group-hover:block bg-white text-[#414c59] shadow-lg border border-gray-200 min-w-50 z-50 rounded-md">
                        @foreach ($header->where('parent_id', $e->id) as $child)
                            <li class="relative group/sub hover:bg-gray-100 border-b border-gray-100 last:border-0">
                                <a href="{{ $child->link && $child->link != '#' ? route($child->link) : '#' }}" class="flex justify-between items-center px-4 py-3 hover:text-[#1880e8] w-full after:absolute after:content-[''] after:w-4 after:h-full after:top-0 after:-right-4">
                                    {{ $child->name }}
                                    @if ($header->where('parent_id', $child->id)->isNotEmpty())
                                        <span class="text-xs">&#9656;</span>
                                    @endif
                                </a>

                                @if ($header->where('parent_id', $child->id)->isNotEmpty())
                                    <ul class="absolute left-full top-0 hidden group-hover/sub:block bg-white text-[#414c59] shadow-lg border border-gray-200 min-w-50 z-50 rounded-md">
                                        @foreach ($header->where('parent_id', $child->id) as $grandchild)
                                            <li class="hover:bg-gray-100 border-b border-gray-100 last:border-0">
                                                <a href="{{ $grandchild->link && $grandchild->link != '#' ? route($grandchild->link) : '#' }}" class="block px-4 py-2 hover:text-[#1880e8]">
                                                    {{ $grandchild->name }}
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                @endif
                            </li>
                        @endforeach
                    </ul>
                @endif
            </div>
        @endforeach
        <div class="hidden lg:block hover:text-[#1880e8]">
            <a href="#">
                <p>Sách Của Bạn<span class="font-[15px] pl-0.5 text-[#131921]">&#11206;</span></p>
            </a>
        </div>
    </div>
</header>
