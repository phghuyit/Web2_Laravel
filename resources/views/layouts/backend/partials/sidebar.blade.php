
    <div class="border-r flex flex-col min-h-screen overflow-y-auto p-6 space-y-2 sticky">
        <p class="font-semibold text-gray-600 text-lg tracking-wider uppercase">homes</p>

            <a href="./index.html" class="capitalize duration-500 ease-in-out font-medium mb-3 text-[15px] transition hover:text-orange-400">
                <i class="fa-chart-pie fa-solid mr-2"></i>
                Analytics dashboard
            </a>

            <a href="./index-1.html" class="capitalize duration-500 ease-in-out font-medium mb-3 mb-3 text-[15px] transition hover:text-orange-400">
                <i class="fa-shopping-cart fa-solid mr-2"></i>
                ecommerce dashboard
            </a>

        <p class="font-semibold text-gray-600 text-lg tracking-wider uppercase">Products</p>

            <a href="{{ route('product.index') }}" class="capitalize duration-500 ease-in-out font-medium mb-3 text-[15px] transition hover:text-orange-400">
                <i class="fa-book fa-solid mr-2"></i>
                Toàn bộ sách
            </a>

            <a href="{{ route('cate.index') }}" class="capitalize duration-500 ease-in-out font-medium mb-3 text-[15px] transition hover:text-orange-400">
                <i class="fa-layer-group fa-solid mr-2"></i>
                Thể loại
            </a>

            <a href="{{ route('brand.index') }}" class="capitalize duration-500 ease-in-out font-medium mb-3 text-[15px] transition hover:text-orange-400">
                <i class="fa-solid fa-user-pen mr-2"></i>
                Tác giả
            </a>

        <p class="font-semibold text-gray-600 text-lg tracking-wider uppercase">Users</p>
            <a href="{{ route("user.index") }}" class="capitalize duration-500 ease-in-out font-medium mb-3 text-[15px] transition hover:text-orange-400">
                <i class="fa-solid fa-user mr-2"></i>
                Toàn bộ người dùng
            </a>

            <a href="./index-1.html" class="capitalize duration-500 ease-in-out font-medium mb-3 text-[15px] transition hover:text-orange-400">
                <i class="fa-solid fa-user-slash mr-2"></i>
                Black List
            </a>

        <p class="font-semibold text-gray-600 text-lg tracking-wider uppercase">Orders</p>
            <a href="#" class="capitalize duration-500 ease-in-out font-medium mb-3 text-[15px] transition hover:text-orange-400">
                <i class="fa-solid fa-truck-fast mr-2"></i>
                Toàn bộ đơn hàng
            </a>
            <a href="./index-1.html" class="capitalize duration-500 ease-in-out font-medium mb-3 text-[15px] transition hover:text-teal-600">
                <i class="fa-regular fa-truck mr-2"></i>
                Đơn hàng hoàn thành
            </a>
        <a href="{{ route("banner.index") }}"><p class="font-semibold text-gray-600 text-lg tracking-wider uppercase">Banner</p></a>
        <a href="{{ route("contact.index") }}"><p class="font-semibold text-gray-600 text-lg tracking-wider uppercase">Contact</p></a>
        <a href="{{ route("menu.index") }}"><p class="font-semibold text-gray-600 text-lg tracking-wider uppercase">Menu</p></a>
        <a href="{{ route("order.index") }}"><p class="font-semibold text-gray-600 text-lg tracking-wider uppercase">Order</p></a>
        <a href="{{ route("post.index") }}"><p class="font-semibold text-gray-600 text-lg tracking-wider uppercase">post</p></a>
        <a href="{{ route("topic.index") }}"><p class="font-semibold text-gray-600 text-lg tracking-wider uppercase">topic</p></a>

    </div>
