<?php

namespace App\Http\Controllers\Admin\Blog;

use App\Http\Controllers\Admin\Ext\BaseController;
use App\Http\Requests\Admin\Blog\CateRequest;
use App\Repositories\IBlog\ICateRepository;

class CateController extends BaseController
{
    protected $iCateRepository;

    /**
     * CateController constructor.
     * @param $iCateRepository
     */
    public function __construct(ICateRepository $iCateRepository)
    {
        $this->_key = 'blog.cate';
        parent::__construct();
        $this->iCateRepository = $iCateRepository;
    }

    public function index()
    {
        return view('admin.blog.cate.list');
    }

    /**
     * @Describe ajax获取标签列表
     * @return mixed
     */
    public function ajaxIndex()
    {
        $data = $this->iCateRepository->ajaxIndex();
        return response()->json($data);
    }

    public function create()
    {
        $cates = $this->GetCates();
        return view('admin.blog.cate.create', compact('cates'));
    }

    /**
     * Created by huaqing.chen.
     * Email huaqing.chen@bioon.com
     * Desc POST提交保存标签
     * @param $request
     * @return mixed
     */
    public function store(CateRequest $request)
    {
        $ret = $this->iCateRepository->store($request);
        if ($ret)
            return redirect('admin/blog/cate');
        return redirect()->back()->withInput();
    }

    /**
     * Created by huaqing.chen.
     * Email huaqing.chen@bioon.com
     * Desc 编辑标签
     * @param $id
     * @return mixed
     */
    public function edit($id)
    {
        $cate = $this->iCateRepository->edit($id);
        if ($cate) {
            $cates = $this->GetCates();
            return view('admin.blog.cate.edit', compact('cate', 'cates'));
        }
        return redirect()->back()->withInput();
    }

    /**
     * Created by huaqing.chen.
     * Email huaqing.chen@bioon.com
     * Desc post提交编辑标签
     * @param $request
     * @param $id
     * @return mixed
     */
    public function update(CateRequest $request, $id)
    {
        $ret = $this->iCateRepository->update($request, $id);
        if ($ret)
            return redirect('admin/blog/cate');
        return redirect()->back()->withInput();
    }

    /**
     * Created by huaqing.chen.
     * Email huaqing.chen@bioon.com
     * Desc 删除
     * @param $id
     * @return mixed
     */
    public function destroy($id)
    {
        $this->iCateRepository->destroy($id);
        return redirect('admin/blog/cate');
    }

    protected function GetCates()
    {
        $cates = $this->iCateRepository->GetAllCateArr();
        $cates = array_combine(array_column($cates, 'id'), array_column($cates, 'name'));
        $cates = array_merge([0 => trans('labels.blog.cate.top')], $cates);
        return $cates;
    }
}
