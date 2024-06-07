@extends('layout.user')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Status Keanggotaan</div>

                <div class="card-body">
                    @if ($pelanggan && $pelanggan->jenis_pelanggan == 'member')
                        <div class="alert alert-success" role="alert">
                            Selamat! Anda adalah member hingga {{ $pelanggan->tgl_berakhir_member->format('d F Y') }}
                        </div>
                        <a style="text-decoration: none;" href="{{ route('membership.beli', ['id_pengguna' => $idPengguna]) }}">Perpanjang waktu membership</a>
                    @else
                        <div class="alert alert-warning" role="alert">
                            Anda belum menjadi member. <a href="{{ route('membership.beli', ['id_pengguna' => $idPengguna]) }}">Daftar sekarang!</a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
