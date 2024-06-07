@extends('layout.user')

@section('title', 'Product List  >')
@section('sub_title', 'Detail Product  >')
@section('dynamic_nav_links')
    
        <li class="nav-item">
            <a class="nav-link" href="#">{{ $product->nama_produkolahraga }}</a>
        </li>
    
@endsection


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

        
        <div class="container mx-auto px-4 py-8">

            <div class="bg-white shadow overflow-hidden sm:rounded-lg">

                <div class="px-4 py-5 sm:px-6">
                    <h3 class="text-3xl font-bold leading-6 text-gray-900">Product Information</h3>
                </div>
                <div class="border-t border-gray-200">
                    <div style="display: flex; justify-content:space-between;">
                        <div class="sm:w-1/2 px-4 py-2" style="width:50%">
                            <div class="bg-gray-50 px-4 py-2 sm:grid sm:grid-cols-3 sm:gap-2 sm:px-3">
                                <dt class="text-xl font-bold text-gray-900">Title</dt>
                                <p class="text-sm text-gray-900">{{ $product->nama_produkolahraga }}</p>
                            </div>
                            <div class="bg-white px-4 py-2 sm:grid sm:grid-cols-3 sm:gap-2 sm:px-3">
                                <dt class="text-xl font-bold text-gray-900">Price</dt>
                                <p class="text-sm text-gray-900">Rp{{ $product->harga_produkolahraga }}</p>
                            </div>
                            <div class="bg-gray-50 px-4 py-2 sm:grid sm:grid-cols-3 sm:gap-2 sm:px-3">
                                <dt class="text-xl font-bold text-gray-900">Product Stock</dt>
                                <p class="text-sm text-gray-900">{{ $product->stok_produkolahraga }}</p>
                            </div>
                            <div class="bg-white px-4 py-2 sm:grid sm:grid-cols-3 sm:gap-2 sm:px-3">
                                <dt class="text-xl font-bold text-gray-900">Product Code</dt>
                                <p class="text-sm text-gray-900">{{ $product->id_produkolahraga }}</p>
                            </div>
                        </div>
                        <div class="sm:w-1/2 px-4 py-2" style="width:50%">
                            <dt class="text-lg font-bold text-gray-700">Image</dt>
                            <dd class="mt-1">
                                <img src="{{ asset('storage/' . $product->img_product) }}" alt="Product Image"
                                    style="width: 100%; max-width: 400px;">
                            </dd>
                        </div>
                    </div>
                    <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                        <button type="button" class="btn btn-secondary btn-lg btn-block"
                            onclick="window.location='{{ route('view_product') }}'">Back</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
