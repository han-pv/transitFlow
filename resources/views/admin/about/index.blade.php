@extends('admin.layouts.app')
@section('title') @lang('app.about') @endsection
@section('content')
    <div class="container-fluid mb-5">
        <div class="row justify-content-center mx-0 my-4">
            <div class="col-sm-11 col-md-9 col-lg-8 d-flex justify-content-between align-items-center my-3">
                <div class="h3 mb-3">
                    @lang('app.about')
                </div>
                @can('about')
                    <div>
                        <a href="{{ route('admin.about.edit') }}" class="btn btn-warning m-1">
                            <i class="ph ph-pencil"></i> @lang('app.edit')
                        </a>
                    </div>
                @endcan
            </div>
            <div class="col-sm-11 col-md-9 col-lg-8">
                <div class="card">
                    <div class="card-body">
                        @if($about)
                            <div class="row">
                                <div class="col-lg-12">
                                    <h4 class="mb-2">@lang('app.info')</h4>
                                    <table class="table table-striped table-hover table-bordered table-sm">
                                        <tr>
                                            <th>@lang('app.name')</th>
                                            <td>{{ $about->name }}</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>

                            <h4 class="mt-3 mb-2">@lang('app.contact')</h4>
                            <table class="table table-striped table-hover table-bordered table-sm">
                                <tr>
                                    <th><i class="ph ph-envelope"></i> @lang('app.email')</th>
                                    <td>{{ $about->email ?: '-' }}</td>
                                </tr>
                                <tr>
                                    <th><i class="ph ph-phone"></i> @lang('app.phoneNumber')</th>
                                    <td>{{ $about->phone_number ?: '-' }}</td>
                                </tr>
                                <tr>
                                    <th><i class="ph ph-phone"></i> @lang('app.second_phone_number')</th>
                                    <td>{{ $about->second_phone_number ?: '-' }}</td>
                                </tr>
                                <tr>
                                    <th><i class="ph ph-map-pin"></i> @lang('app.address')</th>
                                    <td>{{ $about->address ?: '-' }}</td>
                                </tr>
                            </table>

                            <h4 class="mt-3 mb-2">@lang('app.stats')</h4>
                            <table class="table table-striped table-hover table-bordered table-sm">
                                <tr>
                                    <th><i class="ph ph-map-pin"></i> @lang('app.locations')</th>
                                    <td>{{ $about->locations ?: 0 }}</td>
                                </tr>
                                <tr>
                                    <th><i class="ph ph-package"></i> @lang('app.delivered_packages')</th>
                                    <td>{{ $about->delivered_packages ?: 0 }}</td>
                                </tr>
                                <tr>
                                    <th><i class="ph ph-users"></i> @lang('app.satisfied_clients')</th>
                                    <td>{{ $about->satisfied_clients ?: 0 }}</td>
                                </tr>
                                <tr>
                                    <th><i class="ph ph-truck"></i> @lang('app.owned_vehicles')</th>
                                    <td>{{ $about->owned_vehicles ?: 0 }}</td>
                                </tr>
                            </table>
                            <h4 class="mt-3 mb-2">@lang('app.text')</h4>
                            <div class="border border-1 p-1">
                                {{ $about->text }}
                            </div>

                            <h4 class="mt-3 mb-2">@lang('app.others')</h4>
                            <table class="table table-striped table-bordered table-hover table-sm small text-secondary">
                                <tr>
                                    <th>@lang('app.createdAt')</th>
                                    <td>{{ $about->created_at->format('d M Y H:i') }}</td>
                                </tr>
                                <tr>
                                    <th>@lang('app.updatedAt')</th>
                                    <td>{{ $about->updated_at->format('d M Y H:i') }}</td>
                                </tr>
                            </table>
                        @else
                            <div class="text-center">
                                <p class="text-muted">@lang('app.no_records_found')</p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection