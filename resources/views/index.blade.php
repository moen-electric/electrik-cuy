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
                    <a class="text-decoration-none text-black" href="/sale?category=Smartwatch">
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
                                        <h2 class="title">New Series Of <br> Digital Watch </h2>
                                        <a href="/sale?category=Smartwatch"
                                            class="btn btn-outline-danger btn-lg">shop now </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    </a>
                </div> <!-- End Hero Single Slider Item -->
                <!-- Start Hero Single Slider Item -->
                <div class="hero-single-slider-item swiper-slide">
                    <!-- Hero Slider Image -->
                    <a class="text-decoration-none text-black" href="/sale?category=Speaker">
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
                                        <h2 class="title">Best Of HiFi <br> Loud Speaker </h2>
                                        <a href="/sale?category=Speaker"
                                            class="btn btn-lg btn-outline-danger">shop now </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    </a>
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
                    <img src="img/service-promo-3.png" class="card-img-top px-5 py-3 mt-3" alt="...">
                    <div class="card-body text-center">
                    <h5 class="card-title mt-1" style="color: rgb(174, 189, 9);">SAFE PAYMENT</h5>
                    <p class="card-text mt-4 whatweoffertext">Pay with the world’s most popular and secure payment methods.</p>
                    </div>
                </div>
                </div>

                <div class="col-md-2 mb-4">
                <div class="card whatweoffer">
                    <img src="img/service-promo-4.png" class="card-img-top px-5 py-3 mt-1" alt="...">
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
    <div class="banner-section mt-5">
        <div class="banner-wrapper clearfix">
            <!-- Start Banner Single Item -->
            <a href="/sale">
                <div class="banner-single-item banner-style-7 banner-animation banner-color--green float-left"
                    data-aos="fade-up" data-aos-delay="0">
                    <div class="image">
                        <img class="img-fluid" src="/img/banner-style-7-img-1.jpg" alt="">
                    </div>
                </div>
            </a>
            <!-- End Banner Single Item -->
            <!-- Start Banner Single Item -->
            <a href="/sale">
                <div class="banner-single-item banner-style-7 banner-animation banner-color--green float-left"
                    data-aos="fade-up" data-aos-delay="200">
                    <div class="image">
                        <img class="img-fluid" src="/img/banner-style-7-img-2.jpg" alt="">
                    </div>
                </div>
            </a>
            <!-- End Banner Single Item -->
            <!-- Start Banner Single Item -->
            <a href="/sale">
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


    <!-- Start Product Default Slider Section -->
    <div class="product-default-slider-section section-top-gap-100 section-fluid">
        <!-- Start Section Content Text Area -->
        <div class="section-title-wrapper" data-aos="fade-up" data-aos-delay="0">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="section-content-gap">
                            <div class="secton-content">
                                <h3 class="section-title">the New arrivals</h3>
                                <p>Preorder now to receive exclusive deals & gifts</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Start Section Content Text Area -->
        <div class="product-wrapper" data-aos="fade-up" data-aos-delay="200">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="product-slider-default-2rows default-slider-nav-arrow">
                            <!-- Slider main container -->
                            <div class="swiper-container product-default-slider-4grid-2row">
                                <!-- Additional required wrapper -->
                                <div class="swiper-wrapper">
                                    <!-- Start Product Default Single Item -->
                                    @foreach ($products as $product)
                                    <div class="product-default-single-item swiper-slide">
                                        <div class="image-box">
                                            <a href="/detail-product/{{ $product->id }}" class="image-link">
                                                <img src="{{ asset('storage/' . $product->image1) }}" alt="">
                                                <img src="{{ asset('storage/' . $product->image2) }}" alt="">
                                            </a>
                                            @if($product->stok < 5)
                                                <div class="tag"><span>Limited</span></div>
                                            @else
                                                <div class="tag"><span>New</span></div>
                                            @endif
                                        </div>
                                        <div class="content-left pt-3">
                                            <h6 class="title"><a href="/detail-product/{{ $product->id }}" class="text-decoration-none">
                                                {{ $product->name }}
                                            </a></h6>
                                        </div>
                                        <div class="row text-end">
                                            <div class="col">
                                                <span class="price">IDR {{ number_format($product->harga, 0, ',', '.') }}</span>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                    <!-- End Product Default Single Item -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Product Default Slider Section -->


    <!-- Start Banner Section -->
    <div class="banner-section section-top-gap-100">
        <div class="banner-wrapper clearfix">
            <!-- Start Banner Single Item -->
            <a href="/sale">
                <div class="banner-single-item banner-style-8 banner-animation banner-color--green float-left"
                    data-aos="fade-up" data-aos-delay="0">
                    <div class="image">
                        <img class="img-fluid" src="/img/banner-style-8-img-1.jpg" alt="">
                    </div>
                </div>
            </a>
            <!-- End Banner Single Item -->
            <!-- Start Banner Single Item -->
            <a href="/sale">
                <div class="banner-single-item banner-style-8 banner-animation banner-color--green float-left"
                    data-aos="fade-up" data-aos-delay="200">
                    <div class="image">
                        <img class="img-fluid" src="/img/banner-style-8-img-2.jpg" alt="">
                    </div>
                </div>
            </a>
            <!-- End Banner Single Item -->
        </div>
    </div>
    <!-- End Banner Section -->


    <!-- Modal -->
    <div class="modal fade" id="cart" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="cartLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="cartLabel"><i class="fa-solid fa-cart-shopping fa-sm"></i> Cart</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    {{-- Cart --}}
                    <div class="container h-100">
                        <div class="row d-flex justify-content-center align-items-center h-100">
                            <div class="col-12">

                                @foreach ($carts as $cart)
                                    <div class="card rounded-3 mb-4">
                                        <div class="card-body p-4">
                                            <div class="row d-flex justify-content-between align-items-center">
                                            <div class="col-md-2 col-lg-2 col-xl-2">
                                                <img
                                                src="{{ asset('storage/' . $cart->product->image1) }}"
                                                class="img-fluid rounded-3" alt="Cotton T-shirt">
                                            </div>
                                            <div class="col-md-3 col-lg-3 col-xl-3">
                                                <p class="lead fw-normal mb-2">{{ $cart->product->name }}</p>
                                                <p><span class="text-muted">Brand: </span>{{ $cart->product->brand->name }}
                                            </div>
                                            <div class="col-md-3 col-lg-3 col-xl-2 d-flex align-items-center">
                                                <!-- Minus button -->
                                                <button type="button" class="btn btn-link px-2"
                                                    onclick="this.parentNode.querySelector('.input-jumlah').stepDown()">
                                                    <i class="fas fa-minus"></i>
                                                </button>

                                                <!-- Quantity input -->
                                                <form action="/transaction/{{ $cart->id }}" method="get" id="formJumlah_{{ $cart->id }}">
                                                    @csrf
                                                    <input type="number" name="jumlah" class="form-control form-control-sm input-jumlah text-center"
                                                        value="{{ $cart->jumlah }}" min="1"
                                                        style="width: 60px; font-size: 14px; padding: 3px 6px;" />
                                                </form>

                                                <!-- Plus button -->
                                                <button type="button" class="btn btn-link px-2"
                                                    onclick="this.parentNode.querySelector('.input-jumlah').stepUp()">
                                                    <i class="fas fa-plus"></i>
                                                </button>
                                            </div>
                                            {{-- <div class="col-md-3 col-lg-3 col-xl-2 d-flex">
                                                <button data-mdb-button-init data-mdb-ripple-init class="btn btn-link px-2" onclick="this.parentNode.querySelector('#jumlah_cart').stepDown()">
                                                    <i class="fas fa-minus"></i>
                                                </button>

                                                <form action="/transaction/{{ $cart->id }}" method="get" id="formJumlah_{{ $cart->id }}">
                                                    @csrf
                                                    <input id="jumlah_cart" min="0" width="120px" name="jumlah" value="{{ $cart->jumlah }}" type="number" class="form-control form-control-sm mt-1" />
                                                </form>

                                                <button data-mdb-button-init data-mdb-ripple-init class="btn btn-link px-2"
                                                    onclick="this.parentNode.querySelector('#jumlah_cart').stepUp()">
                                                    <i class="fas fa-plus"></i>
                                                </button>
                                            </div> --}}
                                            <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                                                <h5 class="mb-0">IDR {{ $cart->harga }}</h5>
                                            </div>
                                            <div class="col-md-1 col-lg-1 col-xl-1 text-end">
                                                <form action="{{ route('cart.destroy', $cart->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="text-danger btn"><i class="fas fa-trash"></i></button>
                                                </form>
                                            </div>
                                            <div class="text-end">
                                                <input type="button" onclick="submitForm('formJumlah_{{ $cart->id }}')" class="btn btn-success w-25" name="jumlah{{ $cart->id }}" value="Buy">
                                            </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                            </div>
                        </div>
                    </div>
                    {{-- End --}}

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        function submitForm(formId) {
            document.getElementById(formId).submit();
        }
    </script>

@endsection
