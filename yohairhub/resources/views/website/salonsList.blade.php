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

            <section class="hero-wrap" style="background-image: url({{ asset('/looks/images/bg_2.jpg') }});"
                data-stellar-background-ratio="0.5">
                <div class="overlay"></div>
                <div class="container">
                    <div class="row no-gutters text align-items-end justify-content-center" data-scrollax-parent="true">
                        <div class="col-md-8 ftco-animate text-center">
                            <p class="breadcrumbs"><span class="mr-2"><a href="{{route('welcome')}}">Home</a></span>
                                <span>Salons</span>
                            </p>
                            <h1 class="mb-5 bread">Salons</h1>
                        </div>
                    </div>
                </div>
            </section>
            <!-- END slider -->

            @livewire('website.all-salons-list')

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
