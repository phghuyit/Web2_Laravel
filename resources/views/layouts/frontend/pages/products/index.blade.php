<x-frontend.layout>
<x-slot:title>
    Sản Phẩm
</x-slot:title>
<x-slot:header>
    <script src="{{asset('js/jquery-4.0.0.min.js')}}"></script>
</x-slot:header>
    <div class="flex">
        <div class="flex-4">
            <p class="capitalize font-bold m-6 text-3xl">Tất cả sản phẩm</p>
            <div class="mt-6 mx-auto text-[#0f1111] w-[80%]">
                <div class="gap-3 grid grid-cols-2 my-12 xl:grid-cols-4">
                    @foreach ($products as $product)
                        <x-ui.productcard :product="$product"></x-ui.productcard>
                    @endforeach
                </div>
                <div class="mt-4 ">
                    {{ $products->links() }}
                </div>
            </div>
        </div>
        <aside class="flex-[0.5] p-4">
            <div class="sticky top-6 rounded-xl border border-orange-100 bg-white p-5 shadow-[0_18px_45px_rgba(15,17,17,0.08)]">
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
                        <p class="mb-3 font-bold capitalize">Thể Loại Sách</p>
                        <ul class="space-y-2">
                            <li>
                                <label class="flex cursor-pointer items-center gap-3 rounded-2xl px-3 py-2 transition hover:bg-orange-50">
                                    <input type="radio" name="categoru_id" value="1" class="accent-orange-400">
                                    <span>Van hoc</span>
                                </label>
                            </li>
                            <li>
                                <label class="flex cursor-pointer items-center gap-3 rounded-2xl px-3 py-2 transition hover:bg-orange-50">
                                    <input type="radio" name="categoru_id" value="2" class="accent-orange-400">
                                    <span>Fantasy</span>
                                </label>
                            </li>
                            <li>
                                <label class="flex cursor-pointer items-center gap-3 rounded-2xl px-3 py-2 transition hover:bg-orange-50">
                                    <input type="radio" name="categoru_id" value="6" class="accent-orange-400">
                                    <span>Tam ly hoc</span>
                                </label>
                            </li>
                        </ul>
                    </div>

                    <div class="border-t border-gray-100 pt-5">
                        <p class="mb-3 font-bold capitalize">Khoảng Giá</p>
                        <ul class="space-y-2">
                            <li>
                                <label class="flex cursor-pointer items-center gap-3 rounded-2xl px-3 py-2 transition hover:bg-orange-50">
                                    <input type="checkbox" name="price_range" data-min=0 data-max=200 class="rounded accent-orange-400">
                                    <span>0-200k</span>
                                </label>
                            </li>
                            <li>
                                <label class="flex cursor-pointer items-center gap-3 rounded-2xl px-3 py-2 transition hover:bg-orange-50">
                                    <input type="checkbox" name="price_range" data-min=200 data-max=1000 class="rounded accent-orange-400">
                                    <span>200k-1tr</span>
                                </label>
                            </li>
                            <li>
                                <label class="flex cursor-pointer items-center gap-3 rounded-2xl px-3 py-2 transition hover:bg-orange-50">
                                    <input type="checkbox" name="price_range" data-min=1000 class="rounded accent-orange-400">
                                    <span>1tr+</span>
                                </label>
                            </li>
                        </ul>
                    </div>

                    <div class="border-t border-gray-100 pt-5">
                        <p class="mb-3 font-bold capitalize">Tác giả</p>
                        <ul class="space-y-2">
                            <li>
                                <label class="flex cursor-pointer items-center gap-3 rounded-2xl px-3 py-2 transition hover:bg-orange-50">
                                    <input type="checkbox" name="brand_id" value="1" class="rounded accent-orange-400">
                                    <span>J.K. Rowling</span>
                                </label>
                            </li>
                            <li>
                                <label class="flex cursor-pointer items-center gap-3 rounded-2xl px-3 py-2 transition hover:bg-orange-50">
                                    <input type="checkbox" name="brand_id" value="2" class="rounded accent-orange-400">
                                    <span>George Orwell</span>
                                </label>
                            </li>
                            <li>
                                <label class="flex cursor-pointer items-center gap-3 rounded-2xl px-3 py-2 transition hover:bg-orange-50">
                                    <input type="checkbox" name="brand_id" value="3" class="rounded accent-orange-400">
                                    <span>J.R.R. Tolkien</span>
                                </label>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </aside>
    </div>
    <x-slot:footer>
        <script>
            function handle_filter(){

            }
        </script>
    </x-slot:footer>
</x-frontend.layout>
