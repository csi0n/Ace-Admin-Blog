<?php

namespace App\Http\Controllers\Api\Blog;

use App\Repositories\IBlog\ITagRepository;
use App\Services\ApiResponseService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;

class TagController extends Controller
{
    protected $iTagRepository;

    /**
     * TagController constructor.
     * @param ITagRepository $iTagRepository
     */
    public function __construct(ITagRepository $iTagRepository)
    {
        $this->iTagRepository = $iTagRepository;
    }

    /**
     * @SWG\Get(
     *     path="/api/blog/tag",
     *     summary="获取所有标签 ",
     *     tags={"Blog:Tag"},
     *     description="获取所有标签",
     *     operationId="index",
     *     @SWG\Response(
     *         response=200,
     *         description="正常执行",
     *     )
     * )
     */
    public function index()
    {
        return ApiResponseService::success($this->iTagRepository->GetTagsArray());
    }

    /**
     * Display the specified resource
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     *
     * @SWG\Get(
     *     path="/api/blog/tag/{id}",
     *     summary="获取标签下的文章 ",
     *     tags={"Blog:Tag"},
     *     description="获取标签下的文章",
     *     operationId="show",
     *     @SWG\Parameter(
     *         name="id",
     *         in="path",
     *         description="id",
     *         required=true,
     *         type="string",
     *     ),
     *     @SWG\Response(
     *         response=200,
     *         description="正常执行",
     *     )
     * )
     */
    public function show($id)
    {
        $result=$this->iTagRepository->show($id);
        if (!$result->isEmpty()){
            $result->each(function ($article){
                $article['css']=config('blog.css.markdown');
            });
        }
        return ApiResponseService::success($result);
    }
}
