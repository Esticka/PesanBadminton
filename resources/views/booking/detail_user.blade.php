@extends('layout.user')


@section('title', 'My Bookings >')
@section('sub_title', 'Booking Detail >')
@section('dynamic_nav_links')

    <li class="nav-item">
        <a class="nav-link" href="#">{{ $booking->lapangan->nama_lapangan  }}</a>
    </li>

@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <h2>Booking Detail</h2>
                <div class="mb-3">
                    <label for="nama">Nama Pemesan:</label>
                    <input type="text" id="nama" class="form-control" value="{{ $booking->nama_pemesan }}" readonly>
                </div>
                <div class="mb-3">
                    <label for="email">Email Pemesan:</label>
                    <input type="email" id="email" class="form-control" value="{{ $booking->email_pemesan }}"
                        readonly>
                </div>
                <div class="mb-3">
                    <label for="lapangan">Lapangan:</label>
                    <input type="text" id="lapangan" class="form-control"
                        value="{{ $booking->lapangan->nama_lapangan }}" readonly>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="waktu_mulai">Waktu Mulai:</label>
                        <input type="text" id="waktu_mulai" class="form-control"
                            value="{{ $booking->waktu_mulai_booking }}" readonly>
                    </div>
                    <div class="col-md-6">
                        <label for="waktu_selesai">Waktu Selesai:</label>
                        <input type="text" id="waktu_selesai" class="form-control"
                            value="{{ $booking->waktu_selesai_booking }}" readonly>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="catatan">Catatan:</label>
                    <textarea id="catatan" class="form-control" readonly>{{ $booking->catatan }}</textarea>
                </div>
                <div class="mb-3">
                    <label for="status">Status:</label>
                    <input type="text" id="status" class="form-control" value="{{ $booking->status }}" readonly>
                </div>
            </div>
        </div>
        <button type="button" class="btn btn-secondary"
            onclick="window.location='{{ route('booking_info') }}'">Back</button>
    </div>
@endsection
