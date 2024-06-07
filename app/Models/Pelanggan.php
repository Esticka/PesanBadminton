<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    protected $table = 'pelanggan';
    protected $primaryKey = 'id_pelanggan';
    protected $fillable = ['id_pengguna', 'jenis_pelanggan', 'tgl_berakhir_member','updated_at'];

    // Relasi dengan tabel pengguna_olahraga (jika diperlukan)
    public function pengguna()
    {
        return $this->belongsTo(PenggunaOlahraga::class, 'id_pengguna');
    }
}
