@extends('admin.layouts.app')
@section('title') @lang('app.users') @endsection
@section('content')
    <div class="row justify-content-center mx-0 my-4">
        <div class="col-sm-10 col-md-8 col-lg-6 col-xl-4">
            <div class="h3 mb-3">
                <a href="{{ route('admin.users.index') }}"><i class="bi-arrow-left-circle"></i></a>
                @lang('app.user')
            </div>

            <form action="{{ route('admin.users.store') }}" method="post">
                @csrf
                <div class="mb-3">
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

                <div class="mb-3">
                    <label for="lastname" class="form-label fw-semibold">
                    @lang('app.lastname')
                    </label>
                    <input type="text" class="form-control{{ $errors->has('lastname') ? ' is-invalid' : '' }}" id="lastname"
                        name="lastname" value="{{ old('lastname') }}">
                    @if($errors->has('lastname'))
                        <div class="invalid-feedback">
                            {{ $errors->first('lastname') }}
                        </div>
                    @endif
                </div>

                <div class="mb-3">
                    <label for="username" class="form-label fw-semibold">
                        @lang('app.username') <span class="text-danger">*</span>
                    </label>
                    <input type="text" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" id="username"
                        name="username" value="{{ old('username') }}" required>
                    @if($errors->has('username'))
                        <div class="invalid-feedback">
                            {{ $errors->first('username') }}
                        </div>
                    @endif
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label fw-semibold">
                        @lang('app.password') <span class="text-danger">*</span>
                    </label>
                    <input type="text" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" id="password"
                        name="password" value="{{ old('password') }}" required>
                    @if($errors->has('password'))
                        <div class="invalid-feedback">
                            {{ $errors->first('password') }}
                        </div>
                    @endif
                </div>

                <div class="mb-3">
                    <label for="permissions" class="form-label fw-semibold">
                        @lang('app.permissions') <span class="text-danger">*</span>
                    </label>
                    @foreach($permissions as $permission)
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" name="permissions[]" value="{{ $permission['id'] }}"
                                role="switch" id="permission-{{ $permission['id'] }}">
                            <label class="form-check-label" for="permission-{{ $permission['id'] }}">
                                {{ $permission['name'] }}
                            </label>
                        </div>
                    @endforeach
                    @if($errors->has('permissions'))
                        <div class="invalid-feedback">
                            {{ $errors->first('permissions') }}
                        </div>
                    @endif
                </div>

                <button type="submit" class="btn btn-primary">
                    <i class="ph ph-box-arrow-down"></i> @lang('app.save')
                </button>
            </form>
        </div>
    </div>
@endsection