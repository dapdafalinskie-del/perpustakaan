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
    <div class="min-h-screen flex">
        @include('layout.partials.alert')
        <div class="card w-124 m-auto">
            <header>
                <h2>Masuk ke Sistem</h2>
                <p>Masukkan email dan kata sandi untuk mengakses sistem perpustakaan.</p>
            </header>

            <section>
                <form method="POST" action="{{ route('login.attempt') }}" class="form grid gap-6">
                @csrf

                <div class="grid gap-2">
                    <label>Email</label>
                    <input type="email" name="email" value="{{ old('email') }}" @error('email') aria-invalid="true" @enderror>
                    @error('email')
                    <p class="text-destructive text-sm">{{ $message }}</p>
                    @enderror
                </div>

                <div class="grid gap-2">
                    <label>Kata Sandi</label>
                    <input type="password" name="password" @error('password') aria-invalid="true" @enderror>
                    @error('password')
                    <p class="text-destructive text-sm">{{ $message }}</p>
                    @enderror
                </div>

                <footer class="flex flex-col items-center gap-2">
                    <button type="submit" class="btn w-full">Masuk</button>
                </footer>

                </form>
            </section>
        </div>
    </div>
</body>
</html>