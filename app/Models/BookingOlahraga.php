<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookingOlahraga extends Model
{
    protected $table = 'booking_olahraga'; 

    protected $fillable = [
        'id_pengguna', 
        'id_lapangan', 
        'waktu_mulai_booking', 
        'waktu_selesai_booking', 
        'catatan',
        'nama_pemesan',
        'email_pemesan',
        'nama_lapangan',
        'created_by'
    ];

    protected $primaryKey = 'id_booking_olahraga';

    
    public function user()
    {
        return $this->belongsTo(PenggunaOlahraga::class, 'id_pengguna');
    }

    public function lapangan()
    {
        return $this->belongsTo(Lapangan::class, 'id_lapangan');
    }
}
