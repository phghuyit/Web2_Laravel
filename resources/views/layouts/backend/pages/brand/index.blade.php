<x-backend.layout>
    <x-slot:title>Sản phẩm</x-slot:title>
    <div class="p-3 xl:p-6">

        <div class="flex items-center justify-between mb-6 mt-1">
            <p class="font-bold text-xl uppercase">quản lý tác giả</p>
            <div>
                <a href="{{ route("brand.create") }}" class="bg-[#059655] capitalize font-semibold px-3 py-1 rounded-lg text-white"><i class="fa-plus fa-solid mr-1"></i>Thêm Tác Giả</a>
                <a href="{{ route("brand.trash") }}" class="bg-red-500 capitalize font-semibold px-3 py-1 rounded-lg text-white"><i class="fa-solid fa-trash mr-1"></i>Thùng rác</a>
            </div>

        </div>

        <form method="GET" action="{{ route('brand.index') }}">
            <div class="flex gap-3">
                <div class="flex flex-3">
                    <input
                        type="text"
                        name="name"
                        placeholder="Search Tên Tác Giả"
                        class="bg-white px-4 py-2 rounded-l-md text-black w-full focus:outline-none"
                        value="{{ request("name") }}"
                    >
                    <button class="bg-orange-400 font-semibold px-5 rounded-r-md text-black hover:bg-orange-500">
                        <i class="fa-magnifying-glass fa-solid"></i>
                    </button>
                </div>
                <div class="">
                    <select name="sort_by" class="bg-white border flex-1 px-4 py-2 rounded-lg w-full" onchange="this.form.submit()">
                        <option value="" >Sắp xếp</option>
                        <option value="asc" {{ request("sort_by")=="asc"?"selected":"" }}>Tên tăng dần</option>
                        <option value="desc" {{ request("sort_by")=="desc"?"selected":"" }}>Tên giảm dần</option>
                    </select>
                </div>
                <div class="border-black border-l h-6 self-center"></div>
                <a href="{{route('brand.index')}}" class="bg-white px-3 px-4 py-1 py-2 rounded-lg self-center">Reset</a>
            </div>
        </form>

        <table class="bg-white border border-collapse border-pink-500 mt-3 mx-auto overflow-hidden rounded-lg w-[99%]">
            <thead>
                <tr>
                    <th class="px-3 py-1 text-center">ID</th>
                    <th class="px-3 py-1 text-left">Image</th>
                    <th class="px-3 py-1 text-center">Tên Tác Giả</th>
                    <th class="px-3 py-1 text-center">Slug</th>
                    <th class="px-3 py-1 text-left">Status</th>
                </tr>
            </thead>
            <tbody >
                @foreach ($brands as $brand)
                    <tr class="border-gray-200 border-t-3 text-center hover:bg-gray-50">
                        <td class="px-1 py-3">{{$brand->id}}</td>
                        <td class="px-1 py-3 w-[10%]"><img src="{{$brand->image}}" alt="{{$brand->slug}}" class=""></td>
                        <td class="px-1 py-3">{{$brand->name}}</td>
                        <td class="px-1 py-3">{{$brand->slug}}</td>
                        <td class="px-1 py-3">{{$brand->status}}</td>
                        <td class="align-middle px-1 py-3">
                            <div class="flex flex-nowrap gap-2">
                                <div class="p-3 rounded-lg shadow text-sm hover:bg-gray-100">
                                    <a href="{{ route("brand.edit",$brand->id) }}" > <i class="fa-pen fa-solid"></i><span class="hidden ml-1 xl:inline">Edit</span></a>
                                </div>
                    <form action="{{ route("brand.del",$brand->id) }}" method="post">
                                        @method('DELETE')
                                        @csrf
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
            {{ $brands->links() }}
        </div>
    </div>
</x-backend.layout>



