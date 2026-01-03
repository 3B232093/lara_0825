<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'title',
        'content',
        'is_feature'
    ];

    // 定義：一篇貼文有多個評論 (One To Many)
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

}

