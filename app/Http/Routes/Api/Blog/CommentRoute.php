<?php
/**
 * Created by csi0n
 * User: huaqing.chen
 * Date: 10/11/16
 * Time: 20:23
 */
$router->group(['prefix' => 'comments'], function ($router) {
    $router->get('lists/{id}', 'CommentController@lists');
});
