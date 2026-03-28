<x-backend.layout>
    <x-slot:titlle>Danh mục</x-slot:titlle>
    <div class="p-3
    xl:p-6">

        <div class="flex justify-between items-center mt-1 mb-6">
            <p class="text-xl font-bold uppercase">quản lý thể loại sách</p>
            <a href="#" class="rounded-lg py-1 px-3 bg-[#059655] font-semibold capitalize text-white"><i class="fa-solid fa-plus mr-1"></i>Thêm sách</a>
        </div>

        <form method="GET" action="">
            <div class="flex gap-3">
                <div class="flex flex-3">
                    <input
                        type="text"
                        name="name"
                        placeholder="Tìm kiếm thể loại sách"
                        class="w-full px-4 py-2 text-black rounded-l-md focus:outline-none bg-white"
                    >
                    <button class="bg-orange-400 hover:bg-orange-500 px-5 rounded-r-md text-black font-semibold">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </button>
                </div>
                <div class="">
                    <select name="sort_by" class="border bg-white px-4 py-2 rounded-lg flex-1 w-full" onchange="this.form.submit()">
                        <option value="" >Sắp xếp</option>
                        <option value="asc" {{ request("sort_by")=="asc"?"selected":"" }}>Tên tăng dần</option>
                        <option value="desc" {{ request("sort_by")=="desc"?"selected":"" }}>Tên giảm dần</option>
                    </select>
                </div>
                <div class="border-l border-black h-6 self-center"></div>
                <a href="{{ route("cate.index") }}" class="rounded-lg py-1 px-3 bg-white self-center px-4 py-2">Reset</a>
            </div>
        </form>

        <table class="border-collapse bg-white rounded-lg border border-pink-500 overflow-hidden mt-3 mx-auto w-[99%]">
            <thead>
                <tr>
                    <th class="py-1 px-3 text-center">ID</th>
                    <th class="py-1 px-3 text-left">Image</th>
                    <th class="py-1 px-3 text-center">Tên Thể Loại</th>
                    <th class="py-1 px-3 text-center">Slug</th>
                    <th class="py-1 px-3 text-left">Status</th>
                </tr>
            </thead>
            <tbody >
                @foreach ($cates as $cate)
                    <tr class="border-t-3 border-gray-200 hover:bg-gray-50 text-center ">
                        <td class="py-3 px-1">{{$cate->id}}</td>
                        <td class="py-3 px-1 w-[10%]"><img src="{{$cate->image}}" alt="{{$cate->slug}}" class=""></td>
                        <td class="py-3 px-1">{{$cate->name}}</td>
                        <td class="py-3 px-1">{{$cate->slug}}</td>
                        <td class="py-3 px-1">{{$cate->status}}</td>
                        <td class="py-3 px-1 align-middle">
                            <div class="flex flex-nowrap gap-2">
                                <div class="rounded-lg shadow text-sm p-3 hover:bg-gray-100">
                                    <a href="" > <i class="fa-solid fa-pen"></i><span class="hidden ml-1 xl:inline">Edit</span></a>
                                </div>
                                <div class="rounded-lg shadow text-sm p-3 text-red-500 hover:bg-gray-100">
                                    <a href="#" ><i class="fa-solid fa-trash"></i></a>
                                </div>
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
