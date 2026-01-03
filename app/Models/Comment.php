<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    // 定義：一個評論屬於一篇貼文 (Inverse One To Many)
    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}
