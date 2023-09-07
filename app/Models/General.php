<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class General extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $table = 'generals';

    protected $fillable = [
        'school_logo',
        'school_name',
        'school_phone',
        'school_email',
        'school_address',
        'social_media',
        'desc'
    ];
}
