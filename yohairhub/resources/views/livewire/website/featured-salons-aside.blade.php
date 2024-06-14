<div class="sidebar-box ftco-animate">
    <h3>Featured Salons</h3>
    @forelse ($salons as $salon)
        <div class="block-21 mb-4 d-flex">
            <a class="blog-img mr-4"
                style="background-image: url('{{ asset($salon->image ? 'storage/' . $salon->image : 'looks/images/image_1.jpg') }}');"></a>
            <div class="text">
                <h3 class="heading"><a
                        href="{{ route('website.salon.view', ['uuid' => $salon->uuid]) }}">{{ $salon->name }}</a></h3>
                <div class="meta">
                    <div><a href="{{ route('website.salon.view', ['uuid' => $salon->uuid]) }}"><span
                                class="icon-calendar"></span> July 12,
                            2018</a></div>
                    <div><a href="{{ route('website.salon.view', ['uuid' => $salon->uuid]) }}"><span
                                class="icon-person"></span> Admin</a></div>
                    <div><a href="{{ route('website.salon.view', ['uuid' => $salon->uuid]) }}"><span
                                class="icon-chat"></span> 19</a></div>
                </div>
            </div>
        </div>
    @empty
        <div class="block-21 mb-4 d-flex">
            <a class="blog-img mr-4" style="background-image: url(images/image_1.jpg);"></a>
            <div class="text">
                <h3 class="heading"><a href="#">Ooops!! there's none</a></h3>
                <div class="meta">
                    <div><a href="#"><span class="icon-calendar"></span> July 12,
                            2018</a></div>
                    <div><a href="#"><span class="icon-person"></span> Admin</a></div>
                    <div><a href="#"><span class="icon-chat"></span> 19</a></div>
                </div>
            </div>
        </div>
    @endforelse
    {{-- <div class="block-21 mb-4 d-flex">
        <a class="blog-img mr-4" style="background-image: url(images/image_2.jpg);"></a>
        <div class="text">
            <h3 class="heading"><a href="#">Even the all-powerful Pointing has no
                    control about the blind texts</a></h3>
            <div class="meta">
                <div><a href="#"><span class="icon-calendar"></span> July 12,
                        2018</a></div>
                <div><a href="#"><span class="icon-person"></span> Admin</a></div>
                <div><a href="#"><span class="icon-chat"></span> 19</a></div>
            </div>
        </div>
    </div>
    <div class="block-21 mb-4 d-flex">
        <a class="blog-img mr-4" style="background-image: url(images/image_3.jpg);"></a>
        <div class="text">
            <h3 class="heading"><a href="#">Even the all-powerful Pointing has no
                    control about the blind texts</a></h3>
            <div class="meta">
                <div><a href="#"><span class="icon-calendar"></span> July 12,
                        2018</a></div>
                <div><a href="#"><span class="icon-person"></span> Admin</a></div>
                <div><a href="#"><span class="icon-chat"></span> 19</a></div>
            </div>
        </div>
    </div> --}}
</div>
