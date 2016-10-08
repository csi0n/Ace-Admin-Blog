<?php
/**
 * Created by PhpStorm.
 * User: chqss
 * Date: 2016/10/5
 * Time: 18:22
 */

namespace App\Repositories\Blog;


use App\Models\Blog\Menu;
use App\Repositories\Blog\Ext\BaseBlogRepository;
use App\Repositories\IBlog\IMenuRepository;
use Illuminate\Support\Facades\Cache;

class MenuRepository extends BaseBlogRepository implements IMenuRepository
{

    /**
     * @Describe 博客菜单
     * @return mixed
     */
    public function menus()
    {
        if (is_debug()) {
            if (Cache::has(config('blog.global.cache.menu')))
                return Cache::get(config('blog.global.cache.menu'));
        }
        return $this->setMenusCache();
    }


    private function setMenusCache()
    {
        $menus = Menu::all();
        $menus->isEmpty() ? $menus = [] : $menus=$menus->toArray();
        array_order_by($menus, 'sort', SORT_DESC);
        Cache::forever(config('blog.global.cache.menu'), $menus);
        return $menus;
    }
}