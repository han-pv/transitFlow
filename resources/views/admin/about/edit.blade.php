@extends('admin.layouts.app')
@section('title') @lang('app.about') @endsection
@section('content')
    <div class="row justify-content-center mx-0 my-4">
        <div class="col-sm-11 col-md-9 col-lg-8">
            <div class="h3 mb-3">
                <a href="{{ route('admin.about.index') }}"><i class="bi-arrow-left-circle"></i></a>
                @lang('app.edit') @lang('app.about')
            </div>

            @can('about')
                <form action="{{ route('admin.about.update') }}" class="needs-validation" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row justify-content-between">
                        <div class="h4 mt-3 mb-2">@lang('app.info')</div>
                        <div class="col-lg-6 mb-3">
                            <label for="name" class="form-label fw-semibold">
                                @lang('app.name') <span class="text-danger">*</span>
                            </label>
                            <input type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" id="name"
                                name="name" value="{{ old('name', $about->name) }}" required autofocus>
                            @error('name')
                                <div class="invalid-feedback">
                                    {{ $errors->first('name') }}
                                </div>
                            @enderror
                        </div>

                        <div class="h4 mt-3 mb-2">@lang('app.contact')</div>
                        <div class="col-lg-6 mb-3">
                            <label for="email" class="form-label fw-semibold">
                                @lang('app.email')
                            </label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="ph ph-envelope"></i></span>
                                <input type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                    id="email" name="email" value="{{ old('email', $about->email) }}">
                                @error('email')
                                    <div class="invalid-feedback">
                                        {{ $errors->first('email') }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <label for="phone_number" class="form-label fw-semibold">
                                @lang('app.phoneNumber')
                            </label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="ph ph-phone"></i></span>
                                <input type="text" class="form-control{{ $errors->has('phone_number') ? ' is-invalid' : '' }}"
                                    id="phone_number" name="phone_number"
                                    value="{{ old('phone_number', $about->phone_number) }}">
                                @error('phone_number')
                                    <div class="invalid-feedback">
                                        {{ $errors->first('phone_number') }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <label for="second_phone_number" class="form-label fw-semibold">
                                @lang('app.second_phone_number')
                            </label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="ph ph-phone"></i></span>
                                <input type="text"
                                    class="form-control{{ $errors->has('second_phone_number') ? ' is-invalid' : '' }}"
                                    id="second_phone_number" name="second_phone_number"
                                    value="{{ old('second_phone_number', $about->second_phone_number) }}">
                                @error('second_phone_number')
                                    <div class="invalid-feedback">
                                        {{ $errors->first('second_phone_number') }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <label for="address" class="form-label fw-semibold">
                                @lang('app.address')
                            </label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="ph ph-map-pin"></i></span>
                                <input type="text" class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}"
                                    id="address" name="address" value="{{ old('address', $about->address) }}">
                                @error('address')
                                    <div class="invalid-feedback">
                                        {{ $errors->first('address') }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="h4 mt-3 mb-2">@lang('app.stats')</div>
                        <div class="col-lg-6 mb-3">
                            <label for="locations" class="form-label fw-semibold">
                                @lang('app.locations')
                            </label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="ph ph-map-pin"></i></span>
                                <input type="number" class="form-control{{ $errors->has('locations') ? ' is-invalid' : '' }}"
                                    id="locations" name="locations" value="{{ old('locations', $about->locations) }}" min="0">
                                @error('locations')
                                    <div class="invalid-feedback">
                                        {{ $errors->first('locations') }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <label for="delivered_packages" class="form-label fw-semibold">
                                @lang('app.delivered_packages')
                            </label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="ph ph-package"></i></span>
                                <input type="number"
                                    class="form-control{{ $errors->has('delivered_packages') ? ' is-invalid' : '' }}"
                                    id="delivered_packages" name="delivered_packages"
                                    value="{{ old('delivered_packages', $about->delivered_packages) }}" min="0">
                                @error('delivered_packages')
                                    <div class="invalid-feedback">
                                        {{ $errors->first('delivered_packages') }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <label for="satisfied_clients" class="form-label fw-semibold">
                                @lang('app.satisfied_clients')
                            </label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="ph ph-users"></i></span>
                                <input type="number"
                                    class="form-control{{ $errors->has('satisfied_clients') ? ' is-invalid' : '' }}"
                                    id="satisfied_clients" name="satisfied_clients"
                                    value="{{ old('satisfied_clients', $about->satisfied_clients) }}" min="0">
                                @error('satisfied_clients')
                                    <div class="invalid-feedback">
                                        {{ $errors->first('satisfied_clients') }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <label for="owned_vehicles" class="form-label fw-semibold">
                                @lang('app.owned_vehicles')
                            </label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="ph ph-truck"></i></span>
                                <input type="number"
                                    class="form-control{{ $errors->has('owned_vehicles') ? ' is-invalid' : '' }}"
                                    id="owned_vehicles" name="owned_vehicles"
                                    value="{{ old('owned_vehicles', $about->owned_vehicles) }}" min="0">
                                @error('owned_vehicles')
                                    <div class="invalid-feedback">
                                        {{ $errors->first('owned_vehicles') }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="h4 mt-3 mb-2">@lang('app.text')</div>
                        <div class="mb-3">
                            <textarea name="text" class="form-control{{ $errors->has('text') ? ' is-invalid' : '' }}" id="text"
                                rows="5" placeholder="@lang('app.text')">{{ old('text', $about->text) }}</textarea>
                            @error('text')
                                <div class="invalid-feedback">
                                    {{ $errors->first('text') }}
                                </div>
                            @enderror
                        </div>
                        <div>
                            <button type="submit" class="btn btn-primary">
                            <i class="ph ph-box-arrow-down"></i> @lang('app.update')
                        </button>
                        </div>
                    </div>
                </form>
            @else
                <div class="text-center text-muted">
                    @lang('app.no_records_found')
                </div>
            @endcan
        </div>
    </div>
@endsection