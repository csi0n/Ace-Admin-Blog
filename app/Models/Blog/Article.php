<?php

namespace App\Models\Blog;

use App\Models\Blog\Ext\BaseModel;
use App\Traits\ActionButton;

class Article extends BaseModel
{
    use ActionButton;

    /**
     * Article constructor.
     */
    public function __construct()
    {
        $this->_permission_edit = config('admin.permissions.blog.article.edit');
        $this->_permission_delete = config('admin.permissions.blog.article.delete');
        $this->_module = config('admin.module.blog.article');
    }

    public function user()
    {
        return $this->hasOne('App\User', 'id', 'user_id');
    }

    public function tags()
    {
        return $this->belongsToMany('App\Models\Blog\Tag', 'article_tags', 'article_id', 'tag_id')->withTimestamps();
    }
}
