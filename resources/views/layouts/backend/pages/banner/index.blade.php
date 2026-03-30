<x-backend.layout>
    <x-slot:title>Banner</x-slot:title>

    <div class="p-3 xl:p-6">
        <div class="mt-1 mb-6 flex items-center justify-between">
            <p class="text-xl font-bold uppercase">Quản lý banner</p>
            <div>
                <a href="{{ route('banner.create') }}" class="rounded-lg py-1 px-3 bg-[#059655] font-semibold capitalize text-white">
                    <i class="fa-solid fa-plus mr-1"></i>Thêm mới banner
                </a>
                <a href="{{ route("banner.trash") }}" class="rounded-lg py-1 px-3 bg-red-500 font-semibold capitalize text-white"><i class="fa-solid fa-trash mr-1"></i>Thùng rác</a>
            </div>
        </div>

        <form method="GET" action="">
            <div class="flex gap-3">
                <div class="flex flex-3">
                    <input
                        type="text"
                        name="name"
                        placeholder="Search ten banner"
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
                <div>
                    <select name="status" class="w-full rounded-lg border bg-white px-4 py-2" onchange="this.form.submit()">
                        <option value="">Trạng thái</option>
                        <option value="1" {{ request('status') == '1' ? 'selected' : '' }}>Hiện</option>
                        <option value="0" {{ request('status') == '0' ? 'selected' : '' }}>Ẩn</option>
                    </select>
                </div>
                <div class="h-6 self-center border-l border-black"></div>
                <div>
                    <select name="sort_by" class="w-full rounded-lg border bg-white px-4 py-2" onchange="this.form.submit()">
                        <option value="">Sắp xếp</option>
                        <option value="name_asc" {{ request('sort_by') == 'name_asc' ? 'selected' : '' }}>Tên tăng dần</option>
                        <option value="name_desc" {{ request('sort_by') == 'name_desc' ? 'selected' : '' }}>Tên giảm dần</option>
                        <option value="sort_order_asc" {{ request('sort_by') == 'sort_order_asc' ? 'selected' : '' }}>Sort Order Tăng</option>
                        <option value="sort_order_desc" {{ request('sort_by') == 'sort_order_desc' ? 'selected' : '' }}>Sort Order Giảm</option>
                    </select>
                </div>
                <a href="{{ route('banner.index') }}" class="self-center rounded-lg bg-white px-4 py-2">Reset</a>
            </div>
        </form>

        <table class="mx-auto mt-3 w-[99%] overflow-hidden rounded-lg border border-pink-500 bg-white border-collapse">
            <thead>
                <tr>
                    <th class="px-3 py-1 text-center">ID</th>
                    <th class="px-3 py-1 text-center">Tên Banner</th>
                    <th class="px-3 py-1 text-center">Link</th>
                    <th class="px-3 py-1 text-center">Sort Order</th>
                    <th class="px-3 py-1 text-center">Position</th>
                    <th class="px-3 py-1 text-center">Mô tả</th>
                    <th class="px-3 py-1 text-left">Image</th>
                    <th class="px-3 py-1 text-left">Trạng thái</th>
                    <th class="px-3 py-1 text-left">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($banners as $banner)
                    <tr class="border-t-3 border-gray-200 text-center hover:bg-gray-50">
                        <td class="px-1 py-3">{{ $banner->id }}</td>
                        <td class="px-1 py-3 font-semibold">{{ $banner->name }}</td>
                        <td class="px-1 py-3">{{ $banner->link }}</td>
                        <td class="px-1 py-3">{{ $banner->sort_order }}</td>
                        <td class="px-1 py-3">{{ $banner->position }}</td>
                        <td class="px-1 py-3">{{ $banner->description }}</td>
                        <td class="w-[10%] px-1 py-3">
                            @if ($banner->image)
                                <img src="{{ $banner->image }}" alt="{{ $banner->name }}" class="h-14 w-24 rounded object-cover">
                            @endif
                        </td>
                        <td class="px-1 py-3">{{ $banner->status }}</td>
                        <td class="px-1 py-3 align-middle">
                            <div class="flex flex-nowrap gap-2">
                                <div class="rounded-lg p-3 text-sm shadow hover:bg-gray-100">
                                    <a href="{{ route('banner.edit', $banner->id) }}"><i class="fa-solid fa-pen"></i><span class="ml-1 hidden xl:inline">Edit</span></a>
                                </div>
                                <form action="{{ route('banner.destroy', $banner->id) }}" method="post">
                                    @method('DELETE')
                                    @csrf
                                    <div class="rounded-lg p-3 text-sm text-red-500 shadow hover:bg-gray-100">
                                        <button type="submit"><i class="fa-solid fa-trash text-red-600"></i></button>
                                    </div>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td class="p-6 text-center" colspan="9">Danh sách banner hiện trống</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <div class="mt-4">
            {{ $banners->links() }}
        </div>
    </div>
</x-backend.layout>
