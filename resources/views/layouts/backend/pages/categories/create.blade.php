<x-backend.layout>
    <x-slot:title>Create Category</x-slot:title>

    <div class="p-3 xl:p-6">
        <div class="flex flex-col gap-2 mb-6">
            <div class="flex gap-2 items-center text-gray-500 text-sm">
                <a href="{{ route('cate.index') }}" class="transition hover:text-orange-500">
                    <i class="fa-arrow-left fa-solid"></i>
                </a>
                <span>Categories</span>
                <span>/</span>
                <span>Create Category</span>
            </div>
            <h1 class="capitalize font-bold text-2xl text-gray-800">Them the loai sach moi</h1>
        </div>

        <form
            method="POST"
            action="{{ route('cate.store') }}"
            enctype="multipart/form-data"
            class="bg-white p-5 ring-1 ring-gray-100 rounded-3xl shadow-sm xl:p-7"
        >
            @csrf

            <div class="gap-6 grid xl:grid-cols-[280px_minmax(0,1fr)]">
                <div class="space-y-5">
                    <div class="bg-gray-50 border border-gray-200 overflow-hidden p-4 rounded-2xl">
                        <div class="aspect-[4/3] bg-white border border-dashed border-gray-300 flex items-center justify-center rounded-xl text-center text-gray-400">
                            <div>
                                <i class="fa-book-open fa-solid text-5xl"></i>
                                <p class="font-medium mt-3 text-sm">Preview image</p>
                            </div>
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
                                Category Name <span class="text-red-500">*</span>
                            </label>
                            <input
                                id="name"
                                name="name"
                                type="text"
                                value="{{ old('name') }}"
                                class="border border-gray-200 outline-none px-4 py-3 rounded-xl text-gray-700 transition w-full focus:border-orange-400 focus:ring-2 focus:ring-orange-100"
                                placeholder="Enter category name"
                            >
                        </div>

                        <div>
                            <label for="slug" class="block font-semibold mb-2 text-gray-700 text-sm">
                                Slug <span class="text-red-500">*</span>
                            </label>
                            <input
                                id="slug"
                                name="slug"
                                type="text"
                                value="{{ old('slug') }}"
                                class="border border-gray-200 outline-none px-4 py-3 rounded-xl text-gray-700 transition w-full focus:border-orange-400 focus:ring-2 focus:ring-orange-100"
                                placeholder="enter-category-slug"
                            >
                        </div>
                    </div>

                    <div class="gap-5 grid md:grid-cols-3">
                        <div>
                            <label for="parent_id" class="block font-semibold mb-2 text-gray-700 text-sm">Parent ID</label>
                            <input
                                id="parent_id"
                                name="parent_id"
                                type="number"
                                value="{{ old('parent_id', 0) }}"
                                class="border border-gray-200 outline-none px-4 py-3 rounded-xl text-gray-700 transition w-full focus:border-orange-400 focus:ring-2 focus:ring-orange-100"
                                placeholder="0"
                            >
                        </div>

                        <div>
                            <label for="sort_order" class="block font-semibold mb-2 text-gray-700 text-sm">Sort Order</label>
                            <input
                                id="sort_order"
                                name="sort_order"
                                type="number"
                                value="{{ old('sort_order', 1) }}"
                                class="border border-gray-200 outline-none px-4 py-3 rounded-xl text-gray-700 transition w-full focus:border-orange-400 focus:ring-2 focus:ring-orange-100"
                                placeholder="1"
                            >
                        </div>

                        <div>
                            <label class="block font-semibold mb-2 text-gray-700 text-sm">Status</label>
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
                            placeholder="Write a short category description"
                        >{{ old('description') }}</textarea>
                    </div>
                </div>
            </div>

            <div class="border-gray-100 border-t flex flex-wrap gap-3 items-center mt-8 pt-6">
                <button
                    type="submit"
                    class="bg-orange-400 capitalize font-semibold px-6 py-3 rounded-xl text-white transition hover:bg-orange-500"
                >
                    Them moi the loai
                </button>
                <a
                    href="{{ route('cate.index') }}"
                    class="bg-white border border-gray-200 font-semibold px-6 py-3 rounded-xl text-gray-600 transition hover:bg-gray-50"
                >
                    Huy bo
                </a>
            </div>
        </form>
    </div>
</x-backend.layout>
