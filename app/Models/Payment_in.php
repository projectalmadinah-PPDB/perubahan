<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment_in extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'type_pembayaran',
        'status',
        'no_invoice',
        'amount',
        'link'
    ];
}
