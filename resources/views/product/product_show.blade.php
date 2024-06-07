@extends('layout.admin')

@section('title', 'Show Product')

@section('contents')
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-semibold mb-4">Detail Product</h1>
        <div class="bg-white shadow overflow-hidden sm:rounded-lg">
            <div class="px-4 py-5 sm:px-6">
                <h3 class="text-lg font-medium leading-6 text-gray-900">Product Information</h3>
            </div>
            <div class="border-t border-gray-200">
                <dl>
                    <div class="bg-gray-50 px-4 py-2 sm:grid sm:grid-cols-3 sm:gap-2 sm:px-3">
                        <dt class="text-sm font-medium text-gray-500">Title</dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:col-span-2">{{ $product->nama_produkolahraga }}</dd>
                    </div>
                    <div class="bg-white px-4 py-2 sm:grid sm:grid-cols-3 sm:gap-2 sm:px-3">
                        <dt class="text-sm font-medium text-gray-500">Price</dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:col-span-2">{{ $product->harga_produkolahraga }}</dd>
                    </div>
                    <div class="bg-gray-50 px-4 py-2 sm:grid sm:grid-cols-3 sm:gap-2 sm:px-3">
                        <dt class="text-sm font-medium text-gray-500">Product Stok</dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:col-span-2">{{ $product->stok_produkolahraga }}</dd>
                    </div>
                    <div class="bg-white px-4 py-2 sm:grid sm:grid-cols-3 sm:gap-2 sm:px-3">
                        <dt class="text-sm font-medium text-gray-500">Product Code</dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:col-span-2">{{ $product->id_produkolahraga }}</dd>
                    </div>
                    <div class="bg-gray-50 px-4 py-2 sm:grid sm:grid-cols-3 sm:gap-2 sm:px-3">
                        <dt class="text-sm font-medium text-gray-500">Image</dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:col-span-2">
                            <img src="{{ asset('storage/' . $product->img_product) }}" alt="Product Image" style="max-width: 200px;">
                        </dd>
                    </div>
                    <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                        <button type="button" class="btn btn-secondary btn-lg btn-block"
                            onclick="window.location='{{ route('product') }}'">Back</button>
                    </div>
                </dl>
            </div>
        </div>
    </div>
@endsection
