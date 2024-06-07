<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PenggunaOlahraga;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Hash;

class MemberController extends Controller
{
    public function index()
    {
        $players = PenggunaOlahraga::with('pelanggan')->where('jenis_pengguna', 'pelanggan')->get();
    
        return view('player.player', compact('players'));
    }
    
}
