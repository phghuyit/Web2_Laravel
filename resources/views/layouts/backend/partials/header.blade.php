<header class="text-white">
    <div class="bg-[#131921] flex items-center justify-between p-4 gap-4">
        <div class="text-3xl font-bold tracking-wide">
            <a href="{{ route('site.home') }}">amaz<span class="text-orange-400">in</span></a>
        </div>
        <div class="hidden md:flex items-center gap-6 text-sm">
                <div class="hover:underline cursor-pointer">
                    <a href="{{ route('site.user.login') }}">
                        <i class="fa-solid fa-bell text-orange-500 text-xl"></i>
                    </a>
                </div>

                <div class="hover:underline cursor-pointer">
                    <i class="fa-solid fa-user text-orange-500 text-xl"></i>
                </div>
            </div>
    </div>


</header>
