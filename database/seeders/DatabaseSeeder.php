<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Post; // 記得要引用 Model
use App\Models\Comment;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // 1. 建立 10 篇貼文
        // (這就是您剛剛在 Tinker 打的第一段)
        for ($i = 1; $i <= 10; $i++) {
            $post = new Post();
            $post->title = "測試貼文 " . $i;
            $post->content = "這是第 " . $i . " 篇內容";
            $post->save();
        }

        // 2. 幫每一篇貼文建立評論
        // (這就是您剛剛在 Tinker 打的第二段)
        $posts = Post::all();
        $posts->each(function ($post) {
            $count = rand(2, 3);
            for ($k = 0; $k < $count; $k++) {
                $post->comments()->create([
                    'content' => '這是自動產生的評論，對應貼文ID: ' . $post->id,
                ]);
            }
        });
    }
}