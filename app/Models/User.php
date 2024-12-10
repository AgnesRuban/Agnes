<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $fillable = [
        'name',
        'email',
        'password',
        ];

    protected $hidden = [
        'password',
        'remember_token',
        ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        ];
    public function profile()
    {
        return $this->hasOne(Profile::class, 'user_id');
    }

    public function news()
    {
        return $this->belongsToMany(News::class, 'comments', 'user_id', 'news_id');
    }
}
