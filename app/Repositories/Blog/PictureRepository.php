<?php
/**
 * Created by PhpStorm.
 * User: chqss
 * Date: 2016/10/15
 * Time: 17:58
 */

namespace App\Repositories\Blog;


use App\Models\Blog\Picture;
use App\Repositories\Blog\Ext\BaseBlogRepository;
use App\Repositories\IBlog\IPictureRepository;
use Laracasts\Flash\Flash;
use Response;

class PictureRepository extends BaseBlogRepository implements IPictureRepository
{

    public function index()
    {
        return scan_Dir(storage_path('resource'));
    }

    public function store($request)
    {
        if ($request->hasFile('file')){
            $upload=upload($request->file('file'));
            if ($upload['result']){
                return Response::json('success');
            }
        }
        return Response::json('failed');
    }

    public function edit($id)
    {
        // TODO: Implement edit() method.
    }

    public function destroy($id)
    {
        if (unlink(storage_path('resource/'.str_replace('||','/',$id)))){
          Flash::success(trans('alerts.blog.picture.deleteSuccess'));
            return true;
        }
        Flash::error(trans('alerts.blog.picture.deleteFailed'));
        return false;
    }

    public function show($id)
    {
        // TODO: Implement show() method.
    }
}