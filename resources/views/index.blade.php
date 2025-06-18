@extends('layouts.main')

@section('container')

<!-- Offcanvas Overlay -->
    <div class="offcanvas-overlay"></div>

    <!-- Start Hero Slider Section-->
    <div class="hero-slider-section">
        <!-- Slider main container -->
        <div class="hero-slider-active swiper-container">
            <!-- Additional required wrapper -->
            <div class="swiper-wrapper">
                <!-- Start Hero Single Slider Item -->
                <div class="hero-single-slider-item swiper-slide">
                    <!-- Hero Slider Image -->
                    <div class="hero-slider-bg">
                        <img src="img/hero-slider-1.jpg" alt="">
                    </div>
                    <!-- Hero Slider Content -->
                    <div class="hero-slider-wrapper">
                        <div class="container">
                            <div class="row">
                                <div class="col-auto">
                                    <div class="hero-slider-content">
                                        <h4 class="subtitle">New collection</h4>
                                        <h2 class="title">Best Of NeoCon <br> Gold Award </h2>
                                        <a href="product-details-default.html"
                                            class="btn btn-lg btn-outline-golden">shop now </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> <!-- End Hero Single Slider Item -->
                <!-- Start Hero Single Slider Item -->
                <div class="hero-single-slider-item swiper-slide">
                    <!-- Hero Slider Image -->
                    <div class="hero-slider-bg">
                        <img src="img/hero-slider-2.jpg" alt="">
                    </div>
                    <!-- Hero Slider Content -->
                    <div class="hero-slider-wrapper">
                        <div class="container">
                            <div class="row">
                                <div class="col-auto">
                                    <div class="hero-slider-content">
                                        <h4 class="subtitle">New collection</h4>
                                        <h2 class="title">Luxy Chairs <br> Design Award </h2>
                                        <a href="product-details-default.html"
                                            class="btn btn-lg btn-outline-golden">shop now </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> <!-- End Hero Single Slider Item -->
            </div>

            <!-- If we need pagination -->
            <div class="swiper-pagination active-color-golden"></div>

            <!-- If we need navigation buttons -->
            <div class="swiper-button-prev d-none d-lg-block"></div>
            <div class="swiper-button-next d-none d-lg-block"></div>
        </div>
    </div>
    <!-- End Hero Slider Section-->


    {{-- What We Offer --}}

    <div class="mt-3" style="background-color: rgb(255, 255, 255);">
        <div class="container">
            <div class="row justify-content-center">
                <p class="my-3 text-center  fw-bold" style="font-size: 40px">What We <span style="color: red;">Offer</span></p>
                <div class="col-md-2 mb-4">
                <div class="card whatweoffer">
                    <img src="img/service-promo-1.png" class="card-img-top px-5 py-3" alt="...">
                    <div class="card-body text-center">
                    <h5 class="card-title mt-1" style="color: rgb(174, 189, 9);">FREE SHIPPING</h5>
                    <p class="card-text mt-4 whatweoffertext">Get 10% cash back, free shipping, free returns, and more at 1000+ top retailers!</p>
                    </div>
                </div>
                </div>

                <div class="col-md-2 mb-4">
                <div class="card whatweoffer">
                    <img src="img/service-promo-2.png" class="card-img-top px-5 py-3" alt="...">
                    <div class="card-body text-center">
                    <h5 class="card-title" style="color: rgb(174, 189, 9);">30 DAYS MONEY BACK</h5>
                    <p class="card-text whatweoffertext" >
                        100% satisfaction guaranteed, or get your money back within 30 days!</p>
                    </div>
                </div>
                </div>

                <div class="col-md-2 mb-4">
                <div class="card whatweoffer">
                    <img src="img/service-promo-3.png" class="card-img-top px-5 py-3" alt="...">
                    <div class="card-body text-center">
                    <h5 class="card-title mt-1" style="color: rgb(174, 189, 9);">SAFE PAYMENT</h5>
                    <p class="card-text mt-4 whatweoffertext">Pay with the world’s most popular and secure payment methods.</p>
                    </div>
                </div>
                </div>

                <div class="col-md-2 mb-4">
                <div class="card whatweoffer">
                    <img src="img/service-promo-4.png" class="card-img-top px-5 py-3" alt="...">
                    <div class="card-body text-center">
                    <h5 class="card-title mt-1" style="color: rgb(174, 189, 9);">LOYALTY CUSTOMER</h5>
                    <p class="card-text mt-4 whatweoffertext">Card for the other 30% of their purchases at a rate of 1% cash back.</p>
                    </div>
                </div>
                </div>

            </div>
        </div>
    </div>

    {{-- End What We Offer --}}


    <!-- Start Banner Section -->
    <div class="banner-section">
        <div class="banner-wrapper clearfix">
            <!-- Start Banner Single Item -->
            <a href="product-details-default.html">
                <div class="banner-single-item banner-style-7 banner-animation banner-color--green float-left"
                    data-aos="fade-up" data-aos-delay="0">
                    <div class="image">
                        <img class="img-fluid" src="/img/banner-style-7-img-1.jpg" alt="">
                    </div>
                </div>
            </a>
            <!-- End Banner Single Item -->
            <!-- Start Banner Single Item -->
            <a href="product-details-default.html">
                <div class="banner-single-item banner-style-7 banner-animation banner-color--green float-left"
                    data-aos="fade-up" data-aos-delay="200">
                    <div class="image">
                        <img class="img-fluid" src="/img/banner-style-7-img-2.jpg" alt="">
                    </div>
                </div>
            </a>
            <!-- End Banner Single Item -->
            <!-- Start Banner Single Item -->
            <a href="product-details-default.html">
                <div class="banner-single-item banner-style-7 banner-animation banner-color--green float-left"
                    data-aos="fade-up" data-aos-delay="400">
                    <div class="image">
                        <img class="img-fluid" src="/img/banner-style-7-img-3.jpg" alt="">
                    </div>
                </div>
            </a>
            <!-- End Banner Single Item -->
        </div>
    </div>
    <!-- End Banner Section -->




@endsection
