<footer class="bg-[#232f3e] text-gray-300">

    <!-- Top Links -->
    <div class="gap-8 grid grid-cols-1 max-w-7xl mx-auto px-6 py-12 text-sm md:grid-cols-4">

        @foreach ($footer->where('parent_id', 0) as $parentMenu)
            <div>
                <h3 class="font-semibold mb-4 text-white">{{ $parentMenu->name }}</h3>
                @if ($footer->where('parent_id', $parentMenu->id)->isNotEmpty())
                    <ul class="space-y-2">
                        @foreach ($footer->where('parent_id', $parentMenu->id) as $childMenu)
                            <li>
                                <a href="{{ $childMenu->link && $childMenu->link != '#' ? route($childMenu->link) : '#' }}"
                                        class="hover:underline">{{ $childMenu->name }}</a>
                                @if ($footer->where('parent_id', $childMenu->id)->isNotEmpty())
                                    <ul class="pl-4 mt-1 space-y-1">
                                        @foreach ($footer->where('parent_id', $childMenu->id) as $grandChildMenu)
                                            <li><a href="{{ $grandChildMenu->link && $grandChildMenu->link != '#' ? route($grandChildMenu->link) : '#' }}"
                                                    class="hover:underline text-gray-400 text-xs">{{ $grandChildMenu->name }}</a></li>
                                        @endforeach
                                    </ul>
                                @endif
                            </li>
                        @endforeach
                    </ul>
                @endif
            </div>
        @endforeach

    </div>

    <!-- Bottom -->
    <div class="border-gray-600 border-t">
        <div class="flex flex-col items-center justify-between max-w-7xl mx-auto px-6 py-6 text-sm md:flex-row">

            <div class="font-bold mb-4 text-white text-xl md:mb-0">
                amazin<span class="text-orange-400">ebook</span>
            </div>

            <div class="text-center text-gray-400 md:text-right">
                © 2026 Bản sao Amazin Ebook. Bảo lưu mọi quyền.
            </div>

        </div>
    </div>

</footer>
