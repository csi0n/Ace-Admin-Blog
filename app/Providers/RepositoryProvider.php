<?php

namespace App\Providers;

use App\Repositories\Admin\MenuRepository;
use App\Repositories\Admin\PermissionRepository;
use App\Repositories\Admin\RoleRepository;
use App\Repositories\Admin\UserRepository;
use App\Repositories\Blog\ArticleRepository;
use App\Repositories\Blog\IndexRepository;
use App\Repositories\IAdmin\IMenuRepository;
use App\Repositories\IAdmin\IPermissionRepository;
use App\Repositories\IAdmin\IRoleRepository;
use App\Repositories\IAdmin\IUserRepository;
use App\Repositories\IBlog\IArticleRepository;
use App\Repositories\IBlog\IIndexRepository;
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
        app()->bind(IMenuRepository::class, MenuRepository::class);
        app()->bind(IPermissionRepository::class, PermissionRepository::class);
        app()->bind(IRoleRepository::class, RoleRepository::class);
        app()->bind(IUserRepository::class, UserRepository::class);


        app()->bind(IIndexRepository::class, IndexRepository::class);
        app()->bind(IArticleRepository::class, ArticleRepository::class);
    }
}
