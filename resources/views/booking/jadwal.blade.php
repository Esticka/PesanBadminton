@extends('layout.user')

@section('title', 'Jadwal Lapangan')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                @if ($jadwal->isEmpty())
                    <h2>Tidak ada jadwal lapangan yang sedang berlangsung saat ini.</h2>
                @else
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama Lapangan</th>
                                <th>Nama Pemesan</th>
                                <th>Waktu Mulai Booking</th>
                                <th>Waktu Selesai Booking</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($jadwal as $index => $booking)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $booking->lapangan->nama_lapangan }}</td>
                                    <td>{{ $booking->nama_pemesan }}</td>
                                    <td>{{ \Carbon\Carbon::parse($booking->waktu_mulai_booking)->format('d/m/Y H:i') }}
                                    <td>{{ \Carbon\Carbon::parse($booking->waktu_selesai_booking)->format('d/m/Y H:i') }}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
        </div>
    </div>
@endsection
