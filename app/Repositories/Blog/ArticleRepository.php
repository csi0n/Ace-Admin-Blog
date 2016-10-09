<?php
/**
 * Created by csi0n
 * User: huaqing.chen
 * Date: 9/30/16
 * Time: 13:57
 */

namespace App\Repositories\Blog;


use App\Models\Blog\Article;
use App\Repositories\Blog\Ext\BaseBlogRepository;
use App\Repositories\IBlog\IArticleRepository;
use Laracasts\Flash\Flash;
use Image;
use Gate;

class ArticleRepository extends BaseBlogRepository implements IArticleRepository
{

    public function GetArticlePaginate()
    {
        $articles = Article::with(['user'])->paginate(5);
        return $articles;
    }

    /**
     * Created by huaqing.chen.
     * Email huaqing.chen@bioon.com
     * Desc 显示文章详情
     * @param $id
     * @return mixed
     */
    public function show($id)
    {
        return $this->verifyArticle($id);
    }

    protected function verifyArticle($id)
    {
        $article = Article::with(['user', 'tags', 'cate'])->find($id);
        if (is_null($article))
            abort(404);
        return $article;
    }

    /**
     * Created by huaqing.chen.
     * Email huaqing.chen@bioon.com
     * Desc ajax获取文章数据
     * @return mixed
     */
    public function ajaxIndex()
    {
        /*获取数据*/
        $draw = request('sEcho', 1);//请求次数
        /*每页条数*/
        $length = request('iDisplayLength', 10);
        /*起始记录数*/
        $start = request('iDisplayStart', 0);
        /*搜索内容*/
        $search = request('sSearch', '');
        $sort = request('sSortDir_0', '');
        $article = new Article;
        if ($search) {
            $article = $article->where('title', 'like', "%{$search}%")
                ->orWhere('content', 'like', "%{$search}%");
        }
        $tempArticle = $article;
        $count = $tempArticle->count();
        if ($sort) {
            $orderName = request('mDataProp_' . request('iSortCol_0', ''), '');
            $article = $article->orderBy($orderName, $sort);
        }
        $article = $article->offset($start)
            ->limit($length)
            ->get();

        foreach ($article as $v) {
            $v['actionButton'] = $v->GetActionButton();
        }
        $article->isEmpty() ? $article = [] : $article = $article->toArray();
        /*返回数据*/
        $returnData = [
            "sEcho" => $draw,
            "iTotalRecords" => $count,
            "iTotalDisplayRecords" => $count,
            "aaData" => $article,
        ];
        return $returnData;
    }

    /**
     * @Describe Post创建文章
     * @param $request
     * @return mixed
     */
    public function store($request)
    {
        $article = new Article;
        $article->fill($request->all());
        $article = $this->saveThumbRetArt($request, $article);
        if ($article->save()) {
            if ($request->tags) {
                $article->tags()->sync($request->tags);
            }
            Flash::success(trans('alerts.blog.article.addSuccess'));
            return true;
        }
        Flash::error(trans('alerts.blog.article.addFailed'));
        return false;
    }

    /**
     * @Describe 编辑文章
     * @param $id
     * @return mixed
     */
    public function edit($id)
    {
        return $this->verifyArticle($id);
    }

    public function update($request, $id)
    {
        $article = $this->verifyArticle($id);
        $article = $this->saveThumbRetArt($request, $article);
        if ($article->fill($request->all())->save()) {
            if ($request->tags) {
                $article->tags()->sync($request->tags);
            }
            Flash::success(trans('alerts.blog.article.updateSuccess'));
            return true;
        }
        Flash::error(trans('alerts.blog.article.updateFailed'));
        return false;
    }

    private function saveThumbRetArt($request, $article)
    {
        if ($request->hasFile('thumb')) {
            $upload = upload($request->file('thumb'), 'article');
            if ($upload['result'])
                $article->thumb = $upload['local'];
        }
        return $article;
    }

    /**
     * Created by huaqing.chen.
     * Email huaqing.chen@bioon.com
     * Desc 删除文章
     * @param $id
     * @return mixed
     */
    public function destroy($id)
    {
        $ret = $this->verifyArticle($id);
        if ($ret->delete()) {
            Flash::success(trans('alerts.blog.article.deleteSuccess'));
            return true;
        }
        Flash::error(trans('alerts.blog.article.deleteFailed'));
        return false;
    }
}