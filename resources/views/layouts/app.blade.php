<!DOCTYPE html>
@php
    $locale = session('locale', 'en');
    $dir = $locale === 'ar' ? 'rtl' : 'ltr';
@endphp
<html lang="{{ $locale }}" dir="{{ $dir }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>OneCare</title>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Libre+Baskerville:ital,wght@0,400;0,700;1,400&family=Noto+Naskh+Arabic:wght@400..700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    @if($dir === 'rtl')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.rtl.min.css" integrity="sha384-dpuaG1suuz0wyg/+m2m3iim07jMMoP6hPFGatcuVTCUoQLSziVWSfxeM6V5vaBa9" crossorigin="anonymous">
    @endif
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    
    <style>
        :root {
            --primary: #9676ff;
            --bg-main: #F1EFEC;
            --bg-card: #EFEFEF;
            --accent: #ADB2D4;
            --dark: #1a1a1a;
            --text-muted: #6c757d;
        }

        body {
            font-family: @if($locale === 'ar') 'Noto Naskh Arabic' @else 'Libre Baskerville' @endif, serif;
            background-color: var(--bg-main);
            color: var(--dark);
            overflow-x: hidden;
        }

        h1, h2, h3, h4, h5, h6 {
            font-weight: 700;
        }

        .navbar {
            background-color: transparent;
            padding: 1.5rem 0;
            transition: all 0.3s ease;
        }

        .navbar-brand img {
            height: 60px;
        }

        .nav-link {
            color: var(--dark) !important;
            font-size: 1.1rem;
            margin: 0 1rem;
            opacity: 0.8;
            transition: opacity 0.3s;
        }

        .nav-link:hover {
            opacity: 1;
            color: var(--primary) !important;
        }

        .btn-premium {
            background-color: var(--primary);
            color: white !important;
            border-radius: 0;
            padding: 0.8rem 2.5rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
            border: none;
            transition: all 0.3s;
        }

        .btn-premium:hover {
            background-color: #7a54ff;
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(150, 118, 255, 0.2);
        }

        .footer {
            background-color: var(--bg-card);
            padding: 5rem 0 2rem;
            border-top: 1px solid var(--accent);
        }

        /* RTL Adjustments */
        @if($dir === 'rtl')
        .ms-auto { margin-right: auto !important; margin-left: 0 !important; }
        .text-end { text-align: left !important; }
        .text-start { text-align: right !important; }
        @endif
    </style>
    @stack('styles')
</head>
<body>
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="/">
                <img src="{{ asset('images/logo.jpeg') }}" alt="OneCare">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav @if($dir === 'ltr') ms-auto @else me-auto @endif align-items-center">
                    <li class="nav-item">
                        <a class="nav-link" href="#">{{ $locale === 'ar' ? 'الخدمات' : 'Services' }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">{{ $locale === 'ar' ? 'من نحن' : 'About' }}</a>
                    </li>
                    <li class="nav-item">
                        @if($locale === 'en')
                        <a class="nav-link fw-bold" href="/lang/ar">العربية</a>
                        @else
                        <a class="nav-link fw-bold" href="/lang/en">English</a>
                        @endif
                    </li>

                    @guest
                        <li class="nav-item @if($dir === 'ltr') ms-lg-3 @else me-lg-3 @endif">
                            <a href="{{ route('login') }}" class="nav-link fw-bold">{{ $locale === 'ar' ? 'تسجيل الدخول' : 'Sign In' }}</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('register') }}" class="btn btn-premium">{{ $locale === 'ar' ? 'سجل الآن' : 'Sign Up' }}</a>
                        </li>
                    @else
                        <li class="nav-item dropdown @if($dir === 'ltr') ms-lg-3 @else me-lg-3 @endif">
                            <a class="nav-link dropdown-toggle fw-bold" href="#" role="button" data-bs-toggle="dropdown">
                                {{ Auth::user()->name }}
                            </a>
                            <ul class="dropdown-menu border-0 shadow-sm dropdown-menu-end" style="background-color: var(--bg-card);">
                                <li>
                                    <form action="{{ route('logout') }}" method="POST">
                                        @csrf
                                        <button type="submit" class="dropdown-item @if($dir === 'ar') text-end @endif">
                                            {{ $locale === 'ar' ? 'تسجيل الخروج' : 'Logout' }}
                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @endguest

                    <li class="nav-item border-start @if($dir === 'ltr') ps-lg-3 ms-lg-3 @else pe-lg-3 me-lg-3 @endif">
                        <a href="/admin/login" class="nav-link small text-muted">{{ $locale === 'ar' ? 'دخول الشركاء' : 'Provider Login' }}</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <main>
        @yield('content')
    </main>

    <footer class="footer mt-5">
        <div class="container text-center">
            <img src="{{ asset('images/logo.jpeg') }}" alt="OneCare" class="mb-4" style="height: 30px; opacity: 0.7;">
            <p class="text-muted mb-4 mx-auto" style="max-width: 600px;">
                {{ $locale === 'ar' ? 'تبسيط حجوزات الجمال والعافية للجميع. ابحث عن خدماتك المفضلة واحجز فوراً.' : 'Simplifying beauty and wellness bookings for everyone. Find your favorite services and book instantly.' }}
            </p>
            <div class="d-flex justify-content-center gap-4 mb-5">
                <a href="#" class="text-dark fs-4"><i class="bi bi-instagram"></i></a>
                <a href="#" class="text-dark fs-4"><i class="bi bi-twitter-x"></i></a>
                <a href="#" class="text-dark fs-4"><i class="bi bi-facebook"></i></a>
            </div>
            <hr class="opacity-10 mb-4">
            <div class="text-muted small">
                &copy; {{ date('Y') }} OneCare. {{ $locale === 'ar' ? 'جميع الحقوق محفوظة.' : 'All rights reserved.' }}
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    @stack('scripts')
</body>
</html>
