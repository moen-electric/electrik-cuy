@extends('layouts.main')

@section('container')

<!-- Start Product Details Section -->
    <div class="product-details-section" style="padding-top: 80px">
        <div class="container">
            <div class="row">
                <a href="/sale">
                    <i class="fa-duotone fa-solid fa-arrow-left"></i>
                </a>
                    <div class="col-xl-5 col-lg-6 pt-2">
                        <div class="product-details-gallery-area" data-aos="fade-up" data-aos-delay="0">
                        <!-- Large Images -->
                        <div class="product-large-image product-large-image-horaizontal swiper-container">
                            <div class="swiper-wrapper">
                                @foreach ([$product->image1, $product->image2, $product->image3] as $img)
                                    @if ($img)
                                        <div class="product-image-large-image swiper-slide zoom-image-hover img-responsive">
                                            <img src="{{ asset('storage/' . $img) }}" alt="{{ $product->name }}">
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>

                        <!-- Thumbnails -->
                        <div class="product-image-thumb product-image-thumb-horizontal swiper-container pos-relative mt-5">
                            <div class="swiper-wrapper">
                                @foreach ([$product->image1, $product->image2, $product->image3] as $img)
                                    @if ($img)
                                        <div class="product-image-thumb-single swiper-slide">
                                            <img class="img-fluid" src="{{ asset('storage/' . $img) }}" alt="{{ $product->name }}">
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                            <div class="gallery-thumb-arrow swiper-button-next"></div>
                            <div class="gallery-thumb-arrow swiper-button-prev"></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-7 col-lg-6">
                    <div class="product-details-content-area product-details--golden" data-aos="fade-up"
                        data-aos-delay="200">
                        <!-- Start  Product Details Text Area-->
                        <div class="product-details-text">
                            <h4 class="title">{{ $product->name }}</h4>
                        <div class="price">IDR {{ number_format($product->harga, 0, ',', '.') }}</div>
                        </div> <!-- End  Product Details Text Area-->
                        <!-- Start Product Variable Area -->
                        <div class="product-details-variable">
                            <h4 class="title">Available Options</h4>
                            <!-- Product Variable Single Item -->
                            <div class="variable-single-item">
                                <div class="product-stock"> <span class="product-stock-in"><i
                                            class="ion-checkmark-circled"></i></span> {{ $product->stok }} In Stock</div>
                            </div>
                            <!-- Product Variable Single Item -->
                           <!-- Add to Cart Form -->
                            <form action="{{ route('cart.store') }}" method="POST" class="d-flex align-items-center gap-3">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $product->id }}">

                                <div class="variable-single-item">
                                    <label for="jumlah">Quantity</label>
                                    <div class="product-variable-quantity">
                                        <input id="jumlah" name="jumlah" type="number" min="1" max="{{ $product->stok }}" value="1" required>
                                    </div>
                                </div>

                                <div class="product-add-to-cart-btn">
                                    <button type="submit" class="btn btn-success btn-lg">
                                        + Add To Cart
                                    </button>
                                </div>
                            </form>

                        </div> <!-- End Product Variable Area -->

                        <!-- Start  Product Details Catagories Area-->
                        <div class="product-details-catagory mb-2">
                            <span class="title">CATEGORY:</span>
                                <a href="/sale?category={{ $product->category->name }}" class="category-detail">{{ $product->category->name }}</a>
                        </div> <!-- End  Product Details Catagories Area-->
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End Product Details Section -->

    <!-- Start Product Content Tab Section -->
    <div class="product-details-content-tab-section section-top-gap-100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="product-details-content-tab-wrapper" data-aos="fade-up" data-aos-delay="0">

                        <!-- Start Product Details Tab Button -->
                        <ul class="nav tablist product-details-content-tab-btn d-flex justify-content-center">
                            <li><a class="nav-link active" data-bs-toggle="tab" href="#description">
                                    Description
                                </a></li>
                            <li><a class="nav-link" data-bs-toggle="tab" href="#review">
                                Reviews ({{ $reviews->count() }})
                            </a></li>
                        </ul> <!-- End Product Details Tab Button -->

                        <!-- Start Product Details Tab Content -->
                        <div class="product-details-content-tab">
                            <div class="tab-content">
                                <!-- Start Product Details Tab Content Singel -->
                                <div class="tab-pane active show" id="description">
                                    <div class="single-tab-content-item">
                                        <p>{!! $product->deskripsi !!}</p>
                                    </div>
                                </div>


                                <!-- Start Product Details Tab Content Singel -->
                                <div class="tab-pane" id="review">
                                    <div class="single-tab-content-item">
                                        <!-- Start - Review Comment -->
                                        <ul class="comment">
                                            <!-- Start - Review Comment list-->
                                            @forelse ($reviews as $review)
                                                <li class="comment-list">
                                                    <div class="comment-wrapper">
                                                        <div class="comment-img">
                                                            <i class="fa-duotone fa-solid fa-user fa-2xl"></i>
                                                        </div>
                                                        <div class="comment-content">
                                                            <div class="comment-content-top">
                                                                <div class="comment-content-left">
                                                                    <h6 class="comment-name">{{ $review->user->name }}</h6>
                                                                    <ul class="review-star m-0 p-0">
                                                                        @if ($review->bintang == 5)
                                                                            <li class="fill">
                                                                                <i class="fa-solid fa-star" style="color: #FFD43B;"></i>
                                                                            </li>
                                                                            <li class="fill">
                                                                                <i class="fa-solid fa-star" style="color: #FFD43B;"></i>
                                                                            </li>
                                                                            <li class="fill">
                                                                                <i class="fa-solid fa-star" style="color: #FFD43B;"></i>
                                                                            </li>
                                                                            <li class="fill">
                                                                                <i class="fa-solid fa-star" style="color: #FFD43B;"></i>
                                                                            </li>
                                                                            <li class="fill">
                                                                                <i class="fa-solid fa-star" style="color: #FFD43B;"></i>
                                                                            </li>
                                                                        @elseif($review->bintang == 4)
                                                                            <li class="fill">
                                                                                <i class="fa-solid fa-star" style="color: #FFD43B;"></i>
                                                                            </li>
                                                                            <li class="fill">
                                                                                <i class="fa-solid fa-star" style="color: #FFD43B;"></i>
                                                                            </li>
                                                                            <li class="fill">
                                                                                <i class="fa-solid fa-star" style="color: #FFD43B;"></i>
                                                                            </li>
                                                                            <li class="fill">
                                                                                <i class="fa-solid fa-star" style="color: #FFD43B;"></i>
                                                                            </li>
                                                                            <li class="empty">
                                                                                <i class="fa-regular fa-star" style="color: #FFD43B;"></i>
                                                                            </li>
                                                                        @elseif($review->bintang == 3)
                                                                            <li class="fill">
                                                                                <i class="fa-solid fa-star" style="color: #FFD43B;"></i>
                                                                            </li>
                                                                            <li class="fill">
                                                                                <i class="fa-solid fa-star" style="color: #FFD43B;"></i>
                                                                            </li>
                                                                            <li class="fill">
                                                                                <i class="fa-solid fa-star" style="color: #FFD43B;"></i>
                                                                            </li>
                                                                            <li class="empty">
                                                                                <i class="fa-regular fa-star" style="color: #FFD43B;"></i>
                                                                            </li>
                                                                            <li class="empty">
                                                                                <i class="fa-regular fa-star" style="color: #FFD43B;"></i>
                                                                            </li>
                                                                        @elseif($review->bintang == 2)
                                                                            <li class="fill">
                                                                                <i class="fa-solid fa-star" style="color: #FFD43B;"></i>
                                                                            </li>
                                                                            <li class="fill">
                                                                                <i class="fa-solid fa-star" style="color: #FFD43B;"></i>
                                                                            </li>
                                                                            <li class="empty">
                                                                                <i class="fa-regular fa-star" style="color: #FFD43B;"></i>
                                                                            </li>
                                                                            <li class="empty">
                                                                                <i class="fa-regular fa-star" style="color: #FFD43B;"></i>
                                                                            </li>
                                                                            <li class="empty">
                                                                                <i class="fa-regular fa-star" style="color: #FFD43B;"></i>
                                                                            </li>
                                                                        @else
                                                                            <li class="fill">
                                                                                <i class="fa-solid fa-star" style="color: #FFD43B;"></i>
                                                                            </li>
                                                                            <li class="empty">
                                                                                <i class="fa-regular fa-star" style="color: #FFD43B;"></i>
                                                                            </li>
                                                                            <li class="empty">
                                                                                <i class="fa-regular fa-star" style="color: #FFD43B;"></i>
                                                                            </li>
                                                                            <li class="empty">
                                                                                <i class="fa-regular fa-star" style="color: #FFD43B;"></i>
                                                                            </li>
                                                                            <li class="empty">
                                                                                <i class="fa-regular fa-star" style="color: #FFD43B;"></i>
                                                                            </li>
                                                                        @endif
                                                                        <div class="d-inline ms-3">
                                                                            {{ $review->created_at->diffForHumans() }}
                                                                        </div>
                                                                    </ul>
                                                                    <p>{{ $review->ulasan }}</p>
                                                                    @if($review->image)
                                                                        <img src="{{ asset('storage/' . $review->image) }}" alt="Review Image" style="width: 100px; height: auto;">
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li> <!-- End - Review Comment list-->
                                            @empty
                                                <li>Belum ada review.</li>
                                            @endforelse
                                        </ul> <!-- End - Review Comment -->
                                    </div>
                                </div> <!-- End Product Details Tab Content Singel -->


                            </div>
                        </div> <!-- End Product Details Tab Content -->
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End Product Content Tab Section -->

    <!-- Start Product Default Slider Section -->
    <div class="product-default-slider-section section-top-gap-100 section-fluid">
        <!-- Start Section Content Text Area -->
        <div class="section-title-wrapper" data-aos="fade-up" data-aos-delay="0">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="section-content-gap">
                            <div class="secton-content">
                                <h3 class="section-title">RELATED PRODUCTS</h3>
                                <p>Browse the collection of our related products.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Start Section Content Text Area -->
        <div class="product-wrapper" data-aos="fade-up" data-aos-delay="0">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <!-- Recommended Products Section -->
                        <div class="product-slider-default-1row default-slider-nav-arrow">
                            <!-- Swiper main container -->
                            <div class="swiper-container product-default-slider-4grid-1row">
                                <div class="swiper-wrapper">
                                    @foreach ($recomendeds as $product)
                                        <div class="product-default-single-item product-color--golden swiper-slide">
                                            <div class="image-box">
                                                <a href="{{ route('detail-product', $product->id) }}" class="image-link">
                                                    <img src="{{ asset('storage/' . $product->image1) }}" alt="">
                                                    <img src="{{ asset('storage/' . $product->image2) }}" alt="">
                                                </a>
                                                <div class="action-link justify-content-center mt-2">
                                                    <!-- Form to Add to Cart -->
                                                    <form action="{{ route('cart.store') }}" method="POST" style="display: inline;">
                                                        @csrf
                                                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                                                        <input type="hidden" name="jumlah" value="1">
                                                        <button type="submit" class="btn btn-sm text-white">
                                                            <i class="fa-regular fa-cart-shopping me-1"></i></i> Add to Cart
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                            <div class="content mt-3 text-center">
                                                <div class="content-left">
                                                    <h6 class="title">
                                                        <a href="{{ route('detail-product', $product->id) }}" class="text-decoration-none text-dark">
                                                            {{ $product->name }}
                                                        </a>
                                                    </h6>
                                                </div>
                                                <div class="content-right">
                                                    <span class="price">IDR {{ number_format($product->harga) }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@if (session('cart_added'))
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            var modal = new bootstrap.Modal(document.getElementById('modalAddcart'));
            modal.show();
        });
    </script>
@endif
@endsection
