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
    
    protected $fillable = [
        'name',
        'email',
        'password',
    ];
 
    public function contents()
    {
    return $this->belongsToMany(Content::class)->withTimestamps();
    }

    protected $hidden = [
        'password',
        'remember_token',
    ];
    
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // ユーザーとコンテンツの間に「多対多」がある：いいね機能
    public function content()
        {
        return $this->belongsToMany(Content::class)->withTimestamps();
        }

    // ユーザーとコンテンツとの間に「1対多」がある
    public function userContents()
        {
        return $this->hasMany(Content::class);
        }
    
}
