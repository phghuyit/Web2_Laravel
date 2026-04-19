<div class="py-10 text-white bg-[#37475a]">
    <div class="mx-6 mb-8 border-b border-gray-500">
        <h2 class="uppercase font-bold text-2xl md:text-3xl pb-2 inline-block border-b-4 border-orange-400 -mb-[1px]">
            Tin tức và khuyến mãi mới nhất
        </h2>
    </div>
    <div class="gap-10 grid grid-cols-1 mx-6 xl:grid-cols-12 items-start">
        <x-ui.main-post-card :post="$posts->first()"/>

        <div class="col-span-6">
            @foreach ($posts->skip(1) as $post)
                <x-ui.post-card :post="$post" />
            @endforeach
        </div>
        <div class="col-span-3 xl:block">
            <iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2Fpham.huy.658514%2F&tabs=timeline&width=340&height=209&small_header=false&adapt_container_width=true&hide_cover=true&show_facepile=false&appId" width="340" height="209" class="border-none overflow-hidden" scrolling="no" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>
        </div>
    </div>
</div>

