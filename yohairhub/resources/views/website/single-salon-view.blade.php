<!DOCTYPE html>
<html lang="en">

<head>
    @include('website.partials.head')
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
                                <span class="mr-2"><a href="{{ route('website.salons') }}">Salons</a></span>
                                <span>{{ $salon->name }}</span>
                            </p>
                            <h1 class="mb-5 bread">{{ $salon->name }}</h1>
                        </div>
                    </div>
                </div>
            </section>
            <!-- END slider -->

            <section class="ftco-section ftco-degree-bg">
                <div class="container">
                    <div class="row">
                        <div class="col-md-8 ftco-animate">
                            <h2 class="mb-3">#1. {{ $salon->name }}</h2>
                            <p>{{ $salon->description }}</p>
                            <p>
                                <img src="{{ $salon->image ? asset('storage/' . $salon->image) : 'looks/images/image_6.jpg' }}"
                                    alt="" class="img-fluid">
                            </p>

                            <div class="profile-info row mt-4">
                                <div class="col-md-6">
                                    <div class="info-item">
                                        <h5 class="fw-bold">Address</h5>
                                        <p>{{ $salon->address }}</p>

                                    </div>
                                    <div class="info-item">
                                        <h5 class="fw-bold">Phone</h5>
                                        <p>{{ $salon->phone }}</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="info-item">
                                        <h5 class="fw-bold">City</h5>
                                        {{-- <p>{{ $salon->description }}</p> --}}
                                        <p class="text-muted">{{ $salon->city }}</p>

                                    </div>
                                    <div class="info-item">
                                        <h5 class="fw-bold">Gender Accepted</h5>
                                        <p>{{ ucfirst($salon->gender_accepted) }}</p>
                                    </div>
                                </div>
                            </div>

                            @livewire('website.single-salon-gallery', ['salon' => $salon])

                            <div class="tag-widget post-tag-container mb-5 mt-5">
                                <div class="tagcloud">
                                    @forelse ($salon->hairStyles as $hairstyle)
                                        <a href="#" class="tag-cloud-link">{{ $hairstyle->hairStyle->name }}</a>

                                    @empty
                                        <a href="#" class="tag-cloud-link">Life</a>
                                    @endforelse
                                </div>
                            </div>

                            {{-- <div class="about-author d-flex p-5 bg-light">
                                <div class="bio align-self-md-center mr-5">
                                    <img src="{{ $salon->owner->user->profile_photo_url }}" alt="Owner's Profile Picture" class="img-fluid mb-4">
                                </div>
                                <div class="desc align-self-md-center">
                                    <h3>{{ $salon->owner->user->name }}</h3>
                                    <p>
                                        "Welcome to {{ $salon->name }}, your ultimate destination for beauty and style
                                        in {{ $salon->city }}! As the owner, I'm delighted to invite you to experience
                                        our warm and welcoming atmosphere. Our talented team is dedicated to making you
                                        look and feel your best, whether you’re here for a stunning new haircut, vibrant
                                        color, or a relaxing spa treatment. We take pride in delivering personalized
                                        service and top-notch care to each of our clients. Come join us at
                                        {{ $salon->name }}, where your beauty and satisfaction are our top priorities.
                                        We look forward to meeting you and helping you shine!"
                                    </p>
                                </div>
                            </div> --}}
                            <div
                                class="about-author bg-light p-5 rounded-lg shadow-md flex flex-col md:flex-row items-center justify-center space-y-4 md:space-y-0">
                                {{-- <div class="bio md:mr-5">
                                    <img src="{{ $salon->owner->user->profile_photo_url }}" alt="Owner's Profile Picture" class="w-32 h-32 md:w-40 md:h-40 rounded-full object-cover mb-4 md:mb-0">
                                </div> --}}
                                <div class="desc text-center md:text-left">
                                    <h3 class="text-2xl md:text-3xl font-bold text-gray-800">
                                        {{ $salon->owner->user->name }}</h3>
                                    <p class="text-gray-600">
                                        "Welcome to {{ $salon->name }}, your go-to destination for beauty and style in
                                        {{ $salon->city }}! As the owner, I'm thrilled to invite you to immerse
                                        yourself in our warm and welcoming atmosphere. Our talented team is dedicated to
                                        enhancing your natural beauty, whether you’re seeking a stunning new haircut,
                                        vibrant color, or a soothing spa treatment. We take pride in providing
                                        personalized service and exceptional care to each of our clients. Visit us at
                                        {{ $salon->name }} and let us prioritize your beauty and satisfaction. We look
                                        forward to meeting you and helping you shine!"
                                    </p>
                                </div>
                            </div>



                            <div class="pt-5 mt-5">
                                <h3 class="mb-5">{{ $salon->comments->count() ?? 1 }} Comments</h3>
                                <ul class="comment-list">


                                    @forelse ($salon->comments as $comment)
                                        <li class="comment">
                                            <div class="vcard bio">
                                                <img src="{{ asset('looks/images/person_1.jpg') }}"
                                                    alt="Image placeholder">
                                            </div>
                                            <div class="comment-body">
                                                <h3>{{ $comment->name }}</h3>
                                                <div class="meta">
                                                    {{ $comment->created_at->format('F d, Y \a\t h:ia') }}</div>
                                                <p>{{ $comment->comment }}</p>
                                                {{-- <p><a href="#" class="reply">Reply</a></p> --}}
                                            </div>
                                        </li>
                                    @empty
                                        <li class="comment">
                                            <div class="vcard bio">
                                                <img src="{{ asset('looks/images/person_1.jpg') }}"
                                                    alt="Image placeholder">
                                            </div>
                                            <div class="comment-body">
                                                <h3>Josel Nkinzi</h3>
                                                <div class="meta">May 18, 2024 at 10:30am</div>
                                                <p>Be the first to leave a comment and share your experience at
                                                    {{ $salon->name }}!</p>

                                                {{-- <p><a href="#" class="reply">Reply</a></p> --}}
                                            </div>
                                        </li>
                                    @endforelse

                                </ul>
                                <!-- END comment-list -->

                                @include('livewire.website.new-comment-form')
                            </div>

                        </div> <!-- .col-md-8 -->
                        <div class="col-md-4 sidebar ftco-animate">
                            {{-- <div class="sidebar-box">
                                <form action="#" class="search-form">
                                    <div class="form-group">
                                        <span class="icon fa fa-search"></span>
                                        <input type="text" class="form-control"
                                            placeholder="Type a keyword and hit enter">
                                    </div>
                                </form>
                            </div> --}}
                            <div class="sidebar-box ftco-animate">
                                <div class="categories">
                                    <h3>Our service</h3>
                                    @forelse ($salon->services as $service)
                                        <li><a href="#">{{ $service->name }}
                                                <span>(UGX {{ number_format($service->price, 2) }})</span></a></li>
                                    @empty
                                        <li><a href="#">No services to show <span>(12)</span></a></li>
                                    @endforelse

                                </div>
                            </div>


                            <div class="sidebar-box ftco-animate">
                                <h3>Hair Styles</h3>
                                <div class="tagcloud">
                                    @forelse ($salon->hairStyles as $hairstyle)
                                        <a href="#" class="tag-cloud-link">{{ $hairstyle->hairStyle->name }}</a>
                                    @empty
                                        <a href="#" class="tag-cloud-link">Life</a>
                                    @endforelse
                                </div>
                            </div>

                            <div class="sidebar-box ftco-animate">
                                <h3>{{ config('app.name', 'YoHairHub') }}</h3>
                                <p>Welcome to {{ config('app.name', 'YoHairhub') }} powered by cutting-edge technology
                                    designed to redefine your beauty experience. This system seamlessly connects you
                                    with top-tier salons across the city, offering a diverse range of services tailored
                                    to your unique style preferences. Whether you're looking for a trendy haircut, a
                                    vibrant new color, or a relaxing spa day, our platform ensures you receive
                                    personalized care and exceptional service at every visit. Join us and discover how
                                    we prioritize your beauty and satisfaction, making every salon visit an opportunity
                                    to shine.</p>
                            </div>

                            @livewire('website.featured-salons-aside')

                        </div>

                    </div>
                </div>
            </section> <!-- .section -->


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
