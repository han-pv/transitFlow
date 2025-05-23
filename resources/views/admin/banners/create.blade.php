@extends('admin.layouts.app')
@section('title') @lang('app.createNewBanner') @endsection
@section('content')
    <div class="row justify-content-center mx-0 my-4">
        <div class="col-sm-11 col-md-9 col-lg-8">
            <div class="h3 mb-3">
                <a href="{{ route('admin.banners.index') }}"><i class="bi-arrow-left-circle"></i></a>
                @lang('app.createNewBanner')
            </div>

            <form action="{{ route('admin.banners.store') }}" class="needs-validation" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row justify-content-between">
                    <div class="h4 mt-3 mb-2">@lang('app.bannerInfo')</div>

                    <div class="col-lg-6 mb-3">
                        <label for="section" class="form-label fw-semibold">
                            @lang('app.section') <span class="text-danger">*</span>
                        </label>
                        <input type="text" class="form-control{{ $errors->has('section') ? ' is-invalid' : '' }}"
                            id="section" name="section" value="{{ old('section') }}" required autofocus
                            placeholder="@lang('app.section')">
                        @if($errors->has('section'))
                            <div class="invalid-feedback">
                                {{ $errors->first('section') }}
                            </div>
                        @endif
                    </div>

                    <div class="col-lg-6 mb-3">
                        <label for="title" class="form-label fw-semibold">
                            @lang('app.title') <span class="text-danger">*</span>
                        </label>
                        <input type="text" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}"
                            id="title" name="title" value="{{ old('title') }}" required
                            placeholder="@lang('app.title')">
                        @if($errors->has('title'))
                            <div class="invalid-feedback">
                                {{ $errors->first('title') }}
                            </div>
                        @endif
                    </div>

                    <div class="col-lg-10 mb-3">
                        <label for="image" class="form-label fw-semibold">
                            @lang('app.image')
                        </label>
                        <input type="file" name="image" class="form-control{{ $errors->has('image') ? ' is-invalid' : '' }}"
                            id="image" accept="image/jpeg,image/png,image/gif,image/webp">
                        @if($errors->has('image'))
                            <div class="invalid-feedback">
                                {{ $errors->first('image') }}
                            </div>
                        @endif
                    </div>

                    <div class="col-lg-2 mb-3">
                        <label for="is_active" class="form-label fw-semibold">
                            @lang('app.isActive') @lang('app.onSite')
                        </label>
                        <div class="form-check form-switch">
                            <input type="hidden" name="is_active" value="0">
                            <input class="form-check-input" name="is_active" type="checkbox" role="switch" id="is_active"
                                value="1" {{ old('is_active', 1) ? 'checked' : '' }}>
                        </div>
                        @if($errors->has('is_active'))
                            <div class="invalid-feedback">
                                {{ $errors->first('is_active') }}
                            </div>
                        @endif
                    </div>

                    <div class="mb-3">
                        <textarea name="text" class="form-control{{ $errors->has('text') ? ' is-invalid' : '' }}"
                            id="text" placeholder="@lang('app.text')" rows="5">{{ old('text') }}</textarea>
                        @if($errors->has('text'))
                            <div class="invalid-feedback">
                                {{ $errors->first('text') }}
                            </div>
                        @endif
                    </div>

                    <div>
                        <button type="submit" class="btn btn-primary">
                            <i class="ph ph-box-arrow-down"></i> @lang('app.save')
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection