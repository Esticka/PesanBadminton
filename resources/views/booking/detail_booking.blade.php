@extends('layout.admin')

@section('contents')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Booking Detail</div>

                    <div class="card-body">
                        <div class="mb-3 row">
                            <label for="nama_pemesan" class="col-md-4 col-form-label fw-bold">Nama Pemesan:</label>
                            <div class="col-md-8">
                                <p>{{ $booking->nama_pemesan }}</p>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="email_pemesan" class="col-md-4 col-form-label fw-bold">Email Pemesan:</label>
                            <div class="col-md-8">
                                <p>{{ $booking->email_pemesan }}</p>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="catatan" class="col-md-4 col-form-label fw-bold">Catatan:</label>
                            <div class="col-md-8">
                                <p>{{ $booking->catatan }}</p>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="lapangan" class="col-md-4 col-form-label fw-bold">Nama Lapangan:</label>
                            <div class="col-md-8">
                                <p>{{ $booking->lapangan->nama_lapangan }}</p>
                            </div>
                        </div>                        
                        <div class="mb-3 row">
                            <label for="waktu_mulai" class="col-md-4 col-form-label fw-bold">Waktu Mulai:</label>
                            <div class="col-md-8">
                                <p>{{ $booking->waktu_mulai_booking }}</p>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="waktu_selesai" class="col-md-4 col-form-label fw-bold">Waktu Selesai:</label>
                            <div class="col-md-8">
                                <p>{{ $booking->waktu_selesai_booking }}</p>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="created_by" class="col-md-4 col-form-label fw-bold">Dibuat Oleh:</label>
                            <div class="col-md-8">
                                <p>{{ $booking->created_by}}</p>
                            </div>
                        </div>
                        <button type="button" class="btn btn-secondary"
                            onclick="window.location='{{ route('booking_list') }}'">Back</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
