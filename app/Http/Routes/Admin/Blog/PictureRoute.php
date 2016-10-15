<?php
$router->group(['prefix'=>'picture'],function($router){
    $router->get('ajaxIndex','PictureController@ajaxIndex');
});
$router->resource('picture','PictureController');