@extends('layouts.main')

@section('container')

<!-- ...:::: Start Cart Section:::... -->
<div class="cart-section">
    <!-- Start Cart Table -->
    <div class="cart-table-wrapper" data-aos="fade-up" data-aos-delay="0">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="table_desc">
                        <div class="table_page table-responsive">
                            <table>
                                <!-- Start Cart Table Head -->
                                <thead>
                                    <tr>
                                        <th class="product_remove">Delete</th>
                                        <th class="product_thumb">Image</th>
                                        <th class="product_name">Product</th>
                                        <th class="product-price">Price</th>
                                        <th class="product_quantity">Quantity</th>
                                        <th class="product_total">Total</th>
                                    </tr>
                                </thead> <!-- End Cart Table Head -->

                                <tbody>
                                    @forelse ($carts as $cart)
                                        <!-- Start Cart Single Item-->
                                        <tr>
                                            <td class="product_remove">
                                                <form action="{{ route('cart.destroy', $cart->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" style="border: none; background: none;">
                                                        <i class="fa fa-trash-o"></i>
                                                    </button>
                                                </form>
                                            </td>
                                            <td class="product_thumb">
                                                <a href="#">
                                                    <img src="{{ asset('storage/' . $cart->product->image1) }}"
                                                         alt="{{ $cart->product->name }}" width="80">
                                                </a>
                                            </td>
                                            <td class="product_name">
                                                <a href="#">{{ $cart->product->name }}</a>
                                            </td>
                                            <td class="product-price">
                                                Rp {{ number_format($cart->product->harga, 0, ',', '.') }}
                                            </td>
                                            <td class="product_quantity">
                                                <label>Quantity</label>
                                                <input min="1" max="{{ $cart->product->stok }}"
                                                       value="{{ $cart->jumlah }}" type="number" readonly>
                                            </td>
                                            <td class="product_total">
                                                Rp {{ number_format($cart->harga, 0, ',', '.') }}
                                            </td>
                                        </tr> <!-- End Cart Single Item-->
                                    @empty
                                        <tr>
                                            <td colspan="6" class="text-center">Keranjang kosong.</td>
                                        </tr>
                                    @endforelse
                                </tbody>

                            </table>
                        </div>
                        <div class="cart_submit">
                            <a href="/sale" class="btn btn-md btn-golden">Tambah Produk Lagi</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End Cart Table -->
</div>

@endsection
