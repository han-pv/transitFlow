@extends('admin.layouts.app')
@section('title') @lang('app.users') @endsection
@section('content')
    <div class="container-fluid mb-5">
        <div class="d-flex justify-content-between align-items-center my-3">
            <div class="h3 mb-3">
                @lang('app.users')
            </div>
            <div>
                <a href="{{ route('admin.users.create') }}" class="btn btn-primary"><i class="ph ph-plus"></i> 
                    @lang("app.createNewUser")
                </a>
            </div>
        </div>
        <table class="table table-striped table-hover table-bordered table-sm">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">@lang('app.id')</th>
                    <th scope="col">@lang('app.firstname')</th>
                    <th scope="col">@lang('app.lastname')</th>
                    <th scope="col">@lang('app.username')</th>
                    <th scope="col">@lang('app.permissions')</th>
                    <th scope="col">@lang('app.createdAt')</th>
                    <th scope="col">@lang('app.updatedAt')</th>
                    <th scope="col"><i class="ph-fill ph-gear h5"></i></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <th scope="row"></th>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->firstname }}</td>
                        <td>{{ $user->lastname }}</td>
                        <td>{{ $user->username }}</td>
                        <td>
                            @foreach($permissions as $permission)
                                @if(in_array($permission['id'], $user->permissions ?: []))
                                    <span class="badge text-bg-secondary">{{ $permission['name'] }}</span>
                                @endif
                            @endforeach
                        </td>
                        <td class="small text-secondary">{{ $user->created_at->format("d m Y H:i") }}</td>
                        <td class="small text-secondary">{{ $user->updated_at->format("d m Y H:i") }}</td>
                        <td>
                            <a href="{{ route('admin.users.edit', $user->id) }}"
                                class="text-decoration-none btn btn-warning m-1"><i class="ph ph-pencil"></i></a>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>
@endsection