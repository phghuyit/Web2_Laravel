<header class=" text-white">
    <div class="bg-[#131921] mx-auto px-4 flex items-center gap-4 py-3">

        <!-- Logo -->
        <div class="text-2xl font-bold tracking-wide">
            <a href="{{ route('site.home') }}">amaz<span class="text-orange-400">in</span></a>
        </div>
        
        <!-- Search -->
        <div class="flex flex-1">
            <input 
                type="text" 
                placeholder="Search Kindle eBooks"
                class="w-full px-4 py-2 text-black rounded-l-md focus:outline-none bg-white"
            >
            <button class="bg-orange-400 hover:bg-orange-500 px-5 rounded-r-md text-black font-semibold">
                 <i class="fa-solid fa-magnifying-glass"></i>
            </button>
        </div>

        <!-- Menu Right -->
        <div class="hidden md:flex items-center gap-6 text-sm">

            <div class="hover:underline cursor-pointer">
                <a href="{{ route('site.user.login') }}">
                    <p class="text-xs">Hello, Sign in</p>
                    <p class="font-semibold">Account & Lists</p>
                </a>
            </div>

            <div class="hover:underline cursor-pointer">
                <p class="text-xs">Returns</p>
                <p class="font-semibold">& Orders</p>
            </div>

            <div class="relative cursor-pointer">
                <a href="{{ route('site.cart.index') }}">
                    <span class="text-xl">🛒</span>
                    <span class="absolute -top-2 -right-3 bg-orange-500 text-xs px-1 rounded">
                        2
                    </span>
                </a>
            </div>

        </div>

    </div>
    <div class="bg-[#ffff] mx-auto px-4 flex justify-center items-center gap-4 py-3 text-[#414c59] font-semibold border-b border-[#d3d3d3] shadow ">
        <div class="border-r border-[#d3d3d3] px-6">
            <a href="{{ route('site.home') }}"><img src="https://m.media-amazon.com/images/G/01/books-voyager/subnav/Subnav_BooksLogo.svg" alt="logo_ebook_amazon" ></a>
        </div>
        <div class="hover:text-[#1880e8]">
            <a href="#"><p>Thể Loại<i class="fa-solid fa-caret-down font-[15px] text-[#131921] pl-0.5"></i></p></a>
        </div>

        <div class="hidden hover:text-[#1880e8] 
                    md:block">
            <a href="#"><p>Best Seller<i class="fa-solid fa-circle-check font-[8px] text-orange-400 pl-0.5"></i></p></a>
        </div>

        <div class="hidden hover:text-[#1880e8]
                    lg:block">
            <a href="#"><p>Hot Trend<span  class="font-[15px] text-[#131921] pl-0.5">&#11206;</span></p></a>
        </div>
        <div class="hidden hover:text-[#1880e8]
                    md:block">
            <a href="#"><p>Flash Sale<i class="fa-solid fa-bolt font-[15px] text-orange-400 pl-0.5"></i></p></a>
        </div>
        <div class="hover:text-[#1880e8] border-r border-[#d3d3d3] pr-6
                    lg:border-0 ">
            <a href="{{ route('site.contact.index') }}"><p>Liên Hệ</p></a>
        </div>
        <div class="hover:text-[#1880e8] pr-6
                    lg:border-r lg:border-[#d3d3d3]">
            <a href="{{ route('site.product.index') }}"><p>Tất Cả Sản Phẩm</p></a>
        </div>
        <div class="hidden hover:text-[#1880e8]
                    lg:block">
            <a href="#"><p>Sách Của Bạn<span  class="font-[15px] text-[#131921] pl-0.5">&#11206;</span></p></a>
        </div>
    </div>
</header>
