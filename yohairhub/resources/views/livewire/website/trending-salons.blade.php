<section class="ftco-section">
    <div class="container">
        <div class="row d-flex">
            <div class="col-md-3 mb-5 heading-section ftco-animate">
                <h2 class="mb-4">Trending Salons</h2>
                <p class="mb-5">Get the best hairdressers in your city</p>
                <p class="btn-view"><a href="{{ route('website.salons') }}">View more</a></p>
            </div>

            @foreach ($salons as $salon)
                <div class="col-md-3 d-flex ftco-animate">
                    <div class="blog-entry align-self-stretch">
                        <a href="{{ route('website.salon.view', ['uuid' => $salon->uuid]) }}" class="block-20"
                            style="background-image: url('{{ asset('storage/' . $salon->image) }}');">
                        </a>
                        <div class="text pt-4 d-block">
                            <div class="meta mb-3">
                                <div><a href="#">{{ $salon->address }}</a></div>
                                <div><a href="#">{{ $salon->phone }}</a></div>
                                <div><a href="{{ route('website.salon.view', ['uuid' => $salon->uuid]) }}"
                                        class="meta-chat"><span class="icon-chat"></span>
                                        3</a></div>
                            </div>
                            <h3 class="heading mt-3"><a
                                    href="{{ route('website.salon.view', ['uuid' => $salon->uuid]) }}">{{ $salon->name }}</a>
                            </h3>
                        </div>
                    </div>
                </div>
            @endforeach

            {{-- <div class="col-md-3 d-flex ftco-animate">
                <div class="blog-entry align-self-stretch">
                    <a href="blog-single.html" class="block-20"
                        style="background-image: url('{{ asset('looks/images/image_2.jpg') }}');">
                    </a>
                    <div class="text pt-4 d-block">
                        <div class="meta mb-3">
                            <div><a href="#">August 12, 2018</a></div>
                            <div><a href="#">Admin</a></div>
                            <div><a href="#" class="meta-chat"><span class="icon-chat"></span>
                                    3</a></div>
                        </div>
                        <h3 class="heading mt-3"><a href="#">Asia's Next Top Model</a></h3>
                    </div>
                </div>
            </div>
            <div class="col-md-3 d-flex ftco-animate">
                <div class="blog-entry align-self-stretch">
                    <a href="blog-single.html" class="block-20"
                        style="background-image: url('{{ asset('looks/images/image_3.jpg') }}');">
                    </a>
                    <div class="text pt-4 d-block">
                        <div class="meta mb-3">
                            <div><a href="#">August 12, 2018</a></div>
                            <div><a href="#">Admin</a></div>
                            <div><a href="#" class="meta-chat"><span class="icon-chat"></span>
                                    3</a></div>
                        </div>
                        <h3 class="heading mt-3"><a href="#">Asia's Next Top Model</a></h3>
                    </div>
                </div>
            </div> --}}
        </div>
    </div>
</section>
