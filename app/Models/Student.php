<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Student extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'generasi_id',
        'birthplace',
        'nik',
        'nisn',
        'hobby',
        'ambition',
        'last_graduate',
        'old_school',
        'organization_exp',
        'address',
        'status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function wawancara()
    {
        return $this->hasOne(Wawancara::class);
    }

    public function generasi()
    {
        return $this->hasMany(Generasi::class);
    }
}
