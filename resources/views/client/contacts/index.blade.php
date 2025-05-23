@extends('client.layouts.app')

@section('title', 'Contact |')
@section('content')
    @include('client.app.nav')
    <div class="">
        <div class="container-xxl py-5 px-0">
            <div class="row col-12 col-lg-9 s-bg-darkblue text-light text-center py-5 mx-auto">
                <div class="col-12">
                    <div class="s-bg-black-opacity d-inline fw-light border-start border-warning border-5 p-1">
                        Contact
                    </div>
                    <div class="h3 fw-bold my-3">
                        Get in touch with us
                    </div>
                    <div>
                        Leverage agile frameworks to provide a robust synopsis for strategy foster collaborative
                        thinking to further the overall value.
                    </div>
                    <div class="d-sm-flex my-4 px-4">
                        <div class="row align-items-center w-100">
                            <div class="col-3">
                                <img src="{{ asset('icons/Icon-envelope.svg') }}" class="img-fluid" alt="">
                            </div>
                            <div class="col-9 small text-start">
                                Email <br>
                                <a href="mailTo:{{ $about->email }}"
                                    class="text-decoration-none link-light">{{ $about->email }}</a>
                            </div>
                        </div>
                        <div class="row align-items-center w-100 my-3">
                            <div class="col-3">
                                <img src="{{ asset('icons/Icon-phone.svg') }}" class="img-fluid" alt="">
                            </div>
                            <div class="col-9 small text-start">
                                Call Us <br>
                                <a href="tel:{{ $about->phone_number }}" class="text-decoration-none link-light">{{ $about->phone_number }}</a>
                            </div>
                        </div>
                        <div class="row align-items-center w-100">
                            <div class="col-3">
                                <img src="{{ asset('icons/Icon-clock.svg') }}" class="img-fluid" alt="">
                            </div>
                            <div class="col-9 small text-start">
                                Mon-Sat 9.00 - 18.00 <br>
                                Sunday Closed
                            </div>
                        </div>
                    </div>
                </div>
                <div class="px-4">
                    <form action="{{ route('contacts.store') }}" method="post">
                        @csrf
                        <div class="row g-3 mb-5">
                            <div class="col-12 col-sm-6">
                                <input type="text" name="name" autocomplete="off"
                                    class="form-control bg-transparent rounded-0 border-secondary s-placeholder-color text-light py-3"
                                    placeholder="Your name*" aria-label="Your name" required>
                            </div>
                            <div class="col-12 col-sm-6">
                                <input type="email" name="email" autocomplete="off"
                                    class="form-control bg-transparent rounded-0 border-secondary s-placeholder-color text-light py-3"
                                    placeholder="Email*" aria-label="Email" required>
                            </div>
                        </div>
                        <div class="row g-3 mb-5">
                            <div class="col-12 col-sm-6">
                                <input type="text" name="phoneNumber" autocomplete="off"
                                    class="form-control bg-transparent rounded-0 border-secondary s-placeholder-color text-light py-3"
                                    placeholder="Phone Number*" aria-label="Phone Number" required>
                            </div>
                            <div class="col-12 col-sm-6">
                                <input type="text" name="city" autocomplete="off"
                                    class="form-control bg-transparent rounded-0 border-secondary s-placeholder-color text-light py-3"
                                    placeholder="City*" aria-label="City" required>
                            </div>
                        </div>
                        <div class="mb-4">
                            <textarea name="message" autocomplete="off"
                                class="form-control bg-transparent rounded-0 border-secondary s-placeholder-color text-light py-3"
                                placeholder="Your Message" id="exampleFormControlTextarea1" rows="3"></textarea>
                        </div>
                        <button type="submit" class="s-btn-yellow">Submit Message</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @include('client.partials.why-us')
    <div class="my-5"></div>

@endsection