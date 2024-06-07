@extends('layout.user')

@section('title', 'My Bookings')

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
            <div class="col-md-12">
                <h2>My Bookings</h2>
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Lapangan</th>
                            <th>Waktu Mulai</th>
                            <th>Waktu Selesai</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($bookings as $booking)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $booking->lapangan->nama_lapangan }}</td>
                                <td>{{ $booking->waktu_mulai_booking }}</td>
                                <td>{{ $booking->waktu_selesai_booking }}</td>
                                <td>
                                    @if ($booking->status == 'approve')
                                        Approve
                                    @elseif ($booking->status == 'not approve')
                                        Not Approve
                                    @else   
                                        Still Waiting
                                    @endif
                                </td>
                                <td>
                                    @if ($booking->status == '')
                                        <a href="{{ route('booking.edit', $booking->id_booking_olahraga) }}"
                                            class="btn btn-primary">Edit</a>
                                        <a href=""
                                            class="btn btn-danger">Batal</a>
                                    @endif
                                    <a href="{{ route('booking.detail', $booking->id_booking_olahraga) }}"
                                        class="btn btn-info">Detail</a>
                                        <a href="{{ route('booking.detail', $booking->id_booking_olahraga) }}"
                                            class="btn btn-warning">Print</a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6">No bookings found.</td>
                            </tr>
                        @endforelse
                    </tbody>

                </table>
            </div>
        </div>
    </div>

    
@endsection
