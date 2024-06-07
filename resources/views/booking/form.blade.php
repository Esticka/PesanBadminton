@extends('layout.user')

@section('title', 'Court List >')
@section('sub_title', 'Booking Form >')
@section('dynamic_nav_links')
    <li class="nav-item">
        <a class="nav-link" href="#">{{ $lapangan->nama_lapangan }}</a>
    </li>
@endsection
@section('content')
    <div class="container">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @if (session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @endif
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <h2>Lapangan {{ $lapangan->nama_lapangan }}</h2>
                <hr>
                <form action="{{ route('submit_booking') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama Lengkap</label>
                        <input type="text" class="form-control" value="{{ session('username') }}" id="nama" name="nama">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Alamat Email</label>
                        <input type="email" class="form-control" id="email" name="email">
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="waktu_mulai" class="form-label">Waktu Mulai</label>
                            <input type="datetime-local" class="form-control" id="waktu_mulai" name="waktu_mulai" min="{{ now()->addHours(2)->format('Y-m-d\TH:i') }}" onchange="updateWaktuSelesaiMin()">
                        </div>
                        <div class="col-md-6">
                            <label for="waktu_selesai" class="form-label">Waktu Selesai</label>
                            <input type="datetime-local" class="form-control" id="waktu_selesai" name="waktu_selesai" min="{{ now()->addHours(3)->format('Y-m-d\TH:i') }}">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="catatan" class="form-label">Catatan Khusus</label>
                        <textarea class="form-control" id="catatan" name="catatan" rows="3"></textarea>
                    </div>
                    <input type="hidden" name="lapangan_id" value="{{ $lapangan->id_lapangan }}">
                    <input type="hidden" name="nama_lapangan" value="{{ $lapangan->nama_lapangan }}">
                    <input type="hidden" name="id_pengguna" value="{{ session('id_pengguna') }}">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <button type="button" class="btn btn-secondary" onclick="window.location='{{ route('view_lapangan') }}'">Back</button>
                </form>
            </div>
        </div>
    </div>

    <script>
        function updateWaktuSelesaiMin() {
            var waktuMulai = document.getElementById('waktu_mulai').value;
            if (waktuMulai) {
                var minWaktuSelesai = new Date(waktuMulai);
                minWaktuSelesai.setHours(minWaktuSelesai.getHours() + 1);
                var minWaktuSelesaiStr = minWaktuSelesai.toISOString().slice(0, 16);
                document.getElementById('waktu_selesai').min = minWaktuSelesaiStr;
            }
        }
    </script>
@endsection
