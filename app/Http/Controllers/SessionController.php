<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\PenggunaOlahraga;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Models\Lokasi;

class SessionController extends Controller
{
    public function index()
    {
        return view('index');
    }
    public function admin()
    {
        return view('dashboard_admin');
    }


    public function form_login()
    {
        return view('login_form')->with('error', session('error'));
    }

    public function logout()
    {

        Auth::logout();


        session()->forget('is_logged_in');
        session()->forget('username');


        return redirect()->route('index')->with('success', 'Logout berhasil!');
    }

    public function validasi(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ], [
            'username.required' => 'Username wajib diisi',
            'password.required' => 'Password wajib diisi',
        ]);

        $remember = $request->has('remember');

        if ($remember) {
            setcookie("username", $request->username, time() + 3600);
            setcookie("password", $request->password, time() + 3600);
        } else {
            setcookie("username", "", time() - 3600);
            setcookie("password", "", time() - 3600);
        }

        $pengguna = PenggunaOlahraga::where('username_pengguna', $request->username)->first();

        if (!$pengguna) {
            return redirect()->route('login')->withErrors(['login' => 'Username tidak ditemukan. Coba lagi.'])->withInput();
        }

        if (password_verify($request->password, $pengguna->password_pengguna)) {
            $pengguna->update(['last_login' => Carbon::now()]);

            session([
                'is_logged_in' => true,
                'id_pengguna' => $pengguna->id_pengguna,
                'id_lokasi' => $pengguna->id_lokasi,
                'username' => $request->username,
                'jenis_pengguna' => $pengguna->jenis_pengguna
            ]);
            $id_lokasi = session('id_lokasi');

            $lokasi = Lokasi::find($id_lokasi);
            if ($lokasi) {
                $nama_lokasi = $lokasi->nama_lokasi;
                session(['nama_lokasi' => $nama_lokasi]);
            }

            switch ($pengguna->jenis_pengguna) {
                case 'pemilik':
                    return redirect()->route('admin_dashboard')->with('success', 'Login berhasil.');
                case 'pengelola':
                    return redirect()->route('admin_dashboard')->with([
                        'success' => 'Login berhasil.',
                    ]);
                case 'pelanggan':
                    return redirect()->route('index')->with('success', 'Login berhasil.');
                default:
                    return redirect()->route('login')->withErrors(['login' => 'Jenis pengguna tidak valid. Silahkan hubungi administrator.'])->withInput();
            }
        }

        // Password tidak cocok, redirect kembali ke halaman login dengan pesan error
        return redirect()->route('login')->withErrors(['login' => 'Username atau Password anda salah, silahkan coba lagi.'])->withInput();
    }
}
