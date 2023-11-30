<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = 'category';

    protected $fillable = ['post_id', 'tag_id'];

    public function categories()
    {
        return $this->hasMany(Category::class);
    }

    public function tag()
    {
        return $this->belongsTo(Tags::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tags::class);
    }

    public function post()
    {
        return $this->belongsTo(ForumPost::class, 'post_id');
    }

    public function posts()
    {
        return $this->hasMany(ForumPost::class);
    }

}
