@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Kategori</div>

                    <div class="card-body">
                        <a href="{{ route('kategori.create') }}" class="btn btn-primary">Tambah Kategori</a>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($kategori as $k)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>{{ $k->nama }}</td>
                                        <td>
                                            <form action="{{ route('kategori.destroy', $k->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <a href="{{ route('kategori.edit', $k->id) }}"
                                                    class="btn btn-sm btn-warning">Edit</a>
                                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
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
@endsection
