@extends('layout.admin')

@section('title', 'Edit Lapangan')
@section('contents')
    <h1 class="mb-0">Edit Lapangan</h1>
    <hr />
    <form action="{{ route('lapangan.update', $lapangan->id_lapangan) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col mb-3">
                <label class="form-label">Nama Lapangan</label>
                <input type="text" name="nama_lapangan" class="form-control" placeholder="Nama Lapangan"
                    value="{{ old('nama_lapangan', $lapangan->nama_lapangan) }}">
                @error('nama_lapangan')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="col mb-3">
                <label class="form-label">Harga</label>
                <input type="text" name="harga_lapangan" class="form-control" placeholder="Harga"
                    value="{{ old('harga_lapangan', $lapangan->harga_lapangan) }}">
                @error('harga_lapangan')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="row">
            <div class="col mb-3">
                <label class="form-label">Deskripsi Lapangan</label>
                <textarea name="deskripsi_lapangan" class="form-control" placeholder="Deskripsi Lapangan">{{ old('deskripsi', $lapangan->deskripsi_lapangan) }}</textarea>
                @error('deskripsi')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="col mb-3">
                <label class="form-label">Gambar Lapangan</label>
                <img src="{{ asset('' . $lapangan->img_lapangan) }}" class="img-fluid" width="100" alt="Gambar Lapangan">
                <input type="file" name="img_lapangan" class="form-control">
                @error('img_lapangan')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>
            <div>
                <button class="btn btn-warning">Update</button>
            </div>
    </form>
@endsection
