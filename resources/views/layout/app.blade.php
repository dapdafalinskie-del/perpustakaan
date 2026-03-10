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
    <dialog id="logout-dialog" class="dialog" aria-labelledby="logout-dialog-title" aria-describedby="logout-dialog-description">
        <div>
            <header>
            <h2 id="logout-dialog-title">Keluar dari akun?</h2>
            <p id="logout-dialog-description">Anda akan keluar dari sistem perpustakaan. Pastikan semua pekerjaan sudah disimpan.</p>
            </header>

            <footer class="flex justify-between">
            <button class="btn-outline" onclick="document.getElementById('logout-dialog').close()">Batal</button>
            <a href="{{ route('logout') }}" class="btn-destructive" >Logout</a>
            </footer>
        </div>
    </dialog>
    @include('layout.partials.alert')
    <aside class="sidebar" data-side="left" aria-hidden="false">
        @include('layout.partials.sidebar')
    </aside>

    <main class="px-8 py-5">
        <ol class="text-muted-foreground flex flex-wrap items-center gap-1.5 text-sm break-words sm:gap-2.5">
            <li class="inline-flex items-center gap-1.5">
                <a href="#" class="hover:text-foreground transition-colors">Admin</a>
            </li>
            @yield('breadcrumb')
        </ol>
        <section class="pt-5">
            @yield('content')
        </section>
    </main>

</body>
</html>