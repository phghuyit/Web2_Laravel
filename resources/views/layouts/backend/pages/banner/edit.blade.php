<x-backend.layout>
    <x-slot:title>Edit Banner</x-slot:title>

    <div class="p-3 xl:p-6">
        <div class="flex flex-col gap-2 mb-6">
            <div class="flex gap-2 items-center text-gray-500 text-sm">
                <a href="{{ route('banner.index') }}" class="transition hover:text-orange-500">
                    <i class="fa-arrow-left fa-solid"></i>
                </a>
                <span>Banner</span>
                <span>/</span>
                <span>Edit Banner</span>
            </div>
            <h1 class="capitalize font-bold text-2xl text-gray-800">Chỉnh sửa thông tin banner</h1>
        </div>

        <form
            method="POST"
            action="{{ isset($banner) ? route('banner.update', $banner->id) : '#' }}"
            enctype="multipart/form-data"
            class="bg-white p-5 ring-1 ring-gray-100 rounded-3xl shadow-sm xl:p-7"
        >
            @csrf
            @if (isset($banner))
                @method('PUT')
            @endif

            <div class="gap-6 grid xl:grid-cols-[280px_minmax(0,1fr)]">
                <div class="space-y-5">
                    <div class="bg-gray-50 border border-gray-200 overflow-hidden p-4 rounded-2xl">
                        <div class="aspect-[4/3] bg-white flex items-center justify-center rounded-xl">
                            @if (!empty($banner?->image))
                                <img
                                    src="{{ $banner->image }}"
                                    alt="{{ $banner->name ?? 'Banner image' }}"
                                    class="h-full object-cover rounded-xl w-full"
                                >
                            @else
                                <div class="border border-dashed border-gray-300 flex flex-col h-full items-center justify-center rounded-xl text-center text-gray-400 w-full">
                                    <i class="fa-image fa-solid text-5xl"></i>
                                    <p class="font-medium mt-3 text-sm">Preview image</p>
                                </div>
                            @endif
                        </div>
                    </div>

                    <div>
                        <label for="image" class="block font-semibold mb-2 text-gray-700 text-sm">Upload image</label>
                        <input
                            id="image"
                            name="image"
                            type="file"
                            class="bg-white block border border-gray-300 px-3 py-2 rounded-xl text-gray-600 text-sm w-full file:bg-orange-100 file:border-0 file:font-medium file:mr-4 file:px-4 file:py-2 file:rounded-lg file:text-orange-600 hover:file:bg-orange-200"
                        >
                    </div>
                </div>

                <div class="space-y-5">
                    <div class="gap-5 grid md:grid-cols-2">
                        <div>
                            <label for="name" class="block font-semibold mb-2 text-gray-700 text-sm">
                                Tên Banner <span class="text-red-500">*</span>
                            </label>
                            <input
                                id="name"
                                name="name"
                                type="text"
                                value="{{ old('name', $banner->name ?? '') }}"
                                class="border border-gray-200 outline-none px-4 py-3 rounded-xl text-gray-700 transition w-full focus:border-orange-400 focus:ring-2 focus:ring-orange-100"
                                placeholder="Nhập tên banner"
                            >
                        </div>

                        <div>
                            <label for="link" class="block font-semibold mb-2 text-gray-700 text-sm">Link</label>
                            <input
                                id="link"
                                name="link"
                                type="text"
                                value="{{ old('link', $banner->link ?? '') }}"
                                class="border border-gray-200 outline-none px-4 py-3 rounded-xl text-gray-700 transition w-full focus:border-orange-400 focus:ring-2 focus:ring-orange-100"
                                placeholder="/banner/..."
                            >
                        </div>
                    </div>

                    <div class="gap-5 grid md:grid-cols-3">
                        <div>
                            <label for="sort_order" class="block font-semibold mb-2 text-gray-700 text-sm">Sort Order</label>
                            <input
                                id="sort_order"
                                name="sort_order"
                                type="number"
                                value="{{ old('sort_order', $banner->sort_order ?? 1) }}"
                                class="border border-gray-200 outline-none px-4 py-3 rounded-xl text-gray-700 transition w-full focus:border-orange-400 focus:ring-2 focus:ring-orange-100"
                                placeholder="1"
                            >
                        </div>

                        <div>
                            <label for="position" class="block font-semibold mb-2 text-gray-700 text-sm">Position</label>
                            <select
                                id="position"
                                name="position"
                                class="bg-white border border-gray-200 outline-none px-4 py-3 rounded-xl text-gray-700 transition w-full focus:border-orange-400 focus:ring-2 focus:ring-orange-100"
                            >
                                <option value="slideshow" {{ old('position', $banner->position ?? 'slideshow') == 'slideshow' ? 'selected' : '' }}>Slideshow</option>
                                <option value="advertise" {{ old('position', $banner->position ?? '') == 'advertise' ? 'selected' : '' }}>Advertise</option>
                            </select>
                        </div>

                        <div>
                            <label class="block font-semibold mb-2 text-gray-700 text-sm">Trạng thái</label>
                            <label class="cursor-pointer gap-3 inline-flex items-center mt-3">
                                <span class="bg-emerald-500 h-7 inline-flex items-center relative rounded-full w-14">
                                    <input type="hidden" name="status" value="0">
                                    <input
                                        type="checkbox"
                                        name="status"
                                        value="1"
                                        class="peer sr-only"
                                        {{ old('status', $banner->status ?? 1) ? 'checked' : '' }}
                                    >
                                    <span class="absolute bg-white h-5 left-1 rounded-full transition w-5 peer-checked:translate-x-7"></span>
                                </span>
                                <span class="font-medium text-gray-700">Active</span>
                            </label>
                        </div>
                    </div>

                    <div>
                        <label for="description" class="block font-semibold mb-2 text-gray-700 text-sm">Mô tả</label>
                        <textarea
                            id="description"
                            name="description"
                            rows="6"
                            class="border border-gray-200 outline-none px-4 py-3 rounded-2xl text-gray-700 transition w-full focus:border-orange-400 focus:ring-2 focus:ring-orange-100"
                            placeholder="Write a short banner description"
                        >{{ old('description', $banner->description ?? '') }}</textarea>
                    </div>
                </div>
            </div>

            <div class="border-gray-100 border-t flex flex-wrap gap-3 items-center mt-8 pt-6">
                <button
                    type="submit"
                    class="bg-orange-400 font-semibold px-6 py-3 rounded-xl text-white transition hover:bg-orange-500"
                >
                    Lưu thay đổi
                </button>
                <a
                    href="{{ route('banner.index') }}"
                    class="bg-white border border-gray-200 font-semibold px-6 py-3 rounded-xl text-gray-600 transition hover:bg-gray-50"
                >
                    Hủy bỏ
                </a>
            </div>
        </form>
    </div>
</x-backend.layout>
