<x-frontend.layout>
    <x-slot:title>
        Hồ sơ cá nhân
    </x-slot:title>

    @php
        // Safely fallback to Auth::user() in case the variable wasn't directly passed from the controller
        $currentUser = $user ?? Auth::user();
    @endphp

    <div class="flex-1 flex flex-col items-center my-12 justify-center px-4">
        <div class="border border-[#d5d9d9] bg-white p-8 rounded-lg w-full max-w-2xl shadow-sm">
            <h1 class="font-semibold text-3xl mb-6 uppercase border-b border-[#d5d9d9] pb-4">Hồ sơ cá nhân</h1>

            <div class="flex items-center space-x-6 mb-8">
                <div class="w-24 h-24 rounded-full overflow-hidden border border-gray-300 flex-shrink-0">
                    @if ($currentUser?->image)
                        <img src="{{ asset('images/user/' . $currentUser->image) }}" alt="Avatar"
                            class="w-full h-full object-cover">
                    @else
                        <div class="w-full h-full bg-gray-200 flex items-center justify-center text-gray-500">
                            <i class="fa-solid fa-user text-4xl"></i>
                        </div>
                    @endif
                </div>
                <div>
                    <h2 class="text-2xl font-bold">{{ $currentUser?->name }}</h2>
                    <p class="text-gray-600">{{ $currentUser?->username ? '@' . $currentUser->username : '' }}</p>
                </div>
            </div>

            <div class="space-y-4 text-base">
                <div class="flex border-b border-gray-100 pb-3">
                    <div class="w-1/3 text-gray-500 font-medium">Email</div>
                    <div class="w-2/3 text-[#111]">{{ $currentUser?->email }}</div>
                </div>
                <div class="flex border-b border-gray-100 pb-3">
                    <div class="w-1/3 text-gray-500 font-medium">Số điện thoại</div>
                    <div class="w-2/3 text-[#111]">{{ $currentUser?->phone ?? 'Chưa cập nhật' }}</div>
                </div>
                <div class="flex border-b border-gray-100 pb-3">
                    <div class="w-1/3 text-gray-500 font-medium">Địa chỉ</div>
                    <div class="w-2/3 text-[#111]">{{ $currentUser?->address ?? 'Chưa cập nhật' }}</div>
                </div>
            </div>

            <div class="mt-8 flex justify-end">
                <a href="#"
                    class="bg-[#ffd814] hover:bg-[#f7ca00] border border-[#fcd200] rounded-2xl px-6 py-2 text-base shadow font-medium cursor-pointer transition-colors">
                    Sửa hồ sơ
                </a>
            </div>
        </div>
    </div>
</x-frontend.layout>
