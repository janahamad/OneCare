<div class="provider-profile container my-5">
    <div class="row">
        <!-- Sidebar: Provider Info -->
        <div class="col-lg-4">
            <div class="card border-0 shadow-sm mb-4">
                <div class="card-body text-center">
                    <img src="{{ $store->logo_url }}" class="rounded-circle mb-3 border p-1" width="120" alt="{{ $store->name }}">
                    <h3 class="h4 fw-bold">{{ $store->name }}</h3>
                    <p class="text-muted small"><i class="bi bi-geo-alt"></i> {{ $store->location_city }}, {{ $store->location_state }}</p>
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
                        @foreach(json_decode($store->business_hours, true) ?? [] as $day => $hours)
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
            <div class="gallery-section mb-5">
                <h4 class="fw-bold mb-4">{{ __('Our Space') }}</h4>
                <div class="swiper portfolio-swiper">
                    <div class="swiper-wrapper">
                        @foreach($store->gallery as $image)
                        <div class="swiper-slide">
                            <img src="{{ RvMedia::getImageUrl($image) }}" class="img-fluid rounded-4 shadow-sm" alt="Gallery">
                        </div>
                        @endforeach
                    </div>
                    <div class="swiper-pagination"></div>
                </div>
            </div>

            <div class="services-section">
                <h4 class="fw-bold mb-4">{{ __('Services Menu') }}</h4>
                <div class="row g-3">
                    @foreach($services as $service)
                    <div class="col-md-6">
                        <div class="card border-0 shadow-sm h-100 service-card hover-lift">
                            <div class="card-body d-flex justify-content-between align-items-center">
                                <div>
                                    <h6 class="fw-bold mb-1">{{ $service->name }}</h6>
                                    <span class="text-muted small">{{ $service->duration_minutes }} {{ __('min') }}</span>
                                </div>
                                <div class="text-end">
                                    <div class="fw-bold text-primary fs-5">{{ format_price($service->price) }}</div>
                                    <button class="btn btn-sm btn-outline-primary mt-2 select-service" data-id="{{ $service->id }}" data-name="{{ $service->name }}">
                                        {{ __('Select') }}
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

@include('platform/themes/beautycloud/partials/booking-modal')

<style>
    .service-card {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        border-radius: 12px;
    }
    .hover-lift:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0,0,0,0.05) !important;
    }
    .text-primary {
        color: #d4a373 !important; /* Elegant Gold/Tan for Beauty aesthetic */
    }
    .btn-primary {
        background-color: #d4a373;
        border-color: #d4a373;
    }
    .btn-primary:hover {
        background-color: #bc8a5f;
        border-color: #bc8a5f;
    }
    .rounded-4 { border-radius: 1rem; }
</style>
