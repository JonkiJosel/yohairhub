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
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis, eius mollitia
                                suscipit, quisquam doloremque distinctio perferendis et doloribus unde architecto optio
                                laboriosam porro adipisci sapiente officiis nemo accusamus ad praesentium? Esse minima
                                nisi et. Dolore perferendis, enim praesentium omnis, iste doloremque quia officia optio
                                deserunt molestiae voluptates soluta architecto tempora.</p>
                            <p>
                                <img src="{{ $salon->image ? asset('storage/' . $salon->image) : 'looks/images/image_6.jpg' }}"
                                    alt="" class="img-fluid">
                            </p>
                            <p>Molestiae cupiditate inventore animi, maxime sapiente optio, illo est nemo veritatis
                                repellat sunt doloribus nesciunt! Minima laborum magni reiciendis qui voluptate quisquam
                                voluptatem soluta illo eum ullam incidunt rem assumenda eveniet eaque sequi deleniti
                                tenetur dolore amet fugit perspiciatis ipsa, odit. Nesciunt dolor minima esse vero ut
                                ea, repudiandae suscipit!</p>
                            <h2 class="mb-3 mt-5">#2. Our Gallery</h2>
                            <p>Gallery here</p>
                            <div class="tag-widget post-tag-container mb-5 mt-5">
                                <div class="tagcloud">
                                    <a href="#" class="tag-cloud-link">Life</a>
                                    <a href="#" class="tag-cloud-link">Sport</a>
                                    <a href="#" class="tag-cloud-link">Tech</a>
                                    <a href="#" class="tag-cloud-link">Travel</a>
                                </div>
                            </div>

                            <div class="about-author d-flex p-5 bg-light">
                                <div class="bio align-self-md-center mr-5">
                                    <img src="images/person_1.jpg" alt="Image placeholder" class="img-fluid mb-4">
                                </div>
                                <div class="desc align-self-md-center">
                                    <h3>Josel Nkinzi</h3>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus itaque, autem
                                        necessitatibus voluptate quod mollitia delectus aut, sunt placeat nam vero culpa
                                        sapiente consectetur similique, inventore eos fugit cupiditate numquam!</p>
                                </div>
                            </div>


                            <div class="pt-5 mt-5">
                                <h3 class="mb-5">6 Comments</h3>
                                <ul class="comment-list">
                                    <li class="comment">
                                        <div class="vcard bio">
                                            <img src="{{ asset('looks/images/person_1.jpg') }}" alt="Image placeholder">
                                        </div>
                                        <div class="comment-body">
                                            <h3>John Doe</h3>
                                            <div class="meta">June 27, 2018 at 2:21pm</div>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur quidem
                                                laborum necessitatibus, ipsam impedit vitae autem, eum officia, fugiat
                                                saepe enim sapiente iste iure! Quam voluptas earum impedit
                                                necessitatibus, nihil?</p>
                                            {{-- <p><a href="#" class="reply">Reply</a></p> --}}
                                        </div>
                                    </li>

                                </ul>
                                <!-- END comment-list -->

                                <div class="comment-form-wrap pt-5">
                                    <h3 class="mb-5">Leave a comment</h3>
                                    <form action="#" class="p-5 bg-light">
                                        <div class="form-group">
                                            <label for="name">Name *</label>
                                            <input type="text" class="form-control" id="name">
                                        </div>
                                        <div class="form-group">
                                            <label for="email">Email *</label>
                                            <input type="email" class="form-control" id="email">
                                        </div>
                                        <div class="form-group">
                                            <label for="website">Website</label>
                                            <input type="url" class="form-control" id="website">
                                        </div>

                                        <div class="form-group">
                                            <label for="message">Message</label>
                                            <textarea name="" id="message" cols="30" rows="10" class="form-control"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <input type="submit" value="Post Comment"
                                                class="btn py-3 px-4 btn-primary">
                                        </div>

                                    </form>
                                </div>
                            </div>

                        </div> <!-- .col-md-8 -->
                        <div class="col-md-4 sidebar ftco-animate">
                            <div class="sidebar-box">
                                <form action="#" class="search-form">
                                    <div class="form-group">
                                        <span class="icon fa fa-search"></span>
                                        <input type="text" class="form-control"
                                            placeholder="Type a keyword and hit enter">
                                    </div>
                                </form>
                            </div>
                            <div class="sidebar-box ftco-animate">
                                <div class="categories">
                                    <h3>Our service</h3>
                                    @forelse ($salon->services as $service)
                                        <li><a href="#">{{ $service->name }}
                                                <span>(UGX {{ $service->price }})</span></a></li>
                                    @empty
                                        <li><a href="#">No services to show <span>(12)</span></a></li>
                                    @endforelse

                                </div>
                            </div>

                            @livewire('website.featured-salons-aside')

                            <div class="sidebar-box ftco-animate">
                                <h3>Hair Styles</h3>
                                <div class="tagcloud">
                                    <a href="#" class="tag-cloud-link">dish</a>
                                    <a href="#" class="tag-cloud-link">menu</a>
                                    <a href="#" class="tag-cloud-link">food</a>
                                    <a href="#" class="tag-cloud-link">sweet</a>
                                    <a href="#" class="tag-cloud-link">tasty</a>
                                    <a href="#" class="tag-cloud-link">delicious</a>
                                    <a href="#" class="tag-cloud-link">desserts</a>
                                    <a href="#" class="tag-cloud-link">drinks</a>
                                </div>
                            </div>

                            <div class="sidebar-box ftco-animate">
                                <h3>{{ config('app.name', 'YoHairHub') }}</h3>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus itaque, autem
                                    necessitatibus voluptate quod mollitia delectus aut, sunt placeat nam vero culpa
                                    sapiente consectetur similique, inventore eos fugit cupiditate numquam!</p>
                            </div>
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
