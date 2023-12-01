<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ForumPost extends Model
{
    use HasFactory, SoftDeletes;

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

    public function post()
    {
        return $this->belongsTo(ForumPost::class);
    }

    public function tag()
    {
        return $this->belongsToMany(Tags::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tags::class);
    }

    public function categories()
    {
        return $this->hasMany(Category::class, 'post_id');
    }
}
