<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    protected $fillable = [
        'user_id',
        'kk',
        'ijazah',
        'akta',
        'rapor',
    ];

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
}
