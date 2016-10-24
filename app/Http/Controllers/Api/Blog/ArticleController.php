<?php

namespace App\Http\Controllers\Api\Blog;

use App\Repositories\IBlog\IArticleRepository;
use App\Repositories\IBlog\ITagRepository;
use App\Services\ApiResponseService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;

class ArticleController extends Controller
{
    protected $iArticleRepository;

    public function __construct(IArticleRepository $iArticleRepository)
    {
        $this->iArticleRepository = $iArticleRepository;
    }

    public function search($key)
    {
        $result = $this->iArticleRepository->apiSearch($key);
        if (!$result->isEmpty()) {
            $result->each(function ($article) {
                $article['css'] = config('blog.css.markdown');
            });
        }
        return ApiResponseService::success($result);
    }
}
