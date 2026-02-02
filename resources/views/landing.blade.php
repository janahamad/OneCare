@extends('layouts.app')

@php
    $locale = session('locale', 'en');
@endphp

@section('content')
<!-- Hero Section -->
<section class="hero-section position-relative vh-100 d-flex align-items-center overflow-hidden">
    <!-- Background Image -->
    <div class="position-absolute top-0 start-0 w-100 h-100" style="z-index: -1;">
        <img src="{{ asset('images/hero-image.png') }}" alt="Hero" class="w-100 h-100 object-fit-cover" style="filter: brightness(0.85);">
        <div class="position-absolute top-0 start-0 w-100 h-100" style="background: linear-gradient(90deg, rgba(241, 239, 236, 0.9) 0%, rgba(241, 239, 236, 0.5) 50%, rgba(241, 239, 236, 0) 100%);"></div>
    </div>

    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-7 @if($locale === 'ar') text-end @endif">
                <span class="text-uppercase tracking-wider mb-3 d-block" style="color: var(--primary); font-weight: 600; letter-spacing: 3px;">
                    {{ $locale === 'ar' ? 'عهد جديد من الرعاية' : 'A New Era of Care' }}
                </span>
                <h1 class="display-2 mb-4">
                    @if($locale === 'ar')
                        رفيقك الأمثل <br><span style="color: var(--primary);">للجمال والعناية</span>
                    @else
                        Your Ultimate <br><span style="color: var(--primary);">Beauty & Care</span> Companion
                    @else
                    @endif
                </h1>
                <p class="lead mb-5 text-dark-50" style="max-width: 550px; font-style: italic;">
                    {{ $locale === 'ar' ? 'اكتشف أفضل الصالونات وخبراء الصحة بالقرب منك. احجز مواعيدك، وامنح نفسك العناية التي تستحقها.' : 'Discover the best salons and wellness experts near you. Book appointments, and treat yourself to the care you deserve.' }}
                </p>
                <div class="d-flex gap-3 @if($locale === 'ar') justify-content-start flex-row-reverse @endif">
                    <a href="#services" class="btn btn-premium btn-lg">
                        {{ $locale === 'ar' ? 'ابدأ الآن' : 'Get Started' }}
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Services Section -->
<section id="services" class="py-5" style="background-color: var(--bg-main);">
    <div class="container py-5">
        <div class="row mb-5 align-items-end">
            <div class="col-md-6 @if($locale === 'ar') text-end @endif">
                <h2 class="display-4">{{ $locale === 'ar' ? 'خِدْمَاتُنَا' : 'Our Services' }}</h2>
                <div class="bg-primary mt-3" style="height: 4px; width: 60px; @if($locale === 'ar') float: right; @endif"></div>
            </div>
            <div class="col-md-6 text-md-end @if($locale === 'ar') text-md-start @endif">
                <p class="text-muted italic mb-0">
                    {{ $locale === 'ar' ? 'نقدم لك تجربة استثنائية من خلال خبراء عالميين.' : 'Experience excellence through our world-class professionals.' }}
                </p>
            </div>
        </div>

        <div class="row g-5">
            <!-- Service 1: Hair -->
            <div class="col-md-6">
                <div class="card border-0 bg-transparent overflow-hidden group">
                    <div class="position-relative mb-4 overflow-hidden" style="height: 400px;">
                        <img src="{{ asset('images/service-hair.jpg') }}" alt="Hair Services" class="w-100 h-100 object-fit-cover transition-transform" style="transition: transform 0.8s ease;">
                    </div>
                    <div class="@if($locale === 'ar') text-end @endif">
                        <h3 class="h4 mb-2">{{ $locale === 'ar' ? 'خدمات الشعر' : 'Hair Artistry' }}</h3>
                        <p class="text-muted">{{ $locale === 'ar' ? 'من القصات الكلاسيكية إلى أحدث صيحات الموضة.' : 'From classic cuts to high-fashion coloring and styling.' }}</p>
                        <a href="#" class="text-dark text-decoration-none fw-bold border-bottom border-dark pb-1">
                            {{ $locale === 'ar' ? 'استكشف المزيد' : 'Explore' }}
                        </a>
                    </div>
                </div>
            </div>

            <!-- Service 2: Skincare -->
            <div class="col-md-6">
                <div class="card border-0 bg-transparent overflow-hidden group">
                    <div class="position-relative mb-4 overflow-hidden" style="height: 400px;">
                        <img src="{{ asset('images/service-skincare.jpg') }}" alt="Skincare" class="w-100 h-100 object-fit-cover transition-transform" style="transition: transform 0.8s ease;">
                    </div>
                    <div class="@if($locale === 'ar') text-end @endif">
                        <h3 class="h4 mb-2">{{ $locale === 'ar' ? 'العناية بالبشرة' : 'Skin Renaissance' }}</h3>
                        <p class="text-muted">{{ $locale === 'ar' ? 'استعادة نضارة بشرتك بأحدث التقنيات.' : 'Rejuvenate your natural glow with advanced facial treatments.' }}</p>
                        <a href="#" class="text-dark text-decoration-none fw-bold border-bottom border-dark pb-1">
                            {{ $locale === 'ar' ? 'استكشف المزيد' : 'Explore' }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Luxury Quote Section -->
<section class="py-5" style="background-color: var(--bg-card);">
    <div class="container py-5 text-center">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <i class="bi bi-quote display-1" style="color: var(--accent); opacity: 0.3;"></i>
                <h2 class="display-5 italic mb-4">
                    {{ $locale === 'ar' ? '"الجمال لا يتعلق بالمظهر، بل يتعلق بالشعور الذي يمنحه لك."' : '"Beauty is not in the face; beauty is a light in the heart."' }}
                </h2>
                <p class="text-uppercase tracking-wider" style="color: var(--primary); font-weight: 600;">Khalil Gibran</p>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-5">
    <div class="container py-5">
        <div class="p-5 text-center" style="background-color: var(--accent); border-radius: 2px;">
            <h2 class="display-4 mb-4 text-white">{{ $locale === 'ar' ? 'هل أنت صاحب صالون؟' : 'Are you a Salon Owner?' }}</h2>
            <p class="lead mb-5 text-white-50 mx-auto" style="max-width: 600px;">
                {{ $locale === 'ar' ? 'انضم إلى منصتنا وقم بإدارة حجوزاتك بسهولة واحترافية.' : 'Join our premium platform and manage your bookings with ease and professionalism.' }}
            </p>
            <a href="/admin/register" class="btn btn-light btn-lg px-5 py-3 rounded-0 fw-bold" style="color: var(--primary);">
                {{ $locale === 'ar' ? 'سجل عملك اليوم' : 'Register Your Business' }}
            </a>
        </div>
    </div>
</section>
@endsection

@push('styles')
<style>
    .group:hover img {
        transform: scale(1.05);
    }
    .italic {
        font-style: italic;
    }
    .tracking-wider {
        letter-spacing: 0.1em;
    }
</style>
@endpush
