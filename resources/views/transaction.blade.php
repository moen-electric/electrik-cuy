@extends('layouts.main')

@section('container')
<section class="container sproduct pb-3" style="padding-top: 70px">
    <a href="/sale"><i class="fa-sharp fa-solid fa-arrow-left fa-lg"></i></a>
    <h3 class="py-3">Checkout</h3>
    <div class="row d-flex justify-content-center mt-3">
        <div class="col-md-12">
            <div class="row">
                <div class="col-sm-8 mb-3 mb-sm-0">
                    <div class="card shadow-lg">
                        <div class="card-body">
                            <h5 class="card-title text-muted">Shipping Address</h5>
                            <p class="card-text"><i class="fa-sharp fa-solid fa-location-dot"></i> {{ auth()->user()->alamat }}</p>
                            <a href="/profile/{{ Auth::user()->id }}" class="btn btn-outline-secondary">Change Address</a>
                        </div>
                    </div>

                    <div class="card mt-3 shadow-lg">
                        <div class="card-body">
                            <h5 class="card-title"><img src="/img/logo.png" alt="" width="25px" class="me-2 rounded-circle mb-1"> Kick Korner</h5>
                            <div class="card rounded-3 mb-4">
                                <div class="card-body p-4">
                                    <div class="row d-flex justify-content-between align-items-center">
                                        <div class="col-md-2">
                                            <img src="{{ asset('storage/' . $product->image1) }}" class="img-fluid rounded-3" alt="">
                                        </div>
                                        <div class="col-md-6">
                                            <p class="lead fw-normal mb-2">{{ $product->name }}</p>
                                            <p><span class="text-muted">Brand: </span>{{ $product->brand->name }}</p>
                                        </div>
                                        <div class="col-md-4 text-end">
                                            <h5>{{ $jumlahBeli }} x IDR {{ $product->harga }}</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-4">
                    <div class="card shadow-lg">
                        <div class="card-body">
                            <h5 class="card-title">Total</h5>
                            <p class="card-text">IDR {{ $harga }}</p>
                            <button id="pay-button" class="btn btn-success w-100">Pay!</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<form action="/bayar/{{ $cart->id }}" id="form_submit" method="post">
    @csrf
    <input type="hidden" name="json" id="json_callback">
    <input type="hidden" name="jumlah" value="{{ $cart->jumlah }}">
</form>

<!-- Snap JS (Wajib sebelum pemanggilan snap.pay) -->
<script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ env('MIDTRANS_CLIENT_KEY') }}"></script>


<script type="text/javascript">
    var payButton = document.getElementById('pay-button');
    payButton.addEventListener('click', function () {
        window.snap.pay('{{ $snapToken }}', {
            onSuccess: function(result){
                send_response_to_form(result);
            },
            onPending: function(result){
                send_response_to_form(result);
            },
            onError: function(result){
                send_response_to_form(result);
            },
            onClose: function(){
                alert('You closed the popup without finishing the payment');
            }
        })
    });

    function send_response_to_form(result){
        document.getElementById('json_callback').value = JSON.stringify(result);
        document.getElementById('form_submit').submit();
    }
</script>
@endsection
