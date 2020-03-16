<header class="header-area">
    <!-- Search Form -->

    <!-- Top Header Area Start -->
    <div class="top-header-area">
        <div class="container">
            <div class="row">

                <div class="col-6">
                    <div class="top-header-content">
                        <a href="#"><i class="icon_phone"></i> <span>(+91) 79803 28015</span></a>
                        <a href="#"><i class="icon_mail"></i> <span>adventurefreakindia@gmail.com</span></a>
                    </div>
                </div>

                <div class="col-6">
                    <div class="top-header-content">
                        <!-- Top Social Area -->
                        <div class="top-social-area ml-auto">
                            <a href="https://www.facebook.com/travelisourtherapy/" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a>
<!--                             <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                            <a href="#"><i class="fa fa-tripadvisor" aria-hidden="true"></i></a> -->
                            <a href="https://www.instagram.com/adventure_freak_pvt_ltd/" target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- Top Header Area End -->

    <!-- Main Header Start -->
    <div class="main-header-area">
        <div class="classy-nav-container breakpoint-off">
            <div class="container">
                <!-- Classy Menu -->
                <nav class="classy-navbar justify-content-between" id="robertoNav">

                    <!-- Logo -->
                    <a class="nav-brand" href="{{ route('index') }}"><img src="{{ asset('img/core-img/newlogotry.png') }}" alt=""></a>

                    <!-- Navbar Toggler -->
                    <div class="classy-navbar-toggler">
                        <span class="navbarToggler"><span></span><span></span><span></span></span>
                    </div>

                    <!-- Menu -->
                    <div class="classy-menu">
                        <!-- Menu Close Button -->
                        <div class="classycloseIcon">
                            <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                        </div>
                        <!-- Nav Start -->
                        <div class="classynav">
                            <ul id="nav">
                                <li class="active"><a href="{{ route('index') }}">Home</a></li>
                                
                                <!-- <li><a href="{{ route('about') }}">About Us</a></li> -->
                                <li>
                                    <a href="#">Packages</a>
                                    <ul class="dropdown">
                                        <li><a href="{{ route('adventurous_tour') }}">- Adventurous Tours</a></li>
                                        <li><a href="{{ route('trekking') }}">- Trekking</a></li>
                                        <li><a href="{{ route('city_tour') }}">- City Tours</a></li>
                                    </ul>
                                </li>
                                <li><a href="{{ route('about') }}">About Us</a></li>
                                <li><a href="{{ route('contact') }}">Contact</a></li>
                            </ul>

                            <!-- Book Now -->
                            <div class="book-now-btn ml-3 ml-lg-5">
                                <a href="{{ route('adventurous_tour') }}">Book Now <i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
                            </div>
                        </div>
                        <!-- Nav End -->
                    </div>
                </nav>
            </div>
        </div>
    </div>
</header>