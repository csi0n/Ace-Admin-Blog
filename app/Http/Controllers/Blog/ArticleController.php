<?php

namespace App\Http\Controllers\Blog;

use App\Repositories\IBlog\IArticleRepository;
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

}
