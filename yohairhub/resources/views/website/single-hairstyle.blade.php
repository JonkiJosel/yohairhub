<!DOCTYPE html>
<html lang="en">

<head>
    @include('website.partials.head')

    <style>
        .card {
            /* Ensure card content doesn't exceed the height of the image */
            display: flex;
            flex-direction: column;
            height: 100%;
        }

        .card-img-top {
            /* Ensure all images have the same height */
            height: 300px;
            /* Adjust as necessary for uniformity */
            object-fit: cover;
        }

        @media (max-width: 768px) {
            .card-img-top {
                height: 250px;
                /* Adjust card image height for smaller screens */
            }
        }

        /* Custom CSS for carousel items */
        .carousel-model {
            position: relative;
            height: 400px;
            /* Set a fixed height for the carousel */
            overflow: hidden;
        }

        .carousel-model .items {
            width: 100%;
            height: 100%;
        }

        .carousel-model img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
    </style>
</head>

<body>

    <div class="page">
        @include('website.partials.navbar')

        <div id="colorlib-page">
            @include('website.partials.header')

            <section class="hero-wrap" style="background-image: url({{ asset('looks/images/bg_2.jpg') }});"
                data-stellar-background-ratio="0.5">
                <div class="overlay"></div>
                <div class="container">
                    <div class="row no-gutters text align-items-end justify-content-center" data-scrollax-parent="true">
                        <div class="col-md-8 ftco-animate text-center">
                            <p class="breadcrumbs"><span class="mr-2"><a href="{{ route('welcome') }}">Home</a></span>
                                <span class="mr-2"><a href="{{ route('website.hairstyles') }}">Hair Styles</a></span>
                                <span>{{ $hairstyle->name }}</span>
                            </p>
                            <h1 class="mb-5 bread">Hair Style Details</h1>
                        </div>
                    </div>
                </div>
            </section>

            <section class="ftco-section">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-10">
                            <div class="row model-detail d-mf-flex align-items-center">
                                <div class="col-md-6 ftco-animate">
                                    <div class="carousel-model owl-carousel">

                                        @forelse ($hairstyle->getGalleryImages() as $image)
                                            <div class="items">
                                                <img src="{{ asset('storage/' . $image->image_path) }}"
                                                    class="img-fluid"
                                                    alt="{{ config('app.name', 'YoHairHub') . ' - hairstyle image' }}">
                                            </div>
                                        @empty
                                            <div class="items">
                                                <img src="{{ asset('storage/' . $hairstyle->model_image_path) }}"
                                                    class="img-fluid"
                                                    alt="{{ config('app.name', 'YoHairHub') . ' - hairstyle image' }}">
                                            </div>
                                        @endforelse

                                    </div>
                                </div>
                                <div class="col-md-1"></div>
                                <div class="col-md-5 model-info ftco-animate">
                                    <h3 class="mb-4">{{ $hairstyle->name }}</h3>
                                    <p><span>Salons</span> <span>{{ $hairstyle->salons->count() }}</span></p>

                                    <p class="mt-4"><a href="#modalRequest" data-toggle="modal"
                                            class="btn btn-primary py-3 px-4">Request a
                                            Quote</a></p>
                                </div>
                            </div>
                            <div class="row no-gutters mt-5">
                                @forelse ($hairstyle->salons as $salon)
                                    <div class="col-md-6 col-lg-4 mb-4">
                                        <div class="card">
                                            @php
                                                $randomImage = $salon->galleryImages->isEmpty()
                                                    ? asset('storage/'. $salon->salon->image)
                                                    : asset('storage/' . $salon->galleryImages->random()->image_path);
                                            @endphp
                                            <img src="{{ $randomImage }}" class="card-img-top"
                                                alt="{{ $salon->salon->name }}">
                                            <div class="card-body">
                                                <h5 class="card-title">{{ $salon->salon->name }}</h5>
                                                <p class="card-text">{{ $salon->salon->address }}</p>
                                                <a href="{{ route('website.salon.view', ['uuid' => $salon->salon->uuid]) }}"
                                                    target="_blank" class="btn btn-primary">Book Now</a>
                                            </div>
                                            <div class="card-footer">
                                                <small class="text-muted">Salon with {{ $hairstyle->name }}
                                                    hairstyle</small>
                                            </div>
                                        </div>
                                    </div>
                                @empty
                                    <div class="col-md-12 text-center">
                                        <p>No salons available for this hairstyle.</p>
                                    </div>
                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            @include('website.partials.call-for-reg')

            @include('website.partials.footer')

        </div>

        <!-- Modal -->
        <div class="modal fade" id="modalRequest" tabindex="-1" role="dialog" aria-labelledby="modalRequestLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalRequestLabel">Request a Quote</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="#">
                            <div class="form-group">
                                <label for="appointment_name" class="text-black">Full Name</label>
                                <input type="text" class="form-control" id="appointment_name">
                            </div>
                            <div class="form-group">
                                <label for="appointment_email" class="text-black">Email</label>
                                <input type="text" class="form-control" id="appointment_email">
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="appointment_date" class="text-black">Date</label>
                                        <input type="text" class="form-control" id="appointment_date">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="appointment_time" class="text-black">Time</label>
                                        <input type="text" class="form-control" id="appointment_time">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="appointment_message" class="text-black">Message</label>
                                <textarea name="" id="appointment_message" class="form-control" cols="30" rows="10"></textarea>
                            </div>
                            <div class="form-group">
                                <input type="submit" value="Send Message" class="btn btn-primary">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('website.partials.scripts')

</body>

</html>
