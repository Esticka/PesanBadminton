<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenggunaOlahraga extends Model
{
    protected $table = 'pengguna_olahraga';
    
    protected $fillable = [
        'username_pengguna',        
        'password_pengguna',
        'created_by',
        'updated_by',
        'last_login', 
        'jenis_pengguna',
        'tgl_member_berakhir',
        'id_lokasi'
    ];
    
    protected $primaryKey = 'id_pengguna';
 
    public function lapangan()
    {
        return $this->belongsToMany(Lapangan::class, 'booking_olahraga', 'id_pengguna', 'id_lapangan');
    }

    public function pelanggan()
    {
        return $this->hasOne(Pelanggan::class, 'id_pelanggan', 'id_pelanggan');
    }

    public function produk()
    {
        return $this->belongsToMany(Product::class, 'transaksi_olahraga', 'id_pengguna', 'id_produkolahraga');
    }
}
 