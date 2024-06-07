@extends('layout.admin')

@section('title', 'Home Product List')

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
            <div class="container">
                <h1>Produk</h1>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Nama Produk</th>
                            <th>Harga</th>
                            <th>Stok</th>
                            <th>Gambar</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data_produk as $item)
                            <tr>
                                <td>{{ $item->nama_produkolahraga }}</td>
                                <td>{{ $item->harga_produkolahraga }}</td>
                                <td>{{ $item->stok_produkolahraga }}</td>
                                <td>
                                    @if ($item->img_product)
                                        <img src="{{ asset('storage/' . $item->img_product) }}" alt="{{ $item->nama_produkolahraga }}" style="max-width: 100px;">
                                    @else
                                        No Image
                                    @endif
                                </td>
                                <td>
                                    <div class="btn-group" role="group">
                                        <a href="{{ route('update_product', $item->id_produkolahraga) }}"
                                            class="btn btn-success m-2">Edit</a>
                                        <a href="{{ route('detail_product', $item->id_produkolahraga) }}"
                                            class="btn btn-success m-2">Detail</a>
                                        <form action="{{ route('product_destroy', $item->id_produkolahraga) }}"
                                            method="POST"
                                            onsubmit="return confirm('Apakah anda yakin ingin menghapus?')"
                                            class="float-right text-red-800">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger m-2">Delete</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>

                </table>
                <button type="button" class="btn btn-primary m-2"
                            onclick="window.location='{{ route('form_create') }}'">+ Add</button>
            </div>
        </div>
    </div>
@endsection
