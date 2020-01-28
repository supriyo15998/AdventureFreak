<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>{{ $title }}</title>
    <link rel="icon" href="./img/core-img/favicon2.png">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div id="preloader">
        <div class="loader"></div>
    </div>
    @include('layouts.nav')
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Excited for you travel?</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            Book your travel ASAP!
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <a href="{{ route('contact') }}" class="btn btn-primary">Contact Us</a>
          </div>
        </div>
      </div>
    </div>

    <!-- modal end
    -->
    <section class="welcome-area">
        <div class="welcome-slides owl-carousel">
            <div class="single-welcome-slide bg-img bg-overlay" style="background-image: url(img/bg-img/16a.jpg);" data-img-url="img/bg-img/16.jpg">
                <div class="welcome-content h-100">
                    <div class="container h-100">
                        <div class="row h-100 align-items-center">
                            <div class="col-12">
                                <div class="welcome-text text-center">
                                    <h6 data-animation="fadeInLeft" data-delay="200ms">Tour &amp; Travels</h6>
                                    <h2 data-animation="fadeInLeft" data-delay="500ms">Welcome To AdventureFreak</h2>
                                    <a href="{{ route('adventurous_tour') }}" class="btn roberto-btn btn-2" data-animation="fadeInLeft" data-delay="800ms">Show Packages</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="single-welcome-slide bg-img bg-overlay" style="background-image: url(img/bg-img/17b.jpg);" data-img-url="img/bg-img/17.jpg">
                <div class="welcome-content h-100">
                    <div class="container h-100">
                        <div class="row h-100 align-items-center">
                            <div class="col-12">
                                <div class="welcome-text text-center">
                                    <h6 data-animation="fadeInUp" data-delay="200ms">Tour &amp; Travels</h6>
                                    <h2 data-animation="fadeInUp" data-delay="500ms">Welcome To AdventureFreak</h2>
                                    <a href="{{ route('contact') }}" class="btn roberto-btn btn-2" data-animation="fadeInUp" data-delay="800ms">Contact Us</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="roberto-about-area section-padding-100-0">
        <div class="hotel-search-form-area">
            <div class="container-fluid">
                <div class="hotel-search-form">
                    <p style="text-align: center; font-size: 35px">Best adventure experiences</p>
                </div>
            </div>
        </div>
        <div class="container mt-100">
            <div class="row align-items-center">
                <div class="col-12 col-lg-6">
                    <div class="section-heading wow fadeInUp" data-wow-delay="100ms">
                        <h6>About Us</h6>
                        <h2>Welcome to <br>AdventureFreak</h2>
                    </div>
                    <div class="about-us-content mb-100">
                        <h5 class="wow fadeInUp" data-wow-delay="300ms">We are happy to announce that we are conducting 37+ treks officially throughout India.</h5>
                        <p class="wow fadeInUp" data-wow-delay="400ms">Founder: <span>Supriyo Das</span></p>
                        <img src="img/core-img/signature1.png" alt="" class="wow fadeInUp" data-wow-delay="500ms">
                    </div>
                </div>

                <div class="col-12 col-lg-6">
                    <div class="about-us-thumbnail mb-100 wow fadeInUp" data-wow-delay="700ms">
                        <div class="row no-gutters">
                            <div class="col-12">
                                <div class="single-thumb">
                                    <img src="img/bg-img/13a.jpg" alt="">
                                </div>
                                <div class="single-thumb">
                                    <img src="img/bg-img/14a.jpg" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="roberto-service-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="service-content d-flex align-items-center justify-content-between">
                        <div class="single-service--area mb-100 wow fadeInUp" data-wow-delay="100ms">
                            <h5>Trekking</h5>
                        </div>
                        <div class="single-service--area mb-100 wow fadeInUp" data-wow-delay="300ms">
                            <h5>River Rafting</h5>
                        </div>
                        <div class="single-service--area mb-100 wow fadeInUp" data-wow-delay="500ms">
                            <h5>Bungee Jumping</h5>
                        </div>
                        <div class="single-service--area mb-100 wow fadeInUp" data-wow-delay="700ms">
                            <h5>Paragliding</h5>
                        </div>
                        <div class="single-service--area mb-100 wow fadeInUp" data-wow-delay="900ms">
                            <h5>&amp; many more...</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section class="roberto-testimonials-area section-padding-100-0">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12 col-md-6">
                    <div class="testimonial-thumbnail owl-carousel mb-100">
                        @foreach($testimonials as $testimonial)
                            <img src="{{ asset('img/testimonials/' . $testimonial->image) }}" alt="">
                        @endforeach
                    </div>
                </div>

                <div class="col-12 col-md-6">
                    <div class="section-heading">
                        <h6>Testimonials</h6>
                        <h2>Our Guests Love Us</h2>
                    </div>
                    <div class="testimonial-slides owl-carousel mb-100">
                        @foreach($testimonials as $testimonial)
                            <div class="single-testimonial-slide">
                                <h5>“{{ $testimonial->description }}.”</h5>
                                <div class="rating-title">
                                    <div class="rating">
                                        @for($i=1;$i<=$testimonial->star;$i++)
                                            <i class="icon_star"></i>
                                        @endfor
                                    </div>
                                    <h6>{{ $testimonial->customer_name }}</h6>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    {{ $testimonials->links() }}
                </div>
            </div>
        </div>
    </section>
    @include('layouts.contact')
    @include('layouts.footer')
    <script src="jsUser/jquery.min.js"></script>
    <script src="jsUser/popper.min.js"></script>
    <script src="jsUser/bootstrap.min.js"></script>
    <script src="jsUser/roberto.bundle.js"></script>
    <script src="jsUser/default-assets/active.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            setTimeout(function() {
                $('#exampleModal').modal('show');
            }, 2000);
        });
    </script>
</body>

</html>