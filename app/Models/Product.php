<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_produkolahraga';
    
    protected $table = 'produk_olahraga';

    protected $fillable = [
        'nama_produkolahraga',
        'harga_produkolahraga',
        'stok_produkolahraga',
        'img_product',
        'created_at',
        'updated_at',
        
    ];

    public function pengguna()
    {
        return $this->belongsToMany(PenggunaOlahraga::class, 'transaksi_olahraga', 'id_produkolahraga', 'id_pengguna');
    }
}
