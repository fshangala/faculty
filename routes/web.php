<?php

use Illuminate\Support\Facades\Route;

Route::group([
    'namespace'=>'Fshangala\Faculty\Http\Controllers'
],function($router){
    $router->group(['prefix'=>'/faculty'],function($router){
        $router->group(['prefix'=>'/school'],function($router){
            $router->get('/','SchoolController@all');
        });
    });
});