<x-frontend.layout>
    <x-slot:title>
        {{ $product->name }}
    </x-slot:title>
    <div
        class="mx-auto mt-6 grid w-[95%] grid-cols-1 gap-6 text-[#0f1111] xl:grid-cols-[minmax(0,300px)_minmax(0,1fr)_360px]">
        <div class="rounded-2xl border border-[#d3d3d3] bg-white p-4 shadow-sm">
            <div class="flex justify-center rounded-xl bg-[#f7f7f7] p-4">
                <img src="{{ $product->image }}" alt="{{ $product->name }}" class="max-h-95 w-auto object-contain">
            </div>

            <div class="mt-4 space-y-3">
                <x-ui.btn content="Đọc thử" bgcolor="border border-[#888c8c] w-full" />
                <x-ui.btn content="Nghe Audio Thử"
                    bgcolor="border border-[#888c8c] w-full focus:outline-none hover:ring-2 hover:ring-orange-200 hover:bg-orange-50 transition duration-300" />
            </div>
        </div>

        <div class="space-y-4 rounded-2xl border border-[#d3d3d3] bg-white p-5 shadow-sm flex flex-col">
            <div class="space-y-2">
                <p class="text-2xl font-bold capitalize leading-tight">
                    {{ $product->name }}
                    <span class="ml-2 text-xs font-normal text-[#616b69]">09/04/2016</span>
                </p>
                <p class="text-sm text-[#565959]">
                    <span class="capitalize">tác giả:</span>
                    <a href=""
                        class="font-medium text-[#3671a7] hover:text-black hover:underline">{{ $product->brand?->name ?? 'Chưa xác định tác giả' }}</a>
                </p>
                <div class="flex flex-wrap gap-2 text-sm">
                    <span
                        class="rounded-full bg-[#f3f4f6] px-3 py-1 text-[#374151]">{{ $product->category?->name ?? 'Chưa xác định thể loại' }}</span>
                    <span class="rounded-full bg-[#fff4e5] px-3 py-1 text-[#b45309]">Còn {{ $product->qty }} cuốn</span>
                </div>
            </div>

            <div class="border-t border-[#d3d3d3] pt-4 leading-7 text-[#222] flex-1">
                <details class="group">
                    <summary
                        class=" w-fit cursor-pointer items-center text-sm font-medium text-blue-500 transition-colors hover:text-orange-500 list-none">
                        <div class="mt-3 text-base text-[#333] line-clamp-3 group-open:line-clamp-none">
                            {{$product->detail}}
                        </div>
                        <span class="group-open:hidden">Xem thêm</span>
                        <span class="hidden group-open:inline">Thu gọn</span>
                        <i class="fa-solid fa-angle-down transition-transform duration-300 group-open:rotate-180 text-xs"></i>
                    </summary>
                </details>
            </div>

            <div class="border-t border-[#d3d3d3] pt-6">
                <div class="grid grid-cols-2 gap-3 md:grid-cols-4">
                    <x-ui.detail-card />
                    <x-ui.detail-card />
                    <x-ui.detail-card />
                    <x-ui.detail-card />
                </div>
            </div>
        </div>

        <div class="space-y-4 xl:sticky xl:top-6 xl:self-start">
            <div class="rounded-2xl border border-[#d3d3d3] bg-white p-6 shadow-sm">
                <p class="text-3xl font-semibold text-[#111827]">
                    <span
                        class="mr-2 hidden font-light text-red-500 lg:inline lg:text-5xl">-53%</span>{{ number_format($product->price_sale ?? $product->price_buy) }}
                    vnd
                </p>
                <p class="mt-2 text-sm text-[#565959]">Giá bìa cứng: <span
                        class="line-through">{{ number_format($product->price_buy) }} vnd</span></p>
                <div class="mt-4">
                    <div class="bg-orange-400 hover:bg-orange-500 rounded-lg p-3 text-center my-3 whitespace-nowrap">
                        <a href="#">
                            <p class="truncate">Mua ngay</p>
                        </a>
                    </div>
                    <p class="mt text-sm text-[#565959] text-center ">hoặc</p>
                    <div class="bg-orange-400 hover:bg-orange-500 rounded-lg p-3 text-center my-3 whitespace-nowrap">
                        <a href="#">
                            <p class="truncate">Thêm vào giỏ hàng</p>
                        </a>
                    </div>
                </div>
                <p class="mt-4 text-sm text-[#565959]">Bằng việc đặt hàng, bạn đã đồng ý với <a href="#"
                        class="font-medium text-blue-500 hover:text-orange-500 hover:underline">Điều khoản dịch vụ và
                        chính sách bảo mật</a> của chúng tôi.</p>
                <p class="mt-1 text-xs text-gray-500">Đại diện thương mại bởi Amazin.com Services LLC.</p>
                <div class="mt-3 flex items-center">
                    <input type="checkbox" id="add-audiobook"
                        class="h-4 w-4 cursor-pointer rounded border-gray-300 text-orange-500 focus:ring-orange-500">
                    <label for="add-audiobook" class="ml-2 cursor-pointer text-sm text-[#0f1111]">Thêm <a href="#"
                            class="font-medium text-blue-500 hover:text-orange-500 hover:underline">Sách Nói</a> chỉ với
                        <span class="ml-1 text-xs text-gray-500 line-through">120.000đ</span>
                        <span class="font-semibold text-red-500">99.000đ</span> </label>
                </div>
            </div>

            <div class="rounded-2xl border border-[#d3d3d3] bg-white p-6 shadow-sm">
                <p class="text-lg font-semibold">Mua sách làm quà tặng</p>
                <p class="mt-1 text-sm text-[#565959]">Dành tặng cho cá nhân hoặc đặt mua số lượng lớn cho nhóm, doanh
                    nghiệp.</p>
                <a href="#"
                    class="mt-2 inline-block text-sm font-medium text-blue-500 hover:text-orange-500 hover:underline">Xem
                    thêm chi tiết <i class="fa-solid fa-angle-down ml-1"></i></a>
            </div>
        </div>

        <div
            class="rounded-2xl border-t border-[#d3d3d3] pt-6 xl:col-span-2 xl:border xl:border-[#d3d3d3] xl:bg-white xl:p-5 xl:shadow-sm">
            <p class="mt-3 text-xl font-bold">Nhung the loai lien quan ma ban co the thay thu vi</p>
            <div class="mt-4 grid gap-3 sm:grid-cols-2 lg:grid-cols-3">
                <div class="rounded-xl border border-[#e5e7eb] bg-[#fafafa] p-4 text-sm text-[#565959]">
                    {{-- @fragment("related-prod")
                        @foreach ($relatedProd as $product)
                            <x-ui.productcard :product="$product"></x-ui.productcard>
                        @endforeach
                    @endfragment --}}
                </div>
            </div>
        </div>
    </div>
    </div>
    <x-slot:footer>
        <script></script>
    </x-slot:footer>
</x-frontend.layout>
