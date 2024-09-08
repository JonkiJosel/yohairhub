@include('website.partials.header')

@livewire('website.featured-salons-hero')

<section class="ftco-section-2">
    <div class="container-fluid">
        <div class="section-2-blocks-wrapper d-flex row no-gutters">
            <div class="img col-md-6 ftco-animate" style="background-image: url('{{ asset('looks/images/bg_5.jpg') }}');">
            </div>
            <div class="text col-md-6 ftco-animate">
                <div class="text-inner align-self-start">

                    <h3 class="heading">Unlock the door to endless possibilities for your salon</h3>
                    <p>Join us and elevent your business to new heights.</p>
                    <p>Together, let's redifine beauty excellence</p>
                    {{-- <ul class="my-4">
              <li><span class="ion-ios-checkmark-circle mr-2"></span> Even the all-powerful Pointing</li>
              <li><span class="ion-ios-checkmark-circle mr-2"></span> Behind the word mountains</li>
              <li><span class="ion-ios-checkmark-circle mr-2"></span> Separated they live in Bookmarksgrove</li>
          </ul> --}}

                    <div class="row">
                        <div class="col-md-7 ftco-animate">
                            <div class="img-2 d-flex justify-content-center align-items-center"
                                style="background-image: url('{{ asset('looks/images/bg_1.jpg') }}');">
                                <a href="{{asset('looks/images/video.mp4')}}" class="button popup-vimeo"><span
                                        class="ion-ios-play"></span></a>
                            </div>
                        </div>
                        <div class="col-md-4 d-md-flex align-items-center">
                            <h3 class="watchvideo-heading"><a href="#"><span class="ion-ios-play"></span> Watch
                                    our video to learn how to
                                    register your salon</a></h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="ftco-section-2">
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
            {{-- <div class="col-md-3 model-entry ftco-animate">
                <div class="model-img" style="background-image: url({{asset('looks/images/image_1.jpg')}});">
                    <div class="name">
                        <h3><a href="model-single.html">Coleen Husaff</a></h3>
                    </div>
                    <div class="text">
                        <h3><a href="model-single.html">Coleen Husaff</a></h3>
                        <div class="d-flex models-info">
                            <div class="pr-md-3">
                    <p>Height</p>
                    <span>185</span>
                </div>
                <div class="pr-md-3">
                    <p>Bust</p>
                    <span>79</span>
                </div>
                <div class="pr-md-3">
                    <p>Waist</p>
                    <span>40</span>
                </div>
                <div class="pr-md-3">
                    <p>Hips</p>
                    <span>87</span>
                </div>
                <div class="pr-md-3">
                    <p>Shoe</p>
                    <span>40</span>
                </div>
                        </div>
                    </div>
                </div>
            </div> end of fisrt model --}}

            @include('livewire.website.home-hairstyles')

            

            <div class="col-md-3 d-flex justify-content-center align-items-center bg-light ftco-animate">
                <div class="btn-view">
                    <p><a href="{{ route('website.hairstyles') }}">View more</a></p>
                </div>
            </div>
        </div>
    </div>
</section> {{-- end hair styles --}}

@include('website.partials.client-reviews')

{{-- <section class="ftco-section-2">
  <div class="container-fluid">
    <div class="section-2-blocks-wrapper d-flex row no-gutters">
      <div class="img col-md-6 ftco-animate" style="background-image: url('images/bg_6.jpg');">
      </div>
      <div class="text col-md-6 ftco-animate">
        <div class="text-inner align-self-start">
          
          <h3 class="heading">Our services</h3>
          <div class="services d-flex ftco-animate">
              <div class="icon d-flex justify-content-center align-items-center"><span class="flaticon-quality"></span></div>
              <div class="info ml-4">
                  <h3>Fashion Shows</h3>
                  <p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life</p>
              </div>
          </div>
          <div class="services d-flex ftco-animate">
              <div class="icon d-flex justify-content-center align-items-center"><span class="flaticon-megaphone"></span></div>
              <div class="info ml-4">
                  <h3>Corporate Events</h3>
                  <p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life</p>
              </div>
          </div>
          <div class="services d-flex ftco-animate">
              <div class="icon d-flex justify-content-center align-items-center"><span class="flaticon-shopping-bag"></span></div>
              <div class="info ml-4">
                  <h3>Commercial Photo Shots</h3>
                  <p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life</p>
              </div>
          </div>
          <div class="services d-flex ftco-animate">
              <div class="icon d-flex justify-content-center align-items-center"><span class="flaticon-photo-camera"></span></div>
              <div class="info ml-4">
                  <h3>Exhibitions/Trade Shows Shows</h3>
                  <p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life</p>
              </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section> --}}

@livewire('website.trending-salons')

@include('website.partials.call-for-reg')
