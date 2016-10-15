<?php

namespace App\Http\Controllers\Admin\Blog;

use App\Repositories\IBlog\IPictureRepository;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class PictureController extends Controller
{
    protected $iPictureRepository;

    /**
     * PictureController constructor.
     * @param $iPictureRepository
     */
    public function __construct(IPictureRepository $iPictureRepository)
    {
        $this->iPictureRepository = $iPictureRepository;
    }

    public function index(){
        $pictures=$this->iPictureRepository->index();
        return view('admin.blog.picture.list',compact('pictures'));
    }

    public function store(Requests\Admin\Blog\PictureRequest $request){
        return $this->iPictureRepository->store($request);
    }

    public function destroy($id){
        $this->iPictureRepository->destroy($id);
        return redirect('admin/blog/picture');
    }
}
