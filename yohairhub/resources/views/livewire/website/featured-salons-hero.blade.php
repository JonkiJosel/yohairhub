<section class="home-slider owl-carousel">

    @forelse ($salons as $salon)
        <div class="slider-item"
            style="background-image: url('{{ asset($salon->image ? 'storage/' . $salon->image : 'looks/images/bg_1.jpg') }}');">
            <div class="overlay"></div>
            <div class="container">
                <div class="row slider-text justify-content-start align-items-center" data-scrollax-parent="true">
                    <div class="col-md-8 col-lg-7 col-sm-12 ftco-animate text mb-4"
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
                        <h1 class="mb-3" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Kate
                            Henderson</h1>
                        <div class="d-md-flex models-info mt-5 mb-5">
                            <div>
                                <p>Height</p>
                                <span>185</span>
                            </div>
                            <div>
                                <p>Bust</p>
                                <span>79</span>
                            </div>
                            <div>
                                <p>Waist</p>
                                <span>40</span>
                            </div>
                            <div>
                                <p>Hips</p>
                                <span>87</span>
                            </div>
                            <div>
                                <p>Shoe</p>
                                <span>40</span>
                            </div>
                            <div>
                                <p>Eyes</p>
                                <span>Blue</span>
                            </div>
                            <div>
                                <p>Hair</p>
                                <span>Brunet</span>
                            </div>
                        </div>
                        <p><a href="#" class="btn btn-primary px-4 py-3">Read more</a> <a href="#"
                                class="btn btn-primary btn-outline-primary px-4 py-3">View Gallery</a></p>
                    </div>
                </div>
            </div>
        </div>
    @endforelse


    {{-- <div class="slider-item" style="background-image: url('{{ asset('looks/images/bg_2.jpg') }}');">
        <div class="overlay"></div>
        <div class="container">
            <div class="row slider-text justify-content-start align-items-center" data-scrollax-parent="true">
                <div class="col-md-8 col-lg-7 col-sm-12 ftco-animate text mb-4"
                    data-scrollax=" properties: { translateY: '70%' }">
                    <span class="position">Super Model's</span>
                    <h1 class="mb-3" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">
                        Samantha Lewis</h1>
                    <div class="d-md-flex models-info mt-5 mb-5">
                        <div>
                            <p>Height</p>
                            <span>185</span>
                        </div>
                        <div>
                            <p>Bust</p>
                            <span>79</span>
                        </div>
                        <div>
                            <p>Waist</p>
                            <span>40</span>
                        </div>
                        <div>
                            <p>Hips</p>
                            <span>87</span>
                        </div>
                        <div>
                            <p>Shoe</p>
                            <span>40</span>
                        </div>
                        <div>
                            <p>Eyes</p>
                            <span>Blue</span>
                        </div>
                        <div>
                            <p>Hair</p>
                            <span>Brunet</span>
                        </div>
                    </div>
                    <p><a href="#" class="btn btn-primary px-4 py-3">Read more</a> <a href="#"
                            class="btn btn-primary btn-outline-primary px-4 py-3">View Gallery</a></p>
                </div>
            </div>
        </div>
    </div>

    <div class="slider-item" style="background-image: url('{{ asset('looks/images/bg_3.jpg') }}');">
        <div class="overlay"></div>
        <div class="container">
            <div class="row slider-text justify-content-start align-items-center" data-scrollax-parent="true">
                <div class="col-md-8 col-lg-7 col-sm-12 ftco-animate text mb-4"
                    data-scrollax=" properties: { translateY: '70%' }">
                    <span class="position">Photo Model's</span>
                    <h1 class="mb-3" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">
                        Jessica Alba</h1>
                    <div class="d-md-flex models-info mt-5 mb-5">
                        <div>
                            <p>Height</p>
                            <span>185</span>
                        </div>
                        <div>
                            <p>Bust</p>
                            <span>79</span>
                        </div>
                        <div>
                            <p>Waist</p>
                            <span>40</span>
                        </div>
                        <div>
                            <p>Hips</p>
                            <span>87</span>
                        </div>
                        <div>
                            <p>Shoe</p>
                            <span>40</span>
                        </div>
                        <div>
                            <p>Eyes</p>
                            <span>Blue</span>
                        </div>
                        <div>
                            <p>Hair</p>
                            <span>Brunet</span>
                        </div>
                    </div>
                    <p><a href="#" class="btn btn-primary px-4 py-3">Read more</a> <a href="#"
                            class="btn btn-primary btn-outline-primary px-4 py-3">View Gallery</a></p>
                </div>
            </div>
        </div>
    </div>

    <div class="slider-item" style="background-image: url('{{ asset('looks/images/bg_4.jpg') }}');">
        <div class="overlay"></div>
        <div class="container">
            <div class="row slider-text justify-content-start align-items-center" data-scrollax-parent="true">
                <div class="col-md-8 col-lg-7 col-sm-12 ftco-animate text mb-4"
                    data-scrollax=" properties: { translateY: '70%' }">
                    <span class="position">Photo Model's</span>
                    <h1 class="mb-3" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">
                        Michael Buff</h1>
                    <div class="d-md-flex models-info mt-5 mb-5">
                        <div>
                            <p>Height</p>
                            <span>185</span>
                        </div>
                        <div>
                            <p>Bust</p>
                            <span>79</span>
                        </div>
                        <div>
                            <p>Waist</p>
                            <span>40</span>
                        </div>
                        <div>
                            <p>Hips</p>
                            <span>87</span>
                        </div>
                        <div>
                            <p>Shoe</p>
                            <span>40</span>
                        </div>
                        <div>
                            <p>Eyes</p>
                            <span>Blue</span>
                        </div>
                        <div>
                            <p>Hair</p>
                            <span>Brunet</span>
                        </div>
                    </div>
                    <p><a href="#" class="btn btn-primary px-4 py-3">Read more</a> <a href="#"
                            class="btn btn-primary btn-outline-primary px-4 py-3">View Gallery</a></p>
                </div>
            </div>
        </div>
    </div> --}}
</section>
<!-- END slider -->
