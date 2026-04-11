<header class="text-white">
    <div class="bg-[#131921] flex gap-4 items-center justify-between p-4">
        <div class="font-bold text-3xl tracking-wide">
            <a href="{{ route('admin.dashboard') }}">amaz<span class="text-orange-400">in</span></a>
        </div>
        <div class="gap-6 hidden items-center text-sm md:flex">
                <div class="cursor-pointer hover:underline">
                    <a href="{{ route('site.user.login') }}">
                        <i class="fa-bell fa-solid text-orange-500 text-xl"></i>
                    </a>
                </div>

                <div class="cursor-pointer hover:underline">
                    <i class="fa-solid fa-user text-orange-500 text-xl"></i>
                </div>
            </div>
    </div>


</header>
