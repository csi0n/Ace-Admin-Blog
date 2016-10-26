<?php

namespace App\Http\Controllers\Api\Blog;

use App\Repositories\IBlog\ICateRepository;
use App\Services\ApiResponseService;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    protected $iCateRepository;
    /**
     * HomeController constructor.
     * @param $iCateRepository
     */
    public function __construct(ICateRepository $iCateRepository)
    {
        $this->iCateRepository = $iCateRepository;
    }


    /**
     * @SWG\Get(
     *     path="/api/blog/home",
     *     summary="首页 ",
     *     tags={"Blog:Home"},
     *     description="首页",
     *     operationId="home",
     *     @SWG\Response(
     *         response=200,
     *         description="正常执行",
     *     )
     * )
     */
    public function index()
    {
        $result=$this->iCateRepository->GetAllCateWithArticleAndTag()->each(function ($cate){
            if (!$cate->articles->isEmpty()){
                $cate->articles->each(function ($article){
                    $article['content']=sprintf('<article class="markdown-body">%s</article>',$article['content']);
                    $article['css']=asset(config('blog.css.markdown'));
                });
            }
        });
        return ApiResponseService::success($result);
    }
}
