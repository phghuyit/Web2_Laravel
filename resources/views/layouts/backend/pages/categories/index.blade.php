<x-backend.layout>
    <x-slot:title>Danh mục</x-slot:title>

    <div class="p-3 xl:p-6">
        <div class="flex flex-col gap-2 mb-6">
            <div class="flex gap-2 items-center text-gray-500 text-sm">
                <a href="{{ route('admin.dashboard') }}" class="transition hover:text-orange-500">
                    Bảng điều khiển
                </a>
                <span>/</span>
                <span class="text-gray-700">Danh mục</span>
            </div>

            <div class="flex items-center justify-between mt-1">
                <p class="font-bold text-xl uppercase">Quản lý thể loại sách</p>
                <div>
                    <a href="{{ route('cate.create') }}"
                        class="bg-[#059655] capitalize font-semibold px-3 py-1 rounded-lg text-white">
                        <i class="fa-plus fa-solid mr-1"></i>Thêm thể loại
                    </a>
                    <a href="{{ route('cate.trash') }}"
                        class="bg-red-500 capitalize font-semibold px-3 py-1 rounded-lg text-white">
                        <i class="fa-solid fa-trash mr-1"></i>Thùng rác
                    </a>
                </div>
            </div>
        </div>

        <form method="GET" action="{{ route('cate.index') }}">
            <div class="flex gap-3">
                <div class="flex flex-3">
                    <input
                        type="text"
                        name="name"
                        placeholder="Tìm kiếm thể loại sách"
                        class="bg-white px-4 py-2 rounded-l-md text-black w-full focus:outline-none"
                        value="{{ request('name') }}"
                    >
                    <button class="bg-orange-400 font-semibold px-5 rounded-r-md text-black hover:bg-orange-500">
                        <i class="fa-magnifying-glass fa-solid"></i>
                    </button>
                </div>
                <div>
                    <select name="sort_by" class="bg-white border flex-1 px-4 py-2 rounded-lg w-full"
                        onchange="this.form.submit()">
                        <option value="">Sắp xếp</option>
                        <option value="asc" {{ request('sort_by') == 'asc' ? 'selected' : '' }}>Tên tăng dần</option>
                        <option value="desc" {{ request('sort_by') == 'desc' ? 'selected' : '' }}>Tên giảm dần</option>
                    </select>
                </div>
                <div class="border-black border-l h-6 self-center"></div>
                <a href="{{ route('cate.index') }}" class="bg-white px-4 py-2 rounded-lg self-center">Làm mới</a>
            </div>
        </form>

        <table class="bg-white border border-collapse border-pink-500 mt-3 mx-auto overflow-hidden rounded-lg w-[99%]">
            <thead>
                <tr>
                    <th class="px-3 py-1 text-center">ID</th>
                    <th class="px-3 py-1 text-left">Hình ảnh</th>
                    <th class="px-3 py-1 text-center">Tên thể loại</th>
                    <th class="px-3 py-1 text-center">Đường dẫn</th>
                    <th class="px-3 py-1 text-center">Danh mục cha</th>
                    <th class="px-3 py-1 text-center">Thứ tự</th>
                    <th class="px-3 py-1 text-left">Trạng thái</th>
                    <th class="px-3 py-1 text-left">Hành động</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($cates as $cate)
                    <tr class="border-gray-200 border-t-3 text-center hover:bg-gray-50">
                        <td class="px-1 py-3">{{ $cate->id }}</td>
                        <td class="px-1 py-3 w-[10%]">
                            <img src="{{ $cate->image }}" alt="{{ $cate->slug }}" class="">
                        </td>
                        <td class="px-1 py-3">{{ $cate->name }}</td>
                        <td class="px-1 py-3">{{ $cate->slug }}</td>
                        <td class="px-1 py-3">{{ $cate->parent_id }}</td>
                        <td class="px-1 py-3">{{ $cate->sort_order }}</td>
                        <td class="px-1 py-3">{{ $cate->status }}</td>
                        <td class="align-middle px-1 py-3">
                            <div class="flex flex-nowrap gap-2">
                                <div class="p-3 rounded-lg shadow text-sm hover:bg-gray-100">
                                    <a href="{{ route('cate.edit', $cate->id) }}">
                                        <i class="fa-pen fa-solid"></i><span class="hidden ml-1 xl:inline">Chỉnh sửa</span>
                                    </a>
                                </div>
                                <form action="{{ route('cate.del', $cate->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <div class="p-3 rounded-lg shadow text-red-500 text-sm hover:bg-gray-100">
                                        <button type="submit"><i class="fa-solid fa-trash text-red-600"></i></button>
                                    </div>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="mt-4 ">
            {{ $cates->links() }}
        </div>
    </div>
</x-backend.layout>
