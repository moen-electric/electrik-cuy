@extends('layouts.main')

@section('container')

<div class="container" style="padding-top: 100px">
    <div class="row justify-content-center text-center">
        <div class="col-md-6">

            @if (session()->has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <h1><i class="fa-duotone fa-circle-user fa-2xl my-5"></i></h1>

            <form action="/profile/{{ $user->id }}/edit" method="post" enctype="multipart/form-data">
                @csrf

                <!-- {{-- Foto Profil --}}
                <div class="mb-3 text-center">
                    @if ($user->photo)
                        <img src="{{ asset('storage/profile_pictures/' . $user->photo) }}" alt="Foto Profil" class="rounded-circle mb-2" width="150" height="150" style="object-fit: cover;">
                    @endif
                </div>

                <div class="mb-3">
                    <label for="photo" class="form-label">Upload Foto Profil</label>
                    <input type="file" class="form-control @error('photo') is-invalid @enderror" name="photo" id="photo" accept="image/*">
                    @error('photo')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div> -->

                {{-- Name --}}
                <div class="form-floating mb-3">
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $user->name) }}" placeholder="name" required>
                    <label for="name">Name</label>
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Email --}}
                <div class="form-floating mb-3">
                    <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}" placeholder="email" required disabled>
                    <label for="email">Email</label>
                </div>

                {{-- No HP --}}
                <div class="form-floating mb-3">
                    <input type="text" class="form-control @error('no_hp') is-invalid @enderror" id="no_hp" name="no_hp" value="{{ old('no_hp', $user->no_hp) }}" placeholder="no_hp" required>
                    <label for="no_hp">Phone number</label>
                    @error('no_hp')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>



                {{-- Alamat --}}
                <div class="form-floating mb-3">
                    <textarea class="form-control @error('alamat') is-invalid @enderror" name="alamat" id="alamat" rows="2" placeholder="Address" required>{{ old('alamat', $user->alamat) }}</textarea>
                    <label for="alamat">Alamat</label>
                    @error('alamat')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Jenis Kelamin --}}
                <div class="form-floating mb-3">
                    <select class="form-select @error('jenis_kelamin') is-invalid @enderror" id="jenis_kelamin" name="jenis_kelamin" required>
                        <option disabled selected>Sex</option>
                        <option value="-" {{ old('jenis_kelamin', $user->jenis_kelamin) == '-' ? 'selected' : '' }}>-</option>
                        <option value="M" {{ old('jenis_kelamin', $user->jenis_kelamin) == 'M' ? 'selected' : '' }}>M</option>
                        <option value="F" {{ old('jenis_kelamin', $user->jenis_kelamin) == 'F' ? 'selected' : '' }}>F</option>
                    </select>
                    <label for="jenis_kelamin">sex</label>
                    @error('jenis_kelamin')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>


                {{-- Tombol Submit --}}
                <div class="mb-3 text-end" style="padding-top: 70px">
                    <button type="submit" class="btn btn-warning">Save</button>
                </div>

            </form>
        </div>
    </div>
</div>

@endsection
