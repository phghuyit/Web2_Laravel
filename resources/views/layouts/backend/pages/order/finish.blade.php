<x-backend.layout>
    <x-slot:title>Đơn Hàng Đã Hoàn Thành</x-slot:title>
    <div class="p-3 xl:p-6">
        <div class="flex items-center justify-between mb-6 mt-1">
            <p class="font-bold text-xl uppercase">Đơn Hàng Đã Hoàn Thành</p>
            <div>
                <a href="{{ route('order.index') }}"
                    class="bg-blue-500 capitalize font-semibold px-3 py-1 rounded-lg text-white">
                    <i class="fa-solid fa-arrow-left mr-1"></i>Quay lại
                </a>
            </div>
        </div>

        <form method="GET" action="{{ route('order.finish') }}">
            <div class="flex gap-3">
                <div class="flex flex-3">
                    <input type="text" name="name" placeholder="Tìm kiếm đơn hàng"
                        class="bg-white px-4 py-2 rounded-l-md text-black w-full focus:outline-none"
                        value="{{ request('name') }}">
                    <button class="bg-orange-400 font-semibold px-5 rounded-r-md text-black hover:bg-orange-500">
                        <i class="fa-magnifying-glass fa-solid"></i>
                    </button>
                </div>
                <div>
                    <select name="sort_by" class="bg-white border flex-1 px-4 py-2 rounded-lg w-full"
                        onchange="this.form.submit()">
                        <option value="">Sắp xếp</option>
                        <option value="asc" {{ request('sort_by') == 'asc' ? 'selected' : '' }}>Tên tăng dần</option>
                        <option value="desc" {{ request('sort_by') == 'desc' ? 'selected' : '' }}>Tên giảm dần
                        </option>
                    </select>
                </div>
                <div class="border-black border-l h-6 self-center"></div>
                <a href="{{ route('order.finish') }}"
                    class="bg-white px-3 px-4 py-1 py-2 rounded-lg self-center">Reset</a>
            </div>
        </form>

        @if ($orders->isEmpty())
            <div class="bg-yellow-100 border border-yellow-400 text-yellow-700 px-4 py-3 rounded relative mt-4"
                role="alert">
                <strong class="font-bold">Thông báo!</strong>
                <span class="block sm:inline">Hiện tại không có đơn hàng nào đã hoàn thành.</span>
            </div>
        @else
            <table
                class="bg-white border border-collapse border-pink-500 mt-3 mx-auto overflow-hidden rounded-lg w-[99%]">
                <thead>
                    <tr>
                        <th class="px-3 py-1 text-center">ID</th>
                        <th class="px-3 py-1 text-center">User ID</th>
                        <th class="px-3 py-1 text-center">Name</th>
                        <th class="px-3 py-1 text-center">Phone</th>
                        <th class="px-3 py-1 text-center">Email</th>
                        <th class="px-3 py-1 text-center">Address</th>
                        <th class="px-3 py-1 text-center">Status</th>
                        <th class="px-3 py-1 text-left">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $order)
                        <tr class="border-gray-200 border-t-3 text-center hover:bg-gray-50">
                            <td class="px-1 py-3">{{ $order->id }}</td>
                            <td class="px-1 py-3">{{ $order->user_id }}</td>
                            <td class="px-1 py-3">{{ $order->name }}</td>
                            <td class="px-1 py-3">{{ $order->phone }}</td>
                            <td class="px-1 py-3">{{ $order->email }}</td>
                            <td class="px-1 py-3">{{ $order->address }}</td>
                            <td class="px-1 py-3">{{ $order->status }}</td>
                            <td class="align-middle px-1 py-3">
                                <div class="flex flex-nowrap gap-2">
                                    <div class="p-3 rounded-lg shadow text-sm hover:bg-gray-100">
                                        <a href="{{ route('order.edit', $order->id) }}"><i
                                                class="fa-pen fa-solid"></i><span
                                                class="hidden ml-1 xl:inline">Edit</span></a>
                                    </div>
                                    <form action="{{ route('order.del', $order->id) }}" method="post">
                                        @method('DELETE') @csrf
                                        <div class="p-3 rounded-lg shadow text-red-500 text-sm hover:bg-gray-100">
                                            <button type="submit"><i
                                                    class="fa-solid fa-trash text-red-600"></i></button>
                                        </div>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="mt-4">{{ $orders->links() }}</div>
        @endif
    </div>
</x-backend.layout>
