<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $fillable = [
        'user_id',
        'status',
        'no_invoice',
        'amount',
        'link'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
