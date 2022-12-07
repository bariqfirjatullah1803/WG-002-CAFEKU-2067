@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Tambah Menu</div>

                    <div class="card-body">
                        <form action="{{ route('menu.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="nama">Nama</label>
                                <input type="text" class="form-control" name="nama">
                            </div>
                            <div class="mb-3">
                                <label for="foto">Foto</label>
                                <input type="file" accept="image/*" class="form-control" name="foto">
                            </div>
                            <div class="mb-3">
                                <label for="harga">Harga</label>
                                <input type="number" min="0" class="form-control" name="harga">
                            </div>
                            <div class="mb-3">
                                <label for="keterangan">Keterangan</label>
                                <textarea class="form-control" name="keterangan" rows="10"></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="kategori">Kategori</label>
                                <select name="kategori_id" class="form-control">
                                    @foreach ($kategori as $k)
                                        <option value="{{$k->id}}">{{$k->nama}}</option>
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
