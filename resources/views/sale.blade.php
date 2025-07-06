@extends('layouts.main')

@section('container')
<div class="shop-section" style="padding-top: 80px">
    <div class="container">
        <div class="row flex-column-reverse flex-lg-row">
            <div class="col-lg-12">

                <h2 class="text-center">Featured Products</h2>
                <p class="text-center">Find the Best Deals on Electronics</p>


                {{-- Search --}}
                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <form action="/sale">
                            @if (request('category'))
                                <input type="hidden" name="category" value="{{ request('category') }}">
                            @endif
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search.." name="search" value="{{ request('search') }}" >
                                <button class="btn btn-secondary w-25" type="submit"><i class="fa-duotone fa-magnifying-glass"></i> Search</button>
                            </div>
                        </form>
                    </div>
                </div>
                {{-- End --}}

                <!-- Filter Section -->
                <div class="container" style="margin-top: 50px">
                    <div class="filter-container">
                        <a href="/sale" class="brand-filter" data-brand="all">All</a>
                        @foreach ($categories as $category)
                        <a href="/sale?category={{ $category->name }}{{ request('search') ? '&search=' . request('search') : '' }}"
                        class="brand-filter" data-brand="all">
                        {{ $category->name }}
                        </a>
                        @endforeach
                    </div>
                </div>


                <!-- Sort & View Toggle -->
                <div class="shop-sort-section">
                    <div class="container">
                        <div class="row">
                            <div class="sort-box d-flex justify-content-between align-items-md-center" data-aos="fade-up">
                                <ul class="tablist nav sort-tab-btn">
                                    <li><a class="nav-link active" data-bs-toggle="tab" href="#layout-4-grid">
                                        <img src="/img/icons/bkg_grid.png" alt="">
                                    </a></li>
                                    <li><a class="nav-link" data-bs-toggle="tab" href="#layout-list">
                                        <img src="/img/icons/bkg_list.png" alt="">
                                    </a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Product Tab View -->
                <div class="sort-product-tab-wrapper">
                    <div class="container">
                        <div class="tab-content">

                            <!-- Grid View -->
                            <div class="tab-pane active show" id="layout-4-grid">
                                <div class="row">
                                    @foreach ($products as $product)
                                        <div class="col-xl-3 col-lg-4 col-sm-6 col-12 mt-3 pb-4">
                                            <div class="product-default-single-item product-color--golden">
                                                <div class="image-box">
                                                    <a href="{{ route('detail-product', $product->id) }}" class="image-link">
                                                        <img src="{{ asset('storage/' . $product->image1) }}" alt="">
                                                        <img src="{{ asset('storage/' . $product->image2) }}" alt="">
                                                    </a>
                                                    <div class="action-link justify-content-center">
                                                        <div class="action-link-left">
                                                            <form action="{{ route('cart.store') }}" method="POST">
                                                                @csrf
                                                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                                                <input type="hidden" name="jumlah" value="1"> {{-- Tambahkan baris ini --}}
                                                                <button type="submit" class="text-decoration-none btn text-white">
                                                                    <i class="fa-regular fa-cart-shopping"></i> Add to Cart
                                                                </button>
                                                            </form>

                                                        </div>
                                                    </div>
                                                </div>
                                                <h6 class="title pt-2">
                                                    <a href="{{ route('detail-product', $product->id) }}" class="text-decoration-none text-black">{{ $product->name }}</a>
                                                </h6>
                                                <div class="row">
                                                    {{-- <div class="col">
                                                        <ul class="review-star p-0">
                                                            <li><i class="fa-solid fa-star" style="color: #FFD43B;"></i></li>
                                                            <li><i class="fa-solid fa-star" style="color: #FFD43B;"></i></li>
                                                            <li><i class="fa-solid fa-star" style="color: #FFD43B;"></i></li>
                                                            <li><i class="fa-solid fa-star" style="color: #FFD43B;"></i></li>
                                                            <li><i class="fa-regular fa-star" style="color: #FFD43B;"></i></li>
                                                        </ul>
                                                    </div> --}}
                                                    <div class="col text-end">
                                                        <span class="price">IDR {{ number_format($product->harga, 0, ',', '.') }}</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        {{-- <div class="d-flex justify-content-end">
                                            {{ $product->links() }}
                                        </div> --}}
                                    @endforeach

                                </div>
                            </div>

                            <!-- List View -->
                            <div class="tab-pane" id="layout-list">
                                @foreach ($products as $product)
                                <div class="product-list-single product-color--golden mb-5 pb-3 border-bottom">
                                    <a href="{{ route('detail-product', $product->id) }}" class="product-list-img-link">
                                        <img class="img-fluid" width="300px" src="{{ asset('storage/' . $product->image1) }}" alt="">
                                        <img class="img-fluid" width="300px" src="{{ asset('storage/' . $product->image2) }}" alt="">
                                    </a>
                                    <div class="product-list-content">
                                        <h5 class="product-list-link">
                                            <a href="{{ route('detail-product', $product->id) }}">{{ $product->name }}</a>
                                        </h5>
                                        {{-- <ul class="review-star p-0">
                                            <li class="fill"><i class="fa-solid fa-star" style="color: #FFD43B;"></i></li>
                                            <li class="fill"><i class="fa-solid fa-star" style="color: #FFD43B;"></i></li>
                                            <li class="fill"><i class="fa-solid fa-star" style="color: #FFD43B;"></i></li>
                                            <li class="fill"><i class="fa-solid fa-star" style="color: #FFD43B;"></i></li>
                                            <li class="empty"><i class="fa-light fa-star" style="color: #FFD43B;"></i></li>
                                        </ul> --}}
                                        <span class="product-list-price">IDR {{ number_format($product->harga, 0, ',', '.') }}</span>
                                        <p>{!! $product->deskripsi !!}</p>
                                        <form action="{{ route('cart.store') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                                            <input type="hidden" name="jumlah" value="1">
                                            <button type="submit" class="btn btn-lg btn-dark" data-bs-toggle="modal" data-bs-target="#modalAddcart">Add to cart</button>
                                        </form>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            <!-- End List View -->

                        </div>
                    </div>
                </div>
                <!-- End Tab Wrapper -->
            </div>
        </div>
    </div>
