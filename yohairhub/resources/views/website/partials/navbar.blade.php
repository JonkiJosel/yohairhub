<nav id="colorlib-main-nav" role="navigation">
    <a href="#" class="js-colorlib-nav-toggle colorlib-nav-toggle active"><i></i></a>
    <div class="js-fullheight colorlib-table">
        <div class="img" style="background-image: url({{ asset('looks/images/bg_2.jpg') }});"></div>
        <div class="colorlib-table-cell js-fullheight">
            <div class="row no-gutters">
                <div class="col-md-12 text-center">
                    <h1 class="mb-4"><a href="{{ route('welcome') }}"
                            class="logo">{{ config('app.name', 'YoHairHub') }}</a></h1>
                    <ul>
                        <li @class(['active' => Route::is('welcome')])><a
                                href="{{ route('welcome') }}"><span><small>01</small>Home</span></a></li>
                        <li @class(['active' => Route::is('website.about-us')])><a
                                href="{{ route('website.about-us') }}"><span><small>02</small>About</span></a></li>
                        <li><a href="model.html"><span><small>03</small>Models</span></a></li>
                        <li @class(['active' => Route::is('website.salons')])><a
                                href="{{ route('website.salons') }}"><span><small>04</small>Salons</span></a></li>
                        <li @class(['active' => Route::is('website.contact-us')])><a
                                href="{{ route('website.contact-us') }}"><span><small>05</small>Contact</span></a></li>
                        @auth
                            <li><a href="{{ route('dashboard') }}"><span><small>06</small>Dashboard</span></a></li>
                        @else
                            <li><a href="{{ route('login') }}"><span><small>06</small>Login</span></a></li>
                            {{-- <li><a href="{{ route('login') }}"><span><small>06</small>Login</span></a></li> --}}
                            <li><a href="{{ route('register') }}"><span><small>07</small>Register</span></a></li>
                        @endauth
                    </ul>
                </div>
            </div>
        </div>
    </div>
</nav>
