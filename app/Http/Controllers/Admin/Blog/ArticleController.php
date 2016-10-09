<?php

namespace App\Http\Controllers\Admin\Blog;

use App\Http\Controllers\Admin\Ext\BaseController;
use App\Http\Requests\Admin\Blog\ArticleRequest;
use App\Repositories\IBlog\IArticleRepository;
use App\Repositories\IBlog\ICateRepository;
use App\Repositories\IBlog\ITagRepository;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ArticleController extends BaseController
{
    protected $iArticleRepository;

    protected $iTagsRepository;

    protected $iCateRepository;

    /**
     * ArticleController constructor.
     * @param IArticleRepository $iArticleRepository
     * @param ITagRepository $iTagRepository
     * @param ICateRepository $iCateRepository
     */
    public function __construct(
        IArticleRepository $iArticleRepository,
        ITagRepository $iTagRepository,
        ICateRepository $iCateRepository
    )
    {
        $this->_key = 'blog.article';
        parent::__construct();
        $this->iArticleRepository = $iArticleRepository;
        $this->iTagsRepository = $iTagRepository;
        $this->iCateRepository = $iCateRepository;
    }

    public function index()
    {
        return view('admin.blog.article.list');
    }

    public function ajaxIndex()
    {
        $data = $this->iArticleRepository->ajaxIndex();
        return response()->json($data);
    }

    public function create()
    {
        $tags = $this->iTagsRepository->GetTagsArray();
        $tags = array_combine(array_column($tags, 'id'), array_column($tags, 'name'));
        $cates = $this->iCateRepository->GetAllCateArr();
        $cates = array_combine(array_column($cates, 'id'), array_column($cates, 'name'));
        return view('admin.blog.article.create', compact('tags', 'cates'));
    }

    public function store(ArticleRequest $request)
    {
        $ret = $this->iArticleRepository->store($request);
        if ($ret)
            return redirect('admin/blog/article');
        return redirect()->back()->withInput();
    }

    public function edit($id)
    {
        $article = $this->iArticleRepository->edit($id);
        if ($article) {
            $tags = $this->iTagsRepository->GetTagsArray();
            $tags = array_combine(array_column($tags, 'id'), array_column($tags, 'name'));
            $cates = $this->iCateRepository->GetAllCateArr();
            $cates = array_combine(array_column($cates, 'id'), array_column($cates, 'name'));
            return view('admin.blog.article.edit', compact('article', 'tags', 'cates'));
        }
        return redirect('admin/blog/article');
    }

    public function update(ArticleRequest $request, $id)
    {
        $ret = $this->iArticleRepository->update($request, $id);
        if ($ret)
            return redirect('admin/blog/article');
        return redirect()->back()->withInput();
    }

    public function destroy($id)
    {
        $this->iArticleRepository->destroy($id);
        return redirect('admin/blog/article');
    }
}
