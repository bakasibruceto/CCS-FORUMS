<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    use HasFactory;

    protected $table = 'logs';

    protected $fillable = ['user_id', 'actions'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
