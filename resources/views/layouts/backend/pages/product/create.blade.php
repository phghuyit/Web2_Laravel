<x-backend.layout>
    <x-slot:title>Create Product</x-slot:title>

    <div class="p-3 xl:p-6">
        <div class="flex flex-col gap-2 mb-6">
            <div class="flex gap-2 items-center text-gray-500 text-sm">
                <a href="{{ route('product.index') }}" class="transition hover:text-orange-500">
                    <i class="fa-arrow-left fa-solid"></i>
                </a>
                <span>Products</span>
                <span>/</span>
                <span>Create Product</span>
            </div>
            <h1 class="capitalize font-bold text-2xl text-gray-800">Thêm sản phẩm mới</h1>
        </div>

        <form
            method="POST"
            action="{{ route('product.store') }}"
            enctype="multipart/form-data"
            class="bg-white p-5 ring-1 ring-gray-100 rounded-3xl shadow-sm xl:p-7"
        >
            @csrf

            <div class="gap-6 grid xl:grid-cols-[280px_minmax(0,1fr)]">
                <div class="space-y-5">
                    <div class="bg-gray-50 border border-gray-200 overflow-hidden p-4 rounded-2xl">
                        <div class="aspect-[3/4] bg-white border border-dashed border-gray-300 flex items-center justify-center rounded-xl text-center text-gray-400">
                            <div>
                                <i class="fa-book-open fa-solid text-5xl"></i>
                                <p class="font-medium mt-3 text-sm">Preview image</p>
                            </div>
                        </div>
                    </div>

                    <div>
                        <label for="image" class="block font-semibold mb-2 text-gray-700 text-sm">Upload Ảnh Bìa</label>
                        <input
                            id="image"
                            name="image"
                            type="file"
                            class="bg-white block border border-gray-300 px-3 py-2 rounded-xl text-gray-600 text-sm w-full file:bg-orange-100 file:border-0 file:font-medium file:mr-4 file:px-4 file:py-2 file:rounded-lg file:text-orange-600 hover:file:bg-orange-200"
                        >
                        @error('image')
                            <span style="color:red">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="space-y-5">
                    <div>
                        <label for="name" class="block font-semibold mb-2 text-gray-700 text-sm">
                            Product Name <span class="text-red-500">*</span>
                        </label>
                        <input
                            id="name"
                            name="name"
                            type="text"
                            value="{{ old('name') }}"
                            class="border border-gray-200 outline-none px-4 py-3 rounded-xl text-gray-700 transition w-full focus:border-orange-400 focus:ring-2 focus:ring-orange-100"
                            placeholder="Enter product name"
                        >
                        @error('name')
                            <span style="color:red">{{ $message }}</span>
                        @enderror
                    </div>

                    <div>
                        <label for="brand_id" class="block font-semibold mb-2 text-gray-700 text-sm">Tác giả</label>
                        <select
                            id="brand_id"
                            name="brand_id"
                            class="bg-white border border-gray-200 outline-none px-4 py-3 rounded-xl text-gray-700 transition w-full focus:border-orange-400 focus:ring-2 focus:ring-orange-100"
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

                    <div class="gap-5 grid md:grid-cols-2">
                        <div>
                            <label for="price_buy" class="block font-semibold mb-2 text-gray-700 text-sm">Giá</label>
                            <input
                                id="price_buy"
                                name="price_buy"
                                type="text"
                                value="{{ old('price_buy') }}"
                                class="border border-gray-200 outline-none px-4 py-3 rounded-xl text-gray-700 transition w-full focus:border-orange-400 focus:ring-2 focus:ring-orange-100"
                                placeholder="0.00"
                            >
                            @error('price_buy')
                                <span style="color:red">{{ $message }}</span>
                            @enderror
                        </div>

                        <div>
                            <label for="qty" class="block font-semibold mb-2 text-gray-700 text-sm">Số lượng kho</label>
                            <input
                                id="qty"
                                name="qty"
                                type="number"
                                value="{{ old('qty') }}"
                                class="border border-gray-200 outline-none px-4 py-3 rounded-xl text-gray-700 transition w-full focus:border-orange-400 focus:ring-2 focus:ring-orange-100"
                                placeholder="0"
                            >
                            @error('qty')
                                <span style="color:red">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="gap-5 grid md:grid-cols-2">
                        <div>
                            <label for="category_id" class="block font-semibold mb-2 text-gray-700 text-sm">Thể Loại</label>
                            @error('category_id')
                                <span style="color:red">{{ $message }}</span>
                            @enderror
                            <select
                                id="category_id"
                                name="category_id"
                                class="bg-white border border-gray-200 outline-none px-4 py-3 rounded-xl text-gray-700 transition w-full focus:border-orange-400 focus:ring-2 focus:ring-orange-100"
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
                            <label class="block font-semibold mb-2 text-gray-700 text-sm">Status</label>
                            @error('status')
                                <span style="color:red">{{ $message }}</span>
                            @enderror
                            <label class="cursor-pointer gap-3 inline-flex items-center mt-3">
                                <span class="bg-emerald-500 h-7 inline-flex items-center relative rounded-full w-14">
                                    <input type="hidden" name="status" value="0">
                                    <input
                                        type="checkbox"
                                        name="status"
                                        value="1"
                                        class="peer sr-only"
                                        {{ old('status', 1) ? 'checked' : '' }}
                                    >
                                    <span class="absolute bg-white h-5 left-1 rounded-full transition w-5 peer-checked:translate-x-7"></span>
                                </span>
                                <span class="font-medium text-gray-700">Active</span>
                            </label>
                        </div>
                    </div>

                    <div>
                        <label for="description" class="block font-semibold mb-2 text-gray-700 text-sm">Description</label>
                        <textarea
                            id="description"
                            name="description"
                            rows="6"
                            class="border border-gray-200 outline-none px-4 py-3 rounded-2xl text-gray-700 transition w-full focus:border-orange-400 focus:ring-2 focus:ring-orange-100"
                            placeholder="Write a short product description"
                        >{{ old('description') }}</textarea>
                    </div>
                </div>
            </div>

            <div class="border-gray-100 border-t flex flex-wrap gap-3 items-center mt-8 pt-6">
                <button
                    type="submit"
                    class="bg-orange-400 font-semibold px-6 py-3 rounded-xl text-white transition hover:bg-orange-500"
                >
                    Tạo sản phẩm
                </button>
                <a
                    href="{{ route('product.index') }}"
                    class="bg-white border border-gray-200 font-semibold px-6 py-3 rounded-xl text-gray-600 transition hover:bg-gray-50"
                >
                    Hủy bỏ
                </a>
            </div>
        </form>
       
    </div>
</x-backend.layout>