</div>

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
                                                <p><span class="text-muted">Brand: </span>{{ $cart->product->brand->name}}
                                            </div>
                                            <div class="col-md-3 col-lg-3 col-xl-2 d-flex align-items-center">
                                                <!-- Minus button -->
                                                <button type="button" class="btn btn-link px-2"
                                                    onclick="changeQuantity('{{ $cart->id }}', -1)">
                                                    <i class="fas fa-minus"></i>
                                                </button>

                                                <!-- Quantity input -->
                                                <form action="/transaction/{{ $cart->id }}" method="get" id="formJumlah_{{ $cart->id }}">
                                                    @csrf
                                                    <input
                                                        type="number"
                                                        name="jumlah"
                                                        id="jumlah_{{ $cart->id }}"
                                                        class="form-control form-control-sm input-jumlah text-center"
                                                        value="{{ $cart->jumlah }}"
                                                        min="1"
                                                        data-harga="{{ $cart->product->harga }}"
                                                        onchange="updateHarga('{{ $cart->id }}')"
                                                        style="width: 60px; font-size: 14px; padding: 3px 6px;" />

                                                </form>

                                                <!-- Plus button -->
                                                <button type="button" class="btn btn-link px-2"
                                                    onclick="changeQuantity('{{ $cart->id }}', 1)">
                                                    <i class="fas fa-plus"></i>
                                                </button>
                                            </div>
                                            <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                                                <h5 class="mb-0" id="harga_{{ $cart->id }}">IDR {{ number_format($cart->harga, 0, ',', '.') }}</h5>
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

    <script>
        function updateHarga(cartId) {
            const inputJumlah = document.querySelector(`#jumlah_${cartId}`);
            const hargaPerItem = parseInt(inputJumlah.getAttribute('data-harga'));
            const jumlah = parseInt(inputJumlah.value);

            const totalHarga = hargaPerItem * jumlah;

            // Ubah teks harga
            const hargaElement = document.querySelector(`#harga_${cartId}`);
            if (hargaElement) {
                hargaElement.textContent = 'IDR ' + totalHarga.toLocaleString('id-ID');
            }
        }

        function changeQuantity(cartId, delta) {
            const input = document.querySelector(`#jumlah_${cartId}`);
            input.stepUp(delta);
            updateHarga(cartId);
        }
    </script>





@endsection
