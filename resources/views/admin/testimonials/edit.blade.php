@extends('admin.layouts.app')
@section('title') @lang('app.testimonials') @endsection
@section('content')
    <div class="row justify-content-center mx-0 my-4">
        <div class="col-sm-11 col-md-9 col-lg-8">
            <div class="h3 mb-3">
                <a href="{{ route('admin.testimonials.index') }}"><i class="bi-arrow-left-circle"></i></a>
                @lang('app.editTestimonial')
            </div>

            <form action="{{ route('admin.testimonials.update', $testimonial->id) }}" class="needs-validation" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row justify-content-between">
                    <div class="h4 mt-3 mb-2">@lang('app.info')</div>
                    <div class="col-lg-6 mb-3">
                        <label for="firstname" class="form-label fw-semibold">
                            @lang('app.firstname') <span class="text-danger">*</span>
                        </label>
                        <input type="text" class="form-control{{ $errors->has('firstname') ? ' is-invalid' : '' }}"
                            id="firstname" name="firstname" value="{{ old('firstname', $testimonial->firstname) }}" required autofocus>
                        @if($errors->has('firstname'))
                            <div class="invalid-feedback">
                                {{ $errors->first('firstname') }}
                            </div>
                        @endif
                    </div>
                    <div class="col-lg-6 mb-3">
                        <label for="lastname" class="form-label fw-semibold">
                            @lang('app.lastname')
                        </label>
                        <input type="text" class="form-control{{ $errors->has('lastname') ? ' is-invalid' : '' }}"
                            id="lastname" name="lastname" value="{{ old('lastname', $testimonial->lastname) }}">
                        @if($errors->has('lastname'))
                            <div class="invalid-feedback">
                                {{ $errors->first('lastname') }}
                            </div>
                        @endif
                    </div>

                    <div class="col-lg-4 mb-3">
                        <label for="rating" class="form-label fw-semibold">
                            @lang('app.rating')
                        </label>
                        <select class="form-control{{ $errors->has('rating') ? ' is-invalid' : '' }}"
                            id="rating" name="rating">
                            <option value="">@lang('app.selectRating')</option>
                            <option value="1" {{ old('rating', $testimonial->rating) == 1 ? 'selected' : '' }}>1</option>
                            <option value="2" {{ old('rating', $testimonial->rating) == 2 ? 'selected' : '' }}>2</option>
                            <option value="3" {{ old('rating', $testimonial->rating) == 3 ? 'selected' : '' }}>3</option>
                            <option value="4" {{ old('rating', $testimonial->rating) == 4 ? 'selected' : '' }}>4</option>
                            <option value="5" {{ old('rating', $testimonial->rating) == 5 ? 'selected' : '' }}>5</option>
                        </select>
                        @if($errors->has('rating'))
                            <div class="invalid-feedback">
                                {{ $errors->first('rating') }}
                            </div>
                        @endif
                    </div>

                    <div class="col-lg-4 mb-3">
                        <label for="title" class="form-label fw-semibold">
                            @lang('app.title')
                        </label>
                        <input type="text" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}"
                            id="title" name="title" value="{{ old('title', $testimonial->title) }}">
                        @if($errors->has('title'))
                            <div class="invalid-feedback">
                                {{ $errors->first('title') }}
                            </div>
                        @endif
                    </div>

                    <div class="col-lg-4 mb-3">
                        <label for="company" class="form-label fw-semibold">
                            @lang('app.company')
                        </label>
                        <input type="text" class="form-control{{ $errors->has('company') ? ' is-invalid' : '' }}"
                            id="company" name="company" value="{{ old('company', $testimonial->company) }}">
                        @if($errors->has('company'))
                            <div class="invalid-feedback">
                                {{ $errors->first('company') }}
                            </div>
                        @endif
                    </div>

                    <div class="col-lg-6 mb-3">
                        <label for="location" class="form-label fw-semibold">
                            @lang('app.location')
                        </label>
                        <input type="text" class="form-control{{ $errors->has('location') ? ' is-invalid' : '' }}"
                            id="location" name="location" value="{{ old('location', $testimonial->location) }}">
                        @if($errors->has('location'))
                            <div class="invalid-feedback">
                                {{ $errors->first('location') }}
                            </div>
                        @endif
                    </div>

                    <div class="col-lg-6 mb-3">
                        <label for="image" class="form-label fw-semibold">
                            @lang('app.image')
                        </label>
                        <input type="file" class="form-control{{ $errors->has('image') ? ' is-invalid' : '' }}"
                            id="image" name="image" accept="image/*">
                        @if($testimonial->image)
                            <small class="form-text text-muted">
                                @lang('app.currentImage'): <a href="{{ $testimonial->image }}" target="_blank">@lang('app.view')</a>
                            </small>
                        @endif
                        @if($errors->has('image'))
                            <div class="invalid-feedback">
                                {{ $errors->first('image') }}
                            </div>
                        @endif
                    </div>

                    <div class="col-lg-2 mb-3">
                        <label for="is_active" class="form-label fw-semibold">
                            @lang('app.isActive') <span class="text-danger">*</span>
                        </label>
                        <div class="form-check form-switch">
                            <input type="hidden" name="isActive" value="0">
                            <input class="form-check-input" name="isActive" type="checkbox" role="switch" id="is_active"
                                value="1" {{ old('isActive', $testimonial->is_active) ? 'checked' : '' }}>
                        </div>
                        @if($errors->has('isActive'))
                            <div class="invalid-feedback">
                                {{ $errors->first('isActive') }}
                            </div>
                        @endif
                    </div>

                    <div class="h4 mt-3 mb-2">@lang('app.comment')</div>
                    <div class="mb-3">
                        <textarea name="comment" class="form-control{{ $errors->has('comment') ? ' is-invalid' : '' }}"
                            id="comment" placeholder="@lang('app.comment')" rows="5">{{ old('comment', $testimonial->comment) }}</textarea>
                        @if($errors->has('comment'))
                            <div class="invalid-feedback">
                                {{ $errors->first('comment') }}
                            </div>
                        @endif
                    </div>

                    <div>
                        <button type="submit" class="btn btn-primary">
                            <i class="ph ph-box-arrow-down"></i> @lang('app.update')
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection