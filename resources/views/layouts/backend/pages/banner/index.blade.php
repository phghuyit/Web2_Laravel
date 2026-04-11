<x-backend.layout>
    <x-slot:title>Banner</x-slot:title>

    <div class="p-3 xl:p-6">
        <div class="flex items-center justify-between mb-6 mt-1">
            <p class="font-bold text-xl uppercase">Quản lý banner</p>
            <div>
                <a href="{{ route('banner.create') }}" class="bg-[#059655] capitalize font-semibold px-3 py-1 rounded-lg text-white">
                    <i class="fa-plus fa-solid mr-1"></i>Thêm mới banner
                </a>
                <a href="{{ route("banner.trash") }}" class="bg-red-500 capitalize font-semibold px-3 py-1 rounded-lg text-white"><i class="fa-solid fa-trash mr-1"></i>Thùng rác</a>
            </div>
        </div>

        <form method="GET" action="">
            <div class="flex gap-3">
                <div class="flex flex-3">
                    <input
                        type="text"
                        name="name"
                        placeholder="Search ten banner"
                        class="bg-white px-4 py-2 rounded-l-md text-black w-full focus:outline-none"
                        value="{{ request('name') }}"
                    >
                    <button class="bg-orange-400 font-semibold px-5 rounded-r-md text-black hover:bg-orange-500">
                        <i class="fa-magnifying-glass fa-solid"></i>
                    </button>
                </div>
                <div>
                    <select name="position" class="bg-white border px-4 py-2 rounded-lg w-full" onchange="this.form.submit()">
                        <option value="">Position: All</option>
                        <option value="slideshow" {{ request('position') == 'slideshow' ? 'selected' : '' }}>Slideshow</option>
                        <option value="advertise" {{ request('position') == 'advertise' ? 'selected' : '' }}>Advertise</option>
                    </select>
                </div>
                <div>
                    <select name="status" class="bg-white border px-4 py-2 rounded-lg w-full" onchange="this.form.submit()">
                        <option value="">Trạng thái</option>
                        <option value="1" {{ request('status') == '1' ? 'selected' : '' }}>Hiện</option>
                        <option value="0" {{ request('status') == '0' ? 'selected' : '' }}>Ẩn</option>
                    </select>
                </div>
                <div class="border-black border-l h-6 self-center"></div>
                <div>
                    <select name="sort_by" class="bg-white border px-4 py-2 rounded-lg w-full" onchange="this.form.submit()">
                        <option value="">Sắp xếp</option>
                        <option value="name_asc" {{ request('sort_by') == 'name_asc' ? 'selected' : '' }}>Tên tăng dần</option>
                        <option value="name_desc" {{ request('sort_by') == 'name_desc' ? 'selected' : '' }}>Tên giảm dần</option>
                        <option value="sort_order_asc" {{ request('sort_by') == 'sort_order_asc' ? 'selected' : '' }}>Sort Order Tăng</option>
                        <option value="sort_order_desc" {{ request('sort_by') == 'sort_order_desc' ? 'selected' : '' }}>Sort Order Giảm</option>
                    </select>
                </div>
                <a href="{{ route('banner.index') }}" class="bg-white px-4 py-2 rounded-lg self-center">Reset</a>
            </div>
        </form>

        <table class="bg-white border border-collapse border-pink-500 mt-3 mx-auto overflow-hidden rounded-lg w-[99%]">
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
                    <tr class="border-gray-200 border-t-3 text-center hover:bg-gray-50">
                        <td class="px-1 py-3">{{ $banner->id }}</td>
                        <td class="font-semibold px-1 py-3">{{ $banner->name }}</td>
                        <td class="px-1 py-3">{{ $banner->link }}</td>
                        <td class="px-1 py-3">{{ $banner->sort_order }}</td>
                        <td class="px-1 py-3">{{ $banner->position }}</td>
                        <td class="px-1 py-3">{{ $banner->description }}</td>
                        <td class="px-1 py-3 w-[10%]">
                            @if ($banner->image)
                                <img src="{{ $banner->image }}" alt="{{ $banner->name }}" class="h-14 object-cover rounded w-24">
                            @endif
                        </td>
                        <td class="px-1 py-3">{{ $banner->status }}</td>
                        <td class="align-middle px-1 py-3">
                            <div class="flex flex-nowrap gap-2">
                                <div class="p-3 rounded-lg shadow text-sm hover:bg-gray-100">
                                    <a href="{{ route('banner.edit', $banner->id) }}"><i class="fa-pen fa-solid"></i><span class="hidden ml-1 xl:inline">Edit</span></a>
                                </div>
                                <form action="{{ route('banner.destroy', $banner->id) }}" method="post">
                                    @method('DELETE')
                                    @csrf
                                    <div class="p-3 rounded-lg shadow text-red-500 text-sm hover:bg-gray-100">
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
