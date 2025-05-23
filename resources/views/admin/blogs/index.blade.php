@extends('admin.layouts.app')
@section('content')
    <div class="container-fluid mb-5">
        <div class="d-flex justify-content-between align-items-center my-3">
            <div class="h3 mb-3">
                @lang('app.blogs')
            </div>
            <div>
                <a href="{{ route('admin.blogs.create') }}" class="btn btn-primary"><i class="ph ph-plus"></i> Create new blog</a>
            </div>
        </div>
        <table class="table table-striped table-hover table-bordered table-sm">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">@lang('app.id')</th>
                    <th scope="col">@lang('app.category')</th>
                    <th scope="col">@lang('app.author')</th>
                    <th scope="col">@lang('app.title')</th>
                    <th scope="col">@lang('app.summary')</th>
                    <th scope="col">@lang('app.createdAt')</th>
                    <th scope="col">@lang('app.updatedAt')</th>
                    <th scope="col"><i class="ph-fill ph-gear h5"></i></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($blogs as $blog)
                    <tr>
                        <th scope="row">{{ ($blogs->currentPage() - 1) * $blogs->perPage() + $loop->iteration }}</th>
                        <td>{{ $blog->id }}</td>
                        <td>{{ $blog->category->name }}</td>
                        <td>{{ $blog->user->firstname . " " . $blog->user->lastname}}</td>
                        <td>{{ $blog->title }}</td>
                        <td>{{  Str::limit($blog->summary, 150) }}</td>
                        <td class="small text-secondary">{{ $blog->created_at->format("d M Y H:i") }}</td>
                        <td class="small text-secondary">{{ $blog->updated_at->format("d M Y H:i") }}</td>
                        <td>
                            <a href="{{ route('admin.blogs.show', $blog->slug) }}"
                                class="text-decoration-none btn btn-success m-1"><i class="ph ph-eye"></i></a>
                            <a href="{{ route('admin.blogs.edit', $blog->id) }}"
                                class="text-decoration-none btn btn-warning m-1"><i class="ph ph-pencil"></i></a>
                            <button type="button" class="btn btn-danger m-1" data-bs-toggle="modal"
                                data-bs-target="#deleteBlog{{ $blog->id }}">
                                <i class="ph ph-trash"></i>
                            </button>
                            <div class="modal fade" id="deleteBlog{{ $blog->id }}" data-bs-backdrop="static" data-bs-keyboard="false"
                                tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                        <div class="h6"><span class="fw-bold">@lang('app.blog'): </span>{{ $blog->title }}</div>
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
                                            <form action="{{ route('admin.blogs.destroy', $blog->id) }}" method="POST">
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
        <div class="mt-4">
            {{ $blogs->links('pagination::bootstrap-5') }}
        </div>
    </div>
@endsection