<?php
namespace App\Repositories\Blog;

use App\Models\Blog\Article;
use App\Models\Blog\Cate;
use App\Repositories\Blog\Ext\BaseBlogRepository;
use App\Repositories\IBlog\ICateRepository;
use Laracasts\Flash\Flash;
use Cache;
/**
 * Created by csi0n
 * User: huaqing.chen
 * Date: 9/30/16
 * Time: 20:33
 */
class CateRepository extends BaseBlogRepository implements ICateRepository
{

    /**
     * @Describe ajax获取标签列表
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
        $cate = new Cate;
        if ($search) {
            $cate = $cate->where('name', 'like', "%{$search}%");
        }
        $tempCate = $cate;
        $count = $tempCate->count();
        if ($sort) {
            $orderName = request('mDataProp_' . request('iSortCol_0', ''), '');
            $cate = $cate->orderBy($orderName, $sort);
        }
        $cate = $cate->offset($start)
            ->limit($length)
            ->get();

        foreach ($cate as $v) {
            $v['actionButton'] = $v->GetActionButton();
        }
        $cate->isEmpty() ? $cate = [] : $cate = $cate->toArray();
        /*返回数据*/
        $returnData = [
            "sEcho" => $draw,
            "iTotalRecords" => $count,
            "iTotalDisplayRecords" => $count,
            "aaData" => $cate,
        ];
        return $returnData;
    }

    public function store($request)
    {
        if ((new Cate())->fill($request->all())->save()) {
            Flash::success(trans('alerts.blog.cate.addSuccess'));
            return true;
        }
        Flash::error(trans('alerts.blog.cate.addFailed'));
        return false;
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
        return $this->verifyCate($id);
    }

    /**
     * Created by huaqing.chen.
     * Email huaqing.chen@bioon.com
     * Desc post提交编辑标签
     * @param $request
     * @param $id
     * @return mixed
     */
    public function update($request, $id)
    {
        $cate = $this->verifyCate($id);
        if (!empty($cate)) {
            if ($cate->fill($request->all())->save()) {
                Flash::success(trans('alerts.blog.cate.updateSuccess'));
                return true;
            }
        }
        Flash::error(trans('alerts.blog.cate.updateFailed'));
        return false;
    }

    protected function verifyCate($id)
    {
        $cate = Cate::find($id);
        if (empty($cate)) {
            Flash::error(trans('alerts.blog.cate.notFind'));
            return false;
        }
        return $cate;
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
        $cate = $this->verifyCate($id);
        if (!empty($cate)) {
            if ($cate->delete()) {
                Flash::success(trans('alerts.blog.cate.deleteSuccess'));
                return true;
            }
        }
        Flash::error(trans('alerts.blog.cate.deleteFailed'));
        return false;
    }

    public function cates(){
        if (!is_debug()) {
            if (Cache::has(config('blog.global.cache.cates')))
                return Cache::get(config('blog.global.cache.cates'));
        }
        return $this->setCatesCache();
    }

    private function setCatesCache()
    {
        $cates = Cate::all();
        $cates->isEmpty() ? $cates = [] : $cates=$cates->toArray();
        array_order_by($cates, 'sort', SORT_DESC);
        Cache::forever(config('blog.global.cache.cates'), $cates);
        return $cates;
    }

    public function GetAllCateArr()
    {
        $cates = Cate::all();
        if ($cates->isEmpty())
            return [];
        return $cates->toArray();
    }

    public function GetAllCateWithArticleAndTag()
    {
        return Cate::with(
            [
                'articles.tags'
            ]
        )->get();
    }

    public function show($id)
    {
        return Article::with('user')
            ->where('cate_id',$id)
            ->orderBy('sort','created_at','desc')
            ->paginate(prePage());
    }
}