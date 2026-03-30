<x-backend.layout>
    <x-slot:title>Create Category</x-slot:title>

    <div class="p-3 xl:p-6">
        <div class="mb-6 flex flex-col gap-2">
            <div class="flex items-center gap-2 text-sm text-gray-500">
                <a href="{{ route('cate.index') }}" class="transition hover:text-orange-500">
                    <i class="fa-solid fa-arrow-left"></i>
                </a>
                <span>Categories</span>
                <span>/</span>
                <span>Create Category</span>
            </div>
            <h1 class="text-2xl font-bold capitalize text-gray-800">Them the loai sach moi</h1>
        </div>

        <form
            method="POST"
            action="{{ route('cate.store') }}"
            enctype="multipart/form-data"
            class="rounded-3xl bg-white p-5 shadow-sm ring-1 ring-gray-100 xl:p-7"
        >
            @csrf

            <div class="grid gap-6 xl:grid-cols-[280px_minmax(0,1fr)]">
                <div class="space-y-5">
                    <div class="overflow-hidden rounded-2xl border border-gray-200 bg-gray-50 p-4">
                        <div class="flex aspect-[4/3] items-center justify-center rounded-xl border border-dashed border-gray-300 bg-white text-center text-gray-400">
                            <div>
                                <i class="fa-solid fa-book-open text-5xl"></i>
                                <p class="mt-3 text-sm font-medium">Preview image</p>
                            </div>
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
                                Category Name <span class="text-red-500">*</span>
                            </label>
                            <input
                                id="name"
                                name="name"
                                type="text"
                                value="{{ old('name') }}"
                                class="w-full rounded-xl border border-gray-200 px-4 py-3 text-gray-700 outline-none transition focus:border-orange-400 focus:ring-2 focus:ring-orange-100"
                                placeholder="Enter category name"
                            >
                        </div>

                        <div>
                            <label for="slug" class="mb-2 block text-sm font-semibold text-gray-700">
                                Slug <span class="text-red-500">*</span>
                            </label>
                            <input
                                id="slug"
                                name="slug"
                                type="text"
                                value="{{ old('slug') }}"
                                class="w-full rounded-xl border border-gray-200 px-4 py-3 text-gray-700 outline-none transition focus:border-orange-400 focus:ring-2 focus:ring-orange-100"
                                placeholder="enter-category-slug"
                            >
                        </div>
                    </div>

                    <div class="grid gap-5 md:grid-cols-3">
                        <div>
                            <label for="parent_id" class="mb-2 block text-sm font-semibold text-gray-700">Parent ID</label>
                            <input
                                id="parent_id"
                                name="parent_id"
                                type="number"
                                value="{{ old('parent_id', 0) }}"
                                class="w-full rounded-xl border border-gray-200 px-4 py-3 text-gray-700 outline-none transition focus:border-orange-400 focus:ring-2 focus:ring-orange-100"
                                placeholder="0"
                            >
                        </div>

                        <div>
                            <label for="sort_order" class="mb-2 block text-sm font-semibold text-gray-700">Sort Order</label>
                            <input
                                id="sort_order"
                                name="sort_order"
                                type="number"
                                value="{{ old('sort_order', 1) }}"
                                class="w-full rounded-xl border border-gray-200 px-4 py-3 text-gray-700 outline-none transition focus:border-orange-400 focus:ring-2 focus:ring-orange-100"
                                placeholder="1"
                            >
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
                            placeholder="Write a short category description"
                        >{{ old('description') }}</textarea>
                    </div>
                </div>
            </div>

            <div class="mt-8 flex flex-wrap items-center gap-3 border-t border-gray-100 pt-6">
                <button
                    type="submit"
                    class="rounded-xl bg-orange-400 px-6 py-3 font-semibold text-white transition hover:bg-orange-500 capitalize"
                >
                    Them moi the loai
                </button>
                <a
                    href="{{ route('cate.index') }}"
                    class="rounded-xl border border-gray-200 bg-white px-6 py-3 font-semibold text-gray-600 transition hover:bg-gray-50"
                >
                    Huy bo
                </a>
            </div>
        </form>
    </div>
</x-backend.layout>
