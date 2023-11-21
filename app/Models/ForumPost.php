<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ForumPost extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title',
        'tags',
        'markdown',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function replies()
    {
        return $this->elongsTo(UserReply::class, 'post_id');
    }

    public function likedBy()
    {
        return $this->belongsToMany(User::class, 'forum_likes', 'post_id', 'user_id');
    }

}
