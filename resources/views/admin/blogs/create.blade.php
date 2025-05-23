@extends('admin.layouts.app')

@section('content')
    <div class="container-fluid mt-3 mb-5">
        <div class="h3 mb-3">
            <a href="{{ route('admin.blogs.index') }}" class="text-decoration-none"><i
                    class="ph ph-arrow-circle-left"></i></a>
            @lang('app.createNewBlog')
        </div>
        <form action="{{ route('admin.blogs.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="" class="form-label">@lang('app.category')<i
                        class="ph ph-asterisk text-danger small"></i></label>
                <select name="categoryId" class="form-select" required>
                    <option value=""> - </option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <!-- Title -->
            <div class="mb-3">
                <label for="title" class="form-label">@lang('app.title')<i
                        class="ph ph-asterisk text-danger small"></i></label>
                <input type="text" name="title" id="title" class="form-control" value="{{ old('title') }}" required>
            </div>

            <!-- Summary -->
            <div class="mb-3">
                <label for="summary" class="form-label">@lang('app.summary')<i
                        class="ph ph-asterisk text-danger small"></i></label>
                <textarea name="summary" id="summary" class="form-control">{{ old('summary') }}</textarea>
            </div>

            <!-- Background Image -->
            <div class="mb-3">
                <label for="bgImage" class="form-label">@lang('app.blogBackgroundImage')<i
                        class="ph ph-asterisk text-danger small"></i></label>
                <input type="file" name="bgImage" class="form-control mt-2" />
            </div>

            <!-- Main Image -->
            <div class="mb-3">
                <label for="mainImage" class="form-label">@lang('app.blogMainImage')<i
                        class="ph ph-asterisk text-danger small"></i></label>
                <input type="file" name="mainImage" class="form-control mt-2" />
            </div>

            <!-- Blog Contents -->
            <div class="mt-5 mb-3">
                <label for="contents" class="form-label h4">@lang('app.blogContents')</label>
                <div id="contents">
                    <div class="content-item mb-3">
                        <select name="contents[0][type]" class="form-select content-type" data-index="0" required
                            onchange="handleTypeChange(this)">
                            <option value="heading">@lang('app.heading')</option>
                            <option value="text">@lang('app.text')</option>
                            <option value="quote">@lang('app.quote')</option>
                            <option value="image">@lang('app.image')</option>
                        </select>
                        <textarea name="contents[0][body]" class="form-control mt-2 content-body"
                            placeholder="Content"></textarea>
                        <input type="file" name="contents[0][image]" class="form-control mt-2 content-image d-none" />
                    </div>
                </div>
                <button type="button" class="btn btn-primary mt-3" onclick="addContent()"><i class="ph ph-plus"></i>
                    @lang('app.addContent')</button>
            </div>

            <button id="submitBtn" type="submit" class="btn btn-success mb-5">@lang('app.createBlog')</button>
        </form>
    </div>

    <script>
        let contentIndex = 1;

        function addContent() {
            const newContent = `
                    <div class="content-item mb-3">
                        <select name="contents[${contentIndex}][type]" class="form-select content-type" data-index="${contentIndex}" required onchange="handleTypeChange(this)">
                            <option value="heading">@lang('app.heading')</option>
                            <option value="text">@lang('app.text')</option>
                            <option value="quote">@lang('app.quote')</option>
                            <option value="image">@lang('app.image')</option>
                        </select>
                        <textarea name="contents[${contentIndex}][body]" class="form-control mt-2 content-body" placeholder="Content"></textarea>
                        <input type="file" name="contents[${contentIndex}][image]" class="form-control mt-2 content-image d-none" />
                    </div>
                                        `;
            document.getElementById('contents').insertAdjacentHTML('beforeend', newContent);
            contentIndex++;
        }

        function handleTypeChange(select) {
            const index = select.getAttribute('data-index');
            const parent = select.closest('.content-item');
            const body = parent.querySelector('.content-body');
            const image = parent.querySelector('.content-image');

            if (select.value === 'image') {
                body.classList.add('d-none');
                image.classList.remove('d-none');
            } else {
                body.classList.remove('d-none');
                image.classList.add('d-none');
            }
        }
    </script>
@endsection