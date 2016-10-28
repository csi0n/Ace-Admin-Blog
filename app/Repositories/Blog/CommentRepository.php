<?php
/**
 * Created by csi0n
 * User: huaqing.chen
 * Date: 10/28/16
 * Time: 09:35
 */

namespace App\Repositories\Blog;


use App\Models\Blog\Comment;
use App\Repositories\IBlog\ICommentRepository;


class CommentRepository implements ICommentRepository
{

    public function lists($id)
    {
        $lists = Comment::where('thread_key', $id)->get();
        return $lists;
    }
}