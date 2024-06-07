@extends('layout.user')

@section('title', 'Keranjang Belanja')

@section('content')
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
            <div class="col-md-8">
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama Produk</th>
                            <th>Harga</th>
                            <th>Jumlah</th>
                            <th>Total</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Isi tabel keranjang belanja dengan data dari transaksi olahraga -->
                        @foreach ($transaksi_olahraga as $index => $transaksi)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $transaksi->product->nama_produkolahraga }}</td>
                                <td>Rp {{ number_format($transaksi->product->harga_produkolahraga, 0, ',', '.') }}</td>
                                <td>{{ $transaksi->jumlah }}</td>
                                <!-- Hitung total harga untuk setiap transaksi -->
                                @php
                                    $total = $transaksi->jumlah * $transaksi->product->harga_produkolahraga;
                                @endphp
                                <td>Rp {{ number_format($total, 0, ',', '.') }}</td>
                                <td>
                                    <!-- Tambahkan tombol untuk menghapus produk dari keranjang belanja -->
                                    <!-- Tambahkan tombol untuk menghapus produk dari keranjang belanja -->
                                    <form action="{{ route('keranjang.hapus', $transaksi->id_transaksi_olahraga) }}"
                                        method="POST"
                                        onsubmit="return confirm('Apakah Anda yakin ingin menghapus produk dari keranjang belanja?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Batal</button>
                                    </form>

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="col-md-4">
                <!-- Isi bagian kanan dengan ringkasan total pembelian dan tombol checkout -->
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Ringkasan Belanja</h5>
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
                        <a href="{{ route('checkout') }}" class="btn btn-primary">Checkout</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
