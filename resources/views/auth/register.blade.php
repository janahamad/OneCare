@extends('layouts.app')

@php
    $locale = session('locale', 'en');
@endphp

@section('content')
<div class="container py-5 mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card border-0 shadow-sm p-4 p-md-5" style="background-color: var(--bg-card); border-radius: 2px;">
                <div class="text-center mb-5 @if($locale === 'ar') text-end @endif">
                    <h1 class="display-5 mb-3">{{ $locale === 'ar' ? 'انضم إلى ون كير' : 'Join OneCare' }}</h1>
                    <p class="text-muted">{{ $locale === 'ar' ? 'ابدأ رحلتك نحو رعاية أفضل اليوم.' : 'Start your journey towards better care today.' }}</p>
                </div>

                <form method="POST" action="{{ route('register') }}" class="@if($locale === 'ar') text-end @endif">
                    @csrf

                    <!-- Name -->
                    <div class="mb-4">
                        <label for="name" class="form-label small text-uppercase tracking-wider fw-bold text-muted">{{ $locale === 'ar' ? 'الاسم الكامل' : 'Full Name' }}</label>
                        <input id="name" type="text" class="form-control form-control-lg rounded-0 border-0 @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autofocus style="background-color: var(--bg-main);">
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <!-- Email Address -->
                    <div class="mb-4">
                        <label for="email" class="form-label small text-uppercase tracking-wider fw-bold text-muted">{{ $locale === 'ar' ? 'البريد الإلكتروني' : 'Email Address' }}</label>
                        <input id="email" type="email" class="form-control form-control-lg rounded-0 border-0 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required style="background-color: var(--bg-main);">
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

                    <!-- Confirm Password -->
                    <div class="mb-5">
                        <label for="password-confirm" class="form-label small text-uppercase tracking-wider fw-bold text-muted">{{ $locale === 'ar' ? 'تأكيد كلمة المرور' : 'Confirm Password' }}</label>
                        <input id="password-confirm" type="password" class="form-control form-control-lg rounded-0 border-0" name="password_confirmation" required style="background-color: var(--bg-main);">
                    </div>

                    <div class="d-grid gap-3">
                        <button type="submit" class="btn btn-premium btn-lg">
                            {{ $locale === 'ar' ? 'إنشاء حساب' : 'Create Account' }}
                        </button>
                        <p class="text-center text-muted mt-3">
                            {{ $locale === 'ar' ? 'لديك حساب بالفعل؟' : 'Already have an account?' }} 
                            <a href="{{ route('login') }}" class="text-primary fw-bold text-decoration-none">{{ $locale === 'ar' ? 'تسجيل الدخول' : 'Sign In' }}</a>
                        </p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
