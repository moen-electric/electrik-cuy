@extends('admin.layouts.main')

@section('container')

<div class="container">
    <div class="row d-flex justify-content-center">
        <div class="col-md-6">
            <h2 class="text-center mb-5">Edit Brand</h2>

            <form action="/brand/{{ $brand->id }}" method="post">
                @csrf
                @method('put')
                <div class="form-floating mb-3">
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ $brand->name }}" placeholder="name" required>
                    <label for="name">Brand Name</label>
                    @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <input type="submit" value="Edit" class="btn btn-warning">
            </form>
        </div>
    </div>
</div>

@endsection
