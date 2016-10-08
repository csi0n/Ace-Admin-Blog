<?php

namespace App\Models\Blog;

use App\Models\Blog\Ext\BaseModel;
use Illuminate\Database\Eloquent\Model;

class Tag extends BaseModel
{
    public function article()
    {
        return $this->belongsToMany('App\Models\Article', 'article_tags', 'tag_id', 'article_id')->withTimestamps();
    }
}
