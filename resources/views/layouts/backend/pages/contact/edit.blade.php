<x-backend.layout>
    <x-slot:title>Edit Contact</x-slot:title>

    <div class="p-3 xl:p-6">
        <div class="flex flex-col gap-2 mb-6">
            <div class="flex gap-2 items-center text-gray-500 text-sm">
                <a href="{{ route('contact.index') }}" class="transition hover:text-orange-500">
                    <i class="fa-arrow-left fa-solid"></i>
                </a>
                <span>Contact</span>
                <span>/</span>
                <span>Edit Contact</span>
            </div>
            <h1 class="capitalize font-bold text-2xl text-gray-800">Chinh sua lien he</h1>
        </div>

        <form method="POST" action="{{ isset($contact) ? route('contact.update', $contact->id) : route('contact.store') }}" class="bg-white p-5 ring-1 ring-gray-100 rounded-3xl shadow-sm xl:p-7">
            @csrf
            @if (isset($contact))
                @method('PUT')
            @endif

            <div class="space-y-5">
                <div class="gap-5 grid md:grid-cols-2">
                    <div>
                        <label for="name" class="block font-semibold mb-2 text-gray-700 text-sm">Name <span class="text-red-500">*</span></label>
                        <input id="name" name="name" type="text" value="{{ old('name', $contact->name ?? '') }}" class="border border-gray-200 outline-none px-4 py-3 rounded-xl text-gray-700 transition w-full focus:border-orange-400 focus:ring-2 focus:ring-orange-100" placeholder="Enter name">
                    </div>
                    <div>
                        <label for="slug" class="block font-semibold mb-2 text-gray-700 text-sm">Slug</label>
                        <input id="slug" name="slug" type="text" value="{{ old('slug', $contact->slug ?? '') }}" class="border border-gray-200 outline-none px-4 py-3 rounded-xl text-gray-700 transition w-full focus:border-orange-400 focus:ring-2 focus:ring-orange-100" placeholder="enter-contact-slug">
                    </div>
                </div>

                <div class="gap-5 grid md:grid-cols-2">
                    <div>
                        <label for="email" class="block font-semibold mb-2 text-gray-700 text-sm">Email <span class="text-red-500">*</span></label>
                        <input id="email" name="email" type="email" value="{{ old('email', $contact->email ?? '') }}" class="border border-gray-200 outline-none px-4 py-3 rounded-xl text-gray-700 transition w-full focus:border-orange-400 focus:ring-2 focus:ring-orange-100" placeholder="example@gmail.com">
                    </div>
                    <div>
                        <label for="phone" class="block font-semibold mb-2 text-gray-700 text-sm">Phone <span class="text-red-500">*</span></label>
                        <input id="phone" name="phone" type="text" value="{{ old('phone', $contact->phone ?? '') }}" class="border border-gray-200 outline-none px-4 py-3 rounded-xl text-gray-700 transition w-full focus:border-orange-400 focus:ring-2 focus:ring-orange-100" placeholder="0900000000">
                    </div>
                </div>

                <div class="gap-5 grid md:grid-cols-3">
                    <div>
                        <label for="title" class="block font-semibold mb-2 text-gray-700 text-sm">Title</label>
                        <input id="title" name="title" type="text" value="{{ old('title', $contact->title ?? '') }}" class="border border-gray-200 outline-none px-4 py-3 rounded-xl text-gray-700 transition w-full focus:border-orange-400 focus:ring-2 focus:ring-orange-100" placeholder="Contact title">
                    </div>
                    <div>
                        <label for="replay_id" class="block font-semibold mb-2 text-gray-700 text-sm">Replay ID</label>
                        <input id="replay_id" name="replay_id" type="number" value="{{ old('replay_id', $contact->replay_id ?? 0) }}" class="border border-gray-200 outline-none px-4 py-3 rounded-xl text-gray-700 transition w-full focus:border-orange-400 focus:ring-2 focus:ring-orange-100" placeholder="0">
                    </div>
                    <div>
                        <label class="block font-semibold mb-2 text-gray-700 text-sm">Status</label>
                        <label class="cursor-pointer gap-3 inline-flex items-center mt-3">
                            <span class="bg-emerald-500 h-7 inline-flex items-center relative rounded-full w-14">
                                <input type="hidden" name="status" value="0">
                                <input type="checkbox" name="status" value="1" class="peer sr-only" {{ old('status', $contact->status ?? 1) ? 'checked' : '' }}>
                                <span class="absolute bg-white h-5 left-1 rounded-full transition w-5 peer-checked:translate-x-7"></span>
                            </span>
                            <span class="font-medium text-gray-700">Active</span>
                        </label>
                    </div>
                </div>

                <div>
                    <label for="content" class="block font-semibold mb-2 text-gray-700 text-sm">Content <span class="text-red-500">*</span></label>
                    <textarea id="content" name="content" rows="6" class="border border-gray-200 outline-none px-4 py-3 rounded-2xl text-gray-700 transition w-full focus:border-orange-400 focus:ring-2 focus:ring-orange-100" placeholder="Write contact content">{{ old('content', $contact->content ?? '') }}</textarea>
                </div>
            </div>

            <div class="border-gray-100 border-t flex flex-wrap gap-3 items-center mt-8 pt-6">
                <button type="submit" class="bg-orange-400 font-semibold px-6 py-3 rounded-xl text-white transition hover:bg-orange-500">Luu thay doi</button>
                <a href="{{ route('contact.index') }}" class="bg-white border border-gray-200 font-semibold px-6 py-3 rounded-xl text-gray-600 transition hover:bg-gray-50">Huy bo</a>
            </div>
        </form>
    </div>
</x-backend.layout>
