<?php
/**
 * Created by csi0n
 * User: huaqing.chen
 * Date: 9/30/16
 * Time: 20:57
 */

namespace App\Repositories\IBlog;


use App\Repositories\IBlog\Ext\IBaseRepository;

interface ICateRepository extends IBaseRepository
{
    /**
     * @Describe ajax获取标签列表
     * @return mixed
     */
    public function ajaxIndex();

    /**
     * Created by huaqing.chen.
     * Email huaqing.chen@bioon.com
     * Desc POST提交保存标签
     * @param $request
     * @return mixed
     */
    public function store($request);

    /**
     * Created by huaqing.chen.
     * Email huaqing.chen@bioon.com
     * Desc 编辑标签
     * @param $id
     * @return mixed
     */
    public function edit($id);

    /**
     * Created by huaqing.chen.
     * Email huaqing.chen@bioon.com
     * Desc post提交编辑标签
     * @param $request
     * @param $id
     * @return mixed
     */
    public function update($request, $id);

    /**
     * Created by huaqing.chen.
     * Email huaqing.chen@bioon.com
     * Desc 删除
     * @param $id
     * @return mixed
     */
     public function destroy($id);

    public function GetAllCateArr();
}