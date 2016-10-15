<?php

use App\Models\Blog\Menu;
use Illuminate\Database\Seeder;

class BlogMenusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $blog = new App\Models\Admin\Menu;
        $blog->name = "博客管理";
        $blog->pid = 0;
        $blog->language = "zh";
        $blog->icon = "fa fa-cog";
        $blog->slug = "blog.systems.manage";
        $blog->url = "admin/blog/article*,admin/blog/tag*,admin/blog/cate*,admin/blog/picture*";
        $blog->status=0;
        $blog->description = "博客管理";
        $blog->save();

        $article = new App\Models\Admin\Menu;
        $article->name = "文章管理";
        $article->pid = $blog->id;
        $article->language = "zh";
        $article->icon = "fa fa-cog";
        $article->slug = "blog.article.list";
        $article->url = "admin/blog/article";
        $article->status=0;
        $article->description = "文章管理";
        $article->save();

        $article = new App\Models\Admin\Menu;
        $article->name = "标签管理";
        $article->pid = $blog->id;
        $article->language = "zh";
        $article->icon = "fa fa-cog";
        $article->slug = "blog.tag.list";
        $article->url = "admin/blog/tag";
        $article->status=0;
        $article->description = "标签管理";
        $article->save();

        $article = new App\Models\Admin\Menu;
        $article->name = "分类管理";
        $article->pid = $blog->id;
        $article->language = "zh";
        $article->icon = "fa fa-cog";
        $article->slug = "blog.cate.list";
        $article->url = "admin/blog/cate";
        $article->status=0;
        $article->description = "分类管理";
        $article->save();


        $picture=new App\Models\Admin\Menu;
        $picture->name="图片管理";
        $picture->pid=$blog->id;
        $picture->language = "zh";
        $picture->icon = "fa fa-cog";
        $picture->slug = "blog.picture.list";
        $picture->url = "admin/blog/picture";
        $picture->status=0;
        $picture->description = "图片管理";
        $picture->save();
    }
}
