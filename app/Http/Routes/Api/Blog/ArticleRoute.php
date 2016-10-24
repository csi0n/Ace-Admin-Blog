<?php
/**
 * Created by csi0n
 * User: huaqing.chen
 * Date: 10/11/16
 * Time: 20:23
 */
$router->group(['prefix' => 'article'], function ($router) {
    $router->get('search/{key}', 'ArticleController@search');
});