<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>
    <link rel="stylesheet" href="{{ asset('build/assets/app-Di_Ej0Db.css') }}">
    {{-- @vite(['resources/sass/app.scss', 'resources/js/app.js']) --}}
</head>

<body class="">

    @if (Route::has('login'))
        <nav class="navbar navbar-expand-lg bg-body-tertiary" data-bs-theme="dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">SITE</a>
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    @auth
                        <li class="nav-item">
                            <a href="{{ url('/dashboard') }}" class="nav-link active">
                                Dashboard
                            </a>
                        </li>
                    @else
                        <li class="nav-item">
                            <a href="{{ route('login') }}" class="nav-link">
                                Log in
                            </a>
                        </li>
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a href="{{ route('register') }}" class="nav-link">
                                    Register
                                </a>
                            </li>
                        @endif
                    @endauth
                </ul>
            </div>
        </nav>
    @endif


    <main class="mt-6">

    </main>

    <footer class="py-16 text-center text-sm text-black dark:text-white/70">
        Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})
    </footer>

    <script src="{{ asset('build/assets/app-BOiV9JCO.js') }}"></script>
</body>

</html>
