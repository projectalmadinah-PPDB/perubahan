<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Parents extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'user_id',
        'father_name',
        'father_phone',
        'father_job',
        'mother_name',
        'mother_phone',
        'mother_job',
        'parent_earning',
        'no_of_sibling',
        'child_no'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
