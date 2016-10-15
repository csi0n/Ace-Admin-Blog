<?php

namespace App\Http\Controllers\Blog;

use App\Repositories\Blog\PaginationRepository;
use App\Repositories\IBlog\ICateRepository;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class CateController extends Controller
{
    protected $iCateRepository;

    /**
     * CateController constructor.
     * @param $iCateRepository
     */
    public function __construct(ICateRepository $iCateRepository)
    {
        $this->iCateRepository = $iCateRepository;
    }

    public function show($id){
        $articles=$this->iCateRepository->show($id);
        $pre = new PaginationRepository($articles);
        return view('blog.index.index',compact('articles','pre'));
    }

}
