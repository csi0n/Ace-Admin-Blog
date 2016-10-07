<?php
/**
 * Created by PhpStorm.
 * User: chqss
 * Date: 2016/10/5
 * Time: 18:22
 */

namespace App\Repositories\IBlog;


interface IMenuRepository
{
    /**
     * @Describe 博客菜单
     * @return mixed
     */
    public function menus();
}