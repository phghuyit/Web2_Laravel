<x-backend.layout>
    <x-slot:title>Banner Trash</x-slot:title>

    <div class="p-3 xl:p-6">
        <div class="mb-6 flex flex-col gap-2">
            <div class="flex items-center gap-2 text-sm text-gray-500">
                <a href="{{ route('banner.index') }}" class="transition hover:text-orange-500">
                    <i class="fa-solid fa-arrow-left"></i>
                </a>
                <span>Banner</span>
                <span>/</span>
                <span>Thùng rác</span>
            </div>
            <h1 class="text-2xl font-bold capitalize text-gray-800">Thùng rác</h1>
        </div>

        <form method="GET" action="">
            <div class="flex gap-3">
                <div class="flex flex-3">
                    <input
                        type="text"
                        name="name"
                        placeholder="Search banner"
                        class="w-full rounded-l-md bg-white px-4 py-2 text-black focus:outline-none"
                        value="{{ request('name') }}"
                    >
                    <button class="rounded-r-md bg-orange-400 px-5 font-semibold text-black hover:bg-orange-500">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </button>
                </div>

                <div>
                    <select name="position" class="w-full rounded-lg border bg-white px-4 py-2" onchange="this.form.submit()">
                        <option value="">Position: All</option>
                        <option value="slideshow" {{ request('position') == 'slideshow' ? 'selected' : '' }}>Slideshow</option>
                        <option value="advertise" {{ request('position') == 'advertise' ? 'selected' : '' }}>Advertise</option>
                    </select>
                </div>

                <div class="flex-1">
                    <select name="status" class="w-full flex-1 rounded-lg border bg-white px-4 py-2" onchange="this.form.submit()">
                        <option value="">Trạng thái</option>
                        <option value="0" {{ request('status') == '0' ? 'selected' : '' }}>Ẩ<nav></nav></option>
                        <option value="1" {{ request('status') == '1' ? 'selected' : '' }}>Hiện</option>
                    </select>
                </div>
                <div class="h-6 self-center border-l border-black"></div>
                <div>
                    <select name="sort_by" class="w-full flex-1 rounded-lg border bg-white px-4 py-2" onchange="this.form.submit()">
                        <option value="">Sắp xếp </option>
                        <option value="name_asc" {{ request('sort_by') == 'name_asc' ? 'selected' : '' }}>Tên tăng dần</option>
                        <option value="name_desc" {{ request('sort_by') == 'name_desc' ? 'selected' : '' }}>Tên giảm dần</option>
                        <option value="sort_order_asc" {{ request('sort_by') == 'sort_order_asc' ? 'selected' : '' }}>Sort order tăng</option>
                        <option value="sort_order_desc" {{ request('sort_by') == 'sort_order_desc' ? 'selected' : '' }}>Sort order giảm</option>
                    </select>
                </div>
                <a href="{{ route('banner.trash') }}" class="self-center rounded-lg bg-white px-4 py-2">Reset</a>
            </div>
        </form>

        <div class="flex-auto">
            <div class="overflow-x-auto">
                <table class="mt-3 w-full border-collapse rounded-lg bg-white">
                    <thead>
                        <tr>
                            <th class="px-3 py-1 text-center">ID</th>
                            <th class="px-3 py-1 text-center">Tên Banner</th>
                            <th class="px-3 py-1 text-center">Link</th>
                            <th class="px-3 py-1 text-center">Sort Order</th>
                            <th class="px-3 py-1 text-center">Position</th>
                            <th class="px-3 py-1 text-center">Mô tả</th>
                            <th class="px-3 py-1 text-left">Image</th>
                            <th class="px-3 py-1 text-center whitespace-nowrap">Trạng thái</th>
                            <th class="px-3 py-1 text-center whitespace-nowrap">Deleted At</th>
                            <th class="px-3 py-1 text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($banners as $banner)
                            <tr class="border-t border-gray-200 text-center hover:bg-gray-50">
                                <td class="px-1 py-3">{{ $banner->id }}</td>
                                <td class="px-1 py-3 font-semibold">{{ $banner->name }}</td>
                                <td class="px-1 py-3">{{ $banner->link }}</td>
                                <td class="px-1 py-3">{{ $banner->sort_order }}</td>
                                <td class="px-1 py-3">{{ $banner->position }}</td>
                                <td class="px-1 py-3">{{ $banner->description }}</td>
                                <td class="w-[10%] px-1 py-3">
                                    @if ($banner->image)
                                        <img src="{{ $banner->image }}" alt="{{ $banner->name }}" class="h-14 w-24 rounded object-cover">
                                    @else
                                        <div class="mx-auto flex h-14 w-24 items-center justify-center rounded bg-gray-100 text-gray-400">
                                            <i class="fa-solid fa-image"></i>
                                        </div>
                                    @endif
                                </td>
                                <td class="px-1 py-3">{{ $banner->status }}</td>
                                <td class="px-1 py-3 whitespace-nowrap">{{ $banner->deleted_at }}</td>
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
                                <td class="p-6 text-center" colspan="10">Danh sách banner trong thùng rác trống</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <div class="mt-4">
            {{ $banners->links() }}
        </div>
    </div>
</x-backend.layout>
