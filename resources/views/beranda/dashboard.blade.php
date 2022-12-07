@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center mt-5 pt-5">
            <div class="col-4">
                <div class="card">
                    <div class="card-header">Order</div>
                    <div class="card-body">
                        @csrf
                        <div class="mb-3">
                            <label for="nama">Nama</label>
                            <input type="text" class="form-control" id="nama" name="nama" required>
                        </div>
                        <div class="mb-3">
                            <label for="">Menu</label>
                            <select class="form-select" name="menu[]" id="menu" multiple
                                aria-label="multiple select example" required>
                                @foreach ($menu as $m)
                                    <option value="{{ $m->harga }}">{{ $m->nama }} &nbsp; {{ $m->harga }}
                                    </option>
                                @endforeach
                            </select>
                            <div id="menu" class="form-text">Gunakan tombol "shift" atau "ctrl" untuk memilih lebih</div>
                        </div>
                        <div class="mb-3">
                            <label for="">Status</label>
                            <select name="status" id="status" class="form-control">
                                <option value="member">Member</option>
                                <option value="biasa">Biasa</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <button id="submit" type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="card">
                    <div class="card-header">Result</div>
                    <div class="card-body">
                        @csrf
                        <div class="mb-3">
                            <label for="nama">Nama</label>
                            <input type="text" class="form-control" id="result_nama" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="jumlah_pesanan">Jumlah Pesanan</label>
                            <input type="text" class="form-control" id="result_jumlah_pesanan" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="total_pesanan">Total Pesanan</label>
                            <input type="text" class="form-control" id="result_total_pesanan" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="result_status">Status</label>
                            <input type="text" class="form-control" id="result_status" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="diskon">Diskon</label>
                            <input type="text" class="form-control" id="result_diskon" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="total_pembayaran">Total Pembayaran</label>
                            <input type="text" class="form-control" id="result_total_pembayaran" readonly>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
