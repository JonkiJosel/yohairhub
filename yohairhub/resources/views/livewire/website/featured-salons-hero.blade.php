<section class="home-slider owl-carousel">

    @forelse ($salons as $salon)
        <div class="slider-item"
            style="background-image: url('{{ asset($salon->image ? 'storage/' . $salon->image : 'looks/images/bg_1.jpg') }}');">
            <div class="overlay"></div>
            <div class="container">
                <div class="row slider-text justify-content-start align-items-center" data-scrollax-parent="true">
                    <div style="background-color:rgba(30, 25, 25, 0.534);"
                        class="col-md-8 col-lg-7 col-sm-12 ftco-animate text mb-4"
                        data-scrollax=" properties: { translateY: '70%' }">
                        <span class="position">Featured Salons</span>
                        <h1 class="mb-3" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">
                            {{ $salon->name }}</h1>
                        <div class="d-md-flex models-info mt-5 mb-5">
                            <div>
                                <p>Services</p>
                                <span>{{ $salon->services->count() }}</span>
                            </div>
                            <div>
                                <p>Stylists</p>
                                <span>{{ $salon->hairdressers->count() }}</span>
                            </div>
                        </div>
                        <p><a href="{{ route('website.salon.view', ['uuid' => $salon->uuid]) }}"
                                class="btn btn-primary px-4 py-3">Know more?</a>
                            <a href="{{ route('website.salon.view', ['uuid' => $salon->uuid]) }}"
                                class="btn btn-primary btn-outline-primary px-4 py-3">View Gallery</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    @empty
        <div class="slider-item" style="background-image: url('{{ asset('looks/images/bg_1.jpg') }}');">
            <div class="overlay"></div>
            <div class="container">
                <div class="row slider-text justify-content-start align-items-center" data-scrollax-parent="true">
                    <div class="col-md-8 col-lg-7 col-sm-12 ftco-animate text mb-4"
                        data-scrollax=" properties: { translateY: '70%' }">
                        <span class="position">Featured Salons</span>
                        <h1 class="mb-3" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Oops!! No
                            salons yet</h1>
                        <div class="d-md-flex models-info mt-5 mb-5">
                            <div>
                                <p>Stylists</p>
                                <span>0</span>
                            </div>
                            <div>
                                <p>Stylists</p>
                                <span>0</span>
                            </div>
                        </div>
                        {{-- <p><a href="#" class="btn btn-primary px-4 py-3">Read more</a> <a href="#"
                                class="btn btn-primary btn-outline-primary px-4 py-3">View Gallery</a></p> --}}
                    </div>
                </div>
            </div>
        </div>
    @endforelse

</section>
<!-- END slider -->
