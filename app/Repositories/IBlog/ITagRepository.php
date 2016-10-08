<?php
/**
 * Created by csi0n
 * User: huaqing.chen
 * Date: 9/30/16
 * Time: 13:57
 */

namespace App\Repositories\IBlog;


use App\Repositories\IBlog\Ext\IBaseRepository;

interface ITagRepository extends IBaseRepository
{
    /**
     * @Describe ajax获取标签列表
     * @return mixed
     */
    public function ajaxIndex();
    public function store($request);
}