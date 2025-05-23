@extends('client.layouts.app')

@section('title', 'Home |')
@section('content')
    <!-- navbar -->
    @include('client.app.nav')

    <!-- What we do -->
    @include('client.partials.what-we-do')

    <!-- Bg image -->
    <div class="d-none d-md-block s-bg-image my-5"
        style="background-image: url({{ asset('images/Logistics/Photo-76.jpg') }}">
        <div class="s-bg-overlay-0" style="padding-top: 225px; padding-bottom: 225px; margin-bottom: -175px;"></div>
    </div>
    <div class="d-block d-md-none s-bg-image" style="background-image: url({{ asset('images/Logistics/Photo-76.jpg') }}">
        <div class="s-bg-overlay-0" style="padding-top: 175px;"></div>
    </div>

    <!-- Why us -->
    @include('client.partials.why-us')

    <!-- Progress -->
    @include('client.partials.progress')

    <!-- Transporting Across The World -->
    @include('client.partials.transport')

    <div class="d-none d-xl-block s-bg-gradient-yellow"
        style="padding-top: 175px; padding-bottom: 175px; margin-top: -300px;"></div>

    <!-- Testimonial -->
    @include('client.partials.testimonials')

    <!-- Why Choose -->
    @include('client.partials.why-choice')

    <!-- Team Members -->
    @include('client.partials.team-members')

    <!-- contact -->
    @include('client.partials.contact')

    <!-- blog -->
    @include('client.partials.blogs')

    <div class="d-none d-lg-block s-bg-image"
        style="background-image: url({{ asset('images/Logistics/Photo-80.jpg') }}); height: 250px;"></div>
    <div class="d-block d-lg-none s-bg-image"
        style="background-image: url({{ asset('images/Logistics/Photo-80.jpg') }}); height: 150px;"></div>
@endsection