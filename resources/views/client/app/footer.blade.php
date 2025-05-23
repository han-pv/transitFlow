<!-- footer -->
<footer class="s-bg-darkblue text-light pt-5 pb-3" style="z-index: 1;">
    <div class="container-xxl">
        <div class="row row-cols-3 justify-content-between">
            <div class="col-12 col-lg-3">
                <div class="col-7 col-md-6 col-lg-12 me-5">
                    <a href="#">
                        <img src="{{ asset('images/Logistics/Logo.png') }}" class="img-fluid w-100" alt="">
                    </a>
                </div>
                <div class="fw-light my-3 small">
                    Leverage agile frameworks to provide a robust synopsis for strategy collaborative thinking to
                    further the overall value proposition.
                </div>
            </div>
            <div class="col-6 col-lg-2">
                <div class="">
                    <a href="{{ route('home') }}"
                        class="d-block lh-lg text-decoration-none link-light link-opacity-75-hover fw-light">Home</a>
                    <a href="{{ route('gallery') }}"
                        class="d-block lh-lg text-decoration-none link-light link-opacity-75-hover fw-light">Gallery</a>
                    <a href="{{ route('team-members') }}" class="d-block lh-lg text-decoration-none link-light link-opacity-75-hover fw-light">Team
                        members</a>
                    <a href="{{ route('blogs.index') }}"
                        class="d-block lh-lg text-decoration-none link-light link-opacity-75-hover fw-light">Blogs</a>
                    <a href="{{ route('about') }}"
                        class="d-block lh-lg text-decoration-none link-light link-opacity-75-hover fw-light">About</a>
                </div>
            </div>
            <div class="col-6 col-lg-2">
                <div class="d-block h6 text-light fw-normal">Category</div>
                <div class="">
                    @foreach ($categories as $category)
                        <a href="{{ route('blogs.index', ['category' => $category->id]) }}"
                            class="d-block lh-lg text-decoration-none link-light link-opacity-75-hover fw-light">
                            {{ $category->name }}
                        </a>
                    @endforeach
                </div>
            </div>
            <div class="col-12 col-lg-3">
                <div class="">
                    <form action="">
                        <input type="email"
                            class="form-control bg-transparent text-light s-placeholder-color rounded-0 border-secondary my-3 p-2 p-lg-3"
                            placeholder="Email here*">
                        <div class="text-end">
                            <a href="{{ route('contacts.index') }}" class="s-btn-yellow text-end">Send Now</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div
            class="row row-cols-1 row-cols-sm-2 row-cols-lg-4 justify-content-center justify-content-lg-between align-items-center fw-light my-4">
            <div class="col">
                <div class="row align-items-center w-100">
                    <div class="col-3 col-lg-3">
                        <img src="{{ asset('icons/Icon-envelope.svg') }}" class="img-fluid" alt="">
                    </div>
                    <div class="col-9 col-lg-9">
                        Email <br>
                        <a href="mailTo:{{ $about->email }}"
                            class="text-decoration-none link-light">{{ $about->email }}</a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="row align-items-center w-100 my-3">
                    <div class="col-3 col-lg-3">
                        <img src="{{ asset('icons/Icon-phone.svg') }}" class="img-fluid" alt="">
                    </div>
                    <div class="col-9 col-lg-9">
                        Call Us <br>
                        <a href="tel:{{ $about->phone_number }}" class="text-decoration-none link-light">{{ $about->phone_number }}</a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="row align-items-center w-100">
                    <div class="col-3 col-lg-3">
                        <img src="{{ asset('icons/Icon-clock.svg') }}" class="img-fluid" alt="">
                    </div>
                    <div class="col-9 col-lg-9">
                        Mon-Sat 9.00 - 18.00 <br>
                        Sunday Closed
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="my-3 text-center text-lg-end">
                    <div class="h4">Follow Us</div>
                    <a href="https://instagram.com/" target="_blank" class="text-decoration-none link-light h5 mx-1">
                        <i class="ph ph-instagram-logo"></i></a>
                    <a href="https://facebook.com/" target="_blank" class="text-decoration-none link-light h5 mx-1">
                        <i class="ph ph-facebook-logo"></i></a>
                    <a href="https://x.com/" target="_blank" class="text-decoration-none link-light h5 mx-1">
                        <i class="ph ph-x-logo"></i></a>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <div class="container-xxl">
        <div class="text-center small fw-light opacity-75">Copyright © TransitFlow | 2025 </div>
    </div>
</footer>