<?php

namespace App\Helpers;

use App\Models\Pelanggan;

class UserHelper
{
    public static function isMember($userId)
    {
        $pelanggan = Pelanggan::where('id_pengguna', $userId)->first();
        return $pelanggan && $pelanggan->jenis_pelanggan === 'member';
    }
}
