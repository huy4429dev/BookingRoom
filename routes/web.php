<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
  return view('home');
});


Route::get('/about', function () {
  return view('about');
});

Route::get('/contact', function () {
  return view('contact');
});

Route::get('/blog', function () {
  return view('blog');
});


Auth::routes();


/*===========================================
      Login social 
  ===========================================*/

Route::get('auth/google', 'Auth\GoogleController@redirectToGoogle');
Route::get('auth/google/callback', 'Auth\GoogleController@handleGoogleCallback');
Route::get('auth/facebook', 'Auth\FacebookController@redirect');
Route::get('auth/facebook/callback', 'Auth\FacebookController@callback');


Route::group(['middleware' => ['role:admin']], function () {
    Route::get("hello", function(){
      return 1;
    });
});


Route::namespace('Admin')->group(function () {

  Route::get('/home', 'AdminController@index')->name('home');

  /*===========================================
      Admin Post manage
      ===========================================*/

  Route::namespace('PostManage')->group(function () {
    Route::get('/admin/posts', 'PostController@index');
  });



  /*===========================================
      Admin Blog manage
      ===========================================*/

  Route::namespace('BlogManage')->group(function () {
    Route::get('/admin/blogs/index', 'BlogController@index');
    Route::get('/admin/blogs/create', 'BlogController@create');
    Route::post('/admin/blogs/create', 'BlogController@store');
    Route::get('/admin/blogs/detail/{id}', 'BlogController@detail');
    Route::post('/admin/blogs/upload', 'BlogController@upload');
    Route::post('/admin/blogs/delete/{id}', 'BlogController@delete');
    Route::get('/admin/blogs/show/{id}', 'BlogController@show');
    Route::post('/admin/blogs/update/{id}', 'BlogController@update');
    Route::post('/admin/blogs/upload-edit/{id}', 'BlogController@uploadEdit');
  });

  Route::namespace('ContactManager')->group(function () {
    Route::resource('admin/contact', 'ContactController');
  });
});



/*===========================================
    Upload images
  ===========================================*/
Route::post('upload/image', 'CkeditorController@upload')->name('ckeditor.upload');







Route::get('/test', 'TestController@index');
