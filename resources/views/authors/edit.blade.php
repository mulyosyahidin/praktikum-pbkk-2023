@extends('layouts.master')
@section('title', $author->name .' - Edit Penulis')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="d-flex justify-content-between">
                <h1 class="subheader">Edit Penulis</h1>

                <a href="{{ route('authors.index') }}" class="btn btn-primary btn-rounded btn-sm btn-30">Kembali</a>
            </div>

            <form action="{{ route('authors.update', $author) }}" method="post">
                @csrf
                @method('PUT')

                <div class="card mt-3">
                    <div class="card-body">
                        <h4 class="semibold">Data Penulis</h4>

                        <div class="form-group mb-3">
                            <label for="name" class="mb-2">Nama</label>
                            <input type="text" name="name" value="{{ old('name', $author->name) }}" id="name"
                                class="form-control form-control-lg @error('name') is-invalid @enderror"
                                required="required">

                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="email" class="mb-2">Email</label>
                            <input type="email" name="email" value="{{ old('email', $author->email) }}" id="email"
                                class="form-control form-control-lg @error('email') is-invalid @enderror"
                                required="required">

                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="address" class="mb-2">Alamat</label>
                            <textarea name="address" id="address" class="form-control form-control-lg">{{ old('address', $author->address) }}</textarea>

                            @error('address')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="card-footer d-flex justify-content-end">
                        <input type="submit" value="Simpan" class="btn btn-primary">
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
