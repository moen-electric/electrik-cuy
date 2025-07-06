<!-- Start Footer Section -->
    <footer class="footer-section footer-bg section-top-gap-100">
        <div class="footer-wrapper">
            <!-- Start Footer Top -->
            <div class="footer-top">
                <div class="container">
                    <div class="row mb-n6">
                        <div class="col-lg-3 col-sm-6 mb-6">
                            <!-- Start Footer Single Item -->
                            <div class="footer-widget-single-item footer-widget-color--golden" data-aos="fade-up"
                                data-aos-delay="0">
                                <h5 class="title">INFORMATION</h5>
                                <ul class="footer-nav p-0">
                                    {{-- <li><a class="text-decoration-none" href="/contactus">Delivery Information</a></li> --}}
                                    {{-- <li><a class="text-decoration-none" href="#">Terms & Conditions</a></li> --}}
                                    <li><a class="text-decoration-none" href="/contactus">Contact Us</a></li>
                                    {{-- <li><a class="text-decoration-none" href="#">Returns</a></li> --}}
                                </ul>
                            </div>
                            <!-- End Footer Single Item -->
                        </div>
                        <div class="col-lg-3 col-sm-6 mb-6">
                            <!-- Start Footer Single Item -->
                            <div class="footer-widget-single-item footer-widget-color--golden" data-aos="fade-up"
                                data-aos-delay="200">
                                <h5 class="title">MY ACCOUNT</h5>
                                <ul class="footer-nav p-0">
                                    @auth
                                        <li><a class="text-decoration-none" href="/profile/{{ auth()->user()->id }}">My account</a></li>
                                    @endauth
                                    {{-- <li><a class="text-decoration-none" href="wishlist.html">Wishlist</a></li> --}}
                                    {{-- <li><a class="text-decoration-none" href="privacy-policy.html">Privacy Policy</a></li> --}}
                                    {{-- <li><a class="text-decoration-none" href="faq.html">Frequently Questions</a></li> --}}
                                    <li><a class="text-decoration-none" href="/purchases">Order History</a></li>
                                </ul>
                            </div>
                            <!-- End Footer Single Item -->
                        </div>
                        <div class="col-lg-3 col-sm-6 mb-6">
                            <!-- Start Footer Single Item -->
                            <div class="footer-widget-single-item footer-widget-color--golden" data-aos="fade-up"
                                data-aos-delay="400">
                                <h5 class="title">CATEGORIES</h5>
                                <ul class="footer-nav p-0">
                                    @foreach ($categories as $category)
                                        <li>
                                            <a class="text-decoration-none" href="/sale?category={{ $category->name }}">{{ $category->name }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                            <!-- End Footer Single Item -->
                        </div>
                        <div class="col-lg-3 col-sm-6 mb-6">
                            <!-- Start Footer Single Item -->
                            <div class="footer-widget-single-item footer-widget-color--golden" data-aos="fade-up"
                                data-aos-delay="600" style="color: #9b9b97">
                                <h5 class="title">ABOUT US</h5>
                                <div class="footer-about">
                                    <p>Welcome to our electronics store! We offer a wide range of tech products. From smartphones to laptops, we deliver high-quality gadgets with competitive prices and excellent service.</p>

                                    <address class="address">
                                        <span>Address: -</span>
                                        <br>
                                        <span>Email: moenelectronic@gmail.com</span>
                                    </address>
                                </div>
                            </div>
                            <!-- End Footer Single Item -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Footer Top -->

            <!-- Start Footer Center -->
            <div class="footer-center">
                <div class="container">
                    <div class="row mb-n6">
                        <div class="col-xl-3 col-lg-4 col-md-6 mb-6">
                            <div class="footer-social" data-aos="fade-up" data-aos-delay="0">
                                <h4 class="title">FOLLOW US</h4>
                                <ul class="footer-social-link">
                                    <li><a href="#"><i class="fa-brands fa-facebook"></i></a></li>
                                    <li><a href="#"><i class="fa-brands fa-x-twitter"></i></a></li>
                                    <li><a href="#"><i class="fa-brands fa-instagram"></i></a></li>
                                    <li><a href="#"><i class="fa-brands fa-linkedin"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Start Footer Center -->

            <!-- Start Footer Bottom -->
            <div class="footer-bottom">
                <div class="container">
                    <div
                        class="row justify-content-between align-items-center align-items-center flex-column flex-md-row mb-n6">
                        <div class="col-auto mb-6">
                            <div class="footer-copyright">
                                <p class="copyright-text text-white">&copy; 2025 Mars Elektrik</p>

                            </div>
                        </div>
                        <div class="col-auto mb-6">
                            <div class="footer-payment">
                                <div class="image">
                                    <img src="assets/images/company-logo/payment.png" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Start Footer Bottom -->
        </div>
    </footer>
    <!-- End Footer Section -->
