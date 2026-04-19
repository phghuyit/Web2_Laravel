<article
    class="hidden xl:block col-span-3 flex flex-col overflow-hidden rounded-lg shadow-sm h-full transition-transform hover:-translate-y-1 duration-300 transition-color hover:ring-gray-500 hover:ring-1">
    <div class="h-1/2 bg-gray-200 shrink-0">
        <img src="{{ $post->image }}" alt="{{ $post->title }}" class="w-full h-full object-cover">
    </div>

    <div class="p-3 flex flex-col flex-grow text-white">
        <h3 class="font-bold text-base mb-1 line-clamp-2">{{ $post->title }}</h3>
        <p class=" line-clamp-4 text-gray-300">{{ $post->description }}</p>
    </div>
</article>
