<x-backend.layout>
    <x-slot:title>Create Product</x-slot:title>

    <div class="p-3 xl:p-6">
        <div class="mb-6 flex flex-col gap-2">
            <div class="flex items-center gap-2 text-sm text-gray-500">
                <a href="{{ route('product.index') }}" class="transition hover:text-orange-500">
                    <i class="fa-solid fa-arrow-left"></i>
                </a>
                <span>Products</span>
                <span>/</span>
                <span>Create Product</span>
            </div>
            <h1 class="text-2xl font-bold text-gray-800 capitalize">Thêm sản phẩm mới</h1>
        </div>

        <form
            method="POST"
            action="{{ route('product.store') }}"
            enctype="multipart/form-data"
            class="rounded-3xl bg-white p-5 shadow-sm ring-1 ring-gray-100 xl:p-7"
        >
            @csrf

            <div class="grid gap-6 xl:grid-cols-[280px_minmax(0,1fr)]">
                <div class="space-y-5">
                    <div class="overflow-hidden rounded-2xl border border-gray-200 bg-gray-50 p-4">
                        <div class="flex aspect-[3/4] items-center justify-center rounded-xl border border-dashed border-gray-300 bg-white text-center text-gray-400">
                            <div>
                                <i class="fa-solid fa-book-open text-5xl"></i>
                                <p class="mt-3 text-sm font-medium">Preview image</p>
                            </div>
                        </div>
                    </div>

                    <div>
                        <label for="image" class="mb-2 block text-sm font-semibold text-gray-700">Upload Ảnh Bìa</label>
                        <input
                            id="image"
                            name="image"
                            type="file"
                            class="block w-full rounded-xl border border-gray-300 bg-white px-3 py-2 text-sm text-gray-600 file:mr-4 file:rounded-lg file:border-0 file:bg-orange-100 file:px-4 file:py-2 file:font-medium file:text-orange-600 hover:file:bg-orange-200"
                        >
                    </div>
                </div>

                <div class="space-y-5">
                    <div>
                        <label for="name" class="mb-2 block text-sm font-semibold text-gray-700">
                            Product Name <span class="text-red-500">*</span>
                        </label>
                        <input
                            id="name"
                            name="name"
                            type="text"
                            value="{{ old('name') }}"
                            class="w-full rounded-xl border border-gray-200 px-4 py-3 text-gray-700 outline-none transition focus:border-orange-400 focus:ring-2 focus:ring-orange-100"
                            placeholder="Enter product name"
                        >
                    </div>

                    <div>
                        <label for="brand_id" class="mb-2 block text-sm font-semibold text-gray-700">Tác giả</label>
                        <select
                            id="brand_id"
                            name="brand_id"
                            class="w-full rounded-xl border border-gray-200 bg-white px-4 py-3 text-gray-700 outline-none transition focus:border-orange-400 focus:ring-2 focus:ring-orange-100"
                        >
                            <option value="">Chọn tác giả</option>
                            @if (!empty($brands) && count($brands))
                                @foreach ($brands as $brand)
                                    <option
                                        value="{{ $brand->id }}"
                                        {{ (string) old('brand_id') === (string) $brand->id ? 'selected' : '' }}
                                    >
                                        {{ $brand->name }}
                                    </option>
                                @endforeach
                            @endif
                        </select>
                    </div>

                    <div class="grid gap-5 md:grid-cols-2">
                        <div>
                            <label for="price_buy" class="mb-2 block text-sm font-semibold text-gray-700">Giá</label>
                            <input
                                id="price_buy"
                                name="price_buy"
                                type="text"
                                value="{{ old('price_buy') }}"
                                class="w-full rounded-xl border border-gray-200 px-4 py-3 text-gray-700 outline-none transition focus:border-orange-400 focus:ring-2 focus:ring-orange-100"
                                placeholder="0.00"
                            >
                        </div>

                        <div>
                            <label for="qty" class="mb-2 block text-sm font-semibold text-gray-700">Số lượng kho</label>
                            <input
                                id="qty"
                                name="qty"
                                type="number"
                                value="{{ old('qty') }}"
                                class="w-full rounded-xl border border-gray-200 px-4 py-3 text-gray-700 outline-none transition focus:border-orange-400 focus:ring-2 focus:ring-orange-100"
                                placeholder="0"
                            >
                        </div>
                    </div>

                    <div class="grid gap-5 md:grid-cols-2">
                        <div>
                            <label for="category_id" class="mb-2 block text-sm font-semibold text-gray-700">Thể Loại</label>
                            <select
                                id="category_id"
                                name="category_id"
                                class="w-full rounded-xl border border-gray-200 bg-white px-4 py-3 text-gray-700 outline-none transition focus:border-orange-400 focus:ring-2 focus:ring-orange-100"
                            >
                                <option value="">Chọn thể loại</option>
                                @if (!empty($cats) && count($cats))
                                    @foreach ($cats as $cat)
                                        <option
                                            value="{{ $cat->id }}"
                                            {{ (string) old('category_id') === (string) $cat->id ? 'selected' : '' }}
                                        >
                                            {{ $cat->name }}
                                        </option>
                                    @endforeach
                                @endif
                            </select>
                        </div>

                        <div>
                            <label class="mb-2 block text-sm font-semibold text-gray-700">Status</label>
                            <label class="mt-3 inline-flex cursor-pointer items-center gap-3">
                                <span class="relative inline-flex h-7 w-14 items-center rounded-full bg-emerald-500">
                                    <input type="hidden" name="status" value="0">
                                    <input
                                        type="checkbox"
                                        name="status"
                                        value="1"
                                        class="peer sr-only"
                                        {{ old('status', 1) ? 'checked' : '' }}
                                    >
                                    <span class="absolute left-1 h-5 w-5 rounded-full bg-white transition peer-checked:translate-x-7"></span>
                                </span>
                                <span class="font-medium text-gray-700">Active</span>
                            </label>
                        </div>
                    </div>

                    <div>
                        <label for="description" class="mb-2 block text-sm font-semibold text-gray-700">Description</label>
                        <textarea
                            id="description"
                            name="description"
                            rows="6"
                            class="w-full rounded-2xl border border-gray-200 px-4 py-3 text-gray-700 outline-none transition focus:border-orange-400 focus:ring-2 focus:ring-orange-100"
                            placeholder="Write a short product description"
                        >{{ old('description') }}</textarea>
                    </div>
                </div>
            </div>

            <div class="mt-8 flex flex-wrap items-center gap-3 border-t border-gray-100 pt-6">
                <button
                    type="submit"
                    class="rounded-xl bg-orange-400 px-6 py-3 font-semibold text-white transition hover:bg-orange-500"
                >
                    Tạo sản phẩm
                </button>
                <a
                    href="{{ route('product.index') }}"
                    class="rounded-xl border border-gray-200 bg-white px-6 py-3 font-semibold text-gray-600 transition hover:bg-gray-50"
                >
                    Hủy bỏ
                </a>
            </div>
        </form>
    </div>
</x-backend.layout>
