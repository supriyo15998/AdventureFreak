<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>{{ $title }}</title>
    <link rel="icon" href="{{asset('img/core-img/favicon2.png')}}">
    <link rel="stylesheet" href="{{  asset('style.css') }}">
</head>
<body>
    <div id="preloader">
        <div class="loader"></div>
    </div>
    @include('layouts.nav')
    <div class="breadcrumb-area bg-img bg-overlay jarallax" style="background-image: url({{asset('img/bg-img/16a.jpg')}});">
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
    @include('layouts.packagenav')
    <h2 style="text-align: center; font-family: sans-serif;">Trekkings</h2>
    <div class="roberto-rooms-area section-padding-100-0">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-8">
                    @foreach($packages as $package)
                        <div class="single-room-area d-flex align-items-center mb-50 wow fadeInUp" data-wow-delay="100ms">
                            <div class="room-thumbnail">
                                <img src="{{ asset('img/packages/' . $package->image) }}" alt="">
                            </div>
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
                                <a href="{{ route('contact') }}" class="btn view-detail-btn">Enquiry<i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
                            </div>
                        </div>
                    @endforeach
                    
                </div>
            </div>
        </div>
    </div>
    @include('layouts.contact')
    <br>
    @include('layouts.footer')
    <script src="{{asset('jsUser/jquery.min.js')}}"></script>
    <script src="{{asset('jsUser/popper.min.js')}}"></script>
    <script src="{{asset('jsUser/bootstrap.min.js')}}"></script>
    <script src="{{asset('jsUser/roberto.bundle.js')}}"></script>
    <script src="{{asset('jsUser/default-assets/active.js')}}"></script>
</body>

</html>