@extends('layouts.master')
@section('title', 'Kelola Buku')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="d-flex justify-content-between">
                <h1 class="subheader">Kelola Buku</h1>

                <a href="{{ route('books.create') }}" class="btn btn-primary btn-rounded btn-sm btn-30"><i
                        class="fa fa-plus"></i> Tambah</a>
            </div>

            <div class="card mt-3">
                <div class="table-responsive">
                    <table class="table table-condensed table-hover">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Judul</th>
                                <th scope="col">Penulis</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($books as $book)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>{{ $book->title }}</td>
                                    <td>{{ $book->author->name }}</td>
                                    <td class="text-end">
                                        <a href="{{ route('books.show', $book) }}"
                                            class="btn btn-sm btn-success btn-rounded">Lihat</a>
                                        <a href="{{ route('books.edit', $book) }}"
                                            class="btn btn-sm btn-warning btn-rounded">Edit</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="card-footer">
                    {{ $books->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
