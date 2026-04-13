<aside class="flex-[0.5] p-4">
    <div class="sticky top-13 rounded-xl border border-orange-100 bg-white p-5 shadow">
        <div class="mb-6 flex items-center justify-between border-b border-orange-100 pb-4">
            <div>
                <p class="text-xs font-semibold uppercase text-orange-400">Bộ Lọc</p>
                <p class="mt-1 text-xl font-bold capitalize text-[#0f1111]">Sắp Xếp</p>
            </div>
            <span class="flex h-11 w-11 items-center justify-center rounded-2xl bg-orange-100 text-orange-500">
                <i class="fa-filter fa-solid"></i>
            </span>
        </div>

        <div class="space-y-6 text-sm text-[#0f1111]">
            <div>
                <p class="mb-3 font-bold capitalize cursor-pointer select-none"
                    onclick="document.getElementById('category-list').classList.toggle('hidden')">Thể Loại Sách</p>
                <ul id="category-list" class="space-y-2 hidden" onchange="handle_filter()">
                    @foreach ($cate as $item)
                        <li>
                            <label
                                class="flex cursor-pointer items-center gap-3 rounded-2xl px-3 py-2 transition hover:bg-orange-50">
                                <input type="checkbox" name="category_id[]" value="{{ $item->id }}"
                                    class="accent-orange-400">
                                <span>{{ $item->name }}</span>
                            </label>
                        </li>
                    @endforeach
                </ul>
            </div>

            <div class="border-t border-gray-100 pt-5">
                <p class="mb-3 font-bold capitalize select-none cursor-pointer"
                    onClick="document.getElementById('price-list').classList.toggle('hidden')">Khoảng Giá</p>
                <ul class="space-y-2 hidden" id="price-list" onchange="handle_filter()">
                    <li>
                        <label
                            class="flex cursor-pointer items-center gap-3 rounded-2xl px-3 py-2 transition hover:bg-orange-50">
                            <input type="radio" name="price_range" data-min=0 data-max=200000
                                class="rounded accent-orange-400">
                            <span>0-200k</span>
                        </label>
                    </li>
                    <li>
                        <label
                            class="flex cursor-pointer items-center gap-3 rounded-2xl px-3 py-2 transition hover:bg-orange-50">
                            <input type="radio" name="price_range" data-min=200000 data-max=1000000
                                class="rounded accent-orange-400">
                            <span>200k-1tr</span>
                        </label>
                    </li>
                    <li>
                        <label
                            class="flex cursor-pointer items-center gap-3 rounded-2xl px-3 py-2 transition hover:bg-orange-50">
                            <input type="radio" name="price_range" data-min=1000 class="rounded accent-orange-400">
                            <span>1tr+</span>
                        </label>
                    </li>
                </ul>
            </div>

            <div class="border-t border-gray-100 pt-5">
                <p class="mb-3 font-bold capitalize select-none cursor-pointer"
                    onclick="document.getElementById('author-list').classList.toggle('hidden')">Tác giả</p>
                <ul class="space-y-2 hidden" id="author-list" onchange="handle_filter()">
                    @foreach ($brand as $item)
                        <li>
                            <label
                                class="flex cursor-pointer items-center gap-3 rounded-2xl px-3 py-2 transition hover:bg-orange-50">
                                <input type="radio" name="brand_id" value="{{ $item->id }}"
                                    class="accent-orange-400">
                                <span>{{ $item->name }}</span>
                            </label>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</aside>
