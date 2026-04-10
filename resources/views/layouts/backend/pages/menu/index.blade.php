<x-backend.layout>
    <x-slot:title>Menu</x-slot:title>

    <div class="p-3 xl:p-6">
        <div class="flex items-center justify-between mb-6 mt-1">
            <p class="font-bold text-xl uppercase">quan ly menu</p>
            <div>
                <a href="{{ route('menu.create') }}" class="bg-[#059655] capitalize font-semibold px-3 py-1 rounded-lg text-white"><i class="fa-plus fa-solid mr-1"></i>Them menu</a>
                <a href="{{ route('menu.trash') }}" class="bg-red-500 capitalize font-semibold px-3 py-1 rounded-lg text-white"><i class="fa-solid fa-trash mr-1"></i>Thung rac</a>
            </div>
        </div>

        <form method="GET" action="">
            <div class="flex gap-3">
                <div class="flex flex-3">
                    <input type="text" name="name" placeholder="Tim kiem menu" class="bg-white px-4 py-2 rounded-l-md text-black w-full focus:outline-none" value="{{ request('name') }}">
                    <button class="bg-orange-400 font-semibold px-5 rounded-r-md text-black hover:bg-orange-500"><i class="fa-magnifying-glass fa-solid"></i></button>
                </div>
                <div>
                    <select name="sort_by" class="bg-white border flex-1 px-4 py-2 rounded-lg w-full" onchange="this.form.submit()">
                        <option value="">Sap xep</option>
                        <option value="asc" {{ request('sort_by') == 'asc' ? 'selected' : '' }}>Ten tang dan</option>
                        <option value="desc" {{ request('sort_by') == 'desc' ? 'selected' : '' }}>Ten giam dan</option>
                    </select>
                </div>
                <div class="border-black border-l h-6 self-center"></div>
                <a href="{{ route('menu.index') }}" class="bg-white px-3 px-4 py-1 py-2 rounded-lg self-center">Reset</a>
            </div>
        </form>

        <table class="bg-white border border-collapse border-pink-500 mt-3 mx-auto overflow-hidden rounded-lg w-[99%]">
            <thead>
                <tr>
                    <th class="px-3 py-1 text-center">ID</th>
                    <th class="px-3 py-1 text-center">Name</th>
                    <th class="px-3 py-1 text-center">Link</th>
                    <th class="px-3 py-1 text-center">Table ID</th>
                    <th class="px-3 py-1 text-center">Type</th>
                    <th class="px-3 py-1 text-center">Status</th>
                    <th class="px-3 py-1 text-left">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($menus as $menu)
                    <tr class="border-gray-200 border-t-3 text-center hover:bg-gray-50">
                        <td class="px-1 py-3">{{ $menu->id }}</td>
                        <td class="px-1 py-3">{{ $menu->name }}</td>
                        <td class="px-1 py-3">{{ $menu->link }}</td>
                        <td class="px-1 py-3">{{ $menu->table_id }}</td>
                        <td class="px-1 py-3">{{ $menu->type }}</td>
                        <td class="px-1 py-3">{{ $menu->status }}</td>
                        <td class="align-middle px-1 py-3">
                            <div class="flex flex-nowrap gap-2">
                                <div class="p-3 rounded-lg shadow text-sm hover:bg-gray-100"><a href="{{ route('menu.edit', $menu->id) }}"><i class="fa-pen fa-solid"></i><span class="hidden ml-1 xl:inline">Edit</span></a></div>
                                <form action="{{ route('menu.destroy', $menu->id) }}" method="post">@method('DELETE') @csrf<div class="p-3 rounded-lg shadow text-red-500 text-sm hover:bg-gray-100"><button type="submit"><i class="fa-solid fa-trash text-red-600"></i></button></div></form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="mt-4">{{ $menus->links() }}</div>
    </div>
</x-backend.layout>
