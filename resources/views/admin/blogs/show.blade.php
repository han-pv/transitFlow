@extends('admin.layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="mt-3 mb-5">
            <div class="h3 mb-3">
                <a href="{{ route('admin.blogs.index') }}" class="text-decoration-none"><i
                        class="ph ph-arrow-circle-left"></i></a>
                @lang('app.blog')
            </div>
            <table class="table table-striped">
                <tr>
                    <th>Settings <i class="ph-fill ph-gear mt-2"></i></th>
                    <td class="d-flex">
                        <a href="{{ route('admin.blogs.edit', $blog->id) }}"
                            class="text-decoration-none btn btn-warning ms-auto m-1"><i class="ph ph-pencil"></i></a>
                        <button type="button" class="btn btn-danger m-1" data-bs-toggle="modal"
                            data-bs-target="#deleteBlog">
                            <i class="ph ph-trash"></i>
                        </button>

                        <div class="modal fade" id="deleteBlog" data-bs-backdrop="static" data-bs-keyboard="false"
                            tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <div class="h6"><span class="fw-bold">@lang('app.blog'): </span>{{ $blog->title }}
                                        </div>
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
                                            <button type="submit" class="btn btn-danger"><i class="ph ph-trash"></i>
                                                @lang('app.delete')</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <th>Info</th>
                    <td class="d-flex small"><span class="fw-bold">Category: </span>{{ $blog->category->name }}</td>
                    <td class="d-flex small">
                        <div><span class="fw-bold">Created at: </span>{{ $blog->created_at->format("d M Y H:i") }}</div>
                        <div class="ms-5"><span class="fw-bold">Updated at:
                            </span>{{ $blog->updated_at->format("d M Y H:i") }}</div>
                    </td>
                </tr>
                <tr>
                    <th>Title</th>
                    <td>
                        <div class="h4 fw-bold">{{ $blog->title }}</div>
                    </td>
                </tr>
                <tr>
                    <th>Summary</th>
                    <td>{{ $blog->summary }}</td>
                </tr>
                <tr>
                    <th>Blog main-image</th>
                    <td><img src="{{ asset($blog->main_image_path) }}" class="img-thumbnail" alt=""></td>
                </tr>
                <tr>
                    <th>Blog background-image</th>
                    <td><img src="{{ asset($blog->bg_image_path) }}" class="img-thumbnail" alt=""></td>
                </tr>
                <tr>
                    <th>Blog Content</th>
                    <td>
                        <table class="table table-striped-columns">
                            @foreach ($blog->contents as $content)
                                <div>{{ $content->id }}</div>
                                @if($content->type === 'heading')
                                    <tr>
                                        <td>{{ $content->type }}</td>
                                        <td>
                                            <div class="contentText h2 fw-bold s-text-first-color my-2 my-md-4">
                                                {!! strip_tags($content->content, '<span><br>') !!}
                                            </div>
                                        </td>
                                    </tr>
                                @elseif($content->type === 'text')
                                    <tr>
                                        <td>{{ $content->type }}</td>
                                        <td>
                                            <div class="contentText s-text-second-color my-2 my-md-4">
                                            {!! strip_tags($content->content, '<span><br>') !!}
                                            </div>
                                        </td>
                                    </tr>
                                @elseif($content->type === 'quote')
                                    <tr>
                                        <td>{{ $content->type }}</td>
                                        <td>
                                            <div
                                                class="contentText s-bg-darkblue text-light h6 fw-normal fst-italic text-center lh-lg my-2 my-md-4 p-4">
                                                {{ $content->content }}
                                            </div>
                                        </td>
                                    </tr>
                                @elseif($content->type === 'image' && $content->image_path)
                                    <tr>
                                        <td>{{ $content->type }}</td>
                                        <td>
                                            <div class="my-2 my-md-4">
                                                <img src="{{ asset($content->image_path) }}" alt="Blog image" class="img-thumbnail">
                                            </div>
                                        </td>
                                    </tr>

                                @endif
                            @endforeach
                        </table>
                    </td>
                </tr>
            </table>
        </div>
    </div>
@endsection