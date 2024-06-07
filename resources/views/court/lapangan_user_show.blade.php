@extends('layout.user')

@section('title', 'Court List >')
@section('sub_title', 'Detail Court >')
@section('dynamic_nav_links')

    <li class="nav-item">
        <a class="nav-link" href="#">{{ $lapangan->nama_lapangan }}</a>
    </li>

@endsection
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
        <div class="container mx-auto px-4 py-8">
            <div class="bg-white shadow overflow-hidden sm:rounded-lg">
                <div class="px-4 py-5 sm:px-6">
                    <h3 class="text-lg font-semibold leading-6 text-gray-900">Court Information</h3>
                </div>
                <div class="border-t border-gray-200">
                    <div style="display: flex; justify-content:space-between;">
                        <div class="sm:w-1/2 px-4 py-2" style="width:50%">
                            <div class="bg-gray-50 px-4 py-2">
                                <h3 class="text-lg font-bold text-gray-700">Nama Lapangan</h3>
                                <p class="text-sm text-gray-900">{{ $lapangan->nama_lapangan }}</p>
                            </div>
                            <div class="bg-gray-50 px-4 py-2">
                                <h3 class="text-lg font-bold text-gray-700">Harga</h3>
                                <p class="text-sm text-gray-900">Rp{{ $lapangan->harga_lapangan }}</p>
                            </div>
                            <div class="bg-gray-50 px-4 py-2">
                                <h3 class="text-lg font-bold text-gray-700">Deskripsi Lapangan</h3>
                                <p class="text-sm text-gray-900">{{ $lapangan->deskripsi_lapangan }}</p>
                            </div>
                        </div>
                        <div class="sm:w-1/2 px-4 py-2" style="width:50%">

                            <h3 class="text-lg font-bold text-gray-700">Gambar Lapangan</h3>
                            <img src="{{ asset($lapangan->img_lapangan) }}" alt="Gambar Lapangan"
                                class="mx-auto" style="width: 100%;">

                        </div>
                    </div>
                </div>

                <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                    <button type="button" class="btn btn-danger btn-lg btn-block"
                        onclick="window.location='{{ route('view_lapangan') }}'">Back</button>
                </div>
            </div>
        </div>
    </div>
@endsection
