<?php

namespace App\Providers;

use App\Repositories\Admin\MenuRepository;
use App\Repositories\Admin\PermissionRepository;
use App\Repositories\Admin\RoleRepository;
use App\Repositories\Admin\UserRepository;
use App\Repositories\Blog\ArticleRepository;
use App\Repositories\Blog\CateRepository;
use App\Repositories\Blog\IndexRepository;
use App\Repositories\Blog\TagRepository;
use App\Repositories\IAdmin\IMenuRepository;
use App\Repositories\IAdmin\IPermissionRepository;
use App\Repositories\IAdmin\IRoleRepository;
use App\Repositories\IAdmin\IUserRepository;
use App\Repositories\IBlog\IArticleRepository;
use App\Repositories\IBlog\ICateRepository;
use App\Repositories\IBlog\IIndexRepository;
use App\Repositories\IBlog\ITagRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(IMenuRepository::class, MenuRepository::class);
        $this->app->bind(IPermissionRepository::class, PermissionRepository::class);
        $this->app->bind(IRoleRepository::class, RoleRepository::class);
        $this->app->bind(IUserRepository::class, UserRepository::class);


        $this->app->bind(IIndexRepository::class, IndexRepository::class);
        $this->app->bind(IArticleRepository::class, ArticleRepository::class);
        $this->app->bind(\App\Repositories\IBlog\IMenuRepository::class, \App\Repositories\Blog\MenuRepository::class);
        $this->app->bind(ITagRepository::class, TagRepository::class);
        $this->app->bind(ICateRepository::class, CateRepository::class);
    }
}
