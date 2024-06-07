<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TransaksiOlahraga;

class PurchaseController extends Controller
{
    public function index()
    {
        // Ambil id_pengguna dari sesi
        $id_pengguna = session('id_pengguna');

        // Ambil transaksi olahraga berdasarkan id_pengguna
        $transaksi_olahraga = TransaksiOlahraga::where('id_pengguna', $id_pengguna)->get();

        // Hitung total produk dalam keranjang
        $total_produk = $transaksi_olahraga->count();

        // Mengembalikan tampilan dengan daftar pembelian
        return view('product.purchase', compact('transaksi_olahraga', 'total_produk'));
    }
    public function edit()
    {
        return redirect()->back()->with('error', 'Fitur ini belum dikembangkan oleh developer. Mohon bersabar.');
    }
}
