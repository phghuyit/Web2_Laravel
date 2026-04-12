<header class="text-white pt-16">
    <div class="bg-[#131921] fixed top-0 w-full z-50 flex gap-4 items-center px-4 py-3">

        <!-- Logo -->
        <div class="font-bold text-2xl tracking-wide">
            <a href="{{ route('site.home') }}">amaz<span class="text-orange-400">in</span></a>
        </div>

        <!-- Search -->
        <div class="flex flex-1">
            <input type="text" placeholder="Search Kindle eBooks"
                class="bg-white px-4 py-2 rounded-l-md text-black w-full focus:outline-none">
            <button class="bg-orange-400 font-semibold px-5 rounded-r-md text-black hover:bg-orange-500">
                <i class="fa-magnifying-glass fa-solid"></i>
            </button>
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
        <div class="hover:text-[#1880e8]">
            <a href="#">
                <p>Thể Loại<i class="fa-caret-down fa-solid font-[15px] pl-0.5 text-[#131921]"></i></p>
            </a>
        </div>

        <div class="hidden md:block hover:text-[#1880e8]">
            <a href="#">
                <p>Best Seller<i class="fa-circle-check fa-solid font-[8px] pl-0.5 text-orange-400"></i></p>
            </a>
        </div>

        <div class="hidden lg:block hover:text-[#1880e8]">
            <a href="#">
                <p>Hot Trend<span class="font-[15px] pl-0.5 text-[#131921]">&#11206;</span></p>
            </a>
        </div>
        <div class="hidden md:block hover:text-[#1880e8]">
            <a href="#">
                <p>Flash Sale<i class="fa-bolt fa-solid font-[15px] pl-0.5 text-orange-400"></i></p>
            </a>
        </div>
        <div class="border-[#d3d3d3] border-r pr-6 lg:border-0 hover:text-[#1880e8]">
            <a href="{{ route('site.contact.index') }}">
                <p>Liên Hệ</p>
            </a>
        </div>
        <div class="pr-6 lg:border-[#d3d3d3] lg:border-r hover:text-[#1880e8]">
            <a href="{{ route('site.product.index') }}">
                <p>Tất Cả Sản Phẩm</p>
            </a>
        </div>
        <div class="hidden lg:block hover:text-[#1880e8]">
            <a href="#">
                <p>Sách Của Bạn<span class="font-[15px] pl-0.5 text-[#131921]">&#11206;</span></p>
            </a>
        </div>
    </div>
</header>
