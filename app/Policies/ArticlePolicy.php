<?php

namespace App\Policies;

use App\Models\Blog\Article;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ArticlePolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function store(User $user, Article $article)
    {
        return $user->id === $article->user_id;
    }

    public function update(User $user, Article $article)
    {
        return $user->id === $article->user_id;
    }
}
