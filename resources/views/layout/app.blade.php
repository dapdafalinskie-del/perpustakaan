<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    @include('layout.partials.sidebar')
    @include('layout.partials.dialog')
    @include('layout.partials.alert')
    <main class="px-8 py-4">
        <div class="mt-5">
            @yield('content')
        </div>
    </main>
</body>
</html>