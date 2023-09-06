<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wawancara extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'student_id',
        'tanggal',
        'jam',
        'link'
    ];

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function student()
    {
        return $this->belongsTo(Student::class,'student_id');
    }
}
