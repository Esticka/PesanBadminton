@extends('layout.admin')

@section('title', 'Show Lapangan')

@section('contents')
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-semibold mb-4">Detail Lapangan</h1>
        <div class="bg-white shadow overflow-hidden sm:rounded-lg">
            <div class="px-4 py-5 sm:px-6">
                <h3 class="text-lg font-medium leading-6 text-gray-900">Lapangan Information</h3>
            </div>
            <div class="border-t border-gray-200">
                <dl>
                    <div class="bg-gray-50 px-4 py-2 sm:grid sm:grid-cols-3 sm:gap-2 sm:px-3">
                        <dt class="text-sm font-medium text-gray-500">Nama Lapangan</dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:col-span-2">{{ $lapangan->nama_lapangan }}</dd>
                    </div>
                    <div class="bg-white px-4 py-2 sm:grid sm:grid-cols-3 sm:gap-2 sm:px-3">
                        <dt class="text-sm font-medium text-gray-500">Harga</dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:col-span-2">{{ $lapangan->harga_lapangan }}</dd>
                    </div>
                    <div class="bg-gray-50 px-4 py-2 sm:grid sm:grid-cols-3 sm:gap-2 sm:px-3">
                        <dt class="text-sm font-medium text-gray-500">Deskripsi</dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:col-span-2">{{ $lapangan->deskripsi_lapangan}}</dd>
                    </div>
                    <div class="bg-white px-4 py-2 sm:grid sm:grid-cols-3 sm:gap-2 sm:px-3">
                        <dt class="text-sm font-medium text-gray-500">Kategori Lapangan</dt>
                    </div>
                    <div class="bg-gray-50 px-4 py-2 sm:grid sm:grid-cols-3 sm:gap-2 sm:px-3">
                        <dt class="text-sm font-medium text-gray-500">Gambar Lapangan</dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:col-span-2">
                            <img src="{{ asset( $lapangan->img_lapangan) }}" alt="Gambar Lapangan"
                                width="100px">
                        </dd>
                    </div>
                </dl>
            </div>
            <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                <button type="button" class="btn btn-secondary btn-lg btn-block"
                    onclick="window.location='{{ route('lapangan_index') }}'">Back</button>
            </div>
        </div>
    </div>
@endsection
