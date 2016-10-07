<?php

namespace App\Http\Controllers\Blog;

use App\Repositories\IBlog\IArticleRepository;
use App\Repositories\IBlog\IIndexRepository;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{

    protected $iIndexRepository;

    protected $iArticleRepository;

    /**
     * IndexController constructor.
     * @param IIndexRepository $iIndexRepository
     * @param IArticleRepository $iArticleRepository
     */
    public function __construct(IIndexRepository $iIndexRepository, IArticleRepository $iArticleRepository)
    {
        $this->iIndexRepository = $iIndexRepository;
        $this->iArticleRepository = $iArticleRepository;
    }

    public function index()
    {
        $articles = $this->iArticleRepository->GetArticlePaginate();
        return view('blog.index.index', compact('articles'));
    }
}
