<x-backend.layout>
    <x-slot:title>Menu</x-slot:title>

    <div class="p-3 xl:p-6">
        <div class="flex justify-between items-center mt-1 mb-6">
            <p class="text-xl font-bold uppercase">quan ly menu</p>
            <div>
                <a href="{{ route('menu.create') }}" class="rounded-lg py-1 px-3 bg-[#059655] font-semibold capitalize text-white"><i class="fa-solid fa-plus mr-1"></i>Them menu</a>
                <a href="{{ route('menu.trash') }}" class="rounded-lg py-1 px-3 bg-red-500 font-semibold capitalize text-white"><i class="fa-solid fa-trash mr-1"></i>Thung rac</a>
            </div>
        </div>

        <form method="GET" action="">
            <div class="flex gap-3">
                <div class="flex flex-3">
                    <input type="text" name="name" placeholder="Tim kiem menu" class="w-full px-4 py-2 text-black rounded-l-md focus:outline-none bg-white" value="{{ request('name') }}">
                    <button class="bg-orange-400 hover:bg-orange-500 px-5 rounded-r-md text-black font-semibold"><i class="fa-solid fa-magnifying-glass"></i></button>
                </div>
                <div>
                    <select name="sort_by" class="border bg-white px-4 py-2 rounded-lg flex-1 w-full" onchange="this.form.submit()">
                        <option value="">Sap xep</option>
                        <option value="asc" {{ request('sort_by') == 'asc' ? 'selected' : '' }}>Ten tang dan</option>
                        <option value="desc" {{ request('sort_by') == 'desc' ? 'selected' : '' }}>Ten giam dan</option>
                    </select>
                </div>
                <div class="border-l border-black h-6 self-center"></div>
                <a href="{{ route('menu.index') }}" class="rounded-lg py-1 px-3 bg-white self-center px-4 py-2">Reset</a>
            </div>
        </form>

        <table class="border-collapse bg-white rounded-lg border border-pink-500 overflow-hidden mt-3 mx-auto w-[99%]">
            <thead>
                <tr>
                    <th class="py-1 px-3 text-center">ID</th>
                    <th class="py-1 px-3 text-center">Name</th>
                    <th class="py-1 px-3 text-center">Link</th>
                    <th class="py-1 px-3 text-center">Table ID</th>
                    <th class="py-1 px-3 text-center">Type</th>
                    <th class="py-1 px-3 text-center">Status</th>
                    <th class="py-1 px-3 text-left">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($menus as $menu)
                    <tr class="border-t-3 border-gray-200 hover:bg-gray-50 text-center">
                        <td class="py-3 px-1">{{ $menu->id }}</td>
                        <td class="py-3 px-1">{{ $menu->name }}</td>
                        <td class="py-3 px-1">{{ $menu->link }}</td>
                        <td class="py-3 px-1">{{ $menu->table_id }}</td>
                        <td class="py-3 px-1">{{ $menu->type }}</td>
                        <td class="py-3 px-1">{{ $menu->status }}</td>
                        <td class="py-3 px-1 align-middle">
                            <div class="flex flex-nowrap gap-2">
                                <div class="rounded-lg shadow text-sm p-3 hover:bg-gray-100"><a href="{{ route('menu.edit', $menu->id) }}"><i class="fa-solid fa-pen"></i><span class="hidden ml-1 xl:inline">Edit</span></a></div>
                                <form action="{{ route('menu.destroy', $menu->id) }}" method="post">@method('DELETE') @csrf<div class="rounded-lg shadow text-sm p-3 text-red-500 hover:bg-gray-100"><button type="submit"><i class="fa-solid fa-trash text-red-600"></i></button></div></form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="mt-4">{{ $menus->links() }}</div>
    </div>
</x-backend.layout>
