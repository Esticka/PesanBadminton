<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lokasi;
use App\Models\PenggunaOlahraga;
use Illuminate\Support\Facades\Hash;

class ManagerController extends Controller
{
    public function index()
    {
        $managers = PenggunaOlahraga::where('jenis_pengguna', 'pengelola')->get();
        $data_lokasi = Lokasi::all();
        return view('manager.manager', ['data_lokasi' => $data_lokasi, 'managers' => $managers]);
    }

    public function destroy_member($id)
    {
        // Find the member by ID
        $member = PenggunaOlahraga::findOrFail($id);

        // Delete the member
        $member->delete();

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Manager has been deleted successfully.');
    }

    // Method untuk menyimpan member baru
    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required|unique:pengguna_olahraga,username_pengguna',
            'password' => 'required|min:6',
        ]);

        PenggunaOlahraga::create([
            'username_pengguna' => $request->username,
            'password_pengguna' => Hash::make($request->password),
            'jenis_pengguna' => 'pengelola',
            'created_by' => 'admin',      
            'updated_by' => 'admin',   
            'id_lokasi' => $request->id_lokasi,
        ]);

        return redirect()->back()->with('success', 'Member berhasil ditambahkan.');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


}
