@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center mt-5 pt-5">
            @foreach ($menu as $m)
                <div class="col-md-4">
                    <div class="card">
                        <img src="{{ asset('artikel/foto/' . $m->foto) }}" style="object-fit: cover;width: 100%;height: 300px"
                            class="card-img-top" alt="{{ $m->foto }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $m->nama }}</h5>
                            <p class="card-text">{{ $m->keterangan, 100 }}</p>
                        </div>
                        <div class="card-footer">
                            Rp {{ number_format($m->harga, 2) }}
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        {{ $menu->links() }}
    </div>
@endsection
