<div class="container-xxl my-5">
        <div class="row row-cols-2 text-center s-text-first-color border-top border-bottom">
            <div class="col py-5">
                <div class="d-flex justify-content-center align-items-center">
                    <!-- <div id="counter" class="d-block d-lg-none display-6 fw-bold">0</div> -->
                    <div class="d-block d-lg-none purecounter display-6 fw-bold" data-purecounter-start="100"
                        data-purecounter-end="{{ $about->delivered_packages }}" data-purecounter-duration="3">
                        0
                    </div>
                    <div class="d-none d-lg-block purecounter display-4 fw-bold" data-purecounter-start="100"
                        data-purecounter-end="{{ $about->delivered_packages }}" data-purecounter-duration="3">
                        0
                    </div>
                    <div class="h6 fw-normal mb-0">
                        <span class="s-bg-gradient-yellow mx-1 mx-lg-3 px-2"></span>
                        Delivered Packages
                    </div>
                </div>
            </div>
            <div class="col border-start py-5">
                <div class="d-flex justify-content-center align-items-center">
                    <div class="d-block d-lg-none purecounter display-6 fw-bold" data-purecounter-start="100"
                        data-purecounter-end="{{ $about->satisfied_clients }}" data-purecounter-duration="2">
                        0
                    </div>
                    <div class="d-none d-lg-block purecounter display-4 fw-bold" data-purecounter-start="100"
                        data-purecounter-end="{{ $about->satisfied_clients }}" data-purecounter-duration="2">
                        0
                    </div>
                    <div class="h6 fw-normal mb-0">
                        <span class="s-bg-gradient-yellow mx-1 mx-lg-3 px-2"></span>
                        Satisfied Clients
                    </div>
                </div>
            </div>
        </div>
    </div>