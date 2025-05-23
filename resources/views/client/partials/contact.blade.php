<div class="s-bg-darkblue">
    <div class="container-xxl py-5">
        <div class="row text-light py-5">
            <div class="col-12 col-md-5">
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
                <div class="my-4">
                    <div class="row align-items-center w-100">
                        <div class="col-2">
                            <img src="{{ asset('icons/Icon-envelope.svg') }}" class="img-fluid" alt="">
                        </div>
                        <div class="col-10 small">
                            Email <br>
                            <a href="mailTo:{{ $about->email }}"
                                class="text-decoration-none link-light">{{ $about->email }}</a>
                        </div>
                    </div>
                    <div class="row align-items-center w-100 my-3">
                        <div class="col-2">
                            <img src="{{ asset('icons/Icon-phone.svg') }}" class="img-fluid" alt="">
                        </div>
                        <div class="col-10 small">
                            Call Us <br>
                            <a href="tel:{{ $about->phone_number }}" class="text-decoration-none link-light">{{ $about->phone_number }}</a>
                        </div>
                    </div>
                    <div class="row align-items-center w-100">
                        <div class="col-2">
                            <img src="{{ asset('icons/Icon-clock.svg') }}" class="img-fluid" alt="">
                        </div>
                        <div class="col-10 small">
                            Mon-Sat 9.00 - 18.00 <br>
                            Sunday Closed
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-7">
                <div>
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
        <div class="row row-cols-2 row-cols-md-4 gx-0">
            <div class="col position-relative">
                <img src="{{ asset('images/Logistics/Photo-63.jpg') }}" class="img-fluid w-100" alt="">
                <div class="position-absolute bottom-0 w-100 h-50 s-bg-overlay-0">

                </div>
            </div>
            <div class="col position-relative">
                <img src="{{ asset('images/Logistics/Photo-64.jpg') }}" class="img-fluid w-100" alt="">
                <div class="position-absolute bottom-0 w-100 h-50 s-bg-overlay-0">

                </div>
            </div>
            <div class="col position-relative">
                <img src="{{ asset('images/Logistics/Photo-65.jpg') }}" class="img-fluid w-100" alt="">
                <div class="position-absolute bottom-0 w-100 h-50 s-bg-overlay-0">

                </div>
            </div>
            <div class="col position-relative">
                <img src="{{ asset('images/Logistics/Photo-66.jpg') }}" class="img-fluid w-100" alt="">
                <div class="position-absolute bottom-0 w-100 h-50 s-bg-overlay-0">

                </div>
            </div>
        </div>
    </div>
</div>