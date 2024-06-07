@extends('layout.admin')

@section('title', 'Home Lapangan List')

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
        <div class="modal-body">
            <form id="addLocationForm" action="{{ route('create_lokasi') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="nama_lokasi">Nama Lokasi</label>
                    <input type="text" class="form-control" id="nama_lokasi" name="nama_lokasi" required>
                </div>
                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <input type="text" class="form-control" id="alamat" name="alamat" required>
                </div>
                <div class="form-group">
                    <label for="deskripsi">Deskripsi</label>
                    <textarea class="form-control" id="deskripsi" name="deskripsi" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </form>
        </div>
        <div class="modal-footer">
            <a href="{{ route('lapangan_index') }}">
            <button type="button" class="btn btn-secondary">Close</button>
        </a>
        </div>
    </div>
@endsection
