<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$title??"Amazin-Admin"}}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    {{$header??""}}
</head>
<body class="flex flex-col min-h-screen">
    <div class="grid grid-cols-[30%_1fr] transition-all duration-300
    lg:grid-cols-[25%_1fr]
    xl:grid-cols-[15%_1fr] ">
        @include('layouts.backend.partials.sidebar')
        <div class="bg-gray-200">
            @include('layouts.backend.partials.header')
            <main class="flex-1">
                {{$slot}}
            </main>
        </div>
    </div>
    {{$footer??""}}
</body>
</html>
