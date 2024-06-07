@extends('layout.user') 

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Beli Keanggotaan</div>
                
                <div class="card-body">
                    <form action="{{ route('membership.beli') }}" method="POST">
                        @csrf

                        <div class="form-group">
                            <label for="id_pengguna">ID Pengguna:</label>
                            <input type="text" class="form-control" id="id_pengguna" name="id_pengguna" value="{{ session('id_pengguna') }}" readonly required>
                        </div>

                        <h2>Manfaat Menjadi Member:</h2>
                        <ul>
                            <li>Diskon khusus untuk pemesanan lapangan.</li>
                            <li>Prioritas pemesanan pada jam sibuk.</li>
                            <li>Akses ke fasilitas khusus member.</li>
                            <li>Undangan ke acara eksklusif.</li>
                            <li>Dan masih banyak lagi!</li>
                        </ul>

                        <p>Harga Keanggotaan: Rp 500.000/tahun</p>

                        <button type="submit" class="btn btn-primary">Beli Keanggotaan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
