@extends('layout.admin')

@section('title', 'Edit Product')
@section('contents')
    <h1 class="mb-0">Edit Lokasi id:{{ $lokasi->id_lokasi }}</h1>
    <hr />
    <form action="{{ route('update.lok', $lokasi->id_lokasi) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col mb-3">
                <label class="form-label">Nama Lokasi</label>
                <input type="text" name="nama_lokasi" class="form-control" placeholder="Nama Produk"
                    value="{{ old('nama_lokasi', $lokasi->nama_lokasi) }}">
                @error('nama_lokasi')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="col mb-3">
                <label class="form-label">Alamat</label>
                <input type="text" name="alamat" class="form-control" placeholder="Harga"
                    value="{{ old('alamat', $lokasi->alamat) }}">
                @error('alamat')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="col mb-3">
                <label class="form-label">Deskripsi</label>
                <input type="text" name="deskripsi" class="form-control" placeholder="Stok"
                    value="{{ old('deskripsi', $lokasi->deskripsi) }}">
                @error('deskripsi')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="row">
            <div class="d-grid">
                <button class="btn btn-warning">Update</button>
            </div>
        </div>
    </form>
@endsection
