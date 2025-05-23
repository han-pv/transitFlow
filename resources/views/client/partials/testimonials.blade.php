<div class="container-xxl">
<section class="splide" id="testimonial" aria-label="testimonial">
    <div class="mt-4 mb-3 ">
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <div class="s-bg-black-opacity d-inline fw-light border-start border-warning border-5 p-1">
                    Testimonial
                </div>
                <div class="h3 s-text-first-color fw-bold my-3">
                    What Our Customer Say
                </div>
            </div>
            <div>
                <button id="prevBtnForTestimonial" class="bg-transparent border-0 ">
                    <i class="ph ph-arrow-left s-bg-gradient-yellow rounded-circle p-2"></i>
                </button>
                <button id="nextBtnForTestimonial" class="bg-transparent border-0 ">
                    <i class="ph ph-arrow-right s-bg-darkblue text-light rounded-circle p-2"></i>
                </button>
            </div>
        </div>
    </div>
    <div class="splide__track mt-3 mb-5 pb-3">
        <ul class="splide__list">

            @if ($testimonials->isNotEmpty())
                @foreach ($testimonials as $index => $testimonial)
                    @if ($index % 2 != 0)
                        <li class=" splide__slide my-1">
                            <div class="s-bg-lightgray s-text-first-color h-100 p-5">
                                <div class="d-flex align-items-center">
                                    <div>
                                        <img src="{{ $testimonial->image ? $testimonial->image : asset('images/Logistics/Photo-45.jpg') }}" class="img-fluid rounded-circle"
                                        alt="{{ $testimonial->firstname }}">
                                    </div>
                                    <div class="ms-3">
                                        <div class="h5 fw-bold">{{ $testimonial->firstname . " " . $testimonial->lastname }}</div>
                                        <div class="fw-normal">{{ $testimonial->title }}{{ $testimonial->title &&  $testimonial->company ? ", " : " "}}{{ $testimonial->company }}</div>
                                        <div class="fw-normal">{{ $testimonial->location }}</div>
                                    </div>
                                    <div class="ms-auto">
                                        <i class="ph-fill ph-quotes h2 s-bg-gradient-yellow rounded-circle p-3"></i>
                                    </div>
                                </div>
                                <div class="s-text-second-color fst-italic my-3">
                                    {{ $testimonial->comment }}
                                </div>
                                <div class="s-text-yellow h4">
                                @for ($i = 1; $i <= $testimonial->rating; $i++)
                                    <i class="ph-fill ph-star"></i>
                                @endfor
                                @for ($i; $i <= 5; $i++)
                                    <i class="ph ph-star"></i>
                                @endfor
                                </div>
                            </div>
                        </li>
                    @else
                    <li class=" splide__slide my-1">
                <div class="s-bg-darkblue text-light h-100 p-5">
                    <div class="d-flex align-items-center">
                        <div>
                            <img src="{{ $testimonial->image ? $testimonial->image : asset('images/Logistics/Photo-45.jpg') }}" class="img-fluid rounded-circle"
                                alt="{{ $testimonial->firstname }}">
                        </div>
                        <div class="ms-3">
                            <div class="h5 fw-bold">{{ $testimonial->firstname . " " . $testimonial->lastname }}</div>
                            <div class="fw-normal">{{ $testimonial->title }}{{ $testimonial->title &&  $testimonial->company ? ", " : " "}}{{ $testimonial->company }}</div>
                            <div class="fw-normal">{{ $testimonial->location }}</div>
                        </div>
                        <div class="ms-auto">
                            <i class="ph-fill ph-quotes h2 s-bg-gradient-yellow rounded-circle p-3"></i>
                        </div>
                    </div>
                    <div class="fst-italic my-3">
                    {{ $testimonial->comment }}
                    </div>
                    <div class="s-text-yellow h4">
                        @for ($i = 1; $i <= $testimonial->rating; $i++)
                            <i class="ph-fill ph-star"></i>
                        @endfor
                        @for ($i; $i <= 5; $i++)
                            <i class="ph ph-star"></i>
                        @endfor
                        </div>
                    </div>
                </li>
                    @endif
                @endforeach
            @else
            <div>Empty</div>
            @endif
        </ul>
    </div>
</section>
</div>