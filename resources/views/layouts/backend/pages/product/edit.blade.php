<x-backend.layout>
    <x-slot:title>Edit Product</x-slot:title>

    <div class="p-3 xl:p-6">
        <div class="flex flex-col gap-2 mb-6">
            <div class="flex gap-2 items-center text-gray-500 text-sm">
                <a href="{{ route('product.index') }}" class="transition hover:text-orange-500">
                    <i class="fa-arrow-left fa-solid"></i>
                </a>
                <span>Products</span>
                <span>/</span>
                <span>Edit Product</span>
            </div>
            <h1 class="capitalize font-bold text-2xl text-gray-800">Chỉnh sửa thông tin sách</h1>
        </div>

        <form method="POST" action="{{ route('product.update', $product->id) }}" enctype="multipart/form-data"
            class="bg-white p-5 ring-1 ring-gray-100 rounded-3xl shadow-sm xl:p-7">
            @csrf
            @if (isset($product))
                @method('PUT')
            @endif

            <div class="gap-6 grid xl:grid-cols-[280px_minmax(0,1fr)]">
                <div class="space-y-5">
                    <div class="bg-gray-50 border border-gray-200 overflow-hidden p-4 rounded-2xl">
                        <div class="aspect-[3/4] bg-white flex items-center justify-center rounded-xl">
                            @if (!empty($product?->image))
                                <img src="{{ asset('storage/' . $product->image) }}"
                                    alt="{{ $product->name ?? 'Product image' }}"
                                    class="h-full object-cover rounded-xl w-full">
                            @else
                                <div
                                    class="border border-dashed border-gray-300 flex flex-col h-full items-center justify-center rounded-xl text-center text-gray-400 w-full">
                                    <i class="fa-book-open fa-solid text-5xl"></i>
                                    <p class="font-medium mt-3 text-sm">Preview image</p>
                                </div>
                            @endif
                        </div>
                    </div>

                    <div>
                        <label for="image" class="block font-semibold mb-2 text-gray-700 text-sm">Upload Ảnh
                            Bìa</label>
                        <input id="image" name="image" type="file"
                            class="bg-white block border border-gray-300 px-3 py-2 rounded-xl text-gray-600 text-sm w-full file:bg-orange-100 file:border-0 file:font-medium file:mr-4 file:px-4 file:py-2 file:rounded-lg file:text-orange-600 hover:file:bg-orange-200">
                    </div>
                </div>

                <div class="space-y-5">
                    <div>
                        <label for="name" class="block font-semibold mb-2 text-gray-700 text-sm">
                            Product Name <span class="text-red-500">*</span>
                        </label>
                        <input id="name" name="name" type="text"
                            value="{{ old('name', $product->name ?? 'Atomic Habits') }}"
                            class="border border-gray-200 outline-none px-4 py-3 rounded-xl text-gray-700 transition w-full focus:border-orange-400 focus:ring-2 focus:ring-orange-100"
                            placeholder="Enter product name">
                    </div>


                    <div>
                        <label for="brand_id" class="block font-semibold mb-2 text-gray-700 text-sm">Tác giả</label>
                        <select id="brand_id" name="brand_id"
                            class="bg-white border border-gray-200 outline-none px-4 py-3 rounded-xl text-gray-700 transition w-full focus:border-orange-400 focus:ring-2 focus:ring-orange-100">
                            @if (!empty($brands) && count($brands))
                                @foreach ($brands as $brand)
                                    <option value="{{ $brand->id }}"
                                        {{ (string) old('brand_id', $product->brand_id ?? '') === (string) $brand->id ? 'selected' : '' }}>
                                        {{ $brand->name }}
                                    </option>
                                @endforeach
                            @else
                                <option value="">Paperback</option>
                            @endif
                        </select>
                    </div>

                    <div class="gap-5 grid md:grid-cols-2">
                        <div>
                            <label for="price_buy" class="block font-semibold mb-2 text-gray-700 text-sm">Giá</label>
                            <input id="price_buy" name="price_buy" type="text"
                                value="{{ old('price_buy', $product->price_buy ?? '18.50') }}"
                                class="border border-gray-200 outline-none px-4 py-3 rounded-xl text-gray-700 transition w-full focus:border-orange-400 focus:ring-2 focus:ring-orange-100"
                                placeholder="0.00">
                        </div>

                        <div>
                            <label for="qty" class="block font-semibold mb-2 text-gray-700 text-sm">Số lượng
                                kho</label>
                            <input id="qty" name="qty" type="number"
                                value="{{ old('qty', $product->qty ?? '120') }}"
                                class="border border-gray-200 outline-none px-4 py-3 rounded-xl text-gray-700 transition w-full focus:border-orange-400 focus:ring-2 focus:ring-orange-100"
                                placeholder="0">
                        </div>
                    </div>

                    <div class="gap-5 grid md:grid-cols-2">
                        <div>
                            <label for="category_id" class="block font-semibold mb-2 text-gray-700 text-sm">Thể
                                Loại</label>
                            <select id="category_id" name="category_id"
                                class="bg-white border border-gray-200 outline-none px-4 py-3 rounded-xl text-gray-700 transition w-full focus:border-orange-400 focus:ring-2 focus:ring-orange-100">
                                @if (!empty($cats) && count($cats))
                                    @foreach ($cats as $cat)
                                        <option value="{{ $cat->id }}"
                                            {{ old('category_id', $product->category_id ?? '') ===  $cat->id ? 'selected' : '' }}>
                                            {{ $cat->name }}
                                        </option>
                                    @endforeach
                                @else
                                    <option value="">Self-Help</option>
                                @endif
                            </select>
                        </div>

                        <div>
                            <label class="block font-semibold mb-2 text-gray-700 text-sm">Status</label>
                            <select name="status"
                            class="bg-white border border-gray-200 outline-none px-4 py-3 rounded-xl text-gray-700 transition w-full focus:border-orange-400 focus:ring-2 focus:ring-orange-100">
                                <option value="">Trạng Thái</option>
                                <option value="0" {{ (string) old('status',$product->status??1)=== '0'?'selected':''}} >Ẩn</option>
                                <option value="1" {{ (string) old('status',$product->status??1)=== '1'?'selected':''}}>Hiện</option>
                            </select>
                        </div>
                    </div>

                    <div>
                        <label for="description"
                            class="block font-semibold mb-2 text-gray-700 text-sm">Description</label>
                        <textarea id="description" name="description" rows="6"
                            class="border border-gray-200 outline-none px-4 py-3 rounded-2xl text-gray-700 transition w-full focus:border-orange-400"
                            placeholder="Write a short product description">{{ old('description', $product->description ?? 'A proven framework for building better habits. This hands-on book reveals practical strategies for forming good habits, breaking bad ones, and mastering the tiny behaviors that lead to remarkable results over time.') }}</textarea>
                    </div>
                </div>
            </div>

            <div class="border-gray-100 border-t flex flex-wrap gap-3 items-center mt-8 pt-6">
                <button type="submit"
                    class="bg-orange-400 font-semibold px-6 py-3 rounded-xl text-white transition hover:bg-orange-500">
                    Lưu thay đổi
                </button>
                <a href="{{ route('product.index') }}"
                    class="bg-white border border-gray-200 font-semibold px-6 py-3 rounded-xl text-gray-600 transition hover:bg-gray-50">
                    Hủy bỏ
                </a>
            </div>
        </form>
    </div>
</x-backend.layout>
