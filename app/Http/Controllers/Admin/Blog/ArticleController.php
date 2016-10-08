<?php

namespace App\Http\Controllers\Admin\Blog;

use App\Http\Controllers\Admin\Ext\BaseController;
use App\Repositories\IBlog\IArticleRepository;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ArticleController extends BaseController
{
    protected $iArticleRepository;

    /**
     * ArticleController constructor.
     * @param $iArticleRepository
     */
    public function __construct(IArticleRepository $iArticleRepository)
    {
        $this->_key = 'blog.article';
        parent::__construct();
        $this->iArticleRepository = $iArticleRepository;
    }

    public function index()
    {
        return view('admin.blog.article.list');
    }
    public function ajaxIndex(){
    }
}
