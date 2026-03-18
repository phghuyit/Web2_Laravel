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

    @include('')

    <main class="flex-1">
        <div class="grid grid-cols-[25%_1fr] ">
            <x-backend.partials.sidebar/>
            <div class="bg-gray-200">
                {{$slot}}
                <x-backend.partials.footer/>
            </div>
        </div>
    </main>
    {{$footer??""}}
</body>
</html>