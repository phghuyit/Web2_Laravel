<x-backend.layout>
    <x-slot:title>Thùng rác danh mục</x-slot:title>

    <div class="p-3 xl:p-6">
        <div class="flex flex-col gap-2 mb-6">
            <div class="flex gap-2 items-center text-gray-500 text-sm">
                <a href="{{ route('cate.index') }}" class="transition hover:text-orange-500">
                    <i class="fa-arrow-left fa-solid"></i>
                </a>
                <span>Danh mục</span>
                <span>/</span>
                <span>Thùng rác danh mục</span>
            </div>
            <div class="flex items-center justify-between mt-1">
                <p class="font-bold text-xl uppercase">Thùng rác danh mục</p>
            </div>
        </div>

        <form method="GET" action="{{ route('cate.trash') }}">
            <div class="flex gap-3">
                <div class="flex flex-3">
                    <input type="text" name="name" placeholder="Tìm kiếm danh mục"
                        class="bg-white px-4 py-2 rounded-l-md text-black w-full focus:outline-none"
                        value="{{ request('name') }}">
                    <button class="bg-orange-400 font-semibold px-5 rounded-r-md text-black hover:bg-orange-500">
                        <i class="fa-magnifying-glass fa-solid"></i>
                    </button>
                </div>

                <div class="">
                    <select name="sort_by" class="bg-white border flex-1 px-4 py-2 rounded-lg w-full"
                        onchange="this.form.submit()">
                        <option value="">Sắp xếp</option>
                        <option value="asc" {{ request('sort_by') == 'asc' ? 'selected' : '' }}>Tên tăng dần</option>
                        <option value="desc" {{ request('sort_by') == 'desc' ? 'selected' : '' }}>Tên giảm dần
                        </option>
                    </select>
                </div>
                <div class="border-black border-l h-6 self-center"></div>
                <a href="{{ route('cate.trash') }}" class="bg-white px-4 py-2 rounded-lg self-center">Làm mới</a>
            </div>
        </form>

        <table class="bg-white border border-collapse border-pink-500 mt-3 mx-auto overflow-hidden rounded-lg w-[99%]">
            <thead>
                <tr>
                    <th class="px-3 py-1 text-center">ID</th>
                    <th class="px-3 py-1 text-left">Hình ảnh</th>
                    <th class="px-3 py-1 text-center">Tên Thể Loại</th>
                    <th class="px-3 py-1 text-center">Đường dẫn</th>
                    <th class="px-3 py-1 text-center whitespace-nowrap">Ngày xóa</th>
                    <th class="px-3 py-1 text-left">Hành động</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($cates as $cate)
                    <tr class="border-gray-200 border-t-3 text-center hover:bg-gray-50">
                        <td class="px-1 py-3">{{ $cate->id }}</td>
                        <td class="px-1 py-3 w-[10%]"><img src="{{ $cate->image }}" alt="{{ $cate->slug }}"
                                class=""></td>
                        <td class="px-1 py-3">{{ $cate->name }}</td>
                        <td class="px-1 py-3">{{ $cate->slug }}</td>
                        <td class="px-1 py-3">{{ $cate->deleted_at }}</td>
                        <td class="align-middle px-1 py-3">
                            <div class="flex flex-nowrap gap-2">
                                <div class="p-3 rounded-lg shadow text-sm hover:bg-gray-100">
                                    <form action="{{ route('cate.restore', $cate->id) }}" method="POST">
                                        @csrf @method('PUT')<button type="submit"><i
                                                class="fa-arrows-rotate fa-solid"></i><span
                                                class="hidden ml-1 xl:inline">Khôi phục</span></button></form>
                                </div>
                                <div class="p-3 rounded-lg shadow text-red-500 text-sm hover:bg-gray-100">
                                    <form action="{{ route('cate.destroy', $cate->id) }}" method="POST">
                                        @csrf @method('DELETE')<button type="submit"><i
                                                class="fa-solid fa-trash"></i></button></form>
                                </div>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td class="p-6 text-center" colspan="6">Danh sách danh mục trong thùng rác rỗng</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        <div class="mt-4 ">
            {{ $cates->links() }}
        </div>
    </div>
</x-backend.layout>
