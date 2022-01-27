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
        $router->group(['prefix'=>'/profile'],function($router){
            $router->get('/','ProfileController@get');
            $router->post('/create','ProfileController@create');
            $router->get('/all','ProfileController@all');
            $router->put('/update','ProfileController@update');
            $router->delete('/delete','ProfileController@delete');
        });
        $router->group(['prefix'=>'/student'],function($router){
            $router->get('/','StudentController@get');
            $router->post('/create','StudentController@create');
            $router->get('/all','StudentController@all');
            $router->put('/update','StudentController@update');
            $router->delete('/delete','StudentController@delete');
        });
        $router->group(['prefix'=>'/staff'],function($router){
            $router->get('/','StaffController@get');
            $router->post('/create','StaffController@create');
            $router->get('/all','StaffController@all');
            $router->put('/update','StaffController@update');
            $router->delete('/delete','StaffController@delete');
        });
        $router->group(['prefix'=>'/grade'],function($router){
            $router->get('/','GradeController@get');
            $router->post('/register-course','GradeController@registerCourse');
            $router->get('/all','GradeController@all');
            $router->put('/update','GradeController@update');
            $router->delete('/delete','GradeController@delete');
        });
    });
});