<section class="ftco-section-2 mb-5 pb-5">
    <div class="container-fluid">
        <div class="row d-flex no-gutters">
            <div class="col-md-6 d-flex align-items-center heading-section ftco-animate bg-light">
                <div class="col-md-9">
                    <div class="p-5">
                        <h2 class="mb-4">Trending Hair Styles</h2>
                        <p>we care for your beauty</p>
                    </div>
                </div>
            </div>
            @include('livewire.website.home-hairstyles')

        </div>
        <div class="row no-gutters mt-5">
            <div class="col text-center">
                <div class="block-27">
                    <ul>
                        <!-- Previous Page Link -->
                        @if ($hairstyles->onFirstPage())
                            <li class="disabled"><span>&lt;</span></li>
                        @else
                            <li><a href="{{ $hairstyles->previousPageUrl() }}">&lt;</a></li>
                        @endif

                        <!-- Pagination Links -->
                        @foreach ($hairstyles->links()->elements as $element)
                            @if (is_string($element))
                                <li class="disabled"><span>{{ $element }}</span></li>
                            @endif

                            @if (is_array($element))
                                @foreach ($element as $page => $url)
                                    @if ($page == $hairstyles->currentPage())
                                        <li class="active"><span>{{ $page }}</span></li>
                                    @else
                                        <li><a href="{{ $url }}">{{ $page }}</a></li>
                                    @endif
                                @endforeach
                            @endif
                        @endforeach

                        <!-- Next Page Link -->
                        @if ($hairstyles->hasMorePages())
                            <li><a href="{{ $hairstyles->nextPageUrl() }}">&gt;</a></li>
                        @else
                            <li class="disabled"><span>&gt;</span></li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
