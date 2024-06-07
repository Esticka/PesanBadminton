@extends('layout.user')

@section('title', ' Product Buy')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Form Pembelian Produk</div>

                    <div class="card-body">
                        <h5>Detail Produk</h5>
                        <div class="mb-3">
                            <strong>Nama Produk:</strong> {{ $product->nama_produkolahraga }}
                        </div>
                        <div class="mb-3">
                            <strong>Harga:</strong> {{ $product->harga_produkolahraga }}
                        </div>
                        <div class="mb-3">
                            <strong>Deskripsi:</strong> {{ $product->deskripsi }}
                        </div>

                        <hr>

                        {{-- <form action="{{ route('pembelian.store') }}" method="POST"> --}}
                        <form action="" method="POST">
                            @csrf
                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                            <div class="form-group">
                                <label for="quantity">Jumlah Produk</label>
                                <input type="number" name="quantity" id="quantity" class="form-control" value="1" min="1">
                            </div>
                            <button type="submit" class="btn btn-success">Beli</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
