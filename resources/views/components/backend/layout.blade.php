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

    @include('layouts.backend.partials.header')

    <main class="flex-1">
        {{$slot}}
    </main>

    @include('layouts.backend.partials.footer')  
    {{$footer??""}}
</body>
</html>