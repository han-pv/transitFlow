<!-- navbar -->
<nav class="d-block d-lg-none navbar navbar-dark s-bg-darkblue" aria-label="First navbar example">
    <div class="container-fluid">
        <a href="{{ route('home') }}" class="d-block d-lg-none">
            <img src="{{ asset('images/Logistics/Logo.png') }}" class="img-fluid" alt="">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample01"
            aria-controls="navbarsExample01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarsExample01">
            <ul class="navbar-nav me-auto mb-2">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('home') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('blogs.index') }}">Blogs</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('team-members') }}">Team members</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('gallery') }}">Gallery</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('about') }}">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('contacts.index') }}"><i class="ph ph-phone"></i> Contact</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<div class="d-none d-lg-block s-bg-darkblue py-4">
    <div class="container-xxl">
        <div class="d-flex justify-content-between align-items-center text-light fw-normal small">
            <div class="me-5">
                <a href="{{ route('home') }}">
                    <img src="{{ asset('images/Logistics/Logo.png') }}" class="img-fluid" alt="">
                </a>
            </div>
            <div class="d-flex">
                <div class="row align-items-center w-100">
                    <div class="col-4">
                        <img src="{{ asset('icons/Icon-clock.svg') }}" class="img-fluid" alt="">
                    </div>
                    <div class="col-8 small">
                        Mon-Sat 9.00 - 18.00 <br>
                        Sunday Closed
                    </div>
                </div>
                <div class="row align-items-center mx-4 w-100">
                    <div class="col-4">
                        <img src="{{ asset('icons/Icon-envelope.svg') }}" class="img-fluid" alt="">
                    </div>
                    <div class="col-8 small">
                        Email <br>
                        <a href="mailTo:{{ $about->email }}"
                            class="text-decoration-none link-light">{{ $about->email }}</a>
                    </div>
                </div>
                <div class="row align-items-center w-100">
                    <div class="col-4">
                        <img src="{{ asset('icons/Icon-phone.svg') }}" class="img-fluid" alt="">
                    </div>
                    <div class="col-8 small">
                        Call Us <br>
                        <a href="tel:{{ $about->phone_number }}" class="text-decoration-none link-light">{{ $about->phone_number }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="s-bg-image position-relative"
    style="background-image: url({{ isset($blog) && $blog->bg_image_path ? $blog->bg_image_path : ( isset($banner) && $banner->image ? $banner->image : asset('images/Logistics/Photo-81.jpg')) }});">
    <div class="s-bg-overlay-90 d-flex align-items-center" style="padding-top: 175px; padding-bottom: 175px;">
        <nav class="d-none d-lg-block s-bg-black-opacity position-absolute top-0 w-100 py-0">
            <div class="container-xxl px-0">
                <div class="d-flex align-items-stretch px-0">
                    <a href="{{ route('home') }}"
                        class="text-decoration-none link-light s-link-hover {{ Request::routeIs('home') ? "s-link-active" : ""}} mx-3 me-xl-4 me-xxl-5 py-3 py-xl-4">
                        Home
                    </a>
                    <span class="py-3 py-xl-4 text-light opacity-25">|</span>
                    <a href="{{ route('blogs.index') }}"
                        class="text-decoration-none link-light s-link-hover {{ Request::routeIs('blogs.*') ? "s-link-active" : ""}} mx-3 mx-xl-4 mx-xxl-5 py-3 py-xl-4">
                        Blogs
                    </a>
                    <span class="py-3 py-xl-4 text-light opacity-25">|</span>
                    <a href="{{ route('team-members') }}"
                        class="text-decoration-none link-light s-link-hover {{ Request::routeIs('team-members') ? "s-link-active" : ""}} mx-3 mx-xl-4 mx-xxl-5 py-3 py-xl-4">
                        Team members
                    </a>
                    <span class="py-3 py-xl-4 text-light opacity-25">|</span>
                    <a href="{{ route('gallery') }}" class="text-decoration-none link-light s-link-hover {{ Request::routeIs('gallery') ? "s-link-active" : ""}} mx-3 mx-xl-4 mx-xxl-5 py-3 py-xl-4">
                        Gallery
                    </a>
                    <span class="py-3 py-xl-4 text-light opacity-25">|</span>
                    <a href="{{ route('about') }}" class="text-decoration-none link-light s-link-hover {{ Request::routeIs('about') ? "s-link-active" : ""}} mx-3 mx-xl-4 mx-xxl-5 py-3 py-xl-4">
                        About
                    </a>

                    <div class="py-3 py-xl-4 ms-auto me-4">
                        <a href="https://instagram.com/" target="_blank" class="text-decoration-none link-light h5 mx-2 mx-xl-3">
                            <i class="ph ph-instagram-logo"></i></a>
                        <a href="https://facebook.com/" target="_blank" class="text-decoration-none link-light h5 mx-2 mx-xl-3">
                            <i class="ph ph-facebook-logo"></i></a>
                        <a href="https://x.com/" target="_blank" class="text-decoration-none link-light h5 mx-2 mx-xl-3">
                            <i class="ph ph-x-logo"></i></a>
                    </div>
                    <a href="{{ route('contacts.index') }}" class="h6 fw-normal bg-light text-decoration-none link-dark {{ Request::routeIs('contacts.index') ? "s-link-active" : ""}} my-0 py-3 py-xl-4 px-4 me-0">
                        Contact
                    </a>
                </div>
            </div>
        </nav>
        <div class="container-xxl">
            <div class="col-12 col-md-8 col-lg-7 text-light">
                @if (request()->routeIs('blogs.show'))
                    <div class="d-flex align-items-center">
                        <img src="{{ asset('icons/Icon-calendar-white.svg') }}" class="img-fluid" alt="">
                        <div class="text-start ms-3">
                            <div class="h2 fw-bold mb-0">{{ $blog->created_at->format("j") }}</div>
                            <div class="small">{{ $blog->created_at->format("F") }}</div>
                        </div>
                    </div>
                    <div class="display-4 fw-bold my-3">
                        {{ $blog->title }}
                    </div>
                    <a href="{{ route("blogs.index") }}" class="s-btn-yellow my-3">Back</a>
                @else
                    @if ( isset($banner) )
                        <div class="s-bg-black-opacity d-inline fw-light border-start border-warning border-5 p-2">
                            {{ $banner->section }}
                        </div>
                        <div class="display-4 fw-bold my-3">
                            {{ $banner->title }}
                        </div>
                        <div class="fw-light">
                            {{ $banner->text }}
                        </div>
                        <!-- <button class="s-btn-yellow my-3">Explore More</button> -->
                    @endif
                @endif
            </div>
        </div>
    </div>
</div>