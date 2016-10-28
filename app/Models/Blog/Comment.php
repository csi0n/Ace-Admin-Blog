<?php

namespace App\Models\Blog;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public $timestamps = false;

    public $primaryKey = 'post_id';

    public $fillable = [
        'post_id',
        'thread_id',
        'thread_key',
        'author_id',
        'author_key',
        'author_name',
        'author_email',
        'author_url',
        'ip',
        'created_at',
        'message',
        'status',
        'type',
        'parent_id',
        'agent'
    ];

}
