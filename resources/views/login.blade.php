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
                <h2>Login to your account</h2>
                <p>Enter your details below to login to your account</p>
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
                    <label>Password</label>
                    <input type="password" name="password" @error('password') aria-invalid="true" @enderror>
                    @error('password')
                        <p class="text-destructive text-sm">{{ $message }}</p>
                    @enderror
                </div>
                <footer class="flex flex-col items-center gap-2">
                    <button type="submit" class="btn w-full">Login</button>
                    {{-- <p class="mt-4 text-center text-sm">Don't have an account? <a href="#" class="underline-offset-4 hover:underline">Sign up</a></p> --}}
                </footer>
                </form>
            </section>
        </div>
    </div>
</body>
</html>