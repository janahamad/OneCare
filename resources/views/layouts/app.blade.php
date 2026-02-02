<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'OneCare') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    
    <style>
        :root {
            --primary-color: #d4a373;
            --secondary-color: #faedcd;
            --dark-color: #2b2d42;
            --light-color: #fefae0;
            --accent-color: #ccd5ae;
        }

        body {
            font-family: 'Outfit', sans-serif;
            background-color: #fff;
            color: var(--dark-color);
        }

        .navbar {
            padding: 1rem 0;
            background: rgba(255, 255, 255, 0.8) !important;
            backdrop-filter: blur(10px);
            border-bottom: 1px solid rgba(0,0,0,0.05);
        }

        .navbar-brand {
            font-weight: 700;
            color: var(--primary-color) !important;
            font-size: 1.5rem;
        }

        .btn-primary {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
            padding: 0.6rem 1.5rem;
            border-radius: 50px;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #bc8a5f;
            border-color: #bc8a5f;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(212, 163, 115, 0.3);
        }

        .footer {
            background-color: var(--dark-color);
            color: #fff;
            padding: 4rem 0 2rem;
        }

        .footer a {
            color: rgba(255,255,255,0.7);
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .footer a:hover {
            color: var(--primary-color);
        }
    </style>
    @stack('styles')
</head>
<body>
    <nav class="navbar navbar-expand-lg sticky-top">
        <div class="container">
            <a class="navbar-brand" href="/">
                <i class="bi bi-heart-pulse-fill me-2"></i>OneCare
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto align-items-center">
                    <li class="nav-item">
                        <a class="nav-link px-3" href="#">{{ __('Services') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link px-3" href="#">{{ __('About') }}</a>
                    </li>
                    <li class="nav-item ms-lg-3">
                        <a href="/admin/login" class="btn btn-primary">{{ __('Provider Login') }}</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <main>
        @yield('content')
    </main>

    <footer class="footer">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-4">
                    <h5 class="fw-bold mb-4 text-white">OneCare</h5>
                    <p class="text-white-50">Simplifying beauty and wellness bookings for everyone. Find your favorite services and book instantly.</p>
                </div>
                <div class="col-lg-2">
                    <h6 class="fw-bold mb-4">{{ __('Platform') }}</h6>
                    <ul class="list-unstyled">
                        <li class="mb-2"><a href="#">{{ __('How it works') }}</a></li>
                        <li class="mb-2"><a href="#">{{ __('For Providers') }}</a></li>
                        <li class="mb-2"><a href="#">{{ __('Pricing') }}</a></li>
                    </ul>
                </div>
                <div class="col-lg-2">
                    <h6 class="fw-bold mb-4">{{ __('Company') }}</h6>
                    <ul class="list-unstyled">
                        <li class="mb-2"><a href="#">{{ __('About Us') }}</a></li>
                        <li class="mb-2"><a href="#">{{ __('Contact') }}</a></li>
                        <li class="mb-2"><a href="#">{{ __('Privacy Policy') }}</a></li>
                    </ul>
                </div>
                <div class="col-lg-4">
                    <h6 class="fw-bold mb-4">{{ __('Stay Updated') }}</h6>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Email address">
                        <button class="btn btn-primary" type="button">{{ __('Join') }}</button>
                    </div>
                </div>
            </div>
            <hr class="my-4 opacity-10">
            <div class="text-center text-white-50 small">
                &copy; {{ date('Y') }} OneCare. {{ __('All rights reserved.') }}
            </div>
        </div>
    </footer>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    @stack('scripts')
</body>
</html>
