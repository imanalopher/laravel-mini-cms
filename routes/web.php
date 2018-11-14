<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test', function () {

    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/teacher/login', 'Auth\TeacherLoginController@showLoginForm')->name('teacher.login');
Route::post('/teacher/login', 'Auth\TeacherLoginController@login')->name('teacher.login.submit');
Route::get('/teacher/logout', 'Teacher\TeachersController@logout')->name('teacher.logout');

Route::get('/admin/login', 'Admin\Auth\AdminLoginController@showLoginForm')->name('admin.login');
Route::post('/admin/login', 'Admin\Auth\AdminLoginController@login')->name('admin.login.submit');

Route::get('/director/login', 'Auth\DirectorLoginController@showLoginForm')->name('director.login');
Route::post('/director/login', 'Auth\DirectorLoginController@login')->name('director.login.submit');

Route::group(['namespace' => 'Director', 'prefix' => 'director', 'middleware' => ['auth:director']], function() {
    Route::get('/home', 'DirectorController@index')->name('director.home');
    Route::get('/', 'DirectorController@index')->name('director.home');
    Route::get('/logout', 'DirectorController@logout')->name('director.logout');
    Route::group(['as' => 'director.'], function() {
        Route::resource('klass', 'KlassesController');
        Route::get('/klass/{id}/create', 'KlassesController@createStudent')->name('klass.student.create');
        Route::post('/klass/{id}/store', 'KlassesController@storeStudent')->name('klass.student.store');
    });
    Route::group(['as' => 'director.'], function() {
        Route::resource('school', 'SchoolsController');
    });
    Route::group(['as' => 'director.'], function() {
        Route::resource('student', 'StudentController');
    });
});

Route::group(['namespace' => 'Teacher', 'prefix' => 'teacher', 'middleware' => ['auth:teacher']], function() {
    Route::get('/home', 'TeachersController@index')->name('teacher.home');
    Route::get('/', 'TeachersController@index')->name('teacher.home');
    Route::group(['as' => 'teacher.'], function() {
        Route::resource('klass', 'KlassesController');
    });
});



Route::group(['namespace' => 'Admin', 'prefix' => 'admin', 'middleware' => ['auth:admin']], function() {

    Route::get('/home', 'StudentController@index')->name('admin.home');
    Route::get('/', 'StudentController@index')->name('admin.home');
    Route::get('/logout', 'AdminController@logout')->name('admin.logout');
    Route::group(['as' => 'admin.'], function() {
        Route::resource('student', 'StudentController');
    });
    Route::group(['as' => 'admin.'], function() {
        Route::resource('school', 'SchoolsController');
    });
    Route::group(['as' => 'admin.'], function() {
        Route::resource('teacher', 'TeachersController');
    });
    Route::group(['as' => 'admin.'], function() {
        Route::resource('klass', 'KlassesController');
    });
});