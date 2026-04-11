<x-backend.layout>
    <x-slot:title>Category Trash</x-slot:title>

    <div class="p-3 xl:p-6">
        <div class="flex items-center justify-between mb-6 mt-1">
            <p class="font-bold text-xl uppercase">Thung rac the loai sach</p>
        </div>

        <form method="GET" action="">
            <div class="flex gap-3">
                <div class="flex flex-3">
                    <input
                        type="text"
                        name="name"
                        placeholder="Search category"
                        class="bg-white px-4 py-2 rounded-l-md text-black w-full focus:outline-none"
                        value="{{ request('name') }}"
                    >
                    <button class="bg-orange-400 font-semibold px-5 rounded-r-md text-black hover:bg-orange-500">
                        <i class="fa-magnifying-glass fa-solid"></i>
                    </button>
                </div>

                <div class="flex-1">
                    <select name="status" class="bg-white border flex-1 px-4 py-2 rounded-lg w-full" onchange="this.form.submit()">
                        <option value="">Status</option>
                        <option value="0" {{ request('status') == '0' ? 'selected' : '' }}>Inactive</option>
                        <option value="1" {{ request('status') == '1' ? 'selected' : '' }}>Active</option>
                    </select>
                </div>
                <div class="border-black border-l h-6 self-center"></div>
                <div>
                    <select name="sort_by" class="bg-white border flex-1 px-4 py-2 rounded-lg w-full" onchange="this.form.submit()">
                        <option value="">Sap xep</option>
                        <option value="asc" {{ request('sort_by') == 'asc' ? 'selected' : '' }}>Ten tang dan</option>
                        <option value="desc" {{ request('sort_by') == 'desc' ? 'selected' : '' }}>Ten giam dan</option>
                    </select>
                </div>
                <a href="{{ route('cate.trash') }}" class="bg-white px-4 py-2 rounded-lg self-center">Reset</a>
            </div>
        </form>

        <div class="flex-auto">
            <div class="overflow-x-auto">
                <table class="bg-white border-collapse mt-3 rounded-lg w-full">
                    <thead>
                        <tr>
                            <th class="px-3 py-1 text-center">ID</th>
                            <th class="px-3 py-1 text-left">Image</th>
                            <th class="px-3 py-1 text-center">Category Name</th>
                            <th class="px-3 py-1 text-center">Slug</th>
                            <th class="px-3 py-1 text-center">Parent ID</th>
                            <th class="px-3 py-1 text-center">Sort Order</th>
                            <th class="px-3 py-1 text-center whitespace-nowrap">Status</th>
                            <th class="px-3 py-1 text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($cates as $cate)
                            <tr class="border-gray-200 border-t text-center hover:bg-gray-50">
                                <td class="px-1 py-3">{{ $cate->id }}</td>
                                <td class="px-1 py-3 w-[10%]">
                                    @if ($cate->image)
                                        <img src="{{ $cate->image }}" alt="{{ $cate->name }}" class="h-14 object-cover rounded w-14">
                                    @else
                                        <div class="bg-gray-100 flex h-14 items-center justify-center mx-auto rounded text-gray-400 w-14">
                                            <i class="fa-book-open fa-solid"></i>
                                        </div>
                                    @endif
                                </td>
                                <td class="px-1 py-3">{{ $cate->name }}</td>
                                <td class="px-1 py-3">{{ $cate->slug }}</td>
                                <td class="px-1 py-3">{{ $cate->parent_id }}</td>
                                <td class="px-1 py-3">{{ $cate->sort_order }}</td>
                                <td class="px-1 py-3">{{ $cate->status }}</td>
                                <td class="align-middle px-1 py-3">
                                    <div class="flex flex-nowrap gap-2">
                                        <div class="p-3 rounded-lg shadow text-sm hover:bg-gray-100">
                                            <a href="#"><i class="fa-arrows-rotate fa-solid"></i><span class="hidden ml-1 xl:inline">Khoi phuc</span></a>
                                        </div>
                                        <div class="p-3 rounded-lg shadow text-red-500 text-sm hover:bg-gray-100">
                                            <a href="#"><i class="fa-solid fa-trash"></i></a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td class="p-6 text-center" colspan="8">Danh sach the loai trong thung rac rong</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <div class="mt-4">
            {{ $cates->links() }}
        </div>
    </div>
</x-backend.layout>
