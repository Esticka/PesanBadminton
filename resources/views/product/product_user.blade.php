@extends('layout.user')

@section('title', 'Product List')

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
            @foreach ($data_produk as $item)
                <div class="col-md-4 mb-4">
                    <div class="card shadow">
                        <div class="card-body">
                            <img src="{{ asset('storage/' . $item->img_product) }}" class="card-img-top" alt="Product Image">
                            <h4 class="card-title m-3" style="font-family: 'Arial Black', sans-serif; font-size: 2rem;">
                                {{ $item->nama_produkolahraga }}</h4>
                            <p class="card-text mb-1" style="font-family: 'Courier New', monospace; font-size: 1.2rem;">
                                Rp{{ $item->harga_produkolahraga }}<b>/Item</b></p>
                            <p class="card-text mb-1" style="font-family: 'Times New Roman', serif; font-size: 1.2rem;">
                                Stok: {{ $item->stok_produkolahraga }}</p>
                            @if (session('is_logged_in'))
                                <a href="{{ route('product_show', $item->id_produkolahraga) }}"
                                    class="btn btn-primary btn-sm">Detail Produk</a>
                                <a class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#beliModal"
                                    data-idUpdate="'.$item->id_produkolahraga.'" data-target="#UserUpdate">
                                    Beli
                                </a>
                            @else
                                <a href="{{ route('product_show', $item->id_produkolahraga) }}"
                                    class="btn btn-primary btn-sm">Detail Produk</a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>

        
        {{-- Ini adalah modal --}}
        
        <div class="modal fade" id="beliModal" tabindex="-1" aria-labelledby="beliModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="beliModalLabel">Beli Produk</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <h5>Detail Produk</h5>
                        <div class="mb-3">
                            <strong>Nama Produk:</strong> {{ $item->nama_produkolahraga }}
                        </div>
                        <div class="mb-3">
                            <strong>Harga:</strong> {{ $item->harga_produkolahraga }}
                        </div>
                        <div class="mb-3">
                            <strong>Deskripsi:</strong> {{ $item->deskripsi }}
                        </div>
                        <!-- Form pembelian produk -->
                        <form action="{{ route('beli.product', $item->id_produkolahraga) }}" method="POST">
                        @csrf
                        <!-- Isi form pembelian disini -->
                        <!-- Contoh: -->
                        <div class="mb-3">
                            <label for="nama">Nama:</label>
                            <input type="text" class="form-control" id="nama" name="nama"
                            value="{{ session('username') }}">
                        </div>
                        <div class="mb-3">
                            <label for="jumlah">Jumlah:</label>
                            <input type="number" class="form-control" id="jumlah" name="jumlah">
                        </div>
                        <input type="hidden" name="product_id" value="{{ $item->id_produkolahraga }}">
                        <button type="submit" class="btn btn-success">Beli</button>
                    </form>
                    
                </div>
            </div>
        </div>
        @endforeach
    </div>
    
    
    
    @endsection
    