<?php

use Illuminate\Support\Facades\Route;

Route::group([
    'namespace'=>'Fshangala\Faculty\Http\Controllers'
],function($router){
    $router->group(['prefix'=>'/faculty'],function($router){
        $router->group(['prefix'=>'/school'],function($router){
            $router->get('/','SchoolController@get');
            $router->get('/all','SchoolController@all');
            $router->post('/create','SchoolController@create');
            $router->put('/update','SchoolController@update');
            $router->delete('/delete','SchoolController@delete');
        });
        $router->group(['prefix'=>'/program'],function($router){
            $router->get('/','ProgramController@get');
            $router->get('/all','ProgramController@all');
            $router->post('/create','ProgramController@create');
            $router->put('/update','ProgramController@update');
            $router->delete('/delete','ProgramController@delete');
        });
        $router->group(['prefix'=>'/course'],function($router){
            $router->get('/','CourseController@get');
            $router->get('/all','CourseController@all');
            $router->post('/create','CourseController@create');
            $router->put('/update','CourseController@update');
            $router->delete('/delete','CourseController@delete');
        });
    });
});