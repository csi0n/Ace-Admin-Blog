<?php
/**
 * Created by PhpStorm.
 * User: chqss
 * Date: 2016/10/5
 * Time: 18:20
 */

namespace App\Http\ViewComposers\Blog;


use App\Http\ViewComposers\Blog\Ext\BaseComposer;
use App\Repositories\IBlog\IMenuRepository as IMenus;
use Illuminate\View\View;

class MenusComposer extends BaseComposer
{

    protected $menus;

    /**
     * MenusComposer constructor.
     * @param $menus
     */
    public function __construct(IMenus $menus)
    {
        $this->menus = $menus;
    }

    public function compose(View $view){
        $view->with('menus',$this->menus->menus());
    }
}