@extends('layout.admin')

@section('title', 'Booking List')

@section('contents')

    <div class="container">

        <div class="row">
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
            <div class="col-md-12">
                <h2>Booking List</h2>
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>                                                    
                            <th>Nama Lapangan</th>
                            <th>Waktu Mulai</th>
                            <th>Waktu Selesai</th>                            
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($bookings as $booking)
                            @if ($booking->status == '' )
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $booking->lapangan->nama_lapangan }}</td>
                                    <td>{{ $booking->waktu_mulai_booking }}</td>
                                    <td>{{ $booking->waktu_selesai_booking }}</td>
                                    <td>
                                        
                                        <form action="{{ route('booking.approve', $booking->id_booking_olahraga) }}"
                                            method="POST" class="d-inline">
                                            @csrf
                                            <button type="submit" class="btn btn-success"
                                                onclick="return confirm('Apakah Anda yakin ingin menyetujui booking ini?')">Approve</button>
                                        </form>

                                        
                                        <form action="{{ route('booking.not_approve', $booking->id_booking_olahraga) }}" method="POST" class="d-inline">
                                            @csrf
                                            <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menolak booking ini?')">Not Approve</button>
                                        </form>
                                    </td>
                                    <td>                                       
                                        <a href="{{ route('booking.show', $booking->id_booking_olahraga) }}" class="btn btn-primary">Detail</a>                                        
                                    </td>
                                    
                                </tr>
                                @endif
                            @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
