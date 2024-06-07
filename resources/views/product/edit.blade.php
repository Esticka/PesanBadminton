@extends('layout.admin')

@section('title', 'Edit Product')
@section('contents')
    <h1 class="mb-0">Edit Product</h1>
    <hr />
    <form action="{{ route('update', $product->id_produkolahraga) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col mb-3">
                <label class="form-label">Nama Produk</label>
                <input type="text" name="nama_produkolahraga" class="form-control" placeholder="Nama Produk"
                    value="{{ old('nama_produkolahraga', $product->nama_produkolahraga) }}">
                @error('nama_produkolahraga')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="col mb-3">
                <label class="form-label">Harga</label>
                <input type="text" name="harga_produkolahraga" class="form-control" placeholder="Harga"
                    value="{{ old('harga_produkolahraga', $product->harga_produkolahraga) }}">
                @error('harga_produkolahraga')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="row">
            <div class="col mb-3">
                <label class="form-label">Stok</label>
                <input type="text" name="stok_produkolahraga" class="form-control" placeholder="Stok"
                    value="{{ old('stok_produkolahraga', $product->stok_produkolahraga) }}">
                @error('stok_produkolahraga')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="col mb-3">
                <label class="form-label">Foto Produk</label>
                <img src="{{ asset('storage/' . $product->img_product) }}" alt="{{ $product->nama_produkolahraga }}"
                    style="max-width: 100px;">
                <input type="file" name="img_product" class="form-control">
                @error('img_product')
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
