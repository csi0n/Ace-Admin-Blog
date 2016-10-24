<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
/**
 * 前台路由
 */
Route::group(['namespace' => 'Blog', 'middleware' => ['web']], function () {
    Route::resource('/', 'IndexController', ['only' => ['index']]);
//    Route::get('/', 'IndexController@getIndex');
    Route::group(['prefix' => 'article'], function () {
        Route::get('search', 'ArticleController@search');
//        Route::get('{id}', 'ArticleController@getIndex')->name('article');
    });
    Route::resource('article', 'ArticleController');
    Route::resource('cate', 'CateController', ['only' => 'show']);
});
/**
 * 后台路由
 */
Route::group(['middleware' => ['web']], function () {
    Route::auth();
    Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => ['auth']], function ($router) {
        $router->get('/i18n', 'IndexController@dataTableI18n');
        require __DIR__ . '/Routes/Admin/IndexRoute.php';
        require __DIR__ . '/Routes/Admin/UserRoute.php';
        require __DIR__ . '/Routes/Admin/RoleRoute.php';
        require __DIR__ . '/Routes/Admin/PermissionRoute.php';
        require __DIR__ . '/Routes/Admin/MenusRoute.php';
        Route::group(['prefix' => 'blog', 'namespace' => 'Blog'], function ($router) {
            require __DIR__ . '/Routes/Admin/Blog/ArticleRoute.php';
            require __DIR__ . '/Routes/Admin/Blog/TagRoute.php';
            require __DIR__ . '/Routes/Admin/Blog/CateRoute.php';
            require __DIR__ . '/Routes/Admin/Blog/PictureRoute.php';
        });
    });
});

/**
 * Api路由
 */
Route::group(['prefix' => 'api', 'namespace' => 'Api'], function ($router) {
    Route::group(['prefix' => 'blog', 'namespace' => 'Blog'], function ($router) {
        require __DIR__ . '/Routes/Api/Blog/HomeRoute.php';
        require __DIR__ . '/Routes/Api/Blog/TagRoute.php';
        require __DIR__ . '/Routes/Api/Blog/ArticleRoute.php';
    });
});