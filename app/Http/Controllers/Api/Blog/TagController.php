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

    public function index()
    {
        return ApiResponseService::success($this->iTagRepository->GetTagsArray());
    }

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
