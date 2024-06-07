<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lokasi;
use Illuminate\Support\Facades\DB;

class LokasiController extends Controller
{
    public function index()
    {
        $data = Lokasi::all();
        return view('court.lokasi_lapangan', ['data' => $data]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_lokasi' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'deskripsi' => 'required|string',
        ]);

        $username = session('username');

        Lokasi::create([
            'nama_lokasi' => $validatedData['nama_lokasi'],
            'alamat' => $validatedData['alamat'],
            'deskripsi' => $validatedData['deskripsi'],
            'update_at' => time(),
            'created_by' => $username,
            'updated_by' => $username,
        ]);

        return redirect()->route('lapangan_index')->with('success', 'Lokasi berhasil ditambahkan');
    }
    public function update_lokasi(Request $request, string $id_lokasi)
    {
        $Lokasi = Lokasi::findOrFail($id_lokasi);

        $validatedData = $request->validate([
            'nama_lokasi' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'deskripsi' => 'required|string',
        ], [
            'nama_lokasi.required' => 'Nama lokasi wajib diisi.',
            'alamat.required' => 'Alamat lapangan wajib diisi.',
            'deskripsi.required' => 'Deskripsi alamat wajib diisi.',
        ]);

        $Lokasi->update($validatedData);

        return redirect()->route('lapangan_index')->with('success', 'Lokasi ' . $Lokasi->nama_lokasi . ' telah diperbaharui');
    }
    public function edit_lokasi($id_lokasi)
    {
        $lokasi = Lokasi::findOrFail($id_lokasi);
        return view('court.lokasi.lokasi_lapangan_edit', compact('lokasi'));
    }
    public function destroy_lokasi(Request $request, string $id_lokasi)
    {
        $lokasi = Lokasi::findOrFail($id_lokasi);

        // Check for related records in pengguna_olahraga
        $relatedUsers = DB::table('pengguna_olahraga')->where('id_lokasi', $id_lokasi)->count();

        if ($relatedUsers > 0 && !$request->has('confirm_delete')) {
            return redirect()->route('lapangan_index')->with('warning', 'Terdapat akun yang terhubung dengan lokasi ini, anda diwajibkan untuk menghapus akun manager pada lokasi yang ingin dihapus. Jika sudah, maka anda dapat menghapus lokasi ini kembali.');
        }

        // Delete related records if confirmed
        if ($request->has('confirm_delete')) {
            DB::table('pengguna_olahraga')->where('id_lokasi', $id_lokasi)->delete();
        }

        $lokasi->delete();

        return redirect()->route('lapangan_index')->with('success', 'Lokasi ' . $lokasi->nama_lokasi . ' dan akun terkait telah dihapus');
    }
}
