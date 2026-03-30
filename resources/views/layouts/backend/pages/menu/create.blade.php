<x-backend.layout>
    <x-slot:title>Create Menu</x-slot:title>
    <div class="p-3 xl:p-6">
        <div class="mb-6 flex flex-col gap-2">
            <div class="flex items-center gap-2 text-sm text-gray-500"><a href="{{ route('menu.index') }}" class="transition hover:text-orange-500"><i class="fa-solid fa-arrow-left"></i></a><span>Menu</span><span>/</span><span>Create Menu</span></div>
            <h1 class="text-2xl font-bold capitalize text-gray-800">Them menu moi</h1>
        </div>
        <form method="POST" action="{{ route('menu.store') }}" class="rounded-3xl bg-white p-5 shadow-sm ring-1 ring-gray-100 xl:p-7">@csrf
            <div class="space-y-5">
                <div class="grid gap-5 md:grid-cols-2">
                    <div><label for="name" class="mb-2 block text-sm font-semibold text-gray-700">Name</label><input id="name" name="name" type="text" value="{{ old('name') }}" class="w-full rounded-xl border border-gray-200 px-4 py-3 text-gray-700 outline-none transition focus:border-orange-400 focus:ring-2 focus:ring-orange-100"></div>
                    <div><label for="link" class="mb-2 block text-sm font-semibold text-gray-700">Link</label><input id="link" name="link" type="text" value="{{ old('link') }}" class="w-full rounded-xl border border-gray-200 px-4 py-3 text-gray-700 outline-none transition focus:border-orange-400 focus:ring-2 focus:ring-orange-100"></div>
                </div>
                <div class="grid gap-5 md:grid-cols-3">
                    <div><label for="table_id" class="mb-2 block text-sm font-semibold text-gray-700">Table ID</label><input id="table_id" name="table_id" type="number" value="{{ old('table_id') }}" class="w-full rounded-xl border border-gray-200 px-4 py-3 text-gray-700 outline-none transition focus:border-orange-400 focus:ring-2 focus:ring-orange-100"></div>
                    <div><label for="type" class="mb-2 block text-sm font-semibold text-gray-700">Type</label><select id="type" name="type" class="w-full rounded-xl border border-gray-200 bg-white px-4 py-3 text-gray-700 outline-none transition focus:border-orange-400 focus:ring-2 focus:ring-orange-100"><option value="category">Category</option><option value="brand">Brand</option><option value="topic">Topic</option><option value="page">Page</option><option value="custom" selected>Custom</option></select></div>
                    <div><label class="mb-2 block text-sm font-semibold text-gray-700">Status</label><label class="mt-3 inline-flex cursor-pointer items-center gap-3"><span class="relative inline-flex h-7 w-14 items-center rounded-full bg-emerald-500"><input type="hidden" name="status" value="0"><input type="checkbox" name="status" value="1" class="peer sr-only" {{ old('status', 1) ? 'checked' : '' }}><span class="absolute left-1 h-5 w-5 rounded-full bg-white transition peer-checked:translate-x-7"></span></span><span class="font-medium text-gray-700">Active</span></label></div>
                </div>
            </div>
            <div class="mt-8 flex flex-wrap items-center gap-3 border-t border-gray-100 pt-6"><button type="submit" class="rounded-xl bg-orange-400 px-6 py-3 font-semibold text-white transition hover:bg-orange-500">Them moi menu</button><a href="{{ route('menu.index') }}" class="rounded-xl border border-gray-200 bg-white px-6 py-3 font-semibold text-gray-600 transition hover:bg-gray-50">Huy bo</a></div>
        </form>
    </div>
</x-backend.layout>
