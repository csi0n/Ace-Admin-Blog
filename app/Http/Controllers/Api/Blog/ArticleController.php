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

    /**
     * Display the specified resource
     *
     * @param  int  $key
     * @return \Illuminate\Http\Response
     *
     * @SWG\Get(
     *     path="/api/blog/article/search/{key}",
     *     summary="搜索文章 ",
     *     tags={"Blog:Article:Search"},
     *     description="搜索文章",
     *     operationId="search",
     *     @SWG\Parameter(
     *         name="key",
     *         in="path",
     *         description="key",
     *         required=true,
     *         type="string",
     *     ),
     *     @SWG\Response(
     *         response=200,
     *         description="正常执行",
     *     )
     * )
     */
    public function search($key)
    {
        $result = $this->iArticleRepository->apiSearch($key);
        if (!$result->isEmpty()) {
            $result->each(function ($article) {
                $article['css'] = asset(config('blog.css.markdown'));
            });
        }
        return ApiResponseService::success($result);
    }
}
