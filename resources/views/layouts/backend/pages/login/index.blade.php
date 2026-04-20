<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập Quản trị</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-50 h-screen flex flex-col font-sans">

    <header class="text-white w-full">
        <div class="bg-[#131921] p-4">
            <div class="font-bold text-3xl tracking-wide text-center w-full">
                <a href="{{ route('admin.dashboard') }}">amaz<span class="text-orange-400">in</span></a>
            </div>
        </div>
    </header>

    <main class="flex-1 flex items-center justify-center p-4">
        <div class="bg-white p-8 rounded-xl shadow-sm border border-gray-100 w-full max-w-sm">
            <div class="text-center mb-8">
                <h2 class="text-2xl font-semibold text-gray-800">Đăng nhập Quản trị</h2>
                <p class="text-sm text-gray-500 mt-2">Đăng nhập để truy cập bảng điều khiển</p>
            </div>

            @if (session('error'))
                <div class="bg-red-50 text-red-600 px-4 py-3 rounded-lg mb-6 text-sm border border-red-100 text-center">
                    {{ session('error') }}
                </div>
            @endif

            <form action="{{ route('admin.dologin') }}" method="POST">
                @csrf
                <div class="mb-5">
                    <label for="username" class="block text-gray-600 text-sm font-medium mb-2">Địa chỉ Email</label>
                    <input type="email" name="username" id="username" required
                        class="w-full px-4 py-2 bg-gray-50 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500 focus:bg-white transition-colors"
                        placeholder="admin@example.com" value="{{ old('username') }}">
                </div>

                <div class="mb-8">
                    <label for="password" class="block text-gray-600 text-sm font-medium mb-2">Mật khẩu</label>
                    <input type="password" name="password" id="password" required
                        class="w-full px-4 py-2 bg-gray-50 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500 focus:bg-white transition-colors"
                        placeholder="••••••••">
                </div>

                <button type="submit"
                    class="w-full bg-orange-500 text-white font-medium py-2.5 px-4 rounded-lg hover:bg-orange-600 focus:outline-none focus:ring-4 focus:ring-orange-300 transition-all duration-200">
                    Đăng nhập
                </button>
            </form>
        </div>
    </main>
</body>

</html>
