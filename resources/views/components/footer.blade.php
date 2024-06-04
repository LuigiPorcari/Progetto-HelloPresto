<!-- Footer -->
<footer class="text-center text-lg-start bg-form-card text-muted mt-5">
    <!-- Section: Social media -->
    <section class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom">
        <!-- Left -->
        <div class="me-5 d-none d-lg-block">
            <span> {{__('ui.social')}}</span>
        </div>
        <!-- Left -->

        <!-- Right -->
        <div class="d-flex justify-content-center">
            <a href="https://www.facebook.com/groups/985674393295009" class="mx-5 me-md-4 text-reset">
                <i class="fab fa-facebook-f"></i>
            </a>
            <a href="https://x.com/HelloP72997" class="mx-5 me-md-4 text-reset">
                <i class="fa-brands fa-x-twitter"></i>
            </a>
            <a href="https://www.instagram.com/helloprestopage/" class="mx-5 me-md-4 text-reset">
                <i class="fab fa-instagram"></i>
            </a>
            {{-- <a href="" class="me-4 text-reset">
                <i class="fab fa-google"></i>
            </a>
            <a href="" class="me-4 text-reset">
                <i class="fab fa-linkedin"></i>
            </a>
            <a href="" class="me-4 text-reset">
                <i class="fab fa-github"></i>
            </a> --}}
        </div>
        <!-- Right -->
    </section>
    <!-- Section: Social media -->

    <!-- Section: Links  -->
    <section class="">
        <div class="container text-center text-md-start mt-5">
            <!-- Grid row -->
            <div class="row mt-3">
                <!-- Grid column -->
                <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
                    <!-- Content -->
                    <h6 class="text-uppercase fw-bold mb-4">
                        <img src="https://img.icons8.com/?size=100&id=18107&format=png&color=000000" alt=""
                            class="img-fluid icon-navbar me-2 py-1"> HelloPresto!
                    </h6>
                    <p>
                        {{__('ui.loremPrivacy')}}
                    </p>
                </div>
                <!-- Grid column -->

                <!-- Grid column -->
                <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
                    <!-- Links -->
                    <h6 class="text-uppercase fw-bold mb-4">
                        {{__('ui.nostriProdotti')}}
                    </h6>
                    <p>
                        <a href="#!" class="text-reset"> {{__('ui.cibo')}}</a>
                    </p>
                    <p>
                        <a href="#!" class="text-reset">{{__('ui.bevande')}}</a>
                    </p>
                    <p>
                        <a href="#!" class="text-reset">{{__('ui.provviste')}}</a>
                    </p>
                    <p>
                        <a href="{{ route('privacy') }}" class="text-reset">{{__('ui.privacy')}}</a>
                    </p>
                </div>
                <!-- Grid column -->

                <!-- Grid column -->
                <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
                    <!-- Links -->
                    <h6 class="text-uppercase fw-bold mb-4">
                        {{__('ui.link')}}
                    </h6>
                    <p>
                        <button type="button" class="btn btn-link text-reset p-0" data-bs-toggle="modal"
                            data-bs-target="#formModal">
                            {{__('ui.diventaRevisore')}}
                        </button>
                    </p>
                    <p>
                        <a href="#!" class="text-reset">{{__('ui.impostazioni')}}</a>
                    </p>
                    <p>
                        <a href="#!" class="text-reset">{{__('ui.iltuoordine')}}</a>
                    </p>
                    <p>
                        <a href="#!" class="text-reset">{{__('ui.aiuto')}}</a>
                    </p>
                </div>
                <!-- Grid column -->

                <!-- Grid column -->
                <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
                    <!-- Links -->
                    <h6 class="text-uppercase fw-bold mb-4">{{__('ui.contatti')}}</h6>
                    <p><i class="fas fa-home me-3"></i> Castellammare di Stabia cap 80053 IT</p>
                    <p>
                        <i class="fas fa-envelope me-3"></i>
                        hello@example.com
                    </p>
                    <p><i class="fas fa-phone me-3"></i> + 555 988 9535</p>

                </div>
                <!-- Grid column -->
            </div>
            <!-- Grid row -->
        </div>
    </section>
    <!-- Section: Links  -->

    <!-- Copyright -->
    <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.05);">
        © 2024 HelloPresto SPA:
        <a class="text-body" href="https://t.ly/nexn">HelloPrestoLegal.com</a>
    </div>
    <!-- Copyright -->
</footer>
<!-- Footer -->
