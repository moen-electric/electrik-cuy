@extends('admin.layouts.main')

@section('container')

    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-md-8">
                <a href="/product"><i class="fa-sharp fa-solid fa-arrow-left fa-lg"></i></a>
                <h3 class="text-center">Detail Product</h3>

                <table class="table table-striped">
                    <tr>
                        <td colspan="2" class="text-center">
                            <img src="{{ asset('Storage/'. $product->image1) }}" style="width: 400px; height: 400px">
                        </td>
                    </tr>
                    <tr>
                        <th>Product Name</th><td>{{ $product->name }}</td>
                    </tr>
                    <tr>
                        <th>Brand</th><td>{{ $product->brand->name }}</td>
                    </tr>
                    <tr>
                        <th>Category</th><td>{{ $product->category->name }}</td>
                    </tr>
                    <tr>
                        <th>Stock</th><td>{{ $product->stok }}</td>
                    </tr>
                    <tr>
                        <th>Price</th><td>IDR {{ $product->harga }}</td>
                    </tr>
                    <tr>
                        <th>Description</th><td>{!! $product->deskripsi !!}</td>
                    </tr>
                </table>

            </div>
        </div>
    </div>

@endsection
