<x-backend.layout>
    <x-slot:title>Edit Product</x-slot:title>

    <div class="p-3 xl:p-6">
        <div class="mb-6 flex flex-col gap-2">
            <div class="flex items-center gap-2 text-sm text-gray-500">
                <a href="{{ route('product.index') }}" class="transition hover:text-orange-500">
                    <i class="fa-solid fa-arrow-left"></i>
                </a>
                <span>Products</span>
                <span>/</span>
                <span>Edit Product</span>
            </div>
            <h1 class="text-2xl font-bold text-gray-800 capitalize">Chỉnh sửa thông tin sách</h1>
        </div>

        <form
            method="POST"
            action="{{ isset($product) ? route('product.update', $product->id) : '#' }}"
            enctype="multipart/form-data"
            class="rounded-3xl bg-white p-5 shadow-sm ring-1 ring-gray-100 xl:p-7"
        >
            @csrf
            @if (isset($product))
                @method('PUT')
            @endif

            <div class="grid gap-6 xl:grid-cols-[280px_minmax(0,1fr)]">
                <div class="space-y-5">
                    <div class="overflow-hidden rounded-2xl border border-gray-200 bg-gray-50 p-4">
                        <div class="flex aspect-[3/4] items-center justify-center rounded-xl bg-white">
                            @if (!empty($product?->image))
                                <img
                                    src="{{ asset('storage/' . $product->image) }}"
                                    alt="{{ $product->name ?? 'Product image' }}"
                                    class="h-full w-full rounded-xl object-cover"
                                >
                            @else
                                <div class="flex h-full w-full flex-col items-center justify-center rounded-xl border border-dashed border-gray-300 text-center text-gray-400">
                                    <i class="fa-solid fa-book-open text-5xl"></i>
                                    <p class="mt-3 text-sm font-medium">Preview image</p>
                                </div>
                            @endif
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
                            value="{{ old('name', $product->name ?? 'Atomic Habits') }}"
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
                                @if (!empty($brands) && count($brands))
                                    @foreach ($brands as $brand)
                                        <option
                                            value="{{ $brand->id }}"
                                            {{ (string) old('brand_id', $product->brand_id ?? '') === (string) $brand->id ? 'selected' : '' }}
                                        >
                                            {{ $brand->name }}
                                        </option>
                                    @endforeach
                                @else
                                    <option value="">Paperback</option>
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
                                value="{{ old('price_buy', $product->price_buy ?? '18.50') }}"
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
                                value="{{ old('qty', $product->qty ?? '120') }}"
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
                                @if (!empty($cats) && count($cats))
                                    @foreach ($cats as $cat)
                                        <option
                                            value="{{ $cat->id }}"
                                            {{ (string) old('category_id', $product->category_id ?? '') === (string) $cat->id ? 'selected' : '' }}
                                        >
                                            {{ $cat->name }}
                                        </option>
                                    @endforeach
                                @else
                                    <option value="">Self-Help</option>
                                @endif
                            </select>
                        </div>

                        <div>
                            <label class="mb-2 block text-sm font-semibold text-gray-700">Status</label>
                            {{-- <label class="mt-3 inline-flex cursor-pointer items-center gap-3">
                                <span class="relative inline-flex h-7 w-14 items-center rounded-full bg-emerald-500">
                                    <input type="hidden" name="status" value="0">
                                    <input
                                        type="checkbox"
                                        name="status"
                                        value="1"
                                        class="peer sr-only"
                                        {{ old('status', $product->status ?? 1) ? 'checked' : '' }}
                                    >
                                    <span class="absolute left-1 h-5 w-5 rounded-full bg-white transition peer-checked:translate-x-7"></span>
                                </span>
                                <span class="font-medium text-gray-700">Active</span>
                            </label> --}}
                        </div>
                    </div>

                    <div>
                        <label for="description" class="mb-2 block text-sm font-semibold text-gray-700">Description</label>
                        <textarea
                            id="description"
                            name="description"
                            rows="6"
                            class="w-full rounded-2xl border border-gray-200 px-4 py-3 text-gray-700 outline-none transition focus:border-orange-400 "
                            placeholder="Write a short product description"
                        >{{ old('description', $product->description ?? 'A proven framework for building better habits. This hands-on book reveals practical strategies for forming good habits, breaking bad ones, and mastering the tiny behaviors that lead to remarkable results over time.') }}</textarea>
                    </div>
                </div>
            </div>

            <div class="mt-8 flex flex-wrap items-center gap-3 border-t border-gray-100 pt-6">
                <button
                    type="submit"
                    class="rounded-xl bg-orange-400 px-6 py-3 font-semibold text-white transition hover:bg-orange-500"
                >
                    Lưu thay đổi
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
