@extends('admin.layouts.app')
@section('title') @lang('app.gallery') @endsection
@section('content')
    <div class="container-fluid mb-5">
        <div class="d-flex justify-content-between align-items-center my-3">
            <div class="h3 mb-3">
                @lang('app.gallery')
            </div>
            <div>
                <a href="{{ route('admin.gallery.create') }}" class="btn btn-primary">
                    <i class="ph ph-plus"></i> @lang('app.createNewPicture')
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
                        <th scope="col">@lang('app.name')</th>
                        <th scope="col">@lang('app.status')</th>
                        <th scope="col">@lang('app.others')</th>
                        <th scope="col"><i class="ph-fill ph-gear h5"></i></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($galleries as $gallery)
                        <tr>
                            <th class="align-middle" scope="row">
                                {{ ($galleries->currentPage() - 1) * $galleries->perPage() + $loop->iteration }}</th>
                            <td class="align-middle">{{ $gallery->id }}</td>
                            <td class="col-1">
                                @if ($gallery->image)
                                    <img src="{{ asset($gallery->image) }}" class="img-fluid rounded" alt="{{ $gallery->name }}"
                                        style="max-width: 100px;">
                                @else
                                    <img src="{{ asset('images/placeholder.jpg') }}" class="img-fluid rounded" alt="Placeholder"
                                        style="max-width: 100px;">
                                @endif
                            </td>
                            <td class="align-middle">{{ $gallery->name }}</td>
                            <td class="align-middle text-center">
                                @if ($gallery->is_active)
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
                                <table class="table table-striped table-hover table-bordered table-sm small text-secondary">
                                    <tr>
                                        <th>@lang('app.createdBy')</th>
                                        <td>{{ $gallery->created_by ?: '-' }}</td>
                                    </tr>
                                    <tr>
                                        <th>@lang('app.createdAt')</th>
                                        <td>{{ $gallery->created_at->format('d M Y H:i') }}</td>
                                    </tr>
                                    <tr>
                                        <th>@lang('app.updatedAt')</th>
                                        <td>{{ $gallery->updated_at->format('d M Y H:i') }}</td>
                                    </tr>
                                </table>
                            </td>
                            <td class="align-middle">
                                <a href="{{ route('admin.gallery.edit', $gallery->id) }}"
                                    class="text-decoration-none btn btn-warning m-1">
                                    <i class="ph ph-pencil"></i>
                                </a>
                                <button type="button" class="btn btn-danger m-1" data-bs-toggle="modal"
                                    data-bs-target="#deleteGallery{{ $gallery->id }}">
                                    <i class="ph ph-trash"></i>
                                </button>
                                <!-- Delete Modal -->
                                <div class="modal fade" id="deleteGallery{{ $gallery->id }}" data-bs-backdrop="static"
                                    data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <div class="h6">
                                                    <span class="fw-bold">@lang('app.gallery'):</span> {{ $gallery->name }}
                                                </div>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <h1 class="modal-title fs-5">
                                                    <i class="ph-fill ph-warning text-warning"></i>
                                                    @lang('app.deleteConfirmation')
                                                </h1>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">@lang('app.close')</button>
                                                <form action="{{ route('admin.gallery.destroy', $gallery->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">
                                                        <i class="ph ph-trash"></i> @lang('app.delete')
                                                    </button>
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
            {{ $galleries->links('pagination::bootstrap-5') }}
        </div>
    </div>
@endsection 