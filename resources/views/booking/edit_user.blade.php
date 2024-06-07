@extends('layout.user')

@section('title', 'My Bookings >')
@section('sub_title', 'Edit Booking >')
@section('dynamic_nav_links')

    <li class="nav-item">
        <a class="nav-link" href="#">{{ $booking->lapangan->nama_lapangan }}</a>
    </li>

@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <h2>Edit Booking</h2>
                <form action="{{ route('booking.update', $booking->id_booking_olahraga) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama Lengkap</label>
                        <input type="text" class="form-control" id="nama" name="nama"
                            value="{{ $booking->nama_pemesan }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Alamat Email</label>
                        <input type="email" class="form-control" id="email" name="email"
                            value="{{ $booking->email_pemesan }}" required>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="waktu_mulai" class="form-label">Waktu Mulai</label>
                            <input type="datetime-local" class="form-control" id="waktu_mulai" name="waktu_mulai"
                                value="{{ $booking->waktu_mulai_booking }}" required>
                        </div>
                        <div class="col-md-6">
                            <label for="waktu_selesai" class="form-label">Waktu Selesai</label>
                            <input type="datetime-local" class="form-control" id="waktu_selesai" name="waktu_selesai"
                                value="{{ $booking->waktu_selesai_booking }}" required>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="catatan" class="form-label">Catatan Khusus</label>
                        <textarea class="form-control" id="catatan" name="catatan" rows="3">{{ $booking->catatan }}</textarea>
                    </div>

                    <button type="submit" class="btn btn-primary">Update</button>
                    <button type="button" class="btn btn-secondary"
                        onclick="window.location='{{ route('booking_info') }}'">Back</button>
                </form>
            </div>
        </div>
    </div>
@endsection
