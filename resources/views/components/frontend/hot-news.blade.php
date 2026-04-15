<div class="py-10 text-white bg-[#37475a]">
    <div class="mx-6 mb-8 border-b border-gray-500">
        <h2 class="uppercase font-bold text-2xl md:text-3xl pb-2 inline-block border-b-4 border-orange-400 -mb-[1px]">
            Tin tức và khuyến mãi mới nhất
        </h2>
    </div>
    <div class="gap-10 grid grid-cols-1 mx-6 xl:grid-cols-12 items-start">
        <article
            class="hidden xl:block col-span-3 flex flex-col overflow-hidden rounded-lg shadow-sm h-full transition-transform hover:-translate-y-1 duration-300 transition-color hover:ring-gray-500 hover:ring-1">
            <div class="h-1/2 bg-gray-200 shrink-0">
                <img src="{{ $posts[0]->image }}" alt="{{ $posts[0]->title }}" class="w-full h-full object-cover">
            </div>

            <div class="p-3 flex flex-col flex-grow text-white">
                <h3 class="font-bold text-base mb-1 line-clamp-2">{{ $posts[0]->title }}</h3>
                <p class=" line-clamp-4 text-gray-300">{{ $posts[0]->description }}</p>
            </div>
        </article>

        <div class="col-span-6">
            @foreach ($posts as $post)
                <x-ui.post-card :post="$post" />
            @endforeach
        </div>
        <div class="col-span-3 xl:block">
            <iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2Fpham.huy.658514%2F&tabs=timeline&width=340&height=209&small_header=false&adapt_container_width=true&hide_cover=true&show_facepile=false&appId" width="340" height="209" class="border-none overflow-hidden" scrolling="no" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>
        </div>
    </div>
</div>
