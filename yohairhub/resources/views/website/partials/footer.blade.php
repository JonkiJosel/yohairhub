<footer class="ftco-footer ftco-section img">
    <div class="overlay"></div>
    <div class="container">
        <div class="row mb-5">
            <div class="col-md-3">
                <div class="ftco-footer-widget mb-4">
                    <h2 class="ftco-heading-2">{{ config('app.name',"YoHairHub") }}</h2>
                    <p>Far far away, behind the word mountains, far from the countries Vokalia and
                        Consonantia, there live the blind texts.</p>
                    <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
                        <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a>
                        </li>
                        <li class="ftco-animate"><a href="#"><span
                                    class="icon-facebook"></span></a></li>
                        <li class="ftco-animate"><a href="#"><span
                                    class="icon-instagram"></span></a></li>
                    </ul>
                </div>
            </div>
            @livewire('website.featured-salons-footer')
            <div class="col-md-2">
                <div class="ftco-footer-widget mb-4 ml-md-4">
                    <h2 class="ftco-heading-2">Site Links</h2>
                    <ul class="list-unstyled">
                        <li><a href="{{ route('welcome') }}" class="py-2 d-block">Home</a></li>
                        <li><a href="{{ route('website.about-us') }}" class="py-2 d-block">About</a></li>
                        <li><a href="{{ route('website.hairstyles') }}" class="py-2 d-block">Hairstyles</a></li>
                        <li><a href="{{ route('website.salons') }}" class="py-2 d-block">Salons</a></li>
                        <li><a href="{{ route('website.contact-us') }}" class="py-2 d-block">Contact</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-3">
                <div class="ftco-footer-widget mb-4">
                    <h2 class="ftco-heading-2">Have a Questions?</h2>
                    <div class="block-23 mb-3">
                        <ul>
                            <li><span class="icon icon-map-marker"></span><span class="text">20 Kyambogo
                                    Rd, Banda, Kampala, Uganda</span></li>
                            <li><a href="tel:+256 750 084912"><span class="icon icon-phone"></span><span
                                        class="text">+256 750 084912</span></a></li>
                            <li><a href="mailto:info@yohairhub"><span
                                        class="icon icon-envelope"></span><span
                                        class="text">info@yohairhub.com</span></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 text-center">

                <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    Copyright &copy;
                    <script>
                        document.write(new Date().getFullYear());
                    </script> All rights reserved | Designed <i
                        class="icon-heart mx-1" aria-hidden="true"></i> by <a
                        href="https://hollytechsolnz.com" target="_blank">Nkinzi Joseline</a>
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                </p>
            </div>
        </div>
    </div>
</footer>

<!-- loader -->
<div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
        <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4"
            stroke="#eeeeee" />
        <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4"
            stroke-miterlimit="10" stroke="#F96D00" />
    </svg></div>