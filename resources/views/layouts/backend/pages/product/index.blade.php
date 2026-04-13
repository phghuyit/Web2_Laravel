<x-backend.layout>
    <x-slot:title>Sản phẩm</x-slot:title>
    <div class="p-3 xl:p-6">

        <div class="flex items-center justify-between mb-6 mt-1">
            <p class="font-bold text-xl uppercase">quản lý sản phẩm</p>
            <div>
                <a href="{{ route("product.create") }}" class="bg-[#059655] capitalize font-semibold px-3 py-1 rounded-lg text-white"><i class="fa-plus fa-solid mr-1"></i>Thêm sách</a>
                <a href="{{ route("product.trash") }}" class="bg-red-500 capitalize font-semibold px-3 py-1 rounded-lg text-white"><i class="fa-solid fa-trash mr-1"></i>Thùng rác</a>
            </div>

        </div>

        <form method="GET" action="">
            <div class="flex gap-3">
                <div class="flex flex-2 lg:flex-3">
                    <input
                        type="text"
                        name="name"
                        placeholder="Search Kindle eBooks"
                        class="bg-white px-4 py-2 rounded-l-md text-black w-full focus:outline-none"
                        value="{{ request("name") }}"
                    >
                    <button class="bg-orange-400 font-semibold px-5 rounded-r-md text-black hover:bg-orange-500">
                        <i class="fa-magnifying-glass fa-solid"></i>
                    </button>
                </div>

                <div class="flex-1">
                    <select name="brand_id" class="bg-white border px-4 py-2 rounded-lg w-full" onchange="this.form.submit()">
                        <option value="" class="text-sm">Tác giả: All</option>
                            @foreach ($brands as $brand)
                                <option value="{{ $brand->id }}" class="text-sm" {{request('brand_id')==$brand->id?'selected':''}}>{{ $brand->name }}</option >
                            @endforeach
                    </select>
                </div>
                <div class="flex-1">
                    <select name="cat_id" class="bg-white border flex-1 px-4 py-2 rounded-lg w-full" onchange="this.form.submit()">
                        <option value="" >Thể loại: All</option>
                        @foreach ($cats as $cat)
                            <option value="{{ $cat->id }}" class="text-sm" {{request('cat_id')==$cat->id?'selected':''}}>{{ $cat->name }} {{request('cat_id')==$cat->id?'selected':''}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="border-black border-l h-6 self-center"></div>
                <div class="flex-1">
                    <select name="sort_by" class="bg-white border flex-1 px-4 py-2 rounded-lg w-full" onchange="this.form.submit()">
                        <option value="" >Sắp xếp</option>
                        <option value="name_asc" {{ request("sort_by")=="name_asc"?"selected":" " }}>Tên tăng dần</option>
                        <option value="name_desc"  {{ request("sort_by")=="name_desc"?"selected":" " }}>Tên giảm dần</option>
                        <option value="price_asc"  {{ request("sort_by")=="price_asc"?"selected":" " }}>Giá tăng dần</option>
                        <option value="price_desc"  {{ request("sort_by")=="price_desc"?"selected":" " }}>Giá giảm dần</option>
                    </select>
                </div>
                <a href="{{route('product.index')}}" class="bg-white px-3 px-4 py-1 py-2 rounded-lg self-center">Reset</a>
            </div>
        </form>
        <div class="flex-auto">
            <div class="overflow-x-auto">
            <table class="bg-white border-collapse mt-3 rounded-lg">
                <thead>
                    <tr>
                        <th class="px-3 py-1 text-center">ID</th>
                        <th colspan="2" class="px-3 py-1 text-center">Tên Sách</th>
                        <th class="px-3 py-1 text-left whitespace-nowrap">Tác giả</th>
                        <th class="px-3 py-1 text-left whitespace-nowrap">Thể loại</th>
                        <th class="px-3 py-1 text-right">Giá</th>
                        <th class="px-3 py-1 text-center whitespace-nowrap">Số lượng</th>
                        <th class="px-3 py-1 text-center whitespace-nowrap">Trạng thái</th>
                        <th class="px-3 py-1 text-center">Chỉnh sửa</th>
                    </tr>
                </thead>
                <tbody >
                    @foreach ($products as $product)
                        <tr class="border-gray-200 border-t text-center hover:bg-gray-50">
                            <td class="px-1 py-3">{{$product->id}}</td>
                            <td class="px-1 py-3 w-[10%]"><img src="{{$product->image}}" alt="{{$product->name}}" class=""></td>
                            <td class="px-1 py-3">{{$product->name}}</td>
                            <td class="px-1 py-3">{{$product->brand->name}}</td>
                            <td class="px-1 py-3">{{$product->category->name}}</td>
                            <td class="px-1 py-3">{{number_format($product->price_buy)}}đ</td>
                            <td class="px-1 py-3">{{$product->qty}}</td>
                            <td class="px-1 py-3">{{$product->status}}</td>
                            <td class="align-middle px-1 py-3">
                                <div class="flex flex-nowrap gap-2">
                                    <div class="p-3 rounded-lg shadow text-sm hover:bg-gray-100">
                                        <a href="{{ route("product.edit",$product->id) }}" > <i class="fa-pen fa-solid"></i><span class="hidden ml-1 xl:inline">Edit</span></a>
                                    </div>
                                    <form action="{{ route("admin.product.del",$product->id) }}" method="post">
                                        @method('DELETE')
                                        @csrf
                                        <div class="p-3 rounded-lg shadow text-red-500 text-sm hover:bg-gray-100">
                                            <button type="submit"><i class="fa-solid fa-trash text-red-600"></i></button>
                                        </div>
                                    </form>

                                    <a href="{{ route('product.show',$product->id) }}"
                                    class="p-3 rounded-lg shadow text-red-500 text-sm hover:bg-gray-100">
                                    <i class="fa-solid fa-eye text-yellow-600"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        </div>


        <div class="mt-4 ">
            {{ $products->links() }}
        </div>
    </div>
</x-backend.layout>




