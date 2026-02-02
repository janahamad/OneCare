@extends('layouts.app')

@php
    $locale = session('locale', 'en');
@endphp

@section('content')
<div class="container py-5 mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6 col-lg-5">
            <div class="card border-0 shadow-sm p-4 p-md-5" style="background-color: var(--bg-card); border-radius: 2px;">
                <div class="text-center mb-5 @if($locale === 'ar') text-end @endif">
                    <h1 class="display-5 mb-3">{{ $locale === 'ar' ? 'مرحباً بعودتك' : 'Welcome Back' }}</h1>
                    <p class="text-muted">{{ $locale === 'ar' ? 'قم بتسجيل الدخول للوصول إلى حجوزاتك.' : 'Sign in to access your bookings.' }}</p>
                </div>

                <form method="POST" action="{{ route('login') }}" class="@if($locale === 'ar') text-end @endif">
                    @csrf

                    <!-- Email Address -->
                    <div class="mb-4">
                        <label for="email" class="form-label small text-uppercase tracking-wider fw-bold text-muted">{{ $locale === 'ar' ? 'البريد الإلكتروني' : 'Email Address' }}</label>
                        <input id="email" type="email" class="form-control form-control-lg rounded-0 border-0 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autofocus style="background-color: var(--bg-main);">
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <!-- Password -->
                    <div class="mb-4">
                        <label for="password" class="form-label small text-uppercase tracking-wider fw-bold text-muted">{{ $locale === 'ar' ? 'كلمة المرور' : 'Password' }}</label>
                        <input id="password" type="password" class="form-control form-control-lg rounded-0 border-0 @error('password') is-invalid @enderror" name="password" required style="background-color: var(--bg-main);">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <!-- Remember Me -->
                    <div class="mb-5 d-flex @if($locale === 'ar') justify-content-start flex-row-reverse @else justify-content-between @endif align-items-center">
                        <div class="form-check">
                            <input class="form-check-input @if($locale === 'ar') float-end ms-2 @endif" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                            <label class="form-check-label @if($locale === 'ar') me-4 @endif" for="remember">
                                {{ $locale === 'ar' ? 'تذكرني' : 'Remember Me' }}
                            </label>
                        </div>
                    </div>

                    <div class="d-grid gap-3">
                        <button type="submit" class="btn btn-premium btn-lg">
                            {{ $locale === 'ar' ? 'تسجيل الدخول' : 'Sign In' }}
                        </button>
                        <p class="text-center text-muted mt-3">
                            {{ $locale === 'ar' ? 'ليس لديك حساب؟' : "Don't have an account?" }} 
                            <a href="{{ route('register') }}" class="text-primary fw-bold text-decoration-none">{{ $locale === 'ar' ? 'سجل الآن' : 'Sign Up' }}</a>
                        </p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
