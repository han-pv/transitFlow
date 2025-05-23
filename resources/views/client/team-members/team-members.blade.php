<div class="container-xxl">
    <div class="text-center my-3 pt-3 pt-md-4 pt-lg-5">
        <div class="s-bg-black-opacity d-inline fw-light border-start border-warning border-5 p-1">
            Team members
        </div>
        <div class="h3 s-text-first-color fw-bold my-3">
            Meet Expert Team
        </div>
    </div>
    <div class="row row-cols-1  row-cols-sm-2  row-cols-lg-3 gy-4 mb-3">
        @foreach ($members as $member)
            <div class="col">
                <div class="s-bg-darkblue text-light h-100">
                    <div class="position-relative">
                        <div class="">
                            <img src="{{ $member->image ? $member->image : asset('images/Logistics/Photo-1.jpg') }}"
                                class="img-fluid w-100" alt="">
                        </div>
                        <div class="py-4 px-3">
                            <div class="fw-bold">{{ $member->firstname . " " . $member->lastname }}</div>
                            <div class="fw-light">{{ $member->role }}</div>
                        </div>
                        <div class="position-absolute bottom-0 end-0 mb-5 pb-3">
                            <div class="s-bg-gradient-yellow s-text-first-color py-3 px-2">
                                @if ($member->email)
                                    <a href="mailTo:{{ $member->email }}" class="text-decoration-none h4 mx-2" target="_blank">
                                        <i class="ph ph-at"></i>
                                    </a>
                                @endif
                                @if ($member->instagram)
                                    <a href="{{ $member->instagram }}" class="text-decoration-none h4 mx-2" target="_blank">
                                        <i class="ph ph-instagram-logo"></i>
                                    </a>
                                @endif
                                @if ($member->facebook)
                                    <a href="{{ $member->facebook }}" class="text-decoration-none h4 mx-2" target="_blank">
                                        <i class="ph ph-facebook-logo"></i>
                                    </a>
                                @endif
                                @if ($member->x)
                                    <a href="{{ $member->x }}" class="text-decoration-none h4 mx-2" target="_blank">
                                        <i class="ph ph-x-logo"></i>
                                    </a>
                                @endif
                                @if ($member->other_social)
                                    <a href="{{ $member->other_social }}" class="text-decoration-none h4 mx-2" target="_blank">
                                        <i class="ph ph-globe"></i>
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="text-light fst-italic pb-3 px-3">
                        {{ $member->bio }}
                    </div>
                </div>
            </div>
        @endforeach
        </ul>
    </div>
    <div class="row justify-content-center mb-5">
        <div class="col-10 text-center">
            @if ($members->hasMorePages())
                <button id="load-more" class="s-btn-darkblue my-4" data-next-page="{{ $members->currentPage() + 1 }}">
                    More Blog
                </button>
            @endif
        </div>
    </div>
</div>