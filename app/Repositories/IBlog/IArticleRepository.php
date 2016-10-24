<?php
/**
 * Created by csi0n
 * User: huaqing.chen
 * Date: 9/30/16
 * Time: 13:57
 */

namespace App\Repositories\IBlog;


use App\Repositories\IBlog\Ext\IBaseRepository;

interface IArticleRepository extends IBaseRepository
{
    /**
     * @Describe  分页显示文章
     * @return mixed
     */
    public function GetArticlePaginate();

    /**
     * Created by huaqing.chen.
     * Email huaqing.chen@bioon.com
     * Desc 显示文章详情
     * @param $id
     * @return mixed
     */
    public function show($id);

    /**
     * Created by huaqing.chen.
     * Email huaqing.chen@bioon.com
     * Desc ajax获取文章数据
     * @return mixed
     */
    public function ajaxIndex();

    /**
     * @Describe Post创建文章
     * @param $request
     * @return mixed
     */
    public function store($request);

    /**
     * @Describe 编辑文章
     * @param $id
     * @return mixed
     */
    public function edit($id);

    /**
     * Created by huaqing.chen.
     * Email huaqing.chen@bioon.com
     * Desc 提交编辑文章
     * @param $request
     * @param $id
     * @return mixed
     */
    public function update($request, $id);

    /**
     * Created by huaqing.chen.
     * Email huaqing.chen@bioon.com
     * Desc 删除文章
     * @param $id
     * @return mixed
     */
    public function destroy($id);

    /**
     * Created by huaqing.chen.
     * Email huaqing.chen@bioon.com
     * Desc 搜索文章
     * @param $key
     * @return mixed
     */
    public function search($request);
    public function apiSearch($key);
}