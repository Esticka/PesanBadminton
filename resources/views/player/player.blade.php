@extends('layout.admin')

@section('title', 'Pengelola Details')

@section('contents')
    <div class="container">
        <h1>Player List</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Username</th>
                    <th>Last Login</th>
                    <th>Jenis Pelanggan</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($players as $player)
                    <tr>
                        <td>{{ $player->id_pengguna }}</td>
                        <td>{{ $player->username_pengguna }}</td>
                        <td>{{ $player->last_login }}</td>
                        <td>{{ optional($player->pelanggan)->jenis_pelanggan ?? 'Biasa' }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
