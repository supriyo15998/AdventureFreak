<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>{{ $title }}</title>
    <link rel="icon" href="{{ asset('img/core-img/favicon2.png') }}">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <!-- Preloader -->
    <div id="preloader">
        <div class="loader"></div>
    </div>
    @include('layouts.nav')
    <div class="breadcrumb-area bg-img bg-overlay jarallax" style="background-image: url({{ url('img/bg-img/16a.jpg')  }});">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="breadcrumb-content text-center">
                        <h2 class="page-title">About Us</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb justify-content-center">
                                <li class="breadcrumb-item"><a href="{{ route('index') }}">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">About Us</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Area End -->

    <!-- About Us Area Start -->
    <section class="roberto-about-us-area section-padding-100-0">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12 col-lg-6">
                    <div class="about-thumbnail pr-lg-5 mb-100 wow fadeInUp" data-wow-delay="100ms">
                        <!-- <img src="img/bg-img/19.jpg" alt=""> -->
                        <img src="{{ asset('img/core-img/manager.jpg') }}" alt="">
                    </div>
                </div>
                <div class="col-12 col-lg-6">
                    <!-- Section Heading -->
                    <div class="section-heading wow fadeInUp" data-wow-delay="300ms">
                        <h6>Our Motto</h6>
                        <h2>Travel is our therapy</h2>
                    </div>
                    <div class="about-content mb-100 wow fadeInUp" data-wow-delay="500ms">
                        <p>Your Passion is our Satisfaction</p>
                        <p>AdventureFreak conducts more than 15 types of treks all over the India. Apart from that, various kinds of city tour/food exploration/adventuruous tours are conducted.</p>
                        <img src="img/core-img/signature1.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- About Us Area End -->

    <!-- Video Area Start -->
    <div class="roberto--video--area bg-img bg-overlay jarallax section-padding-0-100" style="background-image: url({{ asset('img/bg-img/20a.jp') }}g);">
        <div class="container h-100">
            <div class="row h-100 align-items-center justify-content-center">
                <div class="col-12 col-md-6">
                    <!-- Section Heading -->
                    <div class="section-heading text-center white wow fadeInUp" data-wow-delay="100ms">
                        <h6>Ultimate Solutions</h6>
                        <h2 style="font-size: 200%">Our Moments &amp; Memories</h2>
                    </div>
                    <div class="video-content-area mt-100 wow fadeInUp" data-wow-delay="500ms">
                        <a href="#" class="video-play-btn"><i class="fa fa-play"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Video Area End -->

    <!-- Service Area Start -->
    <br>
    <!-- Service Area End -->

    <!-- Call To Action Area Start -->
    @include('layouts.contact')
    <!-- Call To Action Area End -->

    <!-- Partner Area Start -->
    <br>
    <!-- Partner Area End -->

    <!-- Footer Area Start -->
    @include('layouts.footer')

    <!-- **** All JS Files ***** -->
    <!-- jQuery 2.2.4 -->
    <script src="{{ asset('jsUser/jquery.min.js') }}"></script>
    <!-- Popper -->
    <script src="{{ asset('jsUser/popper.min.js') }}"></script>
    <!-- Bootstrap -->
    <script src="{{ asset('jsUser/bootstrap.min.js') }}"></script>
    <!-- All Plugins -->
    <script src="{{ asset('jsUser/roberto.bundle.js') }}"></script>
    <!-- Active -->
    <script src="{{ asset('jsUser/default-assets/active.js') }}"></script>

</body>

</html>