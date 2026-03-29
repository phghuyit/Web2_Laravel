<x-backend.layout>
    <x-slot:title>Sản phẩm</x-slot:title>
    <div class="p-3
    xl:p-6">

        <div class="flex justify-between items-center mt-1 mb-6">
            <p class="text-xl font-bold uppercase">quản lý sản phẩm</p>
            <div>
                <a href="#" class="rounded-lg py-1 px-3 bg-[#059655] font-semibold capitalize text-white"><i class="fa-solid fa-plus mr-1"></i>Thêm sách</a>
                <a href="{{ route("product.trash") }}" class="rounded-lg py-1 px-3 bg-red-500 font-semibold capitalize text-white"><i class="fa-solid fa-trash mr-1"></i>Thùng rác</a>
            </div>

        </div>

        <form method="GET" action="">
            <div class="flex gap-3">
                <div class="flex flex-2 lg:flex-3">
                    <input
                        type="text"
                        name="name"
                        placeholder="Search Kindle eBooks"
                        class="w-full px-4 py-2 text-black rounded-l-md focus:outline-none bg-white"
                    >
                    <button class="bg-orange-400 hover:bg-orange-500 px-5 rounded-r-md text-black font-semibold">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </button>
                </div>

                <div class="flex-1">
                    <select name="brand_id" class="border bg-white px-4 py-2 rounded-lg w-full" onchange="this.form.submit()">
                        <option value="" class="text-sm">Tác giả: All</option>
                            @foreach ($brands as $brand)
                                <option value="{{ $brand->id }}" class="text-sm" {{request('brand_id')==$brand->id?'selected':''}}>{{ $brand->name }}</option >
                            @endforeach
                    </select>
                </div>
                <div class="flex-1">
                    <select name="cat_id" class="border bg-white px-4 py-2 rounded-lg flex-1 w-full" onchange="this.form.submit()">
                        <option value="" >Thể loại: All</option>
                        @foreach ($cats as $cat)
                            <option value="{{ $cat->id }}" class="text-sm" {{request('cat_id')==$cat->id?'selected':''}}>{{ $cat->name }} {{request('cat_id')==$cat->id?'selected':''}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="border-l border-black h-6 self-center"></div>
                <div class="flex-1">
                    <select name="sort_by" class="border bg-white px-4 py-2 rounded-lg flex-1 w-full" onchange="this.form.submit()">
                        <option value="" >Sắp xếp</option>
                        <option value="name_asc" {{ request("sort_by")=="name_asc"?"selected":" " }}>Tên tăng dần</option>
                        <option value="name_desc"  {{ request("sort_by")=="name_desc"?"selected":" " }}>Tên giảm dần</option>
                        <option value="price_asc"  {{ request("sort_by")=="price_asc"?"selected":" " }}>Giá tăng dần</option>
                        <option value="price_desc"  {{ request("sort_by")=="price_desc"?"selected":" " }}>Giá giảm dần</option>
                    </select>
                </div>
                <a href="{{route('product.index')}}" class="rounded-lg py-1 px-3 bg-white self-center px-4 py-2">Reset</a>
            </div>
        </form>
        <div class="flex-auto">
            <div class="overflow-x-auto">
            <table class="border-collapse bg-white rounded-lg  mt-3">
                <thead>
                    <tr>
                        <th class="py-1 px-3 text-center">ID</th>
                        <th colspan="2" class="py-1 px-3 text-center">Tên Sách</th>
                        <th class="py-1 px-3 text-left whitespace-nowrap">Tác giả</th>
                        <th class="py-1 px-3 text-left whitespace-nowrap">Thể loại</th>
                        <th class="py-1 px-3 text-right">Giá</th>
                        <th class="py-1 px-3 text-center whitespace-nowrap">Số lượng</th>
                        <th class="py-1 px-3 text-center whitespace-nowrap">Trạng thái</th>
                        <th class="py-1 px-3 text-center">Chỉnh sửa</th>
                    </tr>
                </thead>
                <tbody >
                    @foreach ($products as $product)
                        <tr class="border-t border-gray-200 hover:bg-gray-50 text-center ">
                            <td class="py-3 px-1">{{$product->id}}</td>
                            <td class="py-3 px-1 w-[10%]"><img src="{{$product->image}}" alt="{{$product->name}}" class=""></td>
                            <td class="py-3 px-1">{{$product->name}}</td>
                            <td class="py-3 px-1">{{$product->brand->name}}</td>
                            <td class="py-3 px-1">{{$product->category->name}}</td>
                            <td class="py-3 px-1">{{number_format($product->price_buy)}}đ</td>
                            <td class="py-3 px-1">{{$product->qty}}</td>
                            <td class="py-3 px-1">{{$product->status}}</td>
                            <td class="py-3 px-1 align-middle">
                                <div class="flex flex-nowrap gap-2">
                                    <div class="rounded-lg shadow text-sm p-3 hover:bg-gray-100">
                                        <a href="{{ route("product.edit",$product->id) }}" > <i class="fa-solid fa-pen"></i><span class="hidden ml-1 xl:inline">Edit</span></a>
                                    </div>
                                    <div class="rounded-lg shadow text-sm p-3 text-red-500 hover:bg-gray-100">
                                        <a href="{{ route("product.destroy",$product->id) }}" ><i class="fa-solid fa-trash"></i></a>
                                    </div>
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




