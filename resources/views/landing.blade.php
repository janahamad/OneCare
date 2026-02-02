@extends('layouts.app')

@section('content')
<!-- Hero Section -->
<section class="hero-section py-5 position-relative overflow-hidden" style="background: linear-gradient(135deg, #fefae0 0%, #faedcd 100%); min-height: 80vh; display: flex; align-items: center;">
    <div class="container">
        <div class="row align-items-center g-5">
            <div class="col-lg-6">
                <span class="badge bg-white text-primary px-3 py-2 rounded-pill mb-3 shadow-sm">{{ __('New Era of Wellness') }}</span>
                <h1 class="display-3 fw-bold mb-4" style="color: #2b2d42;">
                    Your Ultimate <span style="color: #d4a373;">Beauty & Care</span> Companion
                </h1>
                <p class="lead mb-5 text-muted">
                    Discover the best salons and wellness experts near you. Book appointments, manage your schedule, and treat yourself to the care you deserve.
                </p>
                <div class="d-flex gap-3">
                    <a href="#explore" class="btn btn-primary btn-lg px-5 py-3 shadow-sm">
                        {{ __('Get Started') }}
                    </a>
                    <a href="#" class="btn btn-outline-dark btn-lg px-5 py-3 rounded-pill">
                        {{ __('Learn More') }}
                    </a>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="position-relative">
                    <div class="bg-primary opacity-10 position-absolute rounded-circle" style="width: 500px; height: 500px; top: -50px; right: -50px; z-index: 0;"></div>
                    <img src="https://images.unsplash.com/photo-1560750588-73207b1ef5b8?auto=format&fit=crop&q=80&w=800" class="img-fluid rounded-4 shadow-lg position-relative" alt="Care Session" style="z-index: 1;">
                    <div class="card border-0 shadow-lg position-absolute p-3 rounded-4 bg-white" style="bottom: -30px; left: -30px; z-index: 2; width: 200px;">
                        <div class="d-flex align-items-center gap-3">
                            <div class="bg-primary-subtle text-primary p-2 rounded-3">
                                <i class="bi bi-star-fill fs-4"></i>
                            </div>
                            <div>
                                <h6 class="mb-0 fw-bold">4.9/5</h6>
                                <p class="small text-muted mb-0">User Rating</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Features Section -->
<section id="explore" class="py-5 my-5">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="fw-bold mb-3">{{ __('Why Choose OneCare?') }}</h2>
            <p class="text-muted mx-auto" style="max-width: 600px;">We bring convenience and quality together to ensure your experience is nothing short of exceptional.</p>
        </div>
        <div class="row g-4">
            <div class="col-md-4">
                <div class="card h-100 border-0 shadow-sm p-4 text-center rounded-4 hover-lift">
                    <div class="bg-primary text-white rounded-circle d-inline-flex mb-4 align-items-center justify-content-center" style="width: 60px; height: 60px;">
                        <i class="bi bi-search fs-4"></i>
                    </div>
                    <h5 class="fw-bold mb-3">{{ __('Easy Discovery') }}</h5>
                    <p class="text-muted">Find the best beauty and wellness providers in your area with our curated list.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card h-100 border-0 shadow-sm p-4 text-center rounded-4 hover-lift">
                    <div class="bg-primary text-white rounded-circle d-inline-flex mb-4 align-items-center justify-content-center" style="width: 60px; height: 60px;">
                        <i class="bi bi-calendar-check fs-4"></i>
                    </div>
                    <h5 class="fw-bold mb-3">{{ __('Instant Booking') }}</h5>
                    <p class="text-muted">Real-time availability and instant confirmation for all your appointments.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card h-100 border-0 shadow-sm p-4 text-center rounded-4 hover-lift">
                    <div class="bg-primary text-white rounded-circle d-inline-flex mb-4 align-items-center justify-content-center" style="width: 60px; height: 60px;">
                        <i class="bi bi-bell-fill fs-4"></i>
                    </div>
                    <h5 class="fw-bold mb-3">{{ __('Smart Reminders') }}</h5>
                    <p class="text-muted">Never miss an appointment with automated SMS and email notifications.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-5 mb-5">
    <div class="container">
        <div class="bg-dark text-white p-5 rounded-5 shadow-lg position-relative overflow-hidden">
            <div class="row align-items-center">
                <div class="col-lg-8">
                    <h2 class="display-5 fw-bold mb-3">{{ __('Are you a Salon Owner?') }}</h2>
                    <p class="lead mb-4 text-white-50">Join hundreds of providers who trust OneCare to grow their business and manage bookings effortlessly.</p>
                    <a href="/admin/register" class="btn btn-primary btn-lg px-5 shadow-sm">{{ __('List Your Business') }}</a>
                </div>
                <div class="col-lg-4 text-center d-none d-lg-block">
                    <i class="bi bi-shop display-1 opacity-25"></i>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('styles')
<style>
    .hover-lift { transition: transform 0.3s ease; }
    .hover-lift:hover { transform: translateY(-10px); }
</style>
@endpush
