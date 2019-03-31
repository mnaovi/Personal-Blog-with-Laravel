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

//User Route

Route::group(['namespace' => 'User'], function(){

   //user post route
   Route::get('post/{post}','postController@post')->name('post');
   //user home route
   Route::get('/','HomeController@index');

   Route::get('post/tag/{tag}','HomeController@tag')->name('tag');
   Route::get('post/category/{category}','HomeController@category')->name('category');
});




//Admin Route

Route::group(['namespace' => 'Admin','middleware'=>'auth:admin'], function(){
   
   //admin home route
   Route::get('admin/home','Homecontroller@index')->name('admin.home');

   //post route
   Route::resource('admin/post','postController');

   //user route
   Route::resource('admin/user','userController');

   //tag route
   Route::resource('admin/tag','tagController');

   //category route
   Route::resource('admin/category','categoryController');

   // Admin auth route

   Route::get('admin-login', 'Auth\LoginController@showLoginForm')->name('admin.login');
   Route::post('admin-login', 'Auth\LoginController@login');

});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
