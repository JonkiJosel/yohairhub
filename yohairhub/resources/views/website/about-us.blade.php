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
                                <span>About</span>
                            </p>
                            <h1 class="mb-5 bread">About Us</h1>
                        </div>
                    </div>
                </div>
            </section>
            <!-- END slider -->

            <section class="ftco-section-2">
                <div class="container-fluid">
                    <div class="section-2-blocks-wrapper d-flex row no-gutters">
                        <div class="img col-md-6 ftco-animate"
                            style="background-image: url('{{ asset('looks/images/bg_5.jpg') }}');">
                        </div>
                        <div class="text col-md-6 ftco-animate">
                            <div class="text-inner align-self-start">

                                <h3 class="heading">{{ config('app.name', 'YoHairHub') }}</h3>
                                <p>Far far away,<strong>creative</strong> behind the word mountains, far from the
                                    countries Vokalia and Consonantia, there live the <strong>success</strong> blind
                                    texts. Separated they live in Bookmarksgrove</p>
                                <ul class="my-4">
                                    <li><span class="ion-ios-checkmark-circle mr-2"></span> Even the all-powerful
                                        Pointing</li>
                                    <li><span class="ion-ios-checkmark-circle mr-2"></span> Behind the word mountains
                                    </li>
                                    <li><span class="ion-ios-checkmark-circle mr-2"></span> Separated they live in
                                        Bookmarksgrove</li>
                                </ul>

                                {{-- <div class="row">
                                    <div class="col-md-7 ftco-animate">
                                        <div class="img-2 d-flex justify-content-center align-items-center"
                                            style="background-image: url('images/bg_1.jpg');">
                                            <a href="https://vimeo.com/45830194" class="button popup-vimeo"><span
                                                    class="ion-ios-play"></span></a>
                                        </div>
                                    </div>
                                    <div class="col-md-4 d-md-flex align-items-center">
                                        <h3 class="watchvideo-heading"><a href="#"><span
                                                    class="ion-ios-play"></span> Watch our video promo</a></h3>
                                    </div>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </section>


            @include('website.partials.client-reviews')


            {{-- @include('website.partials.services') --}}

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
