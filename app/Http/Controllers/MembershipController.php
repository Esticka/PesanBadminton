<?php
namespace App\Http\Controllers;

use App\Models\Pelanggan;
use App\Http\Requests\BeliMembershipRequest;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;



class MembershipController extends Controller
{
    public function showStatus(Request $request)
    {
        $idPengguna = $request->query('id_pengguna');
        $pelanggan = Pelanggan::where('id_pengguna', $idPengguna)->first();

        if ($pelanggan && is_string($pelanggan->tgl_berakhir_member)) {
            $pelanggan->tgl_berakhir_member = Carbon::parse($pelanggan->tgl_berakhir_member);
        }

        return view('membership.status', compact('pelanggan', 'idPengguna'));
    }

    public function beliForm(Request $request)
    {
        $idPengguna = $request->query('id_pengguna');
        return view('membership.beli', compact('idPengguna'));
    }

    public function beliMembership(BeliMembershipRequest $request)
    {
        $idPengguna = $request->id_pengguna;

        $pelanggan = Pelanggan::updateOrCreate(
            ['id_pengguna' => $idPengguna],
            [
                'jenis_pelanggan' => 'member',
                'tgl_berakhir_member' => Carbon::now()->addYear(),
            ]
        );

        $message = $pelanggan->wasRecentlyCreated
            ? 'Selamat! Anda sekarang menjadi member.'
            : 'Keanggotaan Anda berhasil diperpanjang.';

        return redirect()->route('membership.status', ['id_pengguna' => $idPengguna])->with('success', $message);
    }

    public function statusMembership(Request $request)
    {
        $idPengguna = $request->query('id_pengguna');

        $pelanggan = Pelanggan::where('id_pengguna', $idPengguna)->first();

        if ($pelanggan && is_string($pelanggan->tgl_berakhir_member)) {
            $pelanggan->tgl_berakhir_member = Carbon::parse($pelanggan->tgl_berakhir_member);
        }

        return view('membership.status', compact('pelanggan', 'idPengguna'));
    }
}
