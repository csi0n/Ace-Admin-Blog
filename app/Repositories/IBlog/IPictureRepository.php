<?php
/**
 * Created by csi0n
 * User: huaqing.chen
 * Date: 9/30/16
 * Time: 20:57
 */

namespace App\Repositories\IBlog;


use App\Repositories\IBlog\Ext\IBaseRepository;

interface IPictureRepository extends IBaseRepository
{
    public function index();
    public function store($request);
    public function edit($id);
    public function destroy($id);
    public function show($id);
}