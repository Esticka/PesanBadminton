@extends('layout.admin')

@section('title', 'Admin - Dashboard Badminton Jagoku')

@section('contents')
    <div>
        <h1 class="font-bold text-2xl ml-3">Dashboard</h1>
        <div class="row ">
            @if (session('jenis_pengguna') === 'pemilik')
                <div class="col-md-4">
                    <div class="card text-white bg-info mb-3" style="max-width: 18rem;">
                        <div class="card-header">Halo !</div>
                        <div class="card-body">
                            <h5 class="card-title">Halo Bos !</h5>
                        </div>
                    </div>
                </div>
            @else
                <div class="col-md-4">
                    <div class="card text-white bg-info mb-3" style="max-width: 18rem;">
                        <div class="card-header">Halo !</div>
                        <div class="card-body">
                            <h5 class="card-title">Halo manager <b>{{ session('username') }}</b>.</h5>
                            <p class="card-text">Saat ini kamu login sebagai
                                <b>{{ session('jenis_pengguna') }}</b> di
                                <b>{{ session('nama_lokasi') }}</b>
                            </p>
                        </div>
                    </div>
                </div>
            @endif
            <div class="col-md-4 ml-auto">
                <div class="card text-white bg-success mb-3" style="max-width: 18rem;">
                    <div class="card-header">Profil Admin</div>
                    <div class="card-body">
                        <h5 class="card-title">Hak Akses :
                            @if (session('jenis_pengguna') === 'pemilik')
                                Owner
                            @else
                                Manager
                            @endif
                        </h5>
                        <p class="card-text">Id :
                            {{ session('id_pengguna') }}
                        </p>
                        <p class="card-text">Username :
                            {{ session('username') }}
                        </p>
                        @if (session('jenis_pengguna') === 'pengelola')
                            <p class="card-text">Lokasi Cabang :
                                {{ session('nama_lokasi') }}
                            </p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>


    <br><br>
    <div class="row">
        <div class="col">
            <div class="card">
                <h5 class="card-header">Produk <i class="bi bi-cart3"></i></h5>
                <div class="card-body">
                    <h5 class="card-title">Produk Lapangan</h5>
                    <a href="{{ route('product') }}" class="btn btn-primary">Data Produk</a>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card">
                <h5 class="card-header">Lapangan <i class="bi bi-map"></i> & <i class="bi bi-flag"></i></h5>
                <div class="card-body">
                    <h5 class="card-title">
                        @if (session('jenis_pengguna') === 'pemilik')
                            Lokasi &
                        @endif
                        Lapangan
                    </h5>
                    <a href="{{ route('lapangan_index') }}" class="btn btn-primary">Data Lapangan</a>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card">
                <h5 class="card-header">List Booking <i class="bi bi-list-check"></i></h5>
                <div class="card-body">
                    <h5 class="card-title">List Booking dari pengguna</h5>
                    <a href="{{ route('booking_list') }}" class="btn btn-primary">Data Booking</a>
                </div>
            </div>
        </div>
    </div>
    <br>
    <div class="row">
        @if (session('jenis_pengguna') === 'pemilik')
            <div class="col">
                <div class="card">
                    <h5 class="card-header">List Pengelola/Manager <i class="bi bi-person-check-fill"></i></i></h5>
                    <div class="card-body">
                        <h5 class="card-title">List dari manager/pengelola cabang</h5>
                        <a href="{{ route('pengelola') }}" class="btn btn-primary">Data Pengelola</a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <h5 class="card-header">List Player/Pengguna <i class="bi bi-people-fill"></i></h5>
                    <div class="card-body">
                        <h5 class="card-title">List pengguna aplikasi</h5>
                        <a href="{{ route('pengguna') }}" class="btn btn-primary">Data Pengguna</a>
                    </div>
                </div>
            </div>
        @endif
    </div>
@endsection
