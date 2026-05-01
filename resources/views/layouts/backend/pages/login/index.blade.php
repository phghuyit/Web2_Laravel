<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Đăng nhập Quản trị</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="flex h-screen flex-col bg-gray-50 font-sans">

    <header class="w-full text-white">
        <div class="bg-[#131921] p-4">
            <div class="w-full text-center text-3xl font-bold tracking-wide">
                <a href="{{ route('admin.dashboard') }}">amaz<span class="text-orange-400">in</span></a>
            </div>
        </div>
    </header>

    <main class="flex flex-1 items-center justify-center p-4">
        <div class="w-full max-w-sm rounded-xl border border-gray-100 bg-white p-8 shadow-sm">
            <div class="mb-8 text-center">
                <h2 class="text-2xl font-semibold text-gray-800">Đăng nhập Quản trị</h2>
                <p class="mt-2 text-sm text-gray-500">Đăng nhập để truy cập bảng điều khiển</p>
            </div>

            @if (session('error'))
                <div class="mb-6 rounded-lg border border-red-100 bg-red-50 px-4 py-3 text-center text-sm text-red-600">
                    {{ session('error') }}
                </div>
            @endif

            <form action="{{ route('admin.doLogin') }}" method="POST">
                @csrf
                <div class="mb-5">
                    <label for="username" class="mb-2 block text-sm font-medium text-gray-600">Địa chỉ Email</label>
                    <input type="email" name="email"  required
                        class="w-full rounded-lg border border-gray-200 bg-gray-50 px-4 py-2 transition-colors focus:bg-white focus:outline-none focus:ring-2 focus:ring-orange-500"
                        placeholder="admin@example.com" value="{{ old('username') }}">
                </div>

                <div class="mb-8">
                    <label for="password" class="mb-2 block text-sm font-medium text-gray-600">Mật khẩu</label>
                    <input type="password" name="password" required
                        class="w-full rounded-lg border border-gray-200 bg-gray-50 px-4 py-2 transition-colors focus:bg-white focus:outline-none focus:ring-2 focus:ring-orange-500"
                        placeholder="••••••••">
                </div>

                <button type="submit"
                    class="w-full rounded-lg bg-orange-500 px-4 py-2.5 font-medium text-white transition-all duration-200 hover:bg-orange-600 focus:outline-none focus:ring-4 focus:ring-orange-300">
                    Đăng nhập
                </button>
            </form>
        </div>
    </main>
</body>

</html>
