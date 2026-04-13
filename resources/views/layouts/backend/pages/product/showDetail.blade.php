<x-backend.layout>

    <x-slot:title>Chi tiết sản phẩm</x-slot:title>

    <div class="p-3 xl:p-6">
        <div class="flex flex-col gap-2 mb-6">
            <div class="flex gap-2 items-center text-gray-500 text-sm">
                <a href="{{ route('product.index') }}" class="transition hover:text-orange-500">
                    <i class="fa-arrow-left fa-solid"></i>
                </a>
                <span>Products</span>
                <span>/</span>
                <span>Product Details</span>
            </div>
            <h1 class="capitalize font-bold text-2xl text-gray-800">Thông tin chi tiết sách</h1>
        </div>

        <div
            class="mx-auto grid w-full grid-cols-1 gap-6 text-[#0f1111] xl:grid-cols-[minmax(0,300px)_minmax(0,1fr)_360px]">
            <!-- Column 1: Image -->
            <div class="rounded-2xl border border-[#d3d3d3] bg-white p-4 shadow-sm h-fit">
                <div class="flex justify-center rounded-xl bg-[#f7f7f7] p-4">
                    <img src="{{ $product->image }}" alt="{{ $product->name }}" class="max-h-95 w-auto object-contain">
                </div>
            </div>

            <!-- Column 2: Details -->
            <div class="space-y-4 rounded-2xl border border-[#d3d3d3] bg-white p-5 shadow-sm h-fit">
                <div class="space-y-2">
                    <p class="text-2xl font-bold capitalize leading-tight">
                        {{ $product->name }}
                        <span class="ml-2 text-xs font-normal text-[#616b69]">ID: {{ $product->id }}</span>
                        <span class="ml-2 text-xs font-normal text-[#616b69]">Slug: {{ $product->slug }}</span>
                    </p>
                    <p class="text-sm text-[#565959]">
                        Tác giả: <span
                            class="font-medium text-[#3671a7]">{{ $product->brand?->name ?? 'Chưa xác định' }}</span>
                    </p>
                    <div class="flex flex-wrap gap-2 text-sm">
                        <span
                            class="rounded-full bg-[#f3f4f6] px-3 py-1 text-[#374151]">{{ $product->category?->name ?? 'Chưa có thể loại' }}</span>
                        <span class="rounded-full bg-[#fff4e5] px-3 py-1 text-[#b45309]">Tồn kho: {{ $product->qty }}
                            cuốn</span>
                    </div>
                </div>

                <div class="border-t border-[#d3d3d3] pt-4 leading-7 text-[#222]">
                    <p class="font-semibold mb-2">Chi tiết (Detail):</p>
                    {{ $product->detail ?? 'Không có chi tiết' }}
                </div>

                <div class="border-t border-[#d3d3d3] pt-4 leading-7 text-[#222]">
                    <p class="font-semibold mb-2">Mô tả (Description):</p>
                    {{ $product->description ?? 'Không có mô tả' }}
                </div>

                <div class="border-t border-[#d3d3d3] pt-4 leading-7 text-[#222]">
                    <p class="font-semibold mb-2">Lịch sử thao tác (Audit Trail / Log):</p>
                    {{ $product->description ?? 'Không có mô tả' }}
                </div>
            </div>

            <!-- Column 3: Pricing, Status & Admin Actions -->
            <div class="space-y-4 xl:sticky xl:top-6 xl:self-start">
                <div class="rounded-2xl border border-[#d3d3d3] bg-white p-6 shadow-sm">
                    <p class="text-gray-500 font-semibold mb-2 text-sm uppercase">Thông tin giá & Trạng thái</p>
                    <p class="mt-2 text-sm text-[#565959]">Giá gốc: <span
                            class="text-3xl font-semibold text-[#111827]">{{ number_format($product->price_buy) }}
                            đ</span></p>
                    <p class="mt-2 text-sm text-[#565959]">Giá khuyến mãi: <span
                            class="text-3xl font-semibold text-[#111827]">{{ number_format($product->price_sale) }}
                            đ</span></p>

                    <div class="mt-4 border-t border-[#d3d3d3] pt-4 flex justify-between items-center">
                        <span class="text-sm font-semibold">Trạng thái sản phẩm:</span>
                        <span
                            class="px-3 py-1 text-sm font-semibold rounded-full {{ $product->status == 1 ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                            {{ $product->status == 1 ? 'Hiển thị' : 'Đang ẩn' }}
                        </span>
                    </div>
                    <div class="mt-4 border-t border-[#d3d3d3] pt-4 flex justify-between items-center">
                        <span class="text-sm font-semibold">Trạng thái khuyến mãi:</span>
                        <span
                            class="px-3 py-1 text-sm font-semibold rounded-full {{ $product->is_sale == 1 ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                            {{ $product->is_sale == 1 ? 'Hiển thị' : 'Đang ẩn' }}
                        </span>
                    </div>

                    <div class="mt-6 flex flex-col gap-2">
                        <a href="{{ route('admin.product.edit', $product->id) }}"
                            class="block w-full text-center bg-orange-400 font-semibold px-6 py-3 rounded-xl text-white transition hover:bg-orange-500"><i
                                class="fa-pen fa-solid mr-2"></i> Chỉnh sửa</a>
                        <a href="{{ route('product.index') }}"
                            class="block w-full text-center bg-white border border-gray-200 font-semibold px-6 py-3 rounded-xl text-gray-600 transition hover:bg-gray-50">Quay
                            lại danh sách</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-backend.layout>
