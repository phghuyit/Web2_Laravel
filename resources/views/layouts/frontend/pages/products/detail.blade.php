<x-frontend.layout>
<x-slot:title>
    {{ $product->name }}
</x-slot:title>
    <div class="mx-auto mt-6 grid w-[95%] grid-cols-1 gap-6 text-[#0f1111] xl:grid-cols-[minmax(0,300px)_minmax(0,1fr)_360px]">
        <div class="rounded-2xl border border-[#d3d3d3] bg-white p-4 shadow-sm">
            <div class="flex justify-center rounded-xl bg-[#f7f7f7] p-4">
                <img
                    src="{{ $product->image }}"
                    alt="{{ $product->name }}"
                    class="max-h-95 w-auto object-contain"
                >
            </div>

            <div class="mt-4 space-y-3">
                <x-ui.btn content="Đọc thử" bgcolor="border border-[#888c8c] w-full"/>
                <x-ui.btn content="Nghe audio thử" bgcolor="border border-[#888c8c] w-full focus:outline-none hover:ring-2 hover:ring-orange-200
                hover:bg-orange-50 transition duration-300"/>
            </div>
        </div>

        <div class="space-y-4 rounded-2xl border border-[#d3d3d3] bg-white p-5 shadow-sm">
            <div class="space-y-2">
                <p class="text-2xl font-bold capitalize leading-tight">
                    {{ $product->name }}
                    <span class="ml-2 text-xs font-normal text-[#616b69]">09/04/2016</span>
                </p>
                <p class="text-sm text-[#565959]">
                    by
                    <a href="" class="font-medium text-[#3671a7] hover:text-black hover:underline">{{ $product->brand?->name ?? 'Chưa Xác Định Tác Giả' }}</a>
                    <span>(Tác giả)</span>
                </p>
                <div class="flex flex-wrap gap-2 text-sm">
                    <span class="rounded-full bg-[#f3f4f6] px-3 py-1 text-[#374151]">{{ $product->category?->name ?? 'Chưa có thể loại' }}</span>
                    <span class="rounded-full bg-[#fff4e5] px-3 py-1 text-[#b45309]">Còn {{ $product->qty }} cuốn</span>
                </div>
            </div>

            <div class="border-t border-[#d3d3d3] pt-4 leading-7 text-[#222]">
                {{ $product->detail }}
            </div>

            <div class="border-t border-[#d3d3d3] pt-6">
                <div class="grid grid-cols-2 gap-3 md:grid-cols-4">
                    <x-ui.detail-card/>
                    <x-ui.detail-card/>
                    <x-ui.detail-card/>
                    <x-ui.detail-card/>
                </div>
            </div>
        </div>

        <div class="space-y-4 xl:sticky xl:top-6 xl:self-start">
            <div class="rounded-2xl border border-[#d3d3d3] bg-white p-6 shadow-sm">
                <p class="text-3xl font-semibold text-[#111827]">
                    <span class="mr-2 hidden font-light text-red-500 lg:inline lg:text-5xl">-53%</span>{{ number_format($product->price_sale ?? $product->price_buy) }} vnđ
                </p>
                <p class="mt-2 text-sm text-[#565959]">Giá bìa cứng: <span class="line-through">{{ number_format($product->price_buy) }} vnđ</span></p>
                <div class="mt-4">
                    <x-ui.btn content="Mua ngay"/>
                </div>
                <p class="mt-4 text-sm">Bằng việc đặt hàng,<span class="font-bold text-sm">bạn đồng ý với <a href="#" class="text-blue-400 underline hover:text-orange-400">Điều khoản dịch vụ và Chính sách quyền riêng tư của chúng tôi</a></span></p>
                <p class="mt-1 text-xs text-gray-500">Đại diện thương mại bởi Amazin.com Services LLC.</p>
                <div class="mt-3">
                    <input type="checkbox"><label for="" class="ml-2">Thêm <a href="#"><span class="text-blue-400 hover:underline hover:text-orange-500 capitalize">sách nghe</span></a> chỉ với <span class="text-red-500">99,000 vnđ</span><span class="line-through ml-1">120,000 vnđ</span></label>
                </div>
            </div>

            <div class="rounded-2xl border border-[#d3d3d3] bg-white p-6 shadow-sm">
                <p class="text-lg font-semibold">Mua sách để làm quà tặng</p>
                <p class="text-sm text-[#565959]">Mua làm quà tặng cá nhân hoặc cho một nhóm lớn</p>
                <a href="#" class="hover:text-orange-400 hover:underline"><p class="text-blue-400 hover:text-orange-400">Xem thêm tại đây <i class="fa-solid fa-angle-down"></i></p></a>
            </div>
        </div>

        <div class="xl:col-span-2 rounded-2xl border-t border-[#d3d3d3] pt-6 xl:border xl:border-[#d3d3d3] xl:bg-white xl:p-5 xl:shadow-sm">
            <p class="mt-3 text-xl font-bold">Những thể loại liên quan mà bạn có thể thấy thú vị</p>
            <div class="mt-4 grid gap-3 sm:grid-cols-2 lg:grid-cols-3">
                <div class="rounded-xl border border-[#e5e7eb] bg-[#fafafa] p-4 text-sm text-[#565959]">nhung loai sp lien quan</div>
            </div>
        </div>
    </div>
</x-frontend.layout>
