<div>
    {{-- Nothing in the world is as soft and yielding as water. --}}

    <h2 class="mb-3 mt-5">#2. Our Gallery</h2>

    <div class="container my-4">
        <div class="row">
            @forelse ($salon->galleryImages as $image)
                <div class="col-md-6 mb-4">
                    <div class="card shadow-sm">
                        <img src="{{ asset('storage/' . $image->image_path) }}" class="card-img-top img-fluid"
                            alt="Gallery Image" />
                        <div class="card-body text-center">
                            <h5 class="card-title">{{ $image->salonHairStyle->hairStyle->name }}</h5>
                            <p class="card-text">UGX {{ number_format($image->salonHairStyle->custom_price, 2) }}</p>
                            <div class="btn-group" role="group">
                                <!-- View Larger Button -->
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#imageModal"
                                    onclick="showImage('{{ asset('storage/' . $image->image_path) }}')">View</button>
                                <!-- Download Button -->
                                <a href="{{ asset('storage/' . $image->image_path) }}" class="btn btn-secondary"
                                    download>Download</a>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <p class="text-center">Oops!! No gallery items yet.</p>
            @endforelse
        </div>
    </div>



</div>
