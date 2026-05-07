<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Assignment Tracker</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <div class="page-wrapper">

        @if (Route::has('login'))
            <header class="site-header">
                <nav class="main-nav">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="nav-button">
                            Dashboard
                        </a>
                    @else
                        <a href="{{ route('login') }}" class="nav-link">
                            Log in
                        </a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="nav-button">
                                Register
                            </a>
                        @endif
                    @endauth
                </nav>
            </header>
        @endif

        <main class="hero-section">
            <div class="hero-content">
                <h1>Assignment Tracker</h1>
                <p>Your homepage content here for unregistered accounts.</p>
            </div>
        </main>

    </div>
</body>
</html>