@extends('admin.layouts.app')
@section('title') @lang('app.testimonials') @endsection
@section('content')
    <div class="container-fluid mb-5">
        <div class="d-flex justify-content-between align-items-center my-3">
            <div class="h3 mb-3">
                @lang('app.testimonials')
            </div>
            <div>
                <a href="{{ route('admin.testimonials.create') }}" class="btn btn-primary"><i class="ph ph-plus"></i>
                    @lang("app.createNewTestimonial")
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
                        <th scope="col">@lang('app.comment')</th>
                        <th scope="col">@lang('app.isActive')</th>
                        <th scope="col">@lang('app.others')</th>
                        <th scope="col"><i class="ph-fill ph-gear h5"></i></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($testimonials as $testimonial)
                        <tr>
                            <th class="align-middle" scope="row">{{ ($testimonials->currentPage() - 1) * $testimonials->perPage() + $loop->iteration }}</th>
                            <td class="align-middle">{{ $testimonial->id }}</td>
                            <td class="col-1">
                                @if ($testimonial->image)
                                    <img src="{{ $testimonial->image }}" class="img-fluid" alt="">
                                @else
                                    <img src="{{ asset('./images/placeholder.jpg') }}" class="img-fluid" alt="">
                                @endif
                            </td>
                            <td>
                                <table class="table table-striped table-hover table-bordered table-sm">
                                    <tr>
                                        <th>@lang('app.firstname') </th>
                                        <td>{{ $testimonial->firstname }}</td>
                                    </tr>
                                    <tr>
                                        <th>@lang('app.lastname') </th>
                                        <td>{{ $testimonial->lastname }}</td>
                                    </tr>
                                    <tr>
                                        <th>@lang('app.title') </th>
                                        <td>{{ $testimonial->title }}</td>
                                    </tr>
                                    <tr>
                                        <th>@lang('app.company') </th>
                                        <td>{{ $testimonial->company }}</td>
                                    </tr>
                                    <tr>
                                        <th>@lang('app.location') </th>
                                        <td>{{ $testimonial->location }}</td>
                                    </tr>
                                    <tr>
                                        <th>@lang('app.rating') </th>
                                        <td>{{ $testimonial->rating ? $testimonial->rating . '/5' : '' }}</td>
                                    </tr>
                                </table>
                            </td>
                            <td>
                                <div class="text-break" style="max-width: 200px;">
                                    {{ Str::limit($testimonial->comment, 100) }}
                                </div>
                            </td>
                            <td class="align-middle text-center">
                                @if ($testimonial->is_active)
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
                                        <td class="text-secondary">{{ $testimonial->created_by }}</td>
                                    </tr>
                                    <tr class="small text-secondary">
                                        <th>@lang('app.createdAt') </th>
                                        <td class="text-secondary">{{ $testimonial->created_at->format("d M Y H:i") }}</td>
                                    </tr>
                                    <tr class="small text-secondary">
                                        <th>@lang('app.updatedAt') </th>
                                        <td class="text-secondary">{{ $testimonial->updated_at->format("d M Y H:i") }}</td>
                                    </tr>
                                </table>
                            </td>
                            <td class="align-middle">
                                <a href="{{ route('admin.testimonials.show', $testimonial->id) }}"
                                    class="text-decoration-none btn btn-success m-1"><i class="ph ph-eye"></i>
                                </a>
                                <a href="{{ route('admin.testimonials.edit', $testimonial->id) }}"
                                    class="text-decoration-none btn btn-warning m-1"><i class="ph ph-pencil"></i>
                                </a>
                                <button type="button" class="btn btn-danger m-1" data-bs-toggle="modal"
                                    data-bs-target="#deleteTestimonial{{ $testimonial->id }}">
                                    <i class="ph ph-trash"></i>
                                </button>
                                <div class="modal fade" id="deleteTestimonial{{ $testimonial->id }}" data-bs-backdrop="static" data-bs-keyboard="false"
                                    tabindex="-1" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <div class="h6"><span class="fw-bold">@lang('app.testimonial'): </span>{{ $testimonial->firstname . ' ' . $testimonial->lastname }}</div>
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
                                                <form action="{{ route('admin.testimonials.destroy', $testimonial->id) }}" method="POST">
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
            {{ $testimonials->links('pagination::bootstrap-5') }}
        </div>
    </div>
@endsection