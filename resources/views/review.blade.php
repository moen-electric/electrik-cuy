@extends('layouts.main')

@section('container')

<style>
        .sproduct select {
            display: block;
            padding: 5px 10px;
        }

        .sproduct input {
            width: 50px;
            height: 40px;
            padding-left: 10px;
            font-size: 16px;
            margin-right: 10px;
        }

        .sproduct input:focus {
            outline: none;
        }

        .buy-btn {
            background: #fb77fb;
            opacity: 1;
            transition: 0.3s all;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
        }

        .buy-btn:hover {
            background: #ff4cff;
        }

        .footer {
            border-top: 2px solid;
            left: 0;
            bottom: 0;
            width: 100%;
            height: 50px;
            background-image: url(img/pixel_weave.png);
            color: black;
            text-align: center;
        }

        /* Star */
        .star-rating {
            direction: rtl;
            display: inline-flex;
        }
        .star-rating input[type="radio"] {
            display: none;
        }
        .star-rating label {
            font-size: 2rem;
            color: #c7c7c7;
            cursor: pointer;
            padding: 0 0.1rem;
        }
        .star-rating input[type="radio"]:checked ~ label i {
            color: #FFD700;
        }
        .star-rating input[type="radio"]:checked ~ label ~ label i {
            color: #FFD700;
        }
        .star-rating label:hover i,
        .star-rating label:hover ~ label i {
            color: #FFD700;
        }
    </style>

    <div class="container-fluid" style="margin-top: 70px">

        <!--Review-->
        <div class="row d-flex justify-content-center">
            <div class="col-md-9">
                <section class="container sproduct pb-3">
                    <a href="/purchases"><i class="fa-sharp fa-solid fa-arrow-left fa-lg"></i></a>
                        <div class="row mt-2">

                            <h3 class="text-center mb-3">Review <span style="color: red">Product</span></h3>
                            <hr>
                            @foreach ($products as $product)
                                <div class="row d-flex justify-content-center">
                                    <div class="col-md-8">
                                        <div class="card rounded-3 my-4">
                                            <div class="card-body p-4">
                                            <div class="row d-flex justify-content-between align-items-center">
                                                <div class="col-md-3 col-lg-3 col-xl-3">
                                                <img
                                                    src="{{ asset('storage/' . $product->image1) }}"
                                                    class="img-fluid rounded-3" style="max-height: 150px">
                                                </div>
                                                <div class="col-md-4 col-lg-4 col-xl-4">
                                                <p class="lead fw-normal mb-2">{{ $product->name }}</p>
                                                <p><span class="text-muted">Brand: {{ $product->brand->name }}</span></p>
                                                </div>
                                                <div class="col-md-2 col-lg-2 col-xl-2 d-flex">

                                                </div>
                                                <div class="d-flex justify-content-center">
                                                    <form action="/review/{{ $transaction->id }}" method="post" enctype="multipart/form-data">
                                                        @csrf

                                                        <div class="">
                                                            <div class="star-rating">
                                                                <input type="radio" id="star5" name="bintang" value="5"><label for="star5" title="5 stars"><i class="fa-solid fa-star"></i></label>
                                                                <input type="radio" id="star4" name="bintang" value="4"><label for="star4" title="4 stars"><i class="fa-solid fa-star"></i></label>
                                                                <input type="radio" id="star3" name="bintang" value="3"><label for="star3" title="3 stars"><i class="fa-solid fa-star"></i></label>
                                                                <input type="radio" id="star2" name="bintang" value="2"><label for="star2" title="2 stars"><i class="fa-solid fa-star"></i></label>
                                                                <input type="radio" id="star1" name="bintang" value="1"><label for="star1" title="1 star"><i class="fa-solid fa-star"></i></label>
                                                            </div>
                                                        </div>
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                </section>

                <div class="row d-flex justify-content-center">
                    <div class="col-md-6">

                            <div class="mb-3">
                                <label for="image" class="form-label d-block">Foto Product</label>
                                <img class="img-preview img-fluid mb-3 col-sm-5" style="max-height: 200; max-width: 200px;">
                                <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image" value="{{ old('image') }}" placeholder="image" onchange="previewImage(event)">
                                @error('image')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="name" id="name" placeholder="name" value="{{ auth()->user()->name }}" disabled>
                                <label for="name">Nama</label>
                            </div>
                            <div class="form-floating mb-3">
                                <textarea class="form-control" placeholder="Leave a comment here" name="ulasan" id="ulasan"></textarea>
                                <label for="ulasan">Comments</label>
                            </div>
                            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                            <input type="hidden" name="transaction_id" value="{{ $transaction->id }}">
                            <input type="hidden" name="product_id" value="{{ $transaction->product_id }}">

                            <div class="mb-3 text-end">
                                <button type="submit" class="btn btn-success w-25">Ulas</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!--End Review-->
    </div>

    <script>
        function previewImage() {
            const image = document.querySelector('#image')
            const imgPreview = document.querySelector('.img-preview')

            imgPreview.style.display = 'block';

            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);

            oFReader.onload = function(oFREvent) {
                imgPreview.src = oFREvent.target.result;
            }
        }
    </script>

@endsection
