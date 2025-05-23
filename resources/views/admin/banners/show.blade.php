@extends('admin.layouts.app')
@section('title') @lang('app.banners') @endsection
@section('content')
    <div class="container-fluid mb-5">
        <div class="row justify-content-center mx-0 my-4">
            <div class="col-sm-11 col-md-9 col-lg-8 d-flex justify-content-between align-items-center my-3">
                <div class="h3 mb-3">
                    <a href="{{ route('admin.banners.index') }}"><i class="bi-arrow-left-circle"></i></a>
                    @lang('app.banner') : {{ $banner->section }}
                </div>
                <div>
                    <a href="{{ route('admin.banners.edit', $banner->id) }}" class="btn btn-warning m-1">
                        <i class="ph ph-pencil"></i> @lang('app.edit')
                    </a>
                    <button type="button" class="btn btn-danger m-1" data-bs-toggle="modal"
                        data-bs-target="#deletebanner{{ $banner->id }}">
                        <i class="ph ph-trash"></i> @lang('app.delete')
                    </button>
                </div>
            </div>
        </div>
        <div class="s-bg-image position-relative"
            style="background-image: url({{ $banner->image  }});">
            <div class="s-bg-overlay-90 d-flex align-items-center" style="padding-top: 175px; padding-bottom: 175px;">
                <nav class="d-none d-lg-block s-bg-black-opacity position-absolute top-0 w-100 py-0">
                    <div class="container-xxl px-0">
                        <div class="d-flex align-items-stretch px-0">
                            <a href=""
                                class="text-decoration-none link-light s-link-hover mx-3 me-xl-4 me-xxl-5 py-3 py-xl-4">Home</a>
                            <span class="py-3 py-xl-4 text-light opacity-25">|</span>
                            <a href=""
                                class="text-decoration-none link-light s-link-hover mx-3 mx-xl-4 mx-xxl-5 py-3 py-xl-4">About</a>
                            <span class="py-3 py-xl-4 text-light opacity-25">|</span>
                            <div class="dropdown s-link-hover mx-3 mx-xl-4 mx-xxl-5 py-3 py-xl-4">
                                <button class="bg-transparent link-light  border-0 dropdown-toggle" type="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    Pages
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#">Action</a></li>
                                    <li><a class="dropdown-item" href="#">Another action</a></li>
                                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                                </ul>
                            </div>
                            <span class="py-3 py-xl-4 text-light opacity-25">|</span>
                            <a href=""
                                class="text-decoration-none link-light s-link-hover mx-3 mx-xl-4 mx-xxl-5 py-3 py-xl-4">Project</a>
                            <span class="py-3 py-xl-4 text-light opacity-25">|</span>
                            <a href=""
                                class="text-decoration-none link-light s-link-hover mx-3 mx-xl-4 mx-xxl-5 py-3 py-xl-4">Contact</a>

                            <div class="py-3 py-xl-4 ms-auto me-4">
                                <a href="" class="text-decoration-none link-light h5 mx-2 mx-xl-3">
                                    <i class="ph ph-instagram-logo"></i></a>
                                <a href="" class="text-decoration-none link-light h5 mx-2 mx-xl-3">
                                    <i class="ph ph-facebook-logo"></i></a>
                                <a href="" class="text-decoration-none link-light h5 mx-2 mx-xl-3">
                                    <i class="ph ph-x-logo"></i></a>
                                <a href="" class="text-decoration-none link-light h5 mx-2 mx-xl-3">
                                    <i class="ph ph-threads-logo"></i></a>
                            </div>
                            <a href=""
                                class="h6 fw-normal bg-light text-decoration-none link-dark my-0 py-3 py-xl-4 px-4 me-0">
                                Request Quote
                            </a>
                        </div>
                    </div>
                </nav>
                <div class="container-xxl">
                    <div class="col-12 col-md-8 col-lg-6 text-light">
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
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Delete Modal -->
    <div class="modal fade" id="deletebanner{{ $banner->id }}" data-bs-backdrop="static" data-bs-keyboard="false"
        tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="h6"><span class="fw-bold">@lang('app.banner'):
                        </span>{{ $banner->firstname . ' ' . $banner->lastname }}</div>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h1 class="modal-title fs-5">
                        <i class="ph-fill ph-warning text-warning"></i> @lang('app.deleteConfirmation')
                    </h1>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">@lang('app.close')</button>
                    <form action="{{ route('admin.banners.destroy', $banner->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger"><i class="ph ph-trash"></i>
                            @lang('app.delete')</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection