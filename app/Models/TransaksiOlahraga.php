<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransaksiOlahraga extends Model
{
    use HasFactory;

    protected $table = 'transaksi_olahraga';

    protected $fillable =
    [
        'id_pengguna',
        'id_produkolahraga',
        'harga_produkolahraga',
        'created_at',
        'created_by'
    ];

    protected $primaryKey ='id_transaksi_olahraga';

    public function user()
    {
        return $this->belongsTo(PenggunaOlahraga::class, 'id_pengguna');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'id_produkolahraga');
    }
}
