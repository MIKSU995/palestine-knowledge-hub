@extends('layouts.app')

@section('title', 'Palestine Knowledge Hub - Edukasi, Live Gaza Update & Akses Kemanusiaan')

@section('content')

    {{-- 1. Hero Banner with Live Gaza Ticker & Stats --}}
    @include('landing.sections.hero')

    {{-- 2. The Gaza Update Instagram Live Feed Section --}}
    @include('landing.sections.gaza-update-section')

    {{-- 3. Humanitarian Aid & Emergency Hub --}}
    @include('landing.sections.humanitarian-aid-section')

    {{-- 4. Real-Time Palestine & Global News Section --}}
    @include('landing.sections.live-news-section')

    {{-- 5. Core Pillars & Interactive Knowledge Maps --}}
    @include('landing.sections.features')

    {{-- 6. Featured & Latest Educational Articles --}}
    @include('landing.sections.latest-articles')

    {{-- 7. Historical Timeline Preview --}}
    @include('landing.sections.timeline-preview')

    {{-- 8. Cultural Heritage Gallery Preview --}}
    @include('landing.sections.gallery-preview')

    {{-- 9. Call To Action & Quiz Invite --}}
    @include('landing.sections.cta')

@endsection