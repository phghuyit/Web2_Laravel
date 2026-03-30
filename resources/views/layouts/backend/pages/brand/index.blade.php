<x-backend.layout>
    <x-slot:title>Sản phẩm</x-slot:title>
    <div class="p-3
    xl:p-6">

        <div class="flex justify-between items-center mt-1 mb-6">
            <p class="text-xl font-bold uppercase">quản lý tác giả</p>
            <div>
                <a href="{{ route("brand.create") }}" class="rounded-lg py-1 px-3 bg-[#059655] font-semibold capitalize text-white"><i class="fa-solid fa-plus mr-1"></i>Thêm Tác Giả</a>
                <a href="{{ route("brand.trash") }}" class="rounded-lg py-1 px-3 bg-red-500 font-semibold capitalize text-white"><i class="fa-solid fa-trash mr-1"></i>Thùng rác</a>
            </div>

        </div>

        <form method="GET" action="">
            <div class="flex gap-3">
                <div class="flex flex-3">
                    <input
                        type="text"
                        name="name"
                        placeholder="Search Tên Tác Giả"
                        class="w-full px-4 py-2 text-black rounded-l-md focus:outline-none bg-white"
                        value="{{ request("name") }}"
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
                <a href="{{route('brand.index')}}" class="rounded-lg py-1 px-3 bg-white self-center px-4 py-2">Reset</a>
            </div>
        </form>

        <table class="border-collapse bg-white rounded-lg border border-pink-500 overflow-hidden mt-3 mx-auto w-[99%]">
            <thead>
                <tr>
                    <th class="py-1 px-3 text-center">ID</th>
                    <th class="py-1 px-3 text-left">Image</th>
                    <th class="py-1 px-3 text-center">Tên Tác Giả</th>
                    <th class="py-1 px-3 text-center">Slug</th>
                    <th class="py-1 px-3 text-left">Status</th>
                </tr>
            </thead>
            <tbody >
                @foreach ($brands as $brand)
                    <tr class="border-t-3 border-gray-200 hover:bg-gray-50 text-center ">
                        <td class="py-3 px-1">{{$brand->id}}</td>
                        <td class="py-3 px-1 w-[10%]"><img src="{{$brand->image}}" alt="{{$brand->slug}}" class=""></td>
                        <td class="py-3 px-1">{{$brand->name}}</td>
                        <td class="py-3 px-1">{{$brand->slug}}</td>
                        <td class="py-3 px-1">{{$brand->status}}</td>
                        <td class="py-3 px-1 align-middle">
                            <div class="flex flex-nowrap gap-2">
                                <div class="rounded-lg shadow text-sm p-3 hover:bg-gray-100">
                                    <a href="{{ route("brand.edit",$brand->id) }}" > <i class="fa-solid fa-pen"></i><span class="hidden ml-1 xl:inline">Edit</span></a>
                                </div>
                                <form action="{{ route("brand.destroy",$brand->id) }}" method="post">
                                        @method('DELETE')
                                        @csrf
                                        <div class="rounded-lg shadow text-sm p-3 text-red-500 hover:bg-gray-100">
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
            {{ $brands->links() }}
        </div>
    </div>
</x-backend.layout>




