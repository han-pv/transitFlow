@extends('admin.layouts.app')
@section('title') @lang('app.testimonials') @endsection
@section('content')
    <div class="container-fluid mb-5">
        <div class="row justify-content-center mx-0 my-4">
            <div class="col-sm-11 col-md-9 col-lg-8 d-flex justify-content-between align-items-center my-3">
                <div class="h3 mb-3">
                    <a href="{{ route('admin.testimonials.index') }}"><i class="bi-arrow-left-circle"></i></a>
                    @lang('app.testimonial') : {{ $testimonial->firstname }} {{ $testimonial->lastname }}
                </div>
                <div>
                    <a href="{{ route('admin.testimonials.edit', $testimonial->id) }}" class="btn btn-warning m-1">
                        <i class="ph ph-pencil"></i> @lang('app.edit')
                    </a>
                    <button type="button" class="btn btn-danger m-1" data-bs-toggle="modal"
                        data-bs-target="#deleteTestimonial{{ $testimonial->id }}">
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
                                @if($testimonial->image)
                                    <img src="{{ $testimonial->image }}" class="img-fluid rounded"
                                        alt="{{ $testimonial->firstname }} {{ $testimonial->lastname }}" style="max-width: 150px;">
                                @else
                                    <img src="{{ asset('./images/placeholder.jpg') }}" class="img-fluid rounded"
                                        alt="Placeholder" style="max-width: 150px;">
                                @endif
                            </div>
                            <div class="col-lg-9">
                                <h4 class="mb-2">@lang('app.info')</h4>
                                <table class="table table-striped table-hover table-bordered table-sm">
                                    <tr>
                                        <th>@lang('app.firstname')</th>
                                        <td>{{ $testimonial->firstname }}</td>
                                    </tr>
                                    <tr>
                                        <th>@lang('app.lastname')</th>
                                        <td>{{ $testimonial->lastname }}</td>
                                    </tr>
                                    <tr>
                                        <th>@lang('app.title')</th>
                                        <td>{{ $testimonial->title ?: '-' }}</td>
                                    </tr>
                                    <tr>
                                        <th>@lang('app.company')</th>
                                        <td>{{ $testimonial->company ?: '-' }}</td>
                                    </tr>
                                    <tr>
                                        <th>@lang('app.location')</th>
                                        <td>{{ $testimonial->location ?: '-' }}</td>
                                    </tr>
                                    <tr>
                                        <th>@lang('app.rating')</th>
                                        <td>{{ $testimonial->rating ? $testimonial->rating . '/5' : '-' }}</td>
                                    </tr>
                                </table>
                            </div>
                        </div>

                        <h4 class="mt-3 mb-2">@lang('app.comment')</h4>
                        <p class="card-text">{{ $testimonial->comment ?: '-' }}</p>

                        <h4 class="mt-3 mb-2">@lang('app.status')</h4>
                        @if ($testimonial->is_active)
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
                                <td>{{ $testimonial->created_by ?: '-' }}</td>
                            </tr>
                            <tr>
                                <th>@lang('app.createdAt')</th>
                                <td>{{ $testimonial->created_at->format('d M Y H:i') }}</td>
                            </tr>
                            <tr>
                                <th>@lang('app.updatedAt')</th>
                                <td>{{ $testimonial->updated_at->format('d M Y H:i') }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Delete Modal -->
        <div class="modal fade" id="deleteTestimonial{{ $testimonial->id }}" data-bs-backdrop="static" data-bs-keyboard="false"
            tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <div class="h6"><span class="fw-bold">@lang('app.testimonial'):
                            </span>{{ $testimonial->firstname . ' ' . $testimonial->lastname }}</div>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <h1 class="modal-title fs-5">
                            <i class="ph-fill ph-warning text-warning"></i> @lang('app.deleteConfirmation')
                        </h1>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">@lang('app.close')</button>
                        <form action="{{ route('admin.testimonials.destroy', $testimonial->id) }}" method="POST">
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