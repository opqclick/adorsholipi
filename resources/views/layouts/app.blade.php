<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- App CSS (served from public/) -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <nav class="nav">
        <div class="container nav-inner">
            <a class="brand" href="{{ route('home') }}">{{ config('app.name') }}</a>

            <div class="nav-links">
                <a href="{{ route('articles.index') }}">Articles</a>

                @auth
                    <a href="{{ route('admin.articles.index') }}" class="px-3 py-2">Admin Articles</a>
                    <a href="{{ route('articles.create') }}">New Article</a>
                    <form method="POST" action="{{ route('logout') }}" class="inline-form">
                        @csrf
                        <button type="submit" class="link-button">Logout</button>
                    </form>
                @else
                    <a href="{{ route('login') }}">Login</a>
                    <a href="{{ route('register') }}">Register</a>
                @endauth
            </div>
        </div>
    </nav>

    <main class="container main">
        @if (session('success'))
            <div class="flash-success">{{ session('success') }}</div>
        @endif

        @yield('content')
    </main>

    <!-- jQuery (CDN) and app JS (public/) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJ+Y6kVq9rYq3b2b2q8k0s8i3Y9p2a4P6XJmY=" crossorigin="anonymous"></script>
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
