@extends('layouts.app')

@section('content')
<div class="provider-profile container my-5">
    <div class="row">
        <!-- Sidebar: Salon Info -->
        <div class="col-lg-4">
            <div class="card border-0 shadow-sm mb-4">
                <div class="card-body text-center">
                    @if($salon->logo)
                        <img src="{{ asset('storage/' . $salon->logo) }}" class="rounded-circle mb-3 border p-1" width="120" alt="{{ $salon->name }}">
                    @else
                        <div class="rounded-circle bg-light d-inline-flex mb-3 align-items-center justify-content-center" style="width: 120px; height: 120px;">
                            <i class="bi bi-shop fs-1 text-muted"></i>
                        </div>
                    @endif
                    <h3 class="h4 fw-bold">{{ $salon->name }}</h3>
                    <p class="text-muted small"><i class="bi bi-geo-alt"></i> {{ $salon->location_city }}, {{ $salon->location_state }}</p>
                    <div class="d-grid">
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#bookingModal">
                            {{ __('Book Now') }}
                        </button>
                    </div>
                </div>
            </div>

            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <h5 class="fw-bold mb-3">{{ __('Working Hours') }}</h5>
                    <ul class="list-unstyled mb-0">
                        @foreach($salon->business_hours ?? [] as $day => $hours)
                        <li class="d-flex justify-content-between mb-2 pb-2 border-bottom">
                            <span class="text-capitalize">{{ $day }}</span>
                            <span class="fw-bold text-primary">{{ $hours['open'] }} - {{ $hours['close'] }}</span>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>

        <!-- Main Content: Gallery & Services -->
        <div class="col-lg-8">
            @if($salon->gallery)
            <div class="gallery-section mb-5">
                <h4 class="fw-bold mb-4">{{ __('Our Space') }}</h4>
                <div class="swiper portfolio-swiper">
                    <div class="swiper-wrapper">
                        @foreach($salon->gallery as $image)
                        <div class="swiper-slide">
                            <img src="{{ asset('storage/' . $image) }}" class="img-fluid rounded-4 shadow-sm" alt="Gallery">
                        </div>
                        @endforeach
                    </div>
                    <div class="swiper-pagination"></div>
                </div>
            </div>
            @endif

            <div class="services-section">
                <h4 class="fw-bold mb-4">{{ __('Services Menu') }}</h4>
                <div class="row g-3">
                    @forelse($salon->services as $service)
                    <div class="col-md-6">
                        <div class="card border-0 shadow-sm h-100 service-card hover-lift">
                            <div class="card-body d-flex justify-content-between align-items-center">
                                <div>
                                    <h6 class="fw-bold mb-1">{{ $service->name }}</h6>
                                    <span class="text-muted small">{{ $service->duration_minutes }} {{ __('min') }}</span>
                                </div>
                                <div class="text-end">
                                    <div class="fw-bold text-primary fs-5">${{ number_format($service->price, 2) }}</div>
                                    <button class="btn btn-sm btn-outline-primary mt-2 select-service" data-id="{{ $service->id }}" data-name="{{ $service->name }}">
                                        {{ __('Select') }}
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    @empty
                    <p class="text-muted">{{ __('No services available yet.') }}</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</div>

@include('partials.booking-modal')
@endsection

@push('styles')
<style>
    .service-card { transition: transform 0.3s ease, box-shadow 0.3s ease; border-radius: 12px; }
    .hover-lift:hover { transform: translateY(-5px); box-shadow: 0 10px 20px rgba(0,0,0,0.05) !important; }
    .text-primary { color: #d4a373 !important; }
    .btn-primary { background-color: #d4a373; border-color: #d4a373; }
    .btn-primary:hover { background-color: #bc8a5f; border-color: #bc8a5f; }
</style>
@endpush
