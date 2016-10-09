<?php

namespace App\Models\Blog;

use App\Models\Blog\Ext\BaseModel;
use App\Traits\ActionButton;
use Illuminate\Database\Eloquent\Model;

class Tag extends BaseModel
{
    use ActionButton;

    public $fillable=['name'];
    /**
     * Tag constructor.
     */
    public function __construct()
    {
        $this->_permission_edit = config('admin.permissions.blog.tag.edit');
        $this->_permission_delete = config('admin.permissions.blog.tag.delete');
        $this->_module = config('admin.module.blog.tag');
    }

    public function article()
    {
        return $this->belongsToMany('App\Models\Article', 'article_tags', 'tag_id', 'article_id')->withTimestamps();
    }
}
