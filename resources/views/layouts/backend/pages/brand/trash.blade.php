<x-backend.layout>
    <x-slot:title>Brand Trash</x-slot:title>

    <div class="p-3 xl:p-6">
        <div class="mt-1 mb-6 flex items-center justify-between">
            <p class="text-xl font-bold uppercase">Thùng rác tác giả</p>
        </div>

        <form method="GET" action="">
            <div class="flex gap-3">
                <div class="flex flex-3">
                    <input
                        type="text"
                        name="name"
                        placeholder="Search author"
                        class="w-full rounded-l-md bg-white px-4 py-2 text-black focus:outline-none"
                        value="{{ request('name') }}"
                    >
                    <button class="rounded-r-md bg-orange-400 px-5 font-semibold text-black hover:bg-orange-500">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </button>
                </div>

                <div class="flex-1">
                    <select name="status" class="w-full flex-1 rounded-lg border bg-white px-4 py-2" onchange="this.form.submit()">
                        <option value="">Status</option>
                        <option value="0" {{ request('status') == '0' ? 'selected' : '' }}>Ẩn</option>
                        <option value="1" {{ request('status') == '1' ? 'selected' : '' }}>Hiện</option>
                    </select>
                </div>
                <div class="h-6 self-center border-l border-black"></div>
                <div>
                    <select name="sort_by" class="w-full flex-1 rounded-lg border bg-white px-4 py-2" onchange="this.form.submit()">
                        <option value="">Sắp xếp</option>
                        <option value="name_asc" {{ request('sort_by') == 'name_asc' ? 'selected' : '' }}>Tên tăng dần</option>
                        <option value="name_desc" {{ request('sort_by') == 'name_desc' ? 'selected' : '' }}>Tên giảm dần</option>
                    </select>
                </div>
                <a href="{{ route('brand.trash') }}" class="self-center rounded-lg bg-white px-4 py-2">Reset</a>
            </div>
        </form>

        <div class="flex-auto">
            <div class="overflow-x-auto">
                <table class="mt-3 border-collapse rounded-lg bg-white">
                    <thead>
                        <tr>
                            <th class="px-3 py-1 text-center">ID</th>
                            <th class="px-3 py-1 text-left">Image</th>
                            <th class="px-3 py-1 text-center">Author Name</th>
                            <th class="px-3 py-1 text-center">Slug</th>
                            <th class="px-3 py-1 text-center whitespace-nowrap">Status</th>
                            <th class="px-3 py-1 text-center whitespace-nowrap">Deleted At</th>
                            <th class="px-3 py-1 text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($brands as $brand)
                            <tr class="border-t border-gray-200 text-center hover:bg-gray-50">
                                <td class="px-1 py-3">{{ $brand->id }}</td>
                                <td class="w-[10%] px-1 py-3">
                                    @if ($brand->image)
                                        <img src="{{ $brand->image }}" alt="{{ $brand->name }}" class="h-14 w-14 rounded object-cover">
                                    @else
                                        <div class="mx-auto flex h-14 w-14 items-center justify-center rounded bg-gray-100 text-gray-400">
                                            <i class="fa-solid fa-feather-pointed"></i>
                                        </div>
                                    @endif
                                </td>
                                <td class="px-1 py-3">{{ $brand->name }}</td>
                                <td class="px-1 py-3">{{ $brand->slug }}</td>
                                <td class="px-1 py-3">{{ $brand->status }}</td>
                                <td class="px-1 py-3 whitespace-nowrap">{{ $brand->deleted_at }}</td>
                                <td class="align-middle px-1 py-3">
                                    <div class="flex flex-nowrap gap-2">
                                        <div class="rounded-lg p-3 text-sm shadow hover:bg-gray-100">
                                            <a href="#"><i class="fa-solid fa-arrows-rotate"></i><span class="ml-1 hidden xl:inline">Khôi phục</span></a>
                                        </div>
                                        <div class="rounded-lg p-3 text-sm text-red-500 shadow hover:bg-gray-100">
                                            <a href="#"><i class="fa-solid fa-trash"></i></a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td class="p-6 text-center" colspan="7">Danh sách tác giả trong thùng rác rỗng</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <div class="mt-4">
            {{ $brands->links() }}
        </div>
    </div>
</x-backend.layout>
