<?php

namespace App\Http\Controllers\Admin\Blog;

use App\Http\Controllers\Admin\Ext\BaseController;
use App\Http\Requests\Admin\Blog\TagRequest;
use App\Repositories\IBlog\ITagRepository;

class TagController extends BaseController
{
    protected $iTagRepository;

    /**
     * TagController constructor.
     * @param $iTagRepository
     */
    public function __construct(ITagRepository $iTagRepository)
    {
        $this->_key = 'blog.tag';
        parent::__construct();
        $this->iTagRepository = $iTagRepository;
    }

    public function index(){
        return view('admin.blog.tag.list');
    }

    public function ajaxIndex(){
        $data=$this->iTagRepository->ajaxIndex();
        return response()->json($data);
    }

    public function create(){
        return view('admin.blog.tag.create');
    }

    public function store(TagRequest $request){
        $ret=$this->iTagRepository->store($request);
        if ($ret)
            return redirect('admin/blog/tag');
        return redirect()->back()->withInput();
    }
}
