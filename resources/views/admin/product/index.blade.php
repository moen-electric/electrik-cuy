@extends('admin.layouts.main')

@section('container')

<div class="container">
    <div class="row d-flex justify-content-center">
        <div class="col-md-12">

            <h2>Products</h2>

            @if (session()->has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Product List
                </div>
                <div class="card-body">

                    <button type="button" class="btn btn-primary mb-3 text-white" data-bs-toggle="modal" data-bs-target="#tambahProduct">
                        Add Product
                    </button>

                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Product Name</th>
                                <th>Stock</th>
                                <th>Brand</th>
                                <th>Price</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->stok }}</td>
                                <td>{{ $product->brand->name }}</td>
                                <td>{{ $product->harga }}</td>
                                <td>
                                    <a href="/product/{{ $product->id }}" class="btn btn-info btn-sm text-white"><i class="fa-solid fa-eye"></i> View</a>
                                    <a href="/product/{{ $product->id }}/edit" class="btn btn-warning btn-sm text-white"><i class="fa-solid fa-pen-to-square"></i> Edit</a>
                                    <form action="/product/{{ $product->id }}" method="post" class="d-inline" id="delete-form-{{ $product->id }}">
                                        @method('delete')
                                        @csrf
                                        <button type="submit" class="btn btn-danger btn-sm text-white" onclick="event.preventDefault(); deleteData('{{ $product->id }}')";>
                                            <i class="fa-solid fa-trash"></i> Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="tambahProduct" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="tambahProductLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="tambahProductLabel">Add Product</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">

            <form action="/product" method="post" enctype="multipart/form-data">
                @csrf
                {{-- Nama Product --}}
                <div class="form-floating mb-3">
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" placeholder="name" required>
                    <label for="name">Product Name</label>
                    @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                {{-- End --}}

                <div class="row g-3">
                    <div class="col">
                        {{-- Stok --}}
                        <div class="form-floating mb-3">
                            <input type="number" class="form-control @error('stok') is-invalid @enderror" id="stok" name="stok" value="{{ old('stok') }}" placeholder="stok" required>
                            <label for="stok">Stock</label>
                            @error('stok')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        {{-- End --}}
                    </div>
                    <div class="col">
                        {{-- brand --}}
                        <div class="form-floating mb-3">
                            <select class="form-select" id="brand_id" name="brand_id" aria-label="Floating label select example">
                            @foreach ($brands as $brand)
                                @if (old('brand_id') == $brand->id)
                                    <option value="{{ $brand->id }}" selected>{{ $brand->name }}</option>
                                @else
                                    <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                @endif
                            @endforeach
                            </select>
                            <label for="brand_id">Brand</label>
                        </div>
                        {{-- End --}}
                    </div>
                </div>

                <div class="row g-3">
                    <div class="col">
                        {{-- Harga --}}
                        <div class="form-floating mb-3">
                            <input type="number" class="form-control @error('harga') is-invalid @enderror" id="harga" name="harga" value="{{ old('harga') }}" placeholder="harga" required>
                            <label for="harga">Price</label>
                            @error('harga')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        {{-- End --}}
                    </div>
                    <div class="col">
                        {{-- Category --}}
                        <div class="form-floating mb-3">
                            <select class="form-select" id="category_id" name="category_id" aria-label="Floating label select example">
                            @foreach ($categories as $category)
                            @if (old('category_id') == $category->id)
                                <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                            @else
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endif
                            @endforeach
                            </select>
                            <label for="category_id">Category</label>
                        </div>

                        {{-- End --}}
                    </div>
                </div>

                {{-- Image1 --}}
                <div class="mb-3">
                    <label for="image1" class="form-label">Image 1</label>
                    <img class="img-preview1 img-fluid mb-3 col-sm-5" style="max-height: 200; max-width: 200px;">
                    <input type="file" class="form-control @error('image1') is-invalid @enderror" id="image1" name="image1" value="{{ old('image1') }}" placeholder="image1" required onchange="previewImage1(event)">
                    @error('image1')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                {{-- End --}}

                {{-- Image2 --}}
                <div class="mb-3">
                    <label for="image2">Image 2</label>
                    <img class="img-preview2 img-fluid mb-3 col-sm-5" style="max-height: 200; max-width: 200px;">
                    <input type="file" class="form-control @error('image2') is-invalid @enderror" id="image2" name="image2" value="{{ old('image2') }}" placeholder="image2" required onchange="previewImage2(event)">
                    @error('image2')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                {{-- End --}}

                {{-- Image3 --}}
                <div class="mb-3">
                    <label for="image3">Image 3</label>
                    <img class="img-preview3 img-fluid mb-3 col-sm-5" style="max-height: 200; max-width: 200px;">
                    <input type="file" class="form-control @error('image3') is-invalid @enderror" id="image3" name="image3" value="{{ old('image3') }}" placeholder="image3" required onchange="previewImage3(event)">
                    @error('image3')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                {{-- End --}}

                {{-- Deskripsi --}}
                <div class="mb-3">
                    <label for="deskripsi" class="form-label">Description</label>
                    @error('deskripsi')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                    <input id="deskripsi" type="hidden" name="deskripsi" value="{{ old('deskripsi') }}">
                    <trix-editor input="deskripsi"></trix-editor>
                </div>
                {{-- End --}}
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary text-white">Add</button>
        </div>
    </form>
      </div>
    </div>
</div>

<script>
    document.addEventListener("trix-file-accept", function(event) {
        event.preventDefault();
    });

    function previewImage1() {
      const image = document.querySelector('#image1')
      const imgPreview = document.querySelector('.img-preview1')

      imgPreview.style.display = 'block';

      const oFReader = new FileReader();
      oFReader.readAsDataURL(image.files[0]);

      oFReader.onload = function(oFREvent) {
        imgPreview.src = oFREvent.target.result;
      }
    }

    function previewImage2() {
      const image = document.querySelector('#image2')
      const imgPreview = document.querySelector('.img-preview2')

      imgPreview.style.display = 'block';

      const oFReader = new FileReader();
      oFReader.readAsDataURL(image.files[0]);

      oFReader.onload = function(oFREvent) {
        imgPreview.src = oFREvent.target.result;
      }
    }

    function previewImage3() {
      const image = document.querySelector('#image3')
      const imgPreview = document.querySelector('.img-preview3')

      imgPreview.style.display = 'block';

      const oFReader = new FileReader();
      oFReader.readAsDataURL(image.files[0]);

      oFReader.onload = function(oFREvent) {
        imgPreview.src = oFREvent.target.result;
      }
    }

    function deleteData(id) {
        Swal.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, delete it!"
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('delete-form-' + id).submit();
                Swal.fire({
                    title: "Deleted!",
                    text: "Your file has been deleted.",
                    icon: "success"
                });
            }
        });
    }
</script>

@endsection
