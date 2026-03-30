<x-backend.layout>
    <x-slot:title>Create Contact</x-slot:title>

    <div class="p-3 xl:p-6">
        <div class="mb-6 flex flex-col gap-2">
            <div class="flex items-center gap-2 text-sm text-gray-500">
                <a href="{{ route('contact.index') }}" class="transition hover:text-orange-500">
                    <i class="fa-solid fa-arrow-left"></i>
                </a>
                <span>Contact</span>
                <span>/</span>
                <span>Create Contact</span>
            </div>
            <h1 class="text-2xl font-bold capitalize text-gray-800">Them lien he moi</h1>
        </div>

        <form method="POST" action="{{ route('contact.store') }}" class="rounded-3xl bg-white p-5 shadow-sm ring-1 ring-gray-100 xl:p-7">
            @csrf

            <div class="space-y-5">
                <div class="grid gap-5 md:grid-cols-2">
                    <div>
                        <label for="name" class="mb-2 block text-sm font-semibold text-gray-700">Name <span class="text-red-500">*</span></label>
                        <input id="name" name="name" type="text" value="{{ old('name') }}" class="w-full rounded-xl border border-gray-200 px-4 py-3 text-gray-700 outline-none transition focus:border-orange-400 focus:ring-2 focus:ring-orange-100" placeholder="Enter name">
                    </div>
                    <div>
                        <label for="slug" class="mb-2 block text-sm font-semibold text-gray-700">Slug</label>
                        <input id="slug" name="slug" type="text" value="{{ old('slug') }}" class="w-full rounded-xl border border-gray-200 px-4 py-3 text-gray-700 outline-none transition focus:border-orange-400 focus:ring-2 focus:ring-orange-100" placeholder="enter-contact-slug">
                    </div>
                </div>

                <div class="grid gap-5 md:grid-cols-2">
                    <div>
                        <label for="email" class="mb-2 block text-sm font-semibold text-gray-700">Email <span class="text-red-500">*</span></label>
                        <input id="email" name="email" type="email" value="{{ old('email') }}" class="w-full rounded-xl border border-gray-200 px-4 py-3 text-gray-700 outline-none transition focus:border-orange-400 focus:ring-2 focus:ring-orange-100" placeholder="example@gmail.com">
                    </div>
                    <div>
                        <label for="phone" class="mb-2 block text-sm font-semibold text-gray-700">Phone <span class="text-red-500">*</span></label>
                        <input id="phone" name="phone" type="text" value="{{ old('phone') }}" class="w-full rounded-xl border border-gray-200 px-4 py-3 text-gray-700 outline-none transition focus:border-orange-400 focus:ring-2 focus:ring-orange-100" placeholder="0900000000">
                    </div>
                </div>

                <div class="grid gap-5 md:grid-cols-3">
                    <div>
                        <label for="title" class="mb-2 block text-sm font-semibold text-gray-700">Title</label>
                        <input id="title" name="title" type="text" value="{{ old('title') }}" class="w-full rounded-xl border border-gray-200 px-4 py-3 text-gray-700 outline-none transition focus:border-orange-400 focus:ring-2 focus:ring-orange-100" placeholder="Contact title">
                    </div>
                    <div>
                        <label for="replay_id" class="mb-2 block text-sm font-semibold text-gray-700">Replay ID</label>
                        <input id="replay_id" name="replay_id" type="number" value="{{ old('replay_id', 0) }}" class="w-full rounded-xl border border-gray-200 px-4 py-3 text-gray-700 outline-none transition focus:border-orange-400 focus:ring-2 focus:ring-orange-100" placeholder="0">
                    </div>
                    <div>
                        <label class="mb-2 block text-sm font-semibold text-gray-700">Status</label>
                        <label class="mt-3 inline-flex cursor-pointer items-center gap-3">
                            <span class="relative inline-flex h-7 w-14 items-center rounded-full bg-emerald-500">
                                <input type="hidden" name="status" value="0">
                                <input type="checkbox" name="status" value="1" class="peer sr-only" {{ old('status', 1) ? 'checked' : '' }}>
                                <span class="absolute left-1 h-5 w-5 rounded-full bg-white transition peer-checked:translate-x-7"></span>
                            </span>
                            <span class="font-medium text-gray-700">Active</span>
                        </label>
                    </div>
                </div>

                <div>
                    <label for="content" class="mb-2 block text-sm font-semibold text-gray-700">Content <span class="text-red-500">*</span></label>
                    <textarea id="content" name="content" rows="6" class="w-full rounded-2xl border border-gray-200 px-4 py-3 text-gray-700 outline-none transition focus:border-orange-400 focus:ring-2 focus:ring-orange-100" placeholder="Write contact content">{{ old('content') }}</textarea>
                </div>
            </div>

            <div class="mt-8 flex flex-wrap items-center gap-3 border-t border-gray-100 pt-6">
                <button type="submit" class="rounded-xl bg-orange-400 px-6 py-3 font-semibold text-white transition hover:bg-orange-500 capitalize">Them moi lien he</button>
                <a href="{{ route('contact.index') }}" class="rounded-xl border border-gray-200 bg-white px-6 py-3 font-semibold text-gray-600 transition hover:bg-gray-50">Huy bo</a>
            </div>
        </form>
    </div>
</x-backend.layout>
