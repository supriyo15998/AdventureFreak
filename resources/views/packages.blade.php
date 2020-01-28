<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Title -->
    <title>{{ $title }}</title>
    <!-- Favicon -->
    <link rel="icon" href="./img/core-img/favicon2.png">

    <!-- Stylesheet -->
    <link rel="stylesheet" href="style.css">

</head>

<body>
    <!-- Preloader -->
    <div id="preloader">
        <div class="loader"></div>
    </div>
    <!-- /Preloader -->

    <!-- Header Area Start -->
    @include('layouts.nav')
    <!-- Header Area End -->

    <!-- Breadcrumb Area Start -->
    <div class="breadcrumb-area bg-img bg-overlay jarallax" style="background-image: url(img/bg-img/16a.jpg);">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="breadcrumb-content text-center">
                        <h2 class="page-title">Our Packages</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Area End -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <!-- <a class="navbar-brand" href="#">Navbar</a> -->
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto" style="margin-left: 30%">
            <li class="nav-item">
                <a class="nav-link" href="#">Tour and Travel</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Trekking</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">FoodWalk</a>
            </li>
        </ul>
      </div>
    </nav>
    <!-- Rooms Area Start -->
    <div class="roberto-rooms-area section-padding-100-0">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-8">
                    <!-- Single Room Area -->
                    @foreach($packages as $package)
                        <div class="single-room-area d-flex align-items-center mb-50 wow fadeInUp" data-wow-delay="100ms">
                            <!-- Room Thumbnail -->
                            <div class="room-thumbnail">
                                <img src="{{ asset('img/packages/' . $package->image) }}" alt="">
                            </div>
                            <!-- Room Content -->
                            <div class="room-content">
                                <h2>{{ $package->package_name }}</h2>
                                <h4>₹ {{ $package->amount_per_head }} <span>/ Head</span></h4>
                                <div class="room-feature">
                                    <h6>Facilities: <span>{{ $package->facilities }}</span></h6>
                                    <h6>Departure Date: <span>{{ $package->depart_date }}</span></h6>
                                    <h6>Arrival Date: <span>{{ ($package->arrival_date) }}</span></h6>
                                    <h6>Days: <span>{{ ($package->days) }}</span></h6>
                                    <h6>Nights: <span>{{ ($package->nights) }}</span></h6>
                                </div>
                                <a href="#" class="btn view-detail-btn">Enquiry<i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
                            </div>
                        </div>
                    @endforeach
                    <div style="margin-left: 40%">
                        {{ $packages->links() }}    
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Rooms Area End -->

    <!-- Call To Action Area Start -->
    @include('layouts.contact')
    <!-- Call To Action Area End -->

    <!-- Partner Area Start -->
    <br>
    <!-- Partner Area End -->

    <!-- Footer Area Start -->
    @include('layouts.footer')
    <!-- Footer Area End -->

    <!-- **** All JS Files ***** -->
    <!-- jQuery 2.2.4 -->
    <script src="jsUser/jquery.min.js"></script>
    <!-- Popper -->
    <script src="jsUser/popper.min.js"></script>
    <!-- Bootstrap -->
    <script src="jsUser/bootstrap.min.js"></script>
    <!-- All Plugins -->
    <script src="jsUser/roberto.bundle.js"></script>
    <!-- Active -->
    <script src="jsUser/default-assets/active.js"></script>

</body>

</html>