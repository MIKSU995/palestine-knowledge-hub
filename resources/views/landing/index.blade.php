@extends('layouts.app')

@section('title', 'Palestine Knowledge Hub - Edukasi, Live Gaza Update & Akses Kemanusiaan')

@section('content')

    {{-- 1. Hero Banner with Live Gaza Ticker & Stats --}}
    @include('landing.sections.hero')

    {{-- 2. Emergency Humanitarian Aid & Donation Hub --}}
    @include('landing.sections.humanitarian-aid-section')

    {{-- 3. The Gaza Update Instagram Live Feed Section --}}
    @include('landing.sections.gaza-update-section')

    {{-- 4. Real-Time Palestine & Global News Section --}}
    @include('landing.sections.live-news-section')

    {{-- 5. Core Pillars & 6 Knowledge Modules --}}
    @include('landing.sections.features')

    {{-- 6. Featured & Latest Educational Articles --}}
    @include('landing.sections.latest-articles')

    {{-- 7. Historical Timeline Showcase --}}
    @include('landing.sections.timeline-preview')

    {{-- 8. Cultural Heritage Gallery Preview --}}
    @include('landing.sections.gallery-preview')

    {{-- 9. Interactive Quiz CTA & Evaluation --}}
    @include('landing.sections.cta')

    {{-- 10. Important Dates & Solidarity --}}
    @include('landing.sections.important-dates')

    {{-- 11. Culture & Petition CTA --}}
    @include('landing.sections.culture-petition-cta')

@endsection