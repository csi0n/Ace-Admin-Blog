<?php

namespace App\Models\Blog;

use App\Models\Blog\Ext\BaseModel;

class Article extends BaseModel
{

    public function user()
    {
        return $this->hasOne('App\User', 'id', 'user_id');
    }
}
