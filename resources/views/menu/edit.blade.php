@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edit Menu</div>

                    <div class="card-body">
                        <form action="{{ route('menu.update', $menu->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <div class="mb-3">
                                <label for="nama">Nama</label>
                                <input type="text" class="form-control" name="nama" value="{{ $menu->nama }}">
                            </div>
                            <div class="mb-3">
                                <img src="{{ asset('artikel/foto/' . $menu->foto) }}" alt="{{ $menu->foto }}">
                            </div>
                            <div class="mb-3">
                                <label for="foto">Foto</label>
                                <input type="file" accept="image/*" class="form-control" name="foto">
                            </div>
                            <div class="mb-3">
                                <label for="harga">Harga</label>
                                <input type="number" min="0" class="form-control" name="harga"
                                    value="{{ $menu->harga }}">
                            </div>
                            <div class="mb-3">
                                <label for="keterangan">Keterangan</label>
                                <textarea class="form-control" name="keterangan" rows="10">{{ $menu->keterangan }}</textarea>
                            </div>
                            <div class="mb-3">
                                <label for="kategori">Kategori</label>
                                <select name="kategori_id" class="form-control">
                                    @foreach ($kategori as $k)
                                        <option value="{{ $k->id }}"
                                            {{ $menu->kategori_id == $k->id ? 'selected' : '' }}>{{ $k->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
