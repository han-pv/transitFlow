@extends('admin.layouts.app')
@section('title') @lang('app.teamMembers') @endsection
@section('content')
    <div class="row justify-content-center mx-0 my-4">
        <div class="col-sm-11 col-md-9 col-lg-8">
            <div class="h3 mb-3">
                <a href="{{ route('admin.team-members.index') }}"><i class="bi-arrow-left-circle"></i></a>
                @lang('app.createNewMember')
            </div>

            <form action="{{ route('admin.team-members.store') }}" class="needs-validation" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row justify-content-between">
                    <div class="h4 mt-3 mb-2">@lang('app.info')</div>
                    <div class="col-lg-6 mb-3">
                        <label for="firstname" class="form-label fw-semibold">
                            @lang('app.firstname') <span class="text-danger">*</span>
                        </label>
                        <input type="text" class="form-control{{ $errors->has('firstname') ? ' is-invalid' : '' }}"
                            id="firstname" name="firstname" value="{{ old('firstname') }}" required autofocus>
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
                            id="lastname" name="lastname" value="{{ old('lastname') }}">
                        @if($errors->has('lastname'))
                            <div class="invalid-feedback">
                                {{ $errors->first('lastname') }}
                            </div>
                        @endif
                    </div>

                    <div class="col-lg-4 mb-3">
                        <label for="gender" class="form-label fw-semibold">
                            @lang('app.gender') <span class="text-danger">*</span>
                        </label>
                        <div class="d-flex">
                            <input type="radio" class="btn-check " id="Male" name="gender" value="Male" required
                                autocomplete="off">
                            <label class="btn" for="Male">Male</label>
                            <input type="radio" class="btn-check" id="Female" name="gender" value="Female" required
                                autocomplete="off">
                            <label class="btn ms-3" for="Female">Female</label>
                            @if($errors->has('gender'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('gender') }}
                                </div>
                            @endif
                        </div>
                    </div>

                    <!-- birthday -->
                    <div class="col-lg-4 mb-3">
                        <label for="birthDate" class="form-label fw-semibold">
                            @lang('app.birthday')
                        </label>
                        <input type="date" class="form-control{{ $errors->has('birthDate') ? ' is-invalid' : '' }}"
                            id="birthDate" min="1900-01-01" name="birthDate" value="{{ old('birthDate', $today) }}"
                            required>
                        @if($errors->has('birthDate'))
                            <div class="invalid-feedback">
                                {{ $errors->first('birthDate') }}
                            </div>
                        @endif
                    </div>

                    <!-- hire date -->
                    <div class="col-lg-4 mb-3">
                        <label for="hireDate" class="form-label fw-semibold">
                            @lang('app.hireDate')
                        </label>
                        <input type="date" class="form-control{{ $errors->has('hireDate') ? ' is-invalid' : '' }}"
                            id="hireDate" name="hireDate" min="2000-01-01" value="{{ old('hireDate', $today) }}">
                        @if($errors->has('hireDate'))
                            <div class="invalid-feedback">
                                {{ $errors->first('hireDate') }}
                            </div>
                        @endif
                    </div>

                    <div class="col-lg-4 mb-3">
                        <label for="role" class="form-label fw-semibold">
                            @lang('app.role')
                        </label>
                        <input type="text" class="form-control{{ $errors->has('role') ? ' is-invalid' : '' }}" id="role"
                            name="role" value="{{ old('role') }}" required>
                        @if($errors->has('role'))
                            <div class="invalid-feedback">
                                {{ $errors->first('role') }}
                            </div>
                        @endif
                    </div>

                    <div class="col-lg-4 mb-3">
                        <label for="phoneNumber" class="form-label fw-semibold">
                            @lang('app.phoneNumber')
                        </label>
                        <input type="text" class="form-control{{ $errors->has('phoneNumber') ? ' is-invalid' : '' }}"
                            id="phoneNumber" name="phoneNumber" value="{{ old('phoneNumber') }}">
                        @if($errors->has('phoneNumber'))
                            <div class="invalid-feedback">
                                {{ $errors->first('phoneNumber') }}
                            </div>
                        @endif
                    </div>

                    <div class="col-lg-4 mb-3">
                        <label for="email" class="form-label fw-semibold">
                            @lang('app.email')
                        </label>
                        <input type="text" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" id="email"
                            name="email" value="{{ old('email') }}">
                        @if($errors->has('email'))
                            <div class="invalid-feedback">
                                {{ $errors->first('email') }}
                            </div>
                        @endif
                    </div>

                    <div class="h4 mt-3 mb-2">@lang('app.social')</div>
                    <div class="col-lg-6">
                        <div class="input-group mb-3">
                            <span class="input-group-text"><i class="ph ph-instagram-logo"></i></span>
                            <span class="input-group-text">https://instagram.com/</span>
                            <input type="text" class="form-control {{ $errors->has('instagram') ? ' is-invalid' : '' }}"
                                id="instagram" name="instagram" value="{{ old('instagram') }}" placeholder="@lang('app.username')">
                            @if($errors->has('instagram'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('instagram') }}
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="input-group mb-3">
                            <span class="input-group-text"><i class="ph ph-facebook-logo"></i></span>
                            <span class="input-group-text">https://facebook.com/</span>
                            <input type="text" class="form-control{{ $errors->has('facebook') ? ' is-invalid' : '' }}"
                                id="facebook" name="facebook" value="{{ old('facebook') }}" placeholder="@lang('app.username')">
                            @if($errors->has('facebook'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('facebook') }}
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="input-group mb-3">
                            <span class="input-group-text"><i class="ph ph-x-logo"></i></span>
                            <span class="input-group-text">https://x.com/</span>
                            <input type="text" class="form-control{{ $errors->has('x') ? ' is-invalid' : '' }}" id="x"
                                name="x" value="{{ old('x') }}" placeholder="@lang('app.username')">
                            @if($errors->has('x'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('x') }}
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="input-group mb-3">
                            <span class="input-group-text">@lang('app.other') </span>
                            <input type="text"
                                class="form-control{{ $errors->has('otherSocialName') ? ' is-invalid' : '' }}"
                                id="otherSocialName" name="otherSocialName" value="{{ old('otherSocialName') }}">
                            @if($errors->has('otherSocialName'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('otherSocialName') }}
                                </div>
                            @endif
                            <input type="text" class="form-control{{ $errors->has('otherSocial') ? ' is-invalid' : '' }}"
                                id="otherSocial" name="otherSocial" value="{{ old('otherSocial') }}">
                            @if($errors->has('otherSocial'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('otherSocial') }}
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="col-lg-10 mb-3">
                        <label for="image" class="form-label fw-semibold">@lang('app.image')<span
                                class="text-danger">*</span></label>
                        <input type="file" name="image" class="form-control mt-2" />
                        @if($errors->has('image'))
                            <div class="invalid-feedback">
                                {{ $errors->first('image') }}
                            </div>
                        @endif
                    </div>

                    <div class="col-lg-2 mb-3">
                        <label for="isActive" class="form-label fw-semibold">@lang('app.isActive') @lang('app.onSite')<span
                                class="text-danger">*</span></label>
                        <div class="form-check form-switch">
                            <input type="hidden" name="isActive" value="0">
                            <input class="form-check-input" name="isActive" type="checkbox" role="switch" id="isActive"
                                value="1" {{ old('isActive') ? 'checked' : '' }}>
                        </div>
                        @if($errors->has('isActive'))
                            <div class="invalid-feedback">
                                {{ $errors->first('isActive') }}
                            </div>
                        @endif
                    </div>

                    <div class="h4 mt-3 mb-2">@lang('app.biography')</div>
                    <div class="mb-3">
                        <textarea name="bio" class="form-control mt-2" placeholder="@lang('app.biography')"
                            value="{{ old('bio') }}"></textarea>
                        @if($errors->has('bio'))
                            <div class="invalid-feedback">
                                {{ $errors->first('bio') }}
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