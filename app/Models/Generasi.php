<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Generasi extends Model
{
    use HasFactory;

    protected $fillable = [
        'generasi',
        'status',
        'start_at',
        'end_at'
    ];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function user()
    {
        return $this->hasOne(User::class);
    }
}
