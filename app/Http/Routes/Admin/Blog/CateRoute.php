<?php
$router->group(['prefix'=>'cate'],function($router){
    $router->get('ajaxIndex','CateController@ajaxIndex');
});
$router->resource('cate','CateController');