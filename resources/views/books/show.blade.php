@extends('layouts.master')
@section('title', $book->name)

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="d-flex justify-content-between">
                <h1 class="subheader">Data Buku</h1>

                <a href="{{ route('books.index') }}" class="btn btn-primary btn-rounded btn-sm btn-30">Kembali</a>
            </div>

            <div class="card mt-3">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <tr>
                            <td>Judul</td>
                            <td><span class="font-weight-bold">{{ $book->title }}</span></td>
                        </tr>
                        <tr>
                            <td>Penulis</td>
                            <td><span class="font-weight-bold">{{ $book->author->name }}</span></td>
                        </tr>
                        <tr>
                            <td>Deskripsi</td>
                            <td><span class="font-weight-bold">{{ $book->description }}</span></td>
                        </tr>
                    </table>
                </div>
                <div class="card-footer d-flex justify-content-end gap-1">
                    <a href="{{ route('books.edit', $book) }}" class="btn btn-warning btn-rounded btn-sm">Edit</a>
                    <a href="#" class="btn btn-danger btn-sm btn-rounded btn-delete">Hapus</a>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('custom_html')
    <form action="{{ route('books.destroy', $book) }}" method="post" id="delete-form">
        @csrf
        @method('DELETE')
    </form>
@endsection

@push('custom_js')
    <script>
        let btnDelete = document.querySelector('.btn-delete');
        let deleteForm = document.querySelector('#delete-form');

        btnDelete.addEventListener('click', function(e) {
            e.preventDefault();

            Swal.fire({
                title: 'Apakah anda yakin?',
                text: "Data yang dihapus tidak dapat dikembalikan!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#6c757d',
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    deleteForm.submit();
                }
            })
        });
    </script>
@endpush
