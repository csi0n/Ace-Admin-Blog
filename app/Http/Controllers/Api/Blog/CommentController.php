<?php

namespace App\Http\Controllers\Api\Blog;

use App\Repositories\IBlog\ICommentRepository;
use App\Services\ApiResponseService;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class CommentController extends Controller
{
    protected $iCommentRepository;

    /**
     * CommentController constructor.
     * @param $iCommentRepository
     */
    public function __construct(ICommentRepository $iCommentRepository)
    {
        $this->iCommentRepository = $iCommentRepository;
    }

    /**
     * @SWG\Get(
     *     path="/api/blog/comments/lists/{id}",
     *     summary="文章评论 ",
     *     tags={"Blog:Article:Comments"},
     *     description="文章评论",
     *     operationId="lists",
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
    /**
     * Created by huaqing.chen.
     * Email huaqing.chen@bioon.com
     * Desc
     * @param $id
     * @return mixed
     */
    public function lists($id)
    {
        return ApiResponseService::success($this->iCommentRepository->lists($id));
    }
}
