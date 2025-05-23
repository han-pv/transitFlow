<div class="container-xxl">
    <div class="text-center mt-5">
        <div class="s-bg-black-opacity d-inline fw-light border-start border-warning border-5 p-1">
            Our Blog
        </div>
        <div class="h3 s-text-first-color fw-bold mt-2">
            Our Latest News
        </div>
    </div>
    <div class="s-text-first-color lh-base px-2 px-md-3 px-xl-5 py-3">
        <div class="row justify-content-center">
            @foreach ($blogs as $blog)
            <hr class="col-11 col-lg-10 mx-auto">
            <div class="col-9 col-lg-4 py-4 pe-0 ps-0 ps-lg-3">
                <img src="{{ asset($blog->main_image_path ? $blog->main_image_path : 'images/Logistics/Photo-23.jpg') }}" class="img-fluid w-100" alt="">
            </div>
            <div class="col-2 col-lg-1 text-center py-4 mx-0 mx-lg-3">
                <img src="{{ asset('icons/Icon-calendar.svg') }}" class="img-fluid" alt="">
                <div>
                    <div class="h2 fw-bold mb-1 mt-3">{{ $blog->created_at->format("j") }}</div>
                    <div class="d-none d-md-block s-text-second-color small">{{ $blog->created_at->format("F") }}</div>
                    <div class="d-block d-md-none s-text-second-color small">{{ $blog->created_at->format("M") }}</div>
                </div>
            </div>
            <div class="col-11 col-lg-5 d-flex fw-normal py-4 ps-0">
                <div class="d-none d-lg-block border-start h-100"></div>
                <div class="ps-0 ps-lg-4">
                    <div class="h4">
                        <a href="{{ route('blogs.show', $blog->slug) }}" class="text-decoration-none s-link-hover-yellow">
                            {{ $blog->title }}
                        </a>
                    </div>
                    <div class="s-text-second-color my-3">
                    {{ $blog->summary }}
                    </div>
                    <!-- <div>
                        <ul>
                            <li>Urgent transport solutions</li>
                            <li>Reliable & experienced staffs</li>
                            <li>Urgent transport solutions</li>
                            <li>Reliable & experienced staffs</li>
                        </ul>
                    </div> -->
                </div>
            </div>
            @endforeach
        </div>
        <div class="row justify-content-center">
            <hr class="col-11 col-lg-10 mx-auto">
            <div class="col-10 text-center">
                <a href="{{ route('blogs.index') }}" class="s-btn-darkblue my-4">More Blog</a>
            </div>
        </div>
    </div>
</div>