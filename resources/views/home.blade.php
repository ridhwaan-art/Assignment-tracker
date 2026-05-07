<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Assignment Tracker</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Laravel Vite -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    
</head>

<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container">

        <a class="navbar-brand" href="#">
            Assignment Tracker
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarNav">

            <span class="navbar-toggler-icon"></span>

        </button>

        <div class="collapse navbar-collapse" id="navbarNav">

            <ul class="navbar-nav ms-auto">

                @if (Route::has('login'))

                    @auth

                        <li class="nav-item">
                            <a href="{{ url('/dashboard') }}" class="nav-link">
                                Dashboard
                            </a>
                        </li>

                    @else

                        <li class="nav-item">
                            <a href="{{ route('login') }}" class="nav-link">
                                Login
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

                @endif

            </ul>

        </div>

    </div>
</nav>

<!-- Hero Section -->
<section class="hero-section">

    <div class="container">

        <h1 class="hero-title">
            Assignment Tracker System
        </h1>

        <p class="hero-text">
            A smart and simple web application that helps students manage
            their assignments efficiently. Students can add assignments,
            edit them anytime, and mark them as Pending or Completed
            to track their academic progress easily.
        </p>

        <div class="mt-4">

            @auth

                <a href="/dashboard" class="btn btn-primary btn-lg btn-custom">
                    Go to Dashboard
                </a>

            @else

                <a href="{{ route('register') }}" class="btn btn-primary btn-lg btn-custom">
                    Get Started
                </a>

                <a href="{{ route('login') }}" class="btn btn-outline-dark btn-lg btn-custom ms-2">
                    Login
                </a>

            @endauth

        </div>

        <!-- Features -->
        <div class="row mt-5">

            <div class="col-md-4 mb-4">

                <div class="card shadow p-4 feature-card h-100">

                    <h3>Add Assignments</h3>

                    <p class="text-muted mt-3">
                        Students can create and store assignment details
                        including title, subject, and due dates.
                    </p>

                </div>

            </div>

            <div class="col-md-4 mb-4">

                <div class="card shadow p-4 feature-card h-100">

                    <h3>Track Progress</h3>

                    <p class="text-muted mt-3">
                        Easily mark assignments as Pending or Completed
                        to monitor academic tasks effectively.
                    </p>

                </div>

            </div>

            <div class="col-md-4 mb-4">

                <div class="card shadow p-4 feature-card h-100">

                    <h3>Edit Anytime</h3>

                    <p class="text-muted mt-3">
                        Update assignment information whenever needed
                        without losing existing records.
                    </p>

                </div>

            </div>

        </div>

    </div>

</section>

<!-- Footer -->
<footer>
    © 2026 Assignment Tracker System
</footer>

</body>
</html>