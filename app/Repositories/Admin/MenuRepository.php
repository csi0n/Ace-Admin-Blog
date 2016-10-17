<?php
/**
 * Created by PhpStorm.
 * User: chqss
 * Date: 2016/9/15
 * Time: 19:42
 */

namespace App\Repositories\Admin;
use App\Models\Admin\Menu;
use App\Repositories\Admin\Ext\BaseRepository;
use App\Repositories\IAdmin\IMenuRepository;
use Cache;
use Flash;

class MenuRepository extends BaseRepository implements IMenuRepository
{
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
        $menu = new Menu;
        if ($search) {
            $menu = $menu->where('name', 'like', "%{$search}%")
                ->orWhere('slug', 'like', "%{$search}%")
                ->orWhere('description', 'like', "%{$search}%");
        }
        $tempMenu = $menu;
        $count = $tempMenu->count();
        if ($sort) {
            $orderName = request('mDataProp_' . request('iSortCol_0', ''), '');
            $menu = $menu->orderBy($orderName, $sort);
        }
        $menu = $menu->offset($start)
            ->limit($length)
            ->get();

        foreach ($menu as $v) {
            $v['actionButton'] = $v->GetActionButton();
        }
        $menu->isEmpty() ? $menu = [] : $menu = $menu->toArray();
        /*返回数据*/
        $returnData = [
            "sEcho" => $draw,
            "iTotalRecords" => $count,
            "iTotalDisplayRecords" => $count,
            "aaData" => $menu,
        ];
        return $returnData;
    }

    public function menus()
    {
        if (!is_debug()){
            if (Cache::has(config('admin.global.cache.menus')))
                return Cache::get(config('admin.global.cache.menus'));
        }
        $menusList = $this->setMenuListCache();
        return $menusList;
    }

    private function sortMenu($menus, $pid = 0)
    {
        $arr = [];
        foreach ($menus as $k => $v) {
            if ($v['pid'] == $pid) {
                $arr[$k] = $v;
                $arr[$k]['child'] = self::sortMenu($menus, $v['id']);
            }
        }
        return $arr;
    }

    function setMenuListCache()
    {
        $menus = Menu::where('language', config('app.locale'))
            ->orderBy('sort', 'desc')
            ->orderBy('id', 'asc')
            ->get();
        $menus->isEmpty() ? $menus = [] : $menus = $menus->toArray();
        if (!empty($menus)) {
            $menuList = $this->sortMenu($menus);
            foreach ($menuList as &$v) {
                if ($v['child']) {
                    $sort = array_column($v['child'], 'sort');
                    arsort($sort);
                    array_multisort($sort, SORT_DESC, $v['child']);
                }
            }
            Cache::forever(config('admin.global.cache.menu'), $menuList);
        }
        return $menuList;
    }

    public function edit($id)
    {
        $menu = $this->verifyMenu($id);
        if (empty($menu))
            return false;
        $menu->update = route('admin.menu.update', ['id' => $menu->id]);
        return $menu;
    }

    public function update($id, $request)
    {
        $menu = $this->verifyMenu($id);
        if (empty($menu))
            return false;
        $menu->fill($request->all());
        if ($menu->save()) {
            Flash::success(trans('alerts.menu.updatedSuccess'));
            return true;
        }
        Flash::error(trans('alerts.menu.updatedFailed'));
        return false;
    }

    public function store($request)
    {
        $menu = new Menu;
        if ($menu->fill($request->all())->save()) {
            $this->setMenuListCache();
            Flash::success(trans('alerts.menu.addSuccess'));
            return true;
        }
        Flash::error(trans('alerts.menu.addFailed'));
        return false;
    }

    public function sort()
    {
        $currentItemId = request('currentItemId', 0);
        $itemParentId = request('itemParentId', 0);
        if (!$currentItemId) {
            return ['status' => false, 'msg' => trans('alerts.menu.addFailed')];
        }
        $menu = Menu::find($currentItemId);
        if ($menu) {
            $menu->pid = $itemParentId;
            if ($menu->save()) {
                $this->setMenuListCache();
                return ['status' => false, 'msg' => trans('alerts.menu.updatedSuccess')];
            }
        }
        return ['status' => false, 'msg' => trans('alerts.menu.updatedFailed')];
    }

    public function destroy($id)
    {
        $menu = $this->verifyMenu($id);
        if (empty($menu))
            return false;
        $ret = $menu->delete();
        if ($ret) {
            $this->setMenuListCache();
            Flash::success(trans('alerts.menu.deleteSuccess'));
            return true;
        }
        Flash::error(trans('alerts.menu.deleteFailed'));
        return false;
    }

    public function verifyMenu($id)
    {
        $menu = Menu::find($id);
        if (empty($menu)) {
            Flash::error(trans('alerts.menu.notFind'));
            return false;
        }
        return $menu;
    }

    public function index()
    {
        // TODO: Implement index() method.
    }

    public function create()
    {
        // TODO: Implement create() method.
    }
}