<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'notify_id',
        'name' ,
        'email' ,
        'nomor',
        'jenis_kelamin',
        'tanggal_lahir',
        'password',
        'status',
        'token',
        'active',
        'email_verified_at',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function articles()
    {
        return $this->hasMany(Article::class,'user_id');
    }

    public function categories()
    {
        return $this->hasMany(Category::class,'user_id');
    }

    public function announcements()
    {
        return $this->hasMany(Announcement::class, 'user_id');
    }

    public function student()
    {
        return $this->hasOne(Student::class);
    }

    public function parents()
    {
        return $this->hasOne(Parents::class);
    }

    public function document()
    {
        return $this->hasOne(Document::class);
    }

    public function wawancara()
    {
        return $this->hasOne(Wawancara::class);
    }

    public function payment()
    {
        return $this->hasOne(Payment::class);
    }

    public function notifys()
    {
        return $this->belongsTo(Notify::class,'notify_id');
    }
}
