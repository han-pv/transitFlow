@extends('admin.layouts.app')
@section('title') @lang('app.teamMembers') @endsection
@section('content')
    <div class="container-fluid mb-5">
        <div class="d-flex justify-content-between align-items-center my-3">
            <div class="h3 mb-3">
                @lang('app.teamMembers')
            </div>
            <div>
                <a href="{{ route('admin.team-members.create') }}" class="btn btn-primary"><i class="ph ph-plus"></i>
                    @lang("app.createNewMember")
                </a>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table table-striped table-hover table-bordered table-sm">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">@lang('app.id') <i class="ph ph-arrows-down-up"></i></th>
                        <th scope="col">@lang('app.image')</th>
                        <th scope="col">@lang('app.info')</th>
                        <th scope="col">@lang('app.contact')</th>
                        <th scope="col">@lang('app.isActive')</th>
                        <th scope="col">@lang('app.others')</th>
                        <th scope="col"><i class="ph-fill ph-gear h5"></i></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($members as $member)
                        <tr>
                            <th class="align-middle" scope="row">{{ ($members->currentPage() - 1) * $members->perPage() + $loop->iteration }}</th>
                            <td class="align-middle">{{ $member->id }}</td>
                            <td class="col-1">
                                <img src="{{ $member->image ? $member->image : asset('./images/Logistics/Photo-16.jpg') }}" class="img-fluid" alt="">
                            </td>
                            <td>
                                <table class="table table-striped table-hover table-bordered table-sm">
                                    <tr>
                                        <th>@lang('app.firstname') </th>
                                        <td>{{ $member->firstname }} <span class=""><i
                                                    class="ph ph-gender-{{ $member->gender == 'Male' ? 'male' : ($member->gender == "Female" ? 'female' : '')  }}"></i></span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>@lang('app.lastname') </th>
                                        <td>{{ $member->lastname }}</td>
                                    </tr>
                                    <tr>
                                        <th>@lang('app.role') </th>
                                        <td>{{ $member->role }}</td>
                                    </tr>
                                    <tr>
                                        <th>@lang('app.birthday') </th>
                                        <td>{{ $member->birth_date ? $member->birth_date->format("d M Y") : '' }}</td>
                                    </tr>
                                    <!-- <tr>
                                        <th>@lang('app.hireDate') </th>
                                        <td>{{ $member->hire_date ? $member->hire_date->format("d M Y") : '' }}</td>
                                    </tr> -->
                                </table>
                            </td>
                            <td>
                                <table class="table table-striped table-hover table-bordered table-sm">
                                    <tr>
                                        <th><i class="ph ph-phone"></i></th>
                                        <td>{{ $member->phone_number }}</td>
                                    </tr>
                                    <tr>
                                        <th><i class="ph ph-envelope"></i></th>
                                        <td>{{ $member->email }}</td>
                                    </tr>
                                </table>
                                <table class="table table-striped table-hover table-bordered table-sm small">
                                    @if ($member->instagram)
                                    <tr>
                                        <th><i class="ph ph-instagram-logo"></i></th>
                                        <td>{{ $member->instagram }}</td>
                                    </tr>
                                    @endif 
                                    @if ($member->facebook)
                                    <tr>
                                        <th><i class="ph ph-facebook-logo"></i></th>
                                        <td>{{ $member->facebook }}</td>
                                    </tr>
                                    @endif 
                                    @if ($member->x)
                                    <tr>
                                        <th><i class="ph ph-x-logo"></i></th>
                                        <td>{{ $member->x }}</td>
                                    </tr>
                                    @endif 
                                    @if ($member->other_social_name)
                                    <tr>
                                        <td class="small">@lang('app.other')</td>
                                        <td>{{ $member->other_social }}</td>
                                    </tr>
                                    @endif 
                                </table>
                            </td>
                            <td class="align-middle text-center">
                                @if ($member->is_active)
                                    <div class="h4 text-success">
                                        <i class="ph ph-check-circle"></i>
                                    </div>
                                @else
                                    <div class="h4 text-danger">
                                        <i class="ph ph-x-circle"></i>
                                    </div>
                                @endif
                            </td>
                            <td>
                                <table class="table table-striped table-hover table-bordered table-sm">
                                    <tr class="small text-secondary">
                                        <th>@lang('app.createdBy') </th>
                                        <td class="text-secondary">{{  $member->created_by }}</td>
                                    </tr>
                                    <tr class="small text-secondary">
                                        <th>@lang('app.createdAt') </th>
                                        <td class="text-secondary">{{ $member->created_at->format("d M Y H:i") }}</td>
                                    </tr>
                                    <tr class="small text-secondary">
                                        <th>@lang('app.updatedAt') </th>
                                        <td class="text-secondary">{{ $member->updated_at->format("d M Y H:i") }}</td>
                                    </tr>
                                </table>
                            </td>
                            <td class="align-middle">
                                <a href="{{ route('admin.team-members.show', $member->id) }}"
                                    class="text-decoration-none btn btn-success m-1"><i class="ph ph-eye"></i>
                                </a>
                                <a href="{{ route('admin.team-members.edit', $member->id) }}"
                                    class="text-decoration-none btn btn-warning m-1"><i class="ph ph-pencil"></i>
                                </a>
                                <button type="button" class="btn btn-danger m-1" data-bs-toggle="modal"
                                data-bs-target="#deleteMember{{ $member->id }}">
                                <i class="ph ph-trash"></i>
                            </button>
                            <div class="modal fade" id="deleteMember{{ $member->id }}" data-bs-backdrop="static" data-bs-keyboard="false"
                                tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                        <div class="h6"><span class="fw-bold">@lang('app.teamMember'): </span>{{ $member->firstname . " " . $member->lastname }}</div>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                        <h1 class="modal-title fs-5">
                                                <i class="ph-fill ph-warning text-warning"></i> @lang('app.deleteConfirmation')
                                            </h1>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">@lang('app.close')</button>
                                            <form action="{{ route('admin.team-members.destroy', $member->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger"><i class="ph ph-trash"></i> @lang('app.delete')</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
        <div class="mt-4">
            {{ $members->links('pagination::bootstrap-5') }}
        </div>
    </div>
@endsection