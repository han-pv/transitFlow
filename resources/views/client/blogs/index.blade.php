@extends('client.layouts.app')

@section('title', 'Blogs |')
@section('content')
    <!-- navbar -->
    @include('client.app.nav')

    <!-- blog -->
    <div class="container-xxl">
        <div class="text-center mt-5">
            <div class="s-bg-black-opacity d-inline fw-light border-start border-warning border-5 p-1">
                Our Blog
            </div>
            <div class="h3 s-text-first-color fw-bold mt-2">
                Our Latest News
            </div>
        </div>
        <div class="s-text-first-color lh-base px-2 px-md-3 px-xl-5 pt-3">
            <div class="d-flex col-11 col-lg-10 mx-auto my-2 py-0">
                <a href="{{ route('blogs.index') }}"
                    class="text-decoration-none {{ request('category') ? 's-text-first-color' : 's-text-second-color' }} rounded-pill me-3 mb-2 h5"><i
                        class="ph ph-arrow-counter-clockwise"></i></a>
                @foreach ($categories as $category)
                    <a href="{{  route('blogs.index', ['category' => $category->id]) }}"
                        class="text-decoration-none {{ request('category') == $category->id ? 's-text-yellow' : 's-text-second-color' }} me-3 mb-2">{{ $category->name }}
                        <span class="s-text-first-color">({{ $category->blogs_count }})</span> </a>
                @endforeach
            </div>
        </div>
        <div id="blog-container" class="s-text-first-color lh-base px-2 px-md-3 px-xl-5 pb-3">
            <div class="blog-item row justify-content-center">
                @foreach ($blogs as $blog)
                    <hr class="col-11 col-lg-10 mx-auto my-0 py-0">
                    <div class="col-9 col-lg-4 py-4 pe-0 ps-0 ps-lg-3">
                        <div class="position-relative ">
                            <img src="{{ asset($blog->main_image_path ? $blog->main_image_path : 'images/Logistics/Photo-23.jpg') }}"
                                class="img-fluid w-100" alt="">
                            <div class="position-absolute top-0 start-0 m-2 s-bg-darkblue text-light p-1">
                                {{ $blog->category->name }}
                            </div>
                        </div>
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
                                <a href="{{ route('blogs.show', $blog->slug) }}"
                                    class="text-decoration-none s-link-hover-yellow">
                                    {{ $blog->title }}
                                </a>
                            </div>
                            <div class="s-text-second-color my-3">
                                {{ $blog->summary }}
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="row justify-content-center">
            <hr class="col-11 col-lg-10 mx-auto">
            <div class="col-10 text-center">
                @if ($blogs->hasMorePages())
                    <button id="load-more" class="s-btn-darkblue my-4" data-next-page="{{ $blogs->currentPage() + 1 }}">
                        More Blog
                    </button>
                @endif
            </div>
        </div>
    </div>

@endsection