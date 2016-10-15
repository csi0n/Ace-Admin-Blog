<?php
/**
 * Created by PhpStorm.
 * User: chqss
 * Date: 2016/10/5
 * Time: 18:20
 */

namespace App\Http\ViewComposers\Blog;


use App\Http\ViewComposers\Blog\Ext\BaseComposer;
use App\Repositories\IBlog\ICateRepository as ICate;
use Illuminate\View\View;

class MenusComposer extends BaseComposer
{

    protected $cate;

    /**
     * MenusComposer constructor.
     * @param ICate $cate
     */
    public function __construct(ICate $cate)
    {
        $this->cate = $cate;
    }

    public function compose(View $view){
        $view->with('blog_cates',$this->cate->cates());
    }
}