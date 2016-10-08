<?php
$router->group(['prefix'=>'tag'],function($router){
    $router->get('ajaxIndex','TagController@ajaxIndex');
});
$router->resource('tag','TagController');