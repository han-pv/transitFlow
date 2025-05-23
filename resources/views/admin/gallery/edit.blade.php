@extends('admin.layouts.app')
@section('title') @lang('app.editPicture') @endsection
@section('content')
    <div class="row justify-content-center mx-0 my-4">
        <div class="col-sm-11 col-md-9 col-lg-8">
            <div class="h3 mb-3">
                <a href="{{ route('admin.gallery.index') }}"><i class="bi-arrow-left-circle"></i></a>
                @lang('app.editPicture')
            </div>

            <form action="{{ route('admin.gallery.update', $gallery->id) }}" class="needs-validation" method="post"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row justify-content-between">
                    <div class="h4 mt-3 mb-2">@lang('app.pictureInfo')</div>

                    <div class="col-lg-6 mb-3">
                        <label for="name" class="form-label fw-semibold">
                            @lang('app.name') <span class="text-danger">*</span>
                        </label>
                        <input type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" id="name"
                            name="name" value="{{ old('name', $gallery->name) }}" required autofocus
                            placeholder="@lang('app.name')">
                        @if($errors->has('name'))
                            <div class="invalid-feedback">
                                {{ $errors->first('name') }}
                            </div>
                        @endif
                    </div>

                    <div class="col-lg-6 mb-3">
                        <label for="image" class="form-label fw-semibold">
                            @lang('app.image')
                        </label>
                        @if($gallery->image)
                            <div class="mb-2">
                                <img src="{{ asset($gallery->image) }}" class="img-fluid rounded" alt="{{ $gallery->name }}"
                                    style="max-width: 150px;">
                            </div>
                        @else
                            <p class="text-muted">@lang('app.noImage')</p>
                        @endif
                        <input type="file" name="image" class="form-control{{ $errors->has('image') ? ' is-invalid' : '' }}"
                            id="image" accept="image/jpeg,image/png,image/gif,image/webp">
                        @if($errors->has('image'))
                            <div class="invalid-feedback">
                                {{ $errors->first('image') }}
                            </div>
                        @endif
                    </div>

                    <div class="col-lg-6 mb-3">
                        <label for="is_active" class="form-label fw-semibold">
                            @lang('app.isActive') @lang('app.onSite')
                        </label>
                        <div class="form-check form-switch">
                            <input type="hidden" name="is_active" value="0">
                            <input class="form-check-input" name="is_active" type="checkbox" role="switch" id="is_active"
                                value="1" {{ old('is_active', $gallery->is_active) ? 'checked' : '' }}>
                        </div>
                        @if($errors->has('is_active'))
                            <div class="invalid-feedback">
                                {{ $errors->first('is_active') }}
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