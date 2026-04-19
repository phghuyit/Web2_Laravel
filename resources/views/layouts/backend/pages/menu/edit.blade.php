<x-backend.layout>
    <x-slot:title>Edit Menu</x-slot:title>
    <div class="p-3 xl:p-6">
        <div class="flex flex-col gap-2 mb-6">
            <div class="flex gap-2 items-center text-gray-500 text-sm"><a href="{{ route('menu.index') }}" class="transition hover:text-orange-500"><i class="fa-arrow-left fa-solid"></i></a><span>Menu</span><span>/</span><span>Edit Menu</span></div>
            <h1 class="capitalize font-bold text-2xl text-gray-800">Chinh sua menu</h1>
        </div>
<form method="POST" action="{{ isset($menu) ? route('menu.update', $menu->id) : route('menu.store') }}" class="bg-white p-5 ring-1 ring-gray-100 rounded-3xl shadow-sm xl:p-7">@csrf @if (isset($menu)) @method('PUT') @endif
            <div class="space-y-5">
                <div class="gap-5 grid md:grid-cols-2">
                    <div><label for="name" class="block font-semibold mb-2 text-gray-700 text-sm">Name</label><input id="name" name="name" type="text" value="{{ old('name', $menu->name ?? '') }}" class="border border-gray-200 outline-none px-4 py-3 rounded-xl text-gray-700 transition w-full focus:border-orange-400 focus:ring-2 focus:ring-orange-100"></div>
                    <div><label for="link" class="block font-semibold mb-2 text-gray-700 text-sm">Link</label><input id="link" name="link" type="text" value="{{ old('link', $menu->link ?? '') }}" class="border border-gray-200 outline-none px-4 py-3 rounded-xl text-gray-700 transition w-full focus:border-orange-400 focus:ring-2 focus:ring-orange-100"></div>
                </div>
                <div class="gap-5 grid md:grid-cols-3">
                    <div><label for="table_id" class="block font-semibold mb-2 text-gray-700 text-sm">Table ID</label><input id="table_id" name="table_id" type="number" value="{{ old('table_id', $menu->table_id ?? '') }}" class="border border-gray-200 outline-none px-4 py-3 rounded-xl text-gray-700 transition w-full focus:border-orange-400 focus:ring-2 focus:ring-orange-100"></div>
                    <div><label for="type" class="block font-semibold mb-2 text-gray-700 text-sm">Type</label><select id="type" name="type" class="bg-white border border-gray-200 outline-none px-4 py-3 rounded-xl text-gray-700 transition w-full focus:border-orange-400 focus:ring-2 focus:ring-orange-100"><option value="category" {{ old('type', $menu->type ?? '') == 'category' ? 'selected' : '' }}>Category</option><option value="brand" {{ old('type', $menu->type ?? '') == 'brand' ? 'selected' : '' }}>Brand</option><option value="topic" {{ old('type', $menu->type ?? '') == 'topic' ? 'selected' : '' }}>Topic</option><option value="page" {{ old('type', $menu->type ?? '') == 'page' ? 'selected' : '' }}>Page</option><option value="custom" {{ old('type', $menu->type ?? 'custom') == 'custom' ? 'selected' : '' }}>Custom</option></select></div>
                    <div><label class="block font-semibold mb-2 text-gray-700 text-sm">Status</label><label class="cursor-pointer gap-3 inline-flex items-center mt-3"><span class="bg-emerald-500 h-7 inline-flex items-center relative rounded-full w-14"><input type="hidden" name="status" value="0"><input type="checkbox" name="status" value="1" class="peer sr-only" {{ old('status', $menu->status ?? 1) ? 'checked' : '' }}><span class="absolute bg-white h-5 left-1 rounded-full transition w-5 peer-checked:translate-x-7"></span></span><span class="font-medium text-gray-700">Active</span></label></div>
                </div>
            </div>
            <div class="border-gray-100 border-t flex flex-wrap gap-3 items-center mt-8 pt-6"><button type="submit" class="bg-orange-400 font-semibold px-6 py-3 rounded-xl text-white transition hover:bg-orange-500">Luu thay doi</button><a href="{{ route('menu.index') }}" class="bg-white border border-gray-200 font-semibold px-6 py-3 rounded-xl text-gray-600 transition hover:bg-gray-50">Huy bo</a></div>
        </form>
    </div>
</x-backend.layout>
