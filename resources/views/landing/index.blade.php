@extends('layouts.app')

@section('title', 'Palestine Knowledge Hub — Pelopor Edukasi Palestina & Kemanusiaan')

@section('content')

    {{-- 1. Editorial Dark Hero with Live News & Social Ticker --}}
    @include('landing.sections.hero')

    {{-- 2. Dual-Pillar Showcase (Edukasi Palestina & Edukasi Kemanusiaan) + 8 Knowledge Modules --}}
    @include('landing.sections.features')

    {{-- 3. Trusted Real-Time Palestine News Connected to Humanitarian Aid --}}
    @include('landing.sections.live-news-section')

    {{-- 4. Trusted Social Media Feed (@thepalestinecircle & Verified Field Accounts) --}}
    @include('landing.sections.gaza-update-section')

    {{-- 5. Verified Humanitarian Aid & Donation Hub --}}
    @include('landing.sections.humanitarian-aid-section')

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
