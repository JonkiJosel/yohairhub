{{-- Because she competes with no one, no one can compete with her. --}}
@forelse ($hairstyles as $hairstyle)
    <div class="col-md-3 model-entry ftco-animate">
        {{-- determine image --}}
        @php
            $imagePath = $hairstyle->model_image_path;
            if (!$imagePath) {
                $randomGalleryImage = $hairstyle->getRandomGalleryImage();
                $imagePath = $randomGalleryImage
                    ? asset('storage/' . $randomGalleryImage->image_path)
                    : asset('looks/images/image_1.jpg');
            } else {
                $imagePath = asset('storage/' . $imagePath);
            }
        @endphp
        <div class="model-img" style="background-image: url({{ $imagePath }});">
            <div class="name">
                <h3><a
                        href="{{ route('website.hairstyles.single', ['uuid' => $hairstyle->uuid]) }}">{{ $hairstyle->name }}</a>
                </h3>
            </div>
            <div class="text">
                <h3><a
                        href="{{ route('website.hairstyles.single', ['uuid' => $hairstyle->uuid]) }}">{{ $hairstyle->name }}</a>
                </h3>
                <div class="d-flex models-info">
                    <div class="pr-md-3">
                        <p>Salons</p>
                        <span>{{ $hairstyle->salons->count() }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
@empty
    <div class="col-md-3 model-entry ftco-animate">
        <div class="model-img" style="background-image: url({{ asset('looks/images/image_1.jpg') }});">
            <div class="name">
                <h3><a href="model-single.html">Ooopps!!</a></h3>
            </div>
            <div class="text">
                <h3><a href="model-single.html">Nothing yet. Please try again later</a></h3>
                <div class="d-flex models-info">
                    <div class="pr-md-3">
                        <p>Salons</p>
                        <span>0</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endforelse
