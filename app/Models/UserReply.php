<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserReply extends Model
{
    use HasFactory;

    protected $table = 'user_reply';
    protected $fillable = [
        'post_id',
        'user_id',
        'markdown',
    ];

    public static function getRepliesByPostId($postId)
    {
        return self::where('post_id', $postId)->get();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function likedBy()
    {
        return $this->belongsToMany(User::class, 'user_reply_likes', 'reply_id', 'user_id');
    }

}
