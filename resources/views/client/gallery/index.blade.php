@extends('client.layouts.app')

@section('title', 'Gallery |')
@section('content')
    @include('client.app.nav')

    <div class="container-xxl">
        <div class="h3 s-text-first-color text-center fw-bold my-3 pt-3 pt-md-4 pt-lg-5">
            Transporting Across The World
        </div>
        <div class="row row-cols-1  row-cols-sm-2  row-cols-lg-3 gy-4 mb-5">
            @foreach ($pictures as $picture)
                <div class="col">
                    <div class="s-bg-darkblue text-light h-100">
                        <a href="{{ $picture->image }}" class="rounded-1 ratio ratio-4x3" data-fancybox="gallery"
                            data-caption="{{ $picture->name }}">
                            <img src="{{ $picture->image }}" class="img-fluid w-100 object-fit-cover border"
                                alt="{{ $picture->name }}">
                        </a>
                    </div>
                </div>
            @endforeach

            <script>
                // Fancybox.defaults.Hash = false;
                Fancybox.bind('[data-fancybox="gallery"]', {
                    groupAll: true,
                    hideScrollbar: true,
                    Thumbs: {
                        type: "modern",
                    },
                    Toolbar: {
                        display: {
                            left: ["infobar"],

                            right: ["iterateZoom", "slideshow", "thumbs", "close"],
                        },
                    },
                    Carousel: {
                        Navigation: false,
                    },
                    animated: true,
                });
            </script>
            </ul>
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

@endsection