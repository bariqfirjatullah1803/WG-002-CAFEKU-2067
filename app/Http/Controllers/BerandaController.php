<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;

class BerandaController extends Controller
{
    public function index()
    {
        // Menampilkan halaman beranda
        $menu = Menu::paginate(4);
        return view('beranda.index', compact('menu'));
    }
    public function pesan(Request $request)
    {
        // Proses Pesan 
        // Total Pesanan awal
        $total_pesanan = 0;
        // Status awal
        $status = 'biasa';
        // Jika ada value Status
        if ($request->status) {
            // Perbarui data status
            $status = $request->status;
        }
        // Proses penambahan total pesanan
        foreach ($request->menu as $m) {
            $total_pesanan += $m;
        }
        // Menghitung jumlah pesanan
        $jumlah_pesanan = count($request->menu);
        // Pemanggilan class bayar
        $order = new Bayar($status, $total_pesanan);
        // Pembuatan data yang akan di kirim
        $data = [
            'nama' => $request->nama,
            'jumlah_pesanan' => $jumlah_pesanan,
            'total_pesanan' => $total_pesanan,
            'status' => $status,
            'diskon' => $order->diskon(),
            'total_pembayaran' => $order->bayar()
        ];
        // mengembalikan di nilai dalam bentuk json 
        return response()->json($data);
    }
}
interface Diskon
{
    public function diskon();
}

class HitungDiskon implements Diskon
{
    public $status;
    public $total_pesanan;
    public function __construct($status, $total_pesanan)
    {
        $this->status = $status;
        $this->total_pesanan = $total_pesanan;
    }
    public function diskon()
    {
        if ($this->status == 'member' && $this->total_pesanan >= 100000) {
            $hitungdiskon = $this->total_pesanan * (20 / 100); 
            return $hitungdiskon;
        } elseif ($this->status == 'member' && $this->total_pesanan < 100000) {
            $hitungdiskon = $this->total_pesanan * (10 / 100);
            return $hitungdiskon;
        } else {
            $hitungdiskon =  $this->total_pesanan * (0 / 100);
            return $hitungdiskon;
        }
    }
}
class Bayar extends HitungDiskon
{
    public function bayar()
    {
        $total_pesanan = (int)$this->total_pesanan;
        $diskon = (int)$this->diskon($this->status, $this->total_pesanan);
        $bayar = $total_pesanan - $diskon;
        return $bayar;
    }
}
