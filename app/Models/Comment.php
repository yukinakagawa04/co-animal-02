<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes; //論理削除
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Comment extends Model
{
    use HasFactory;
    use SoftDeletes; //論理削除
    
    protected $guarded = [
        'id',
        'created_at',
        'updated_at',
        ];
    
    public static function getAllOrderByUpdated_at()
        {
        return self::orderBy('updated_at', 'desc')->get();
        }
  
  // コメントとユーザーとの間に「多対１」の関係がある：コメント機能
   public function user()
        {
        return $this->belongsTo(User::class);
        }
    

    
}
 