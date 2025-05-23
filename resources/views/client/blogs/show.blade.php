@extends('client.layouts.app')

@section('title', 'Blog |')
@section('content')
    <!-- navbar -->
    @include('client.app.nav')

    <div class="container-xxl">
        <div class="row my-5">
            <div class="col-12 col-md-8">
                @foreach ($blog->contents as $content)
                    @if($content->type === 'heading')
                        <div class="h2 fw-bold s-text-first-color my-2 my-md-4">
                            {{ $content->content }}
                        </div>
                    @elseif($content->type === 'text')

                        <div class="s-text-second-color my-2 my-md-4">
                            {{  $content->content }}
                        </div>
                    @elseif($content->type === 'quote')
                        <div class="s-bg-darkblue text-light h6 fw-normal fst-italic text-center lh-lg my-2 my-md-4 p-4">
                            "{{ $content->content }}"
                        </div>
                    @elseif($content->type === 'image')
                        <div class="my-2 my-md-4">
                            <img src="{{ asset('images/Logistics/' . $content->type === 'image' ? $content->content : "Photo-21.jpg") }}"
                                class="img-fluid w-100" alt="">
                        </div>
                        <img src="{{ asset('storage/' . $content->content) }}" alt="">
                    @endif
                @endforeach
            </div>
            <div class="d-none d-md-block col-4">
                <div class=" ms-3 ms-lg-5">
                    <div class="s-bg-lightgray">
                        <div class="h4 fw-bold s-text-first-color px-3 pt-3">Categories</div>
                        <div class="list-group list-group-flush">
                            @foreach ($categories as $category)
                                <a href="{{ route('blogs.index', ['category' => $category->id]) }}"
                                    class="d-flex justify-content-between list-group-item list-group-item-action s-bg-lightgray s-text-second-color">
                                    <div>{{ $category->name }}</div>
                                    <div class="fw-bold s-text-first-color">({{ $category->blogs_count }})</div>
                                </a>
                            @endforeach
                        </div>
                    </div>
                    <div class="s-bg-lightgray p-4 my-5">
                        <div class="h4 fw-bold s-text-first-color">How can we help you?</div>
                        <div class="s-text-second-color fw-normal my-3">
                            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Nam reprehenderit enim perspiciatis
                            tenetur, consequatur mollitia expedita quod quia ipsum deserunt quaerat quis laboriosam maiores
                            molestias esse exercitationem aliquam sint, sed architecto hic repellendus officia. Ex omnis
                            ipsam
                            molestiae eveniet dolore?
                        </div>
                        <a href="{{ route('contacts.index') }}" class="s-btn-yellow">Contact</a>
                    </div>
                    <div class="s-bg-darkblue text-light p-4 my-5">
                        <div class="h4 fw-bold border-start border-warning border-5 p-2">
                            Get In Touch
                        </div>
                        <div class="fw-normal my-3">
                            Need help? <br>
                            <a href="tel:{{ $about->phone_number }}" class="text-decoration-none link-light">{{ $about->phone_number }}</a>
                        </div>
                        <div class="fw-normal my-3">
                            Email <br>
                            <a href="mailto:{{ $about->email }}" class="text-decoration-none link-light">{{ $about->email }}</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection