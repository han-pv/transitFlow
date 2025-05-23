@extends('admin.layouts.app')
@section('title') @lang('app.teamMembers') @endsection
@section('content')
    <div class="container-fluid mb-5">
        <div class="row justify-content-center mx-0 my-4">
            <div class="col-sm-11 col-md-9 col-lg-8 d-flex justify-content-between align-items-center my-3">
                <div class="h3 mb-3">
                    <a href="{{ route('admin.team-members.index') }}"><i class="bi-arrow-left-circle"></i></a>
                    @lang('app.teamMember') : {{ $member->firstname }} {{ $member->lastname }}
                </div>
                <div>
                    <a href="{{ route('admin.team-members.edit', $member->id) }}" class="btn btn-warning m-1">
                        <i class="ph ph-pencil"></i> @lang('app.edit')
                    </a>
                    <button type="button" class="btn btn-danger m-1" data-bs-toggle="modal"
                        data-bs-target="#deleteMember{{ $member->id }}">
                        <i class="ph ph-trash"></i> @lang('app.delete')
                    </button>
                </div>
            </div>
            <div class="col-sm-11 col-md-9 col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-3 mb-3">
                                <h4 class="mb-2">@lang('app.image')</h4>
                                @if($member->image)
                                    <img src="{{ $member->image }}" class="img-fluid rounded"
                                        alt="{{ $member->firstname }} {{ $member->lastname }}" style="max-width: 150px;">
                                @else
                                    <img src="{{ asset('./images/Logistics/Photo-16.jpg') }}" class="img-fluid rounded"
                                        alt="Placeholder" style="max-width: 150px;">
                                @endif
                            </div>
                            <div class="col-lg-9">
                                <h4 class="mb-2">@lang('app.info')</h4>
                                <table class="table table-striped table-hover table-bordered table-sm">
                                    <tr>
                                        <th>@lang('app.firstname')</th>
                                        <td>{{ $member->firstname }} <i
                                                class="ph ph-gender-{{ $member->gender == 'Male' ? 'male' : ($member->gender == 'Female' ? 'female' : '') }}"></i>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>@lang('app.lastname')</th>
                                        <td>{{ $member->lastname }}</td>
                                    </tr>
                                    <tr>
                                        <th>@lang('app.gender')</th>
                                        <td>{{ $member->gender }}</td>
                                    </tr>
                                    <tr>
                                        <th>@lang('app.role')</th>
                                        <td>{{ $member->role }}</td>
                                    </tr>
                                    <tr>
                                        <th>@lang('app.birthday')</th>
                                        <td>{{ $member->birth_date ? $member->birth_date->format('d M Y') : '-' }}</td>
                                    </tr>
                                    <tr>
                                        <th>@lang('app.hireDate')</th>
                                        <td>{{ $member->hire_date ? $member->hire_date->format('d M Y') : '-' }}</td>
                                    </tr>
                                </table>
                            </div>
                        </div>

                        <h4 class="mt-3 mb-2">@lang('app.contact')</h4>
                        <table class="table table-striped table-hover table-bordered table-sm">
                            <tr>
                                <th><i class="ph ph-phone"></i> @lang('app.phoneNumber')</th>
                                <td>{{ $member->phone_number ?: '-' }}</td>
                            </tr>
                            <tr>
                                <th><i class="ph ph-envelope"></i> @lang('app.email')</th>
                                <td>{{ $member->email ?: '-' }}</td>
                            </tr>
                            @if($member->instagram)
                                <tr>
                                    <th><i class="ph ph-instagram-logo"></i> @lang('app.instagram')</th>
                                    <td>{{ $member->instagram }}</td>
                                </tr>
                            @endif
                            @if($member->facebook)
                                <tr>
                                    <th><i class="ph ph-facebook-logo"></i> @lang('app.facebook')</th>
                                    <td>{{ $member->facebook }}</td>
                                </tr>
                            @endif
                            @if($member->x)
                                <tr>
                                    <th><i class="ph ph-x-logo"></i> @lang('app.x')</th>
                                    <td>{{ $member->x }}</td>
                                </tr>
                            @endif
                            @if($member->other_social_name)
                                <tr>
                                    <th>@lang('app.other')</th>
                                    <td>{{ $member->other_social_name }}: {{ $member->other_social }}</td>
                                </tr>
                            @endif
                        </table>

                        <h4 class="mt-3 mb-2">@lang('app.biography')</h4>
                        <p class="card-text">{{ $member->bio ?: '-' }}</p>

                        <h4 class="mt-3 mb-2">@lang('app.status')</h4>
                        @if ($member->is_active)
                            <div class="">
                                <span class="h4 text-success"><i class="ph ph-check-circle"></i></span> @lang('app.active')
                            </div>
                        @else
                            <div class="">
                                <span class="h4 text-danger"><i class="ph ph-x-circle"></i></span> @lang('app.inactive')
                            </div>
                        @endif

                        <h4 class="mt-3 mb-2">@lang('app.others')</h4>
                        <table class="table table-striped table-bordered table-hover table-sm small text-secondary">
                            <tr>
                                <th>@lang('app.createdBy')</th>
                                <td>{{ $member->created_by }}</td>
                            </tr>
                            <tr>
                                <th>@lang('app.createdAt')</th>
                                <td>{{ $member->created_at->format('d M Y H:i') }}</td>
                            </tr>
                            <tr>
                                <th>@lang('app.updatedAt')</th>
                                <td>{{ $member->updated_at->format('d M Y H:i') }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Delete Modal -->
        <div class="modal fade" id="deleteMember{{ $member->id }}" data-bs-backdrop="static" data-bs-keyboard="false"
            tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <div class="h6"><span class="fw-bold">@lang('app.teamMember'):
                            </span>{{ $member->firstname . ' ' . $member->lastname }}</div>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <h1 class="modal-title fs-5">
                            <i class="ph-fill ph-warning text-warning"></i> @lang('app.deleteConfirmation')
                        </h1>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">@lang('app.close')</button>
                        <form action="{{ route('admin.team-members.destroy', $member->id) }}" method="POST">
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