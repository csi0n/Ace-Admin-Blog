<?php

namespace App\Http\Controllers\Blog;

use App\Repositories\Blog\PaginationRepository;
use App\Repositories\IBlog\IArticleRepository;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ArticleController extends Controller
{
    protected $iArticleRepository;

    /**
     * ArticleController constructor.
     * @param $iArticleRepository
     */
    public function __construct(IArticleRepository $iArticleRepository)
    {
        $this->iArticleRepository = $iArticleRepository;
    }

    public function show($id)
    {
        $article = $this->iArticleRepository->show($id);
        return view('blog.article.show', compact('article'));
    }

    public function search()
    {
        $articles = $this->iArticleRepository->search(request());
        $pre = new PaginationRepository($articles);
        return view('blog.index.index', compact('articles','pre'));
    }
}
