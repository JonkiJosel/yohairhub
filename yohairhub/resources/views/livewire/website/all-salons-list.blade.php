<section class="ftco-section" wire:poll.10s>
    <div class="container">
        <div class="row d-flex">
            <div class="col-md-3 mb-5 heading-section ftco-animate">
                <h2 class="mb-4">All Salons</h2>
                <p class="mb-5">Checkout the galleries of all the best salons around town.</p>
            </div>
            @forelse ($salons as $salon)
                <div class="col-md-3 d-flex ftco-animate">
                    <div class="blog-entry align-self-stretch">
                        <a href="{{ route('website.salon.view', ['uuid' => $salon->uuid]) }}" class="block-20"
                            style="background-image: url('{{ asset($salon->image ? 'storage/' . $salon->image : 'looks/images/image_1.jpg') }}');">
                        </a>
                        <div class="text pt-4 d-block">
                            <div class="meta mb-3">
                                <div><a href="#">{{ $salon->address }}</a></div>
                                <div><a href="#">{{ $salon->phone }}</a></div>
                                <div><a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a>
                                </div>
                            </div>
                            <h3 class="heading mt-3"><a
                                    href="{{ route('website.salon.view', ['uuid' => $salon->uuid]) }}">{{ $salon->name }}</a>
                            </h3>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-md-3 d-flex ftco-animate">
                    <div class="blog-entry align-self-stretch">
                        <a href="blog-single.html" class="block-20"
                            style="background-image: url('images/image_1.jpg');">
                        </a>
                        <div class="text pt-4 d-block">
                            <div class="meta mb-3">
                                <div><a href="#">August 12, 2018</a></div>
                                <div><a href="#">Admin</a></div>
                                <div><a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a>
                                </div>
                            </div>
                            <h3 class="heading mt-3"><a href="#">Asia's Next Top Model</a></h3>
                        </div>
                    </div>
                </div>
            @endforelse

        </div>
        {{-- paginations --}}
        <div class="row mt-5">
            <div class="col text-center">
                <div class="block-27">
                    <ul>
                        <!-- Previous Page Link -->
                        @if ($salons->onFirstPage())
                            <li class="disabled"><span>&lt;</span></li>
                        @else
                            <li><a href="{{ $salons->previousPageUrl() }}">&lt;</a></li>
                        @endif

                        <!-- Pagination Links -->
                        @foreach ($salons->links()->elements as $element)
                            @if (is_string($element))
                                <li class="disabled"><span>{{ $element }}</span></li>
                            @endif

                            @if (is_array($element))
                                @foreach ($element as $page => $url)
                                    @if ($page == $salons->currentPage())
                                        <li class="active"><span>{{ $page }}</span></li>
                                    @else
                                        <li><a href="{{ $url }}">{{ $page }}</a></li>
                                    @endif
                                @endforeach
                            @endif
                        @endforeach

                        <!-- Next Page Link -->
                        @if ($salons->hasMorePages())
                            <li><a href="{{ $salons->nextPageUrl() }}">&gt;</a></li>
                        @else
                            <li class="disabled"><span>&gt;</span></li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>

    </div>
</section>
