<?php

namespace App\Models\Blog;

use App\Traits\ActionButton;
use Illuminate\Database\Eloquent\Model;

class Cate extends Model
{
    use ActionButton;

    public $fillable = ['name', 'pid', 'sort'];

    /**
     * Cate constructor.
     */
    public function __construct()
    {
        $this->_permission_edit = config('admin.permissions.blog.cate.edit');
        $this->_permission_delete = config('admin.permissions.blog.cate.delete');
        $this->_module = config('admin.module.blog.cate');
    }


}
