<x-backend.layout>
    <x-slot:title>Sản phẩm</x-slot:title>
    <div class="p-3
    xl:p-6">

        <div class="flex justify-between items-center mt-1 mb-6">
            <p class="text-xl font-bold uppercase">Thùng rác sản phẩm</p>
        </div>

        <form method="GET" action="">
            <div class="flex gap-3">
                <div class="flex flex-3">
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
                    <select name="status" class="border bg-white px-4 py-2 rounded-lg flex-1 w-full" onchange="this.form.submit()">
                        <option value="" >Status</option>
                        <option value="0" {{ request("status")=="0"?"selected":" " }}>Ẩn</option>
                        <option value="1" {{ request("status")=="1"?"selected":" " }}>Hiện</option>
                    </select>
                </div>
                <div class="border-l border-black h-6 self-center"></div>
                <div class="">
                    <select name="sort_by" class="border bg-white px-4 py-2 rounded-lg flex-1 w-full" onchange="this.form.submit()">
                        <option value="" >Sắp xếp</option>
                        <option value="name_asc" {{ request("sort_by")=="name_asc"?"selected":" " }}>Tên tăng dần</option>
                        <option value="name_desc" {{ request("sort_by")=="name_desc"?"selected":" " }}>Tên giảm dần</option>
                    </select>
                </div>
                <a href="{{route('product.trash')}}" class="rounded-lg py-1 px-3 bg-white self-center px-4 py-2">Reset</a>
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
                    @forelse ($products as $product)
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
                                        <a href="" > <i class="fa-solid fa-arrows-rotate"></i><span class="hidden ml-1 xl:inline">Khôi phục</span></a>
                                    </div>
                                    <div class="rounded-lg shadow text-sm p-3 text-red-500 hover:bg-gray-100">
                                        <a href="#" ><i class="fa-solid fa-trash"></i></a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td class="text-center p-6" colspan="9">Danh sách sản phẩm trong thùng rác trống</td>
                        </tr>

                    @endforelse
                </tbody>
            </table>
        </div>
        </div>


        <div class="mt-4 ">
            {{ $products->links() }}
        </div>
    </div>
</x-backend.layout>




