<?php
/**
 * Created by csi0n
 * User: huaqing.chen
 * Date: 9/30/16
 * Time: 13:57
 */

namespace App\Repositories\Blog;


use App\Models\Blog\Article;
use App\Repositories\Blog\Ext\BaseBlogRepository;
use App\Repositories\IBlog\IArticleRepository;

class ArticleRepository extends BaseBlogRepository implements IArticleRepository
{
    public function GetArticlePaginate(){
        $articles = Article::with(['user'])->paginate(1);
        return $articles;
    }
}