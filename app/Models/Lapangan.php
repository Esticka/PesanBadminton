<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lapangan extends Model
{
    protected $primaryKey = 'id_lapangan';

    use HasFactory;
    protected $table = 'lapangan_olahraga';

    protected $fillable = [
        'nama_lapangan',
        'harga_lapangan',
        'deskripsi_lapangan',
        'img_lapangan',
        'id_lokasi',
    ];

    public function pengguna()
    {
        return $this->belongsToMany(PenggunaOlahraga::class, 'booking_olahraga', 'id_lapangan', 'id_pengguna');
    }
    public function lokasi()
    {
        return $this->belongsTo(Lokasi::class, 'id_lokasi');
    }
}
