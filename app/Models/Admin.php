<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Admin extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    
    protected $primaryKey = 'id';

    protected $fillable = [
        'name',
        'email',
        'password',
        'prefecture',
        'image',
        'description',
        
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    // adminユーザー
    public function admin()
        {
        return $this->belongsTo(Content::class);
        }
        
        
    // コンテンツとadminユーザーに多対多モデルがある
    public function contents()
        {
        return $this->belongsToMany(Content::class, 'content_admin')->withTimestamps();
        }
     
    // adminいいね機能  
    public function getId()
    {
        return $this->id;
    }
    
    //adminコメント機能
    public function comments()
    {
        //return $this->hasMany(Comment::class);
        return $this->morphMany(Comment::class, 'user');
    }
    
        

    
}

