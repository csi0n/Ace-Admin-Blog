<?php

use App\Models\Blog\Article;
use Illuminate\Database\Seeder;

class ArticlesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $article=new Article;
        $article->thumb='';
        $article->title='欢饮使用Blog';
        $article->user_id=1;
        $article->content='博客内容';
        $article->save();
    }
}
