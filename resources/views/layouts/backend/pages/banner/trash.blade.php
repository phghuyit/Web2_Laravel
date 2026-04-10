<x-backend.layout>
    <x-slot:title>Banner Trash</x-slot:title>

    <div class="p-3 xl:p-6">
        <div class="flex flex-col gap-2 mb-6">
            <div class="flex gap-2 items-center text-gray-500 text-sm">
                <a href="{{ route('banner.index') }}" class="transition hover:text-orange-500">
                    <i class="fa-arrow-left fa-solid"></i>
                </a>
                <span>Banner</span>
                <span>/</span>
                <span>Thùng rác</span>
            </div>
            <h1 class="capitalize font-bold text-2xl text-gray-800">Thùng rác</h1>
        </div>

        <form method="GET" action="">
            <div class="flex gap-3">
                <div class="flex flex-3">
                    <input
                        type="text"
                        name="name"
                        placeholder="Search banner"
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

                <div class="flex-1">
                    <select name="status" class="bg-white border flex-1 px-4 py-2 rounded-lg w-full" onchange="this.form.submit()">
                        <option value="">Trạng thái</option>
                        <option value="0" {{ request('status') == '0' ? 'selected' : '' }}>Ẩ<nav></nav></option>
                        <option value="1" {{ request('status') == '1' ? 'selected' : '' }}>Hiện</option>
                    </select>
                </div>
                <div class="border-black border-l h-6 self-center"></div>
                <div>
                    <select name="sort_by" class="bg-white border flex-1 px-4 py-2 rounded-lg w-full" onchange="this.form.submit()">
                        <option value="">Sắp xếp </option>
                        <option value="name_asc" {{ request('sort_by') == 'name_asc' ? 'selected' : '' }}>Tên tăng dần</option>
                        <option value="name_desc" {{ request('sort_by') == 'name_desc' ? 'selected' : '' }}>Tên giảm dần</option>
                        <option value="sort_order_asc" {{ request('sort_by') == 'sort_order_asc' ? 'selected' : '' }}>Sort order tăng</option>
                        <option value="sort_order_desc" {{ request('sort_by') == 'sort_order_desc' ? 'selected' : '' }}>Sort order giảm</option>
                    </select>
                </div>
                <a href="{{ route('banner.trash') }}" class="bg-white px-4 py-2 rounded-lg self-center">Reset</a>
            </div>
        </form>

        <div class="flex-auto">
            <div class="overflow-x-auto">
                <table class="bg-white border-collapse mt-3 rounded-lg w-full">
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
                            <tr class="border-gray-200 border-t text-center hover:bg-gray-50">
                                <td class="px-1 py-3">{{ $banner->id }}</td>
                                <td class="font-semibold px-1 py-3">{{ $banner->name }}</td>
                                <td class="px-1 py-3">{{ $banner->link }}</td>
                                <td class="px-1 py-3">{{ $banner->sort_order }}</td>
                                <td class="px-1 py-3">{{ $banner->position }}</td>
                                <td class="px-1 py-3">{{ $banner->description }}</td>
                                <td class="px-1 py-3 w-[10%]">
                                    @if ($banner->image)
                                        <img src="{{ $banner->image }}" alt="{{ $banner->name }}" class="h-14 object-cover rounded w-24">
                                    @else
                                        <div class="bg-gray-100 flex h-14 items-center justify-center mx-auto rounded text-gray-400 w-24">
                                            <i class="fa-image fa-solid"></i>
                                        </div>
                                    @endif
                                </td>
                                <td class="px-1 py-3">{{ $banner->status }}</td>
                                <td class="px-1 py-3 whitespace-nowrap">{{ $banner->deleted_at }}</td>
                                <td class="align-middle px-1 py-3">
                                    <div class="flex flex-nowrap gap-2">
                                        <div class="p-3 rounded-lg shadow text-sm hover:bg-gray-100">
                                            <a href="#"><i class="fa-arrows-rotate fa-solid"></i><span class="hidden ml-1 xl:inline">Khôi phục</span></a>
                                        </div>
                                        <div class="p-3 rounded-lg shadow text-red-500 text-sm hover:bg-gray-100">
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
