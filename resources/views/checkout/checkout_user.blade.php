@extends('layout.user')



@section('title', 'Keranjang Belanja >')
@section('sub_title', 'Checkout')
@section('dynamic_nav_links')

    {{-- <li class="nav-item">
        <a class="nav-link" href="#">{{ $transaksi->product->nama_produkolahraga }}</a>
    </li> --}}

@endsection

@section('content')
    <div class="container">
        <h1>Checkout</h1>
        <div class="row">
            <div class="col-md-8">
                <!-- Form checkout -->
                {{-- <form action="{{ route('checkout.process') }}" method="POST"> --}}
                <form action="" method="POST">
                    @csrf
                    <!-- Isi form checkout disini -->
                    <div class="mb-3">
                        <label for="alamat">Alamat Pengiriman</label>
                        <textarea class="form-control" id="alamat" name="alamat" rows="3" placeholder="Masukkan alamat pengiriman Anda"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
            <div class="col-md-4">
                <!-- Isi bagian kanan dengan ringkasan total pembelian -->
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Ringkasan Pembelian</h5>                        
                        <!-- Hitung total produk -->
                        @php
                            $total_produk = 0;
                            foreach ($transaksi_olahraga as $transaksi) {
                                $total_produk += $transaksi->jumlah;
                            }
                        @endphp
                        <p class="card-text">Total Produk: {{ $total_produk }}</p>
                        {{-- Hitung total harga --}}
                        @php
                            $total_harga = 0;
                            foreach ($transaksi_olahraga as $transaksi) {
                                $total_harga += $transaksi->jumlah * $transaksi->product->harga_produkolahraga;
                            }
                        @endphp
                        <p class="card-text">Total Harga: Rp {{ number_format($total_harga, 0, ',', '.') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
