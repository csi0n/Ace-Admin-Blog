<?php
/**
 * Created by csi0n
 * User: huaqing.chen
 * Date: 10/28/16
 * Time: 09:31
 */

namespace App\Repositories\IBlog;


interface ICommentRepository
{
    public function lists($id);
}