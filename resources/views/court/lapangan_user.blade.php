@extends('layout.user')

@section('title', 'Court List')

@section('contents')
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
            @foreach ($data_lapangan as $lapangan)
                <div class="col-md-4 mb-4">
                    <div class="card shadow">
                        <div class="card-body">
                            <img src="{{ asset( $lapangan->img_lapangan) }}" class="card-img-top"
                                alt="Lapangan {{ $lapangan->nama_lapangan }}">
                            <h5 class="card-title m-3">
                                {{ $lapangan->nama_lapangan }}</h5>
                            <p class="card-text mb-1">
                                Rp. {{ $lapangan->harga_lapangan }}<b> /Jam</b></p>

                            @if (session('is_logged_in'))
                                <a href="{{ route('user_court_show', $lapangan->id_lapangan) }}"
                                    class="btn btn-primary btn-sm">Pelajari Lebih Lanjut ></a>
                                <a href="{{ route('book_now', ['id_lapangan' => $lapangan->id_lapangan]) }}"
                                    class="btn btn-success btn-sm">Booking Sekarang !</a>
                            @else
                                <a href="{{ route('user_court_show', $lapangan->id_lapangan) }}"
                                    class="btn btn-primary btn-sm">Pelajari Lebih Lanjut ></a>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
