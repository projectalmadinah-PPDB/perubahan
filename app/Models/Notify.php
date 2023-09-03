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
        'notif_lolos',
        'notif_gagal',
        'notif_info'
    ];

    public function user()
    {
        return $this->hasOne(User::class);
    }
}
