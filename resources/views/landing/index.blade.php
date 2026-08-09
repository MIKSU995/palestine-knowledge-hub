@extends('layouts.app')

@section('title', 'Palestine Knowledge Hub - Educational Platform & Real-Time News')

@section('content')

    {{-- 1. Hero Banner with Live Ticker & Stats --}}
    @include('landing.sections.hero')

    {{-- 2. Real-Time Palestine News Section --}}
    @include('landing.sections.live-news-section')

    {{-- 3. Core Features & Pillars --}}
    @include('landing.sections.features')

    {{-- 4. Featured & Latest Articles --}}
    @include('landing.sections.latest-articles')

    {{-- 5. Timeline Preview --}}
    @include('landing.sections.timeline-preview')

    {{-- 6. Gallery Preview --}}
    @include('landing.sections.gallery-preview')

    {{-- 7. Call To Action & Quiz Invite --}}
    @include('landing.sections.cta')

@endsection