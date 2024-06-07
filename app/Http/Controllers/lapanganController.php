<?php

namespace App\Http\Controllers;

use App\Models\Lokasi;
use App\Models\Lapangan;
use Illuminate\Http\Request;
use App\Models\KategoriLapangan;
use App\Models\PenggunaOlahraga;
use Illuminate\Support\Facades\Storage;

class lapanganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function lapangan()
    {
        $data_lapangan = Lapangan::all();
        $data = Lokasi::all();

        return view('court.lapangan', compact('data_lapangan', 'data'));
    }

    public function lapangan_user()
    {
        $data_lapangan = Lapangan::all();
        return view('court.lapangan_user', ['data_lapangan' => $data_lapangan]);
    }


    public function show_lapangan($id)
    {
        $lapangan = Lapangan::with('kategori')->findOrFail($id);
        return view('court.lapangan_show', compact('lapangan'));
    }

    public function user_court_show($id)
    {
        $lapangan = Lapangan::findOrFail($id);
        return view('court.lapangan_user_show', compact('lapangan'));
    }


    public function lapangan_create()
    {
        $data_lokasi = Lokasi::all();
        return view('court.lapangan_create', ['data_lokasi' => $data_lokasi]);
    }

    public function lapangan_store(Request $request)
    {
        $messages = [
            'nama_lapangan.required' => 'Nama lapangan wajib diisi.',
            'harga_lapangan.required' => 'Harga sewa lapangan wajib diisi.',
            'deskripsi_lapangan.required' => 'Deskripsi lapangan wajib diisi.',
        ];

        $validatedData = $request->validate([
            'nama_lapangan' => 'required|string|max:255',
            'harga_lapangan' => 'required|numeric',
            'deskripsi_lapangan' => 'required|string',
            'id_lokasi' => 'required|exists:lokasi,id_lokasi',
            'img_lapangan' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ], $messages);


        // if ($request->hasFile('img_lapangan')) {
        //     $fileNameWithExt = $request->file('img_lapangan')->getClientOriginalName();
        //     $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
        //     $extension = $request->file('img_lapangan')->getClientOriginalExtension();
        //     $fileNameToStore = $fileName . '_' . time() . '.' . $extension;
        //     $path = $request->file('img_lapangan')->storeAs('public/img', $fileNameToStore);
        //     $validatedData['img_lapangan'] = 'img/' . $fileNameToStore;
        // }

        if ($request->hasFile('img_lapangan')) {
            $file = $request->file('img_lapangan');
            $fileNameWithExt = $file->getClientOriginalName();
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            $extension = $file->getClientOriginalExtension();
            $fileNameToStore = $fileName . '_' . time() . '.' . $extension;

            if (!file_exists(public_path('img'))) {
                mkdir(public_path('img'), 0755, true);
            }

            $file->move(public_path('img'), $fileNameToStore);

            $validatedData['img_lapangan'] = 'img/' . $fileNameToStore;
        }

        Lapangan::create($validatedData);

        return redirect()->route('lapangan_index')->with('success', 'Lapangan added successfully');
    }


    public function edit_lapangan($id_lapangan)
    {
        $lapangan = Lapangan::findOrFail($id_lapangan);
        return view('court.lapangan_edit', compact('lapangan'));
    }



    public function update_lapangan(Request $request, string $id_lapangan)
    {
        $lapangan = Lapangan::findOrFail($id_lapangan);

        $validatedData = $request->validate([
            'nama_lapangan' => 'required|string|max:255',
            'harga_lapangan' => 'required|numeric',
            'deskripsi_lapangan' => 'required|string',
            'img_lapangan' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ], [
            'nama_lapangan.required' => 'Nama lapangan wajib diisi.',
            'harga_lapangan.required' => 'Harga lapangan wajib diisi.',
            'deskripsi_lapangan.required' => 'Deskripsi lapangan wajib diisi.',
            'harga_lapangan.numeric' => 'Harga harus berupa angka.',
            'img_lapangan.image' => 'File harus berupa gambar.',
            'img_lapangan.mimes' => 'Format gambar harus jpeg, png, jpg, atau gif.',
            'img_lapangan.max' => 'Ukuran gambar tidak boleh lebih dari 2MB.',
        ]);

        if ($request->hasFile('img_lapangan')) {
            if ($lapangan->img_lapangan) {
                Storage::delete($lapangan->img_lapangan);
            }

            $fileNameWithExt = $request->file('img_lapangan')->getClientOriginalName();
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('img_lapangan')->getClientOriginalExtension();
            $fileNameToStore = $fileName . '_' . time() . '.' . $extension;
            $path = $request->file('img_lapangan')->storeAs('public/img', $fileNameToStore);

            $validatedData['img_lapangan'] = 'img/' . $fileNameToStore;
        }

        $lapangan->update($validatedData);

        return redirect()->route('lapangan_index')->with('success', 'Lapangan updated successfully');
    }




    public function destroy_lapangan(string $id_lapangan)
    {

        $lapangan = Lapangan::findOrFail($id_lapangan);


        $lapangan->delete();


        return redirect()->route('lapangan_index')->with('success', 'Lapangan deleted successfully');
    }
}
