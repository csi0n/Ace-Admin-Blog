<?php
$router->group(['prefix'=>'article'],function($router){
    $router->get('ajaxIndex','ArticleController@ajaxIndex');
});
$router->resource('article','ArticleController');