@extends('layouts.master')
@section('title', 'Kelola Penulis')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="d-flex justify-content-between">
                <h1 class="subheader">Tambah Penulis</h1>

                <a href="{{ route('authors.index') }}" class="btn btn-primary btn-rounded btn-sm btn-30">Kembali</a>
            </div>

            <form action="{{ route('authors.store') }}" method="post">
                @csrf

                <div class="card mt-3">
                    <div class="card-body">
                        <h4 class="semibold">Data Penulis</h4>

                        <div class="form-group mb-3">
                            <label for="name" class="mb-2">Nama</label>
                            <input type="text" name="name" value="{{ old('name') }}" id="name"
                                class="form-control form-control-lg @error('name') is-invalid @enderror"
                                required="required">

                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="email" class="mb-2">Email</label>
                            <input type="email" name="email" value="{{ old('email') }}" id="email"
                                class="form-control form-control-lg @error('email') is-invalid @enderror"
                                required="required">

                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="address" class="mb-2">Alamat</label>
                            <textarea name="address" id="address" class="form-control form-control-lg @error('address') is-invalid @endif">{{ old('address') }}</textarea>

                            @error('address')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="card-footer d-flex justify-content-end">
                        <input type="submit" value="Tambah" class="btn btn-primary">
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
