<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notify extends Model
{
    use HasFactory;

    protected $fillable = [
        'notif_otp',
        'notif_pembayaran',
        'notif_wawancara',//pengumuman
        'notif_lolos',//pengumuman
        'notif_gagal',//pengumuman
        'notif_info',//pengumuman
        'notif_login',
        'notif_mengisi_pribadi',
        'notif_melengkapi'
    ];

    public function user()
    {
        return $this->hasOne(User::class);
    }
}
