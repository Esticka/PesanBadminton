@extends('layout.admin')

@section('title', 'List Purchases')

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
        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">List Purchases</div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead class="thead-dark">
                                <tr>
                                    <th>Name of User</th>
                                    <th>Product Name</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total Product</th>
                                    <th>Total Price</th>
                                    <th>Created At</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($transaksi_olahraga as $purchase)
                                    <tr>
                                        <td>{{ $purchase->user->username_pengguna }}</td>
                                        <td>{{ $purchase->product->nama_produkolahraga }}</td>
                                        <td>{{ $purchase->product->harga_produkolahraga ?? '-' }}</td>
                                        <td>{{ $purchase->product->stok_produkolahraga ?? '-' }}</td>
                                        <td> @php
                                            $total_produk = 0;
                                            foreach ($transaksi_olahraga as $transaksi) {
                                                $total_produk += $transaksi->jumlah;
                                            }
                                        @endphp
                                            {{ $total_produk }}
                                        </td>
                                        <td>
                                            @php
                                                $total_harga = 0;
                                                foreach ($transaksi_olahraga as $transaksi) {
                                                    $total_harga +=
                                                        $transaksi->jumlah * $transaksi->product->harga_produkolahraga;
                                                }
                                            @endphp
                                            {{ number_format($total_harga, 0, ',', '.') }}

                                        </td>
                                        <td>{{ $purchase->created_at }}</td>
                                        <td>
                                            <a href="{{ route('purchase.edit', $purchase->id_transaksi_olahraga) }}"
                                                class="btn btn-success">Checkout</a>
                                            <form action="{{ route('keranjang.hapus', $purchase->id_transaksi_olahraga) }}"
                                                method="POST"
                                                onsubmit="return confirm('Apakah Anda yakin ingin menghapus produk dari keranjang belanja?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Cancel</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
