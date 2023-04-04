<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Content extends Model
{
    use HasFactory;
    protected $guarded = [
        'id',
        'created_at',
        'updated_at',
    ];
    
    // 🔽 追加
    public static function getAllOrderByUpdated_at()
        {
        return self::orderBy('updated_at', 'desc')->get();
        }
        
    // コンテンツとユーザーとの間に「多対1」がある: 投稿者名を表示する    
    public function user()
        {
        return $this->belongsTo(User::class);
        }
    
    // コンテンツとユーザーとの間に「多対多」がある：いいね機能を実装する
    public function users()
        {
        return $this->belongsToMany(User::class)->withTimestamps();
        }
    
    // コンテンツとコメントの間に「１対多」がある
    public function comments()
        {
        return $this->hasMany(Comment::class);
        }
}
