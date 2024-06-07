<?php

namespace App\Http\Controllers;


use App\Models\PenggunaOlahraga;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class RegisterController extends Controller
{
    public function register()
    {
        return view('register_form');
    }


    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required|unique:pengguna_olahraga,username_pengguna',
            'password' => 'required|min:6',
        ], [
            'username.required' => 'Username wajib diisi',
            'username.unique' => 'Username sudah digunakan',
            'password.required' => 'Password wajib diisi',
            'password.min' => 'Password minimal 6 karakter',
        ]);

        $data = [
            'username_pengguna' => $request->username,
            'password_pengguna' => Hash::make($request->password),
            'jenis_pengguna' => 'pelanggan',  // Default jenis_pengguna
            'id_pelanggan' => '1',
        ];

        $createdBy = $request->username;
        $data['created_by'] = $createdBy;
        $data['updated_by'] = $createdBy;

        PenggunaOlahraga::create($data);

        return redirect()->route('login')->with('success', 'Registrasi berhasil. Silakan login untuk melanjutkan.');
    }
}
