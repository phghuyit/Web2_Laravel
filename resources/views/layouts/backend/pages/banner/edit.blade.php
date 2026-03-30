<x-backend.layout>
    <x-slot:title>Edit Banner</x-slot:title>

    <div class="p-3 xl:p-6">
        <div class="mb-6 flex flex-col gap-2">
            <div class="flex items-center gap-2 text-sm text-gray-500">
                <a href="{{ route('banner.index') }}" class="transition hover:text-orange-500">
                    <i class="fa-solid fa-arrow-left"></i>
                </a>
                <span>Banner</span>
                <span>/</span>
                <span>Edit Banner</span>
            </div>
            <h1 class="text-2xl font-bold capitalize text-gray-800">Chỉnh sửa thông tin banner</h1>
        </div>

        <form
            method="POST"
            action="{{ isset($banner) ? route('banner.update', $banner->id) : '#' }}"
            enctype="multipart/form-data"
            class="rounded-3xl bg-white p-5 shadow-sm ring-1 ring-gray-100 xl:p-7"
        >
            @csrf
            @if (isset($banner))
                @method('PUT')
            @endif

            <div class="grid gap-6 xl:grid-cols-[280px_minmax(0,1fr)]">
                <div class="space-y-5">
                    <div class="overflow-hidden rounded-2xl border border-gray-200 bg-gray-50 p-4">
                        <div class="flex aspect-[4/3] items-center justify-center rounded-xl bg-white">
                            @if (!empty($banner?->image))
                                <img
                                    src="{{ $banner->image }}"
                                    alt="{{ $banner->name ?? 'Banner image' }}"
                                    class="h-full w-full rounded-xl object-cover"
                                >
                            @else
                                <div class="flex h-full w-full flex-col items-center justify-center rounded-xl border border-dashed border-gray-300 text-center text-gray-400">
                                    <i class="fa-solid fa-image text-5xl"></i>
                                    <p class="mt-3 text-sm font-medium">Preview image</p>
                                </div>
                            @endif
                        </div>
                    </div>

                    <div>
                        <label for="image" class="mb-2 block text-sm font-semibold text-gray-700">Upload image</label>
                        <input
                            id="image"
                            name="image"
                            type="file"
                            class="block w-full rounded-xl border border-gray-300 bg-white px-3 py-2 text-sm text-gray-600 file:mr-4 file:rounded-lg file:border-0 file:bg-orange-100 file:px-4 file:py-2 file:font-medium file:text-orange-600 hover:file:bg-orange-200"
                        >
                    </div>
                </div>

                <div class="space-y-5">
                    <div class="grid gap-5 md:grid-cols-2">
                        <div>
                            <label for="name" class="mb-2 block text-sm font-semibold text-gray-700">
                                Tên Banner <span class="text-red-500">*</span>
                            </label>
                            <input
                                id="name"
                                name="name"
                                type="text"
                                value="{{ old('name', $banner->name ?? '') }}"
                                class="w-full rounded-xl border border-gray-200 px-4 py-3 text-gray-700 outline-none transition focus:border-orange-400 focus:ring-2 focus:ring-orange-100"
                                placeholder="Nhập tên banner"
                            >
                        </div>

                        <div>
                            <label for="link" class="mb-2 block text-sm font-semibold text-gray-700">Link</label>
                            <input
                                id="link"
                                name="link"
                                type="text"
                                value="{{ old('link', $banner->link ?? '') }}"
                                class="w-full rounded-xl border border-gray-200 px-4 py-3 text-gray-700 outline-none transition focus:border-orange-400 focus:ring-2 focus:ring-orange-100"
                                placeholder="/banner/..."
                            >
                        </div>
                    </div>

                    <div class="grid gap-5 md:grid-cols-3">
                        <div>
                            <label for="sort_order" class="mb-2 block text-sm font-semibold text-gray-700">Sort Order</label>
                            <input
                                id="sort_order"
                                name="sort_order"
                                type="number"
                                value="{{ old('sort_order', $banner->sort_order ?? 1) }}"
                                class="w-full rounded-xl border border-gray-200 px-4 py-3 text-gray-700 outline-none transition focus:border-orange-400 focus:ring-2 focus:ring-orange-100"
                                placeholder="1"
                            >
                        </div>

                        <div>
                            <label for="position" class="mb-2 block text-sm font-semibold text-gray-700">Position</label>
                            <select
                                id="position"
                                name="position"
                                class="w-full rounded-xl border border-gray-200 bg-white px-4 py-3 text-gray-700 outline-none transition focus:border-orange-400 focus:ring-2 focus:ring-orange-100"
                            >
                                <option value="slideshow" {{ old('position', $banner->position ?? 'slideshow') == 'slideshow' ? 'selected' : '' }}>Slideshow</option>
                                <option value="advertise" {{ old('position', $banner->position ?? '') == 'advertise' ? 'selected' : '' }}>Advertise</option>
                            </select>
                        </div>

                        <div>
                            <label class="mb-2 block text-sm font-semibold text-gray-700">Trạng thái</label>
                            <label class="mt-3 inline-flex cursor-pointer items-center gap-3">
                                <span class="relative inline-flex h-7 w-14 items-center rounded-full bg-emerald-500">
                                    <input type="hidden" name="status" value="0">
                                    <input
                                        type="checkbox"
                                        name="status"
                                        value="1"
                                        class="peer sr-only"
                                        {{ old('status', $banner->status ?? 1) ? 'checked' : '' }}
                                    >
                                    <span class="absolute left-1 h-5 w-5 rounded-full bg-white transition peer-checked:translate-x-7"></span>
                                </span>
                                <span class="font-medium text-gray-700">Active</span>
                            </label>
                        </div>
                    </div>

                    <div>
                        <label for="description" class="mb-2 block text-sm font-semibold text-gray-700">Mô tả</label>
                        <textarea
                            id="description"
                            name="description"
                            rows="6"
                            class="w-full rounded-2xl border border-gray-200 px-4 py-3 text-gray-700 outline-none transition focus:border-orange-400 focus:ring-2 focus:ring-orange-100"
                            placeholder="Write a short banner description"
                        >{{ old('description', $banner->description ?? '') }}</textarea>
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
                    href="{{ route('banner.index') }}"
                    class="rounded-xl border border-gray-200 bg-white px-6 py-3 font-semibold text-gray-600 transition hover:bg-gray-50"
                >
                    Hủy bỏ
                </a>
            </div>
        </form>
    </div>
</x-backend.layout>
