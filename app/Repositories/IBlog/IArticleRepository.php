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
     * @Describe
     * @return mixed
     */
    public function GetArticlePaginate();
}