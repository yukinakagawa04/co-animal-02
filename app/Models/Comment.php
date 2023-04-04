<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Comment extends Model
{
    use HasFactory;
    
    protected $guarded = [
    'id',
    'created_at',
    'updated_at',
    ];
    
    public static function getAllOrderByUpdated_at()
    {
    return self::orderBy('updated_at', 'desc')->get();
    }
  
  // コメントとユーザーとの間に「１対１」の関係がある
   public function user()
        {
        return $this->belongsTo(User::class);
        }
    
    
}
 