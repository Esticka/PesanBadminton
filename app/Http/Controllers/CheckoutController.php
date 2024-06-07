<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TransaksiOlahraga;

class CheckoutController extends Controller
{
    public function index()
    {
        // Ambil id_pengguna dari sesi
        $id_pengguna = session('id_pengguna');

        // Ambil transaksi olahraga berdasarkan id_pengguna
        $transaksi_olahraga = TransaksiOlahraga::where('id_pengguna', $id_pengguna)->get();

        // Hitung total produk dalam keranjang
        $total_produk = $transaksi_olahraga->count();

        // Lakukan logika untuk menampilkan halaman checkout
        return view('checkout.checkout_user', compact('transaksi_olahraga', 'total_produk'));
    }



    public function hapus($id)
    {
        // Temukan transaksi yang ingin dihapus
        $transaksi = TransaksiOlahraga::find($id);

        // Periksa apakah transaksi ditemukan
        if (!$transaksi) {
            return redirect()->back()->with('error', 'Transaksi tidak ditemukan.');
        }

        // Hapus transaksi
        $transaksi->delete();

        // Redirect kembali ke halaman sebelumnya dengan pesan sukses
        return redirect()->back()->with('success', 'Transaksi berhasil dihapus dari keranjang.');
    }
}
