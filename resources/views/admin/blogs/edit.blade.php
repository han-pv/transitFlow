@extends('admin.layouts.app')

@section('content')

    <div class="container-fluid mt-3 mb-5">
        <div class="h3 mb-3">
            <a href="{{ route('admin.blogs.index') }}" class="text-decoration-none"><i
                    class="ph ph-arrow-circle-left"></i></a>
            @lang('app.editBlog')
        </div>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form action="{{ route('admin.blogs.update', $blog->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="" class="form-label">@lang('app.category')<i
                        class="ph ph-asterisk text-danger small"></i></label>
                <select name="categoryId" class="form-select" required>
                    <option value=""> - </option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ $blog->category_id == $category->id ? 'selected' : "" }}>
                            {{ $category->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="title" class="form-label">@lang('app.title')<i
                        class="ph ph-asterisk text-danger small"></i></label>
                <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror"
                    value="{{ old('title', $blog->title) }}">
                @error('title')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="summary" class="form-label">@lang('app.summary')<i
                        class="ph ph-asterisk text-danger small"></i></label>
                <textarea name="summary" id="summary"
                    class="form-control @error('summary') is-invalid @enderror">{{ old('summary', $blog->summary) }}</textarea>
                @error('summary')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="bgImage" class="form-label">@lang('app.blogBackgroundImage')<i
                        class="ph ph-asterisk text-danger small"></i></label>
                @if ($blog->bg_image_path)
                    <div>
                        <img src="{{ $blog->bg_image_path }}" alt="Current Background" class="img-fluid">
                        <p>@lang('app.currentImage')</p>
                    </div>
                @endif
                <input type="file" name="bgImage" id="bgImage" class="form-control @error('bgImage') is-invalid @enderror"
                    accept="image/*">
                @error('bgImage')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <!-- Main Image -->
            <div class="mb-3">
                <label for="mainImage" class="form-label">@lang('app.blogMainImage') <i
                        class="ph ph-asterisk text-danger small"></i></label>
                @if ($blog->main_image_path)
                    <div>
                        <img src="{{ $blog->main_image_path }}" alt="Current Main Image" class="img-fluid">
                        <p>@lang('app.currentImage')</p>
                    </div>
                @endif
                <input type="file" name="mainImage" id="mainImage"
                    class="form-control @error('mainImage') is-invalid @enderror" accept="image/*">
                @error('mainImage')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <!-- Contents -->
            <div id="contents">
                <h3 class="mb-3">@lang('app.blogContents')</h3>
                @foreach ($blog->contents as $index => $content)
                    <div class="content-section" data-index="{{ $index }}">
                        <input type="hidden" name="contents[{{ $index }}][id]" value="{{ $content->id }}">

                        <!-- Content Type -->
                        <div class="mb-3">
                            <label class="form-label">@lang('app.type')</label>
                            <select name="contents[{{ $index }}][type]"
                                class="form-control content-type @error('contents.' . $index . '.type') is-invalid @enderror">
                                <option value="heading" {{ $content->type == 'heading' ? 'selected' : '' }}>@lang('app.heading')
                                </option>
                                <option value="text" {{ $content->type == 'text' ? 'selected' : '' }}>@lang('app.text')</option>
                                <option value="quote" {{ $content->type == 'quote' ? 'selected' : '' }}>@lang('app.quote')
                                </option>
                                <option value="image" {{ $content->type == 'image' ? 'selected' : '' }}>@lang('app.image')
                                </option>
                            </select>
                            @error('contents.' . $index . '.type')
                                <div class="error">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Content Text (for heading, text, quote) -->
                        <div class="mb-3 content-text" style="{{ $content->type == 'image' ? 'display: none;' : '' }}">
                            <label class="form-label">@lang('app.content')</label>
                            <textarea name="contents[{{ $index }}][body]"
                                class="form-control @error('contents.' . $index . '.body') is-invalid @enderror">{{ old('contents.' . $index . '.body', $content->content) }}</textarea>
                            @error('contents.' . $index . '.body')
                                <div class="error">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Content Image (for image) -->
                        <div class="mb-3 content-image" style="{{ $content->type != 'image' ? 'display: none;' : '' }}">
                            <label class="form-label">@lang('app.image') </label>
                            @if ($content->image_path)
                                <div>
                                    <img src="{{ $content->image_path }}" alt="Current Content Image" class="img-fluid">
                                    <p>@lang('app.currentImage')</p>
                                </div>
                            @endif
                            <input type="file" name="contents[{{ $index }}][image]"
                                class="form-control @error('contents.' . $index . '.image') is-invalid @enderror"
                                accept="image/*">
                            @error('contents.' . $index . '.image')
                                <div class="error">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Remove Button -->
                        <button type="button" class="btn btn-outline-danger btn-sm remove-content mb-4">
                            <i class="ph ph-minus"></i> @lang('app.removeContent')</button>
                    </div>
                @endforeach
            </div>

            <!-- Add New Content Button -->
            <button type="button" id="addContent" class="btn btn-primary mb-3"><i class="ph ph-plus"></i>
                @lang('app.addNewContent')
            </button>

            <!-- Error Message -->
            @error('contents')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <!-- Submit Button -->
            <div class="mb-3">
                <button type="submit" class="btn btn-success">@lang('app.update') </button>
                <a href="{{ route('admin.blogs.index') }}" class="btn btn-secondary">@lang('app.cancel') </a>
            </div>
        </form>
    </div>
    <script>
        // Content index, starts with the number of existing contents
        let contentIndex = {{ $blog->contents->count() }};

        // Function to toggle content fields based on type
        function toggleContentFields(selectElement, contentSection) {
            const type = selectElement.value;
            const textDiv = contentSection.querySelector('.content-text');
            const imageDiv = contentSection.querySelector('.content-image');

            if (type === 'image') {
                textDiv.style.display = 'none';
                imageDiv.style.display = 'block';
            } else {
                textDiv.style.display = 'block';
                imageDiv.style.display = 'none';
            }
        }

        // Initialize existing content sections
        document.querySelectorAll('.content-section').forEach(section => {
            const select = section.querySelector('.content-type');
            toggleContentFields(select, section);
            select.addEventListener('change', () => toggleContentFields(select, section));
        });

        // Add new content
        document.getElementById('addContent').addEventListener('click', () => {
            const container = document.getElementById('contents');
            container.insertAdjacentHTML('beforeend', `
                                        <div class="content-section" data-index="${contentIndex}">
                                            <div class="mb-3">
                                                <label class="form-label">Content Type</label>
                                                <select name="contents[${contentIndex}][type]" class="form-control content-type">
                                                    <option value="heading">@lang('app.heading')</option>
                                                    <option value="text">@lang('app.text')</option>
                                                    <option value="quote">@lang('app.quote')</option>
                                                    <option value="image">@lang('app.image')</option>
                                                </select>
                                            </div>
                                            <div class="mb-3 content-text">
                                                <label class="form-label">@lang('app.contentText') </label>
                                                <textarea name="contents[${contentIndex}][body]" class="form-control"></textarea>
                                            </div>
                                            <div class="mb-3 content-image" style="display: none;">
                                                <label class="form-label">@lang('app.contentImage')</label>
                                                <input type="file" name="contents[${contentIndex}][image]" class="form-control" accept="image/*">
                                            </div>
                                            <button type="button" class="btn btn-link remove-content">@lang('app.removeContent')</button>
                                        </div>
                                    `);

            // Initialize new content section
            const newSection = container.querySelector(`.content-section[data-index="${contentIndex}"]`);
            const newSelect = newSection.querySelector('.content-type');
            toggleContentFields(newSelect, newSection);
            newSelect.addEventListener('change', () => toggleContentFields(newSelect, newSection));

            contentIndex++;
        });

        // Remove content
        document.getElementById('contents').addEventListener('click', (e) => {
            if (e.target.classList.contains('remove-content')) {
                e.target.closest('.content-section').remove();
            }
        });
    </script>
@endsection