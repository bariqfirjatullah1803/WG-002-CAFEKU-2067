@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Menu</div>

                    <div class="card-body">
                        <a href="{{ route('menu.create') }}" class="btn btn-primary">Tambah Menu</a>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Foto</th>
                                    <th scope="col">Harga</th>
                                    <th scope="col">Keterangan</th>
                                    <th scope="col">Kategori</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($menu as $m)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>{{ $m->nama }}</td>
                                        <td><img src="{{ asset('artikel/foto/'.$m->foto) }}" width="100" alt="{{$m->foto}}"></td>
                                        <td>{{ $m->harga }}</td>
                                        <td>{{ $m->keterangan }}</td>
                                        <td>{{ $m->kategori->nama }}</td>
                                        <td>
                                            <form action="{{ route('menu.destroy', $m->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <a href="{{ route('menu.edit', $m->id) }}"
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
