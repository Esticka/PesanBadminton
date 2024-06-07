@extends('layout.admin')

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

        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Tambah Produk</div>
                    <div class="card-body">
                        <form action="{{ route('store_product') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama Produk <span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="nama" name="nama_produkolahraga"
                                    placeholder="Nama Produk">
                            </div>
                            <div class="mb-3">
                                <label for="harga" class="form-label">Harga <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="harga" name="harga_produkolahraga"
                                    placeholder="Harga">
                            </div>
                            <div class="mb-3">
                                <label for="stok" class="form-label">Stok <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="stok" name="stok_produkolahraga"
                                    placeholder="Stok">
                            </div>
                            <div class="mb-3">
                                <label for="gambar" class="form-label">Gambar</label>
                                <input type="file" class="form-control" id="gambar" name="img_product">
                            </div>
                            <button type="submit" class="btn btn-primary">Tambah</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
