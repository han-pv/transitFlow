@extends('client.layouts.app')

@section('title', 'About |')
@section('content')
    @include('client.app.nav')

    <div class="container-xxl">
        <div class="my-5 pt-4">
            <div class="s-text-first-color">
                {{ $about->text }}
            </div><br>
            <div class="h6 lh-lg">
                <div class="s-text-second-color"><i class="s-text-yellow ph ph-phone"></i>
                    <a href="tel:{{ $about->phone_number }}"
                        class="text-decoration-none s-text-second-color">{{ $about->phone_number}}</a>
                </div>
                <div class="s-text-second-color"><i class="s-text-yellow ph ph-phone"></i>
                    <a href="tel:{{ $about->second_phone_number }}"
                        class="text-decoration-none s-text-second-color">{{ $about->second_phone_number}}</a>
                </div>
                <div class="s-text-second-color"><i class="s-text-yellow ph ph-envelope"></i>
                    <a href="mailTo:{{ $about->email }}"
                        class="text-decoration-none s-text-second-color">{{ $about->email}}</a>
                </div>
                <div class="s-text-second-color"><span class="s-text-first-color">
                        <i class="s-text-yellow ph ph-map-pin"></i>
                    </span>{{ $about->address}}</div>
            </div>
        </div>
    </div>

    <div class="overflow-x-hidden">
        <div class="row row-cols-2 row-cols-md-4 text-center s-text-first-color border-top border-bottom">
            <div class="col py-5">
                <div class="d-flex justify-content-center align-items-center">
                    <div class="d-block d-lg-none purecounter display-6 fw-bold" data-purecounter-start="100"
                        data-purecounter-end="{{ $about->locations }}" data-purecounter-duration="3">
                        0
                    </div>
                    <div class="d-none d-lg-block purecounter display-5 fw-bold" data-purecounter-start="100"
                        data-purecounter-end="{{ $about->locations }}" data-purecounter-duration="3">
                        0
                    </div>
                    <div class="h6 fw-normal mb-0">
                        <span class="s-bg-gradient-yellow mx-1 mx-lg-3 px-2"></span>
                        Our location
                    </div>
                </div>
            </div>
            <div class="col border-start py-5">
                <div class="d-flex justify-content-center align-items-center">
                    <div class="d-block d-lg-none purecounter display-6 fw-bold" data-purecounter-start="100"
                        data-purecounter-end="{{ $about->delivered_packages }}" data-purecounter-duration="3">
                        0
                    </div>
                    <div class="d-none d-lg-block purecounter display-5 fw-bold" data-purecounter-start="100"
                        data-purecounter-end="{{ $about->delivered_packages }}" data-purecounter-duration="3">
                        0
                    </div>
                    <div class="h6 fw-normal mb-0">
                        <span class="s-bg-gradient-yellow mx-1 mx-lg-3 px-2"></span>
                        Delivered Packages
                    </div>
                </div>
            </div>
            <div class="col border-start py-5">
                <div class="d-flex justify-content-center align-items-center">
                    <div class="d-block d-lg-none purecounter display-6 fw-bold" data-purecounter-start="100"
                        data-purecounter-end="{{ $about->satisfied_clients }}" data-purecounter-duration="3">
                        0
                    </div>
                    <div class="d-none d-lg-block purecounter display-5 fw-bold" data-purecounter-start="100"
                        data-purecounter-end="{{ $about->satisfied_clients }}" data-purecounter-duration="3">
                        0
                    </div>
                    <div class="h6 fw-normal mb-0">
                        <span class="s-bg-gradient-yellow mx-1 mx-lg-3 px-2"></span>
                        Satisfied Clients
                    </div>
                </div>
            </div>
            <div class="col border-start py-5">
                <div class="d-flex justify-content-center align-items-center">
                    <div class="d-block d-lg-none purecounter display-6 fw-bold" data-purecounter-start="100"
                        data-purecounter-end="{{ $about->owned_vehicles }}" data-purecounter-duration="3">
                        0
                    </div>
                    <div class="d-none d-lg-block purecounter display-5 fw-bold" data-purecounter-start="100"
                        data-purecounter-end="{{ $about->owned_vehicles }}" data-purecounter-duration="3">
                        0
                    </div>
                    <div class="h6 fw-normal mb-0">
                        <span class="s-bg-gradient-yellow mx-1 mx-lg-3 px-2"></span>
                        Owned vehicles
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('client.partials.testimonials')
    <div class="my-5"></div>

@endsection