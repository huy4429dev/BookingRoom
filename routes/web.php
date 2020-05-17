<?php

use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

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

Auth::routes();


/*===========================================
      Login social 
  ===========================================*/

Route::get('auth/google', 'Auth\GoogleController@redirectToGoogle');
Route::get('auth/google/callback', 'Auth\GoogleController@handleGoogleCallback');
Route::get('auth/facebook', 'Auth\FacebookController@redirect');
Route::get('auth/facebook/callback', 'Auth\FacebookController@callback');


Route::group(['middleware' => ['role:admin']], function () {
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

  /*===========================================
      Admin contact manager
      ===========================================*/
  Route::namespace('ContactManager')->group(function () {
    Route::resource('admin/contact', 'ContactController');
  });

  /*===========================================
      Admin manager user
      ===========================================*/
  Route::namespace('UserManager')->group(function () {
    Route::resource('admin/admin-room', 'adminController');
    Route::resource('admin/guest-room', 'guestController');
    Route::resource('admin/master-room', 'masterController');
    Route::resource('admin/staff-room', 'staffController');
  });
});



/*===========================================
    Upload images
  ===========================================*/
Route::post('upload/image', 'CkeditorController@upload')->name('ckeditor.upload');













Route::get('/test', 'TestController@index');



/*===========================================
    Make roles
  ===========================================*/

Route::get('/make-role', function () {
  $role = Role::create(['name' => 'admin']);
  $role = Role::create(['name' => 'staff']);
  $role = Role::create(['name' => 'room master']);
  $role = Role::create(['name' => 'room guest']);
});

// $permission = Permission::create(['name' => 'edit articles']);

/*===========================================
    Make permission
  ===========================================*/

Route::get('/make-permission', function () {

  $permission = Permission::create(['name' => 'admin manage']);
  $permission = Permission::create(['name' => 'staff manage']);
});


/*===========================================
    Asign role
  ===========================================*/

Route::get('/asign-role', function () {
  $role = Role::find(1);
  $permissionAdmin =  Permission::find(1);
  $permissionStaff =  Permission::find(2);
  $role->givePermissionTo([$permissionAdmin]);
});

/*===========================================
    Asign role
  ===========================================*/

Route::get('/asign-role-admin', function () {
  $admin = User::find(2);
  $admin->assignRole(['admin', 'staff', 'room master', 'room guest']);
});


/*===========================================
    Make user
  ===========================================*/

Route::get('/make-user', function () {

  $staff = User::create([
    'name' => 'nhan vien',
    'email' => 'nhanvien@gmail.com',
    'password' => bcrypt(123456),
  ]);

  $staff->assignRole(['staff', 'room master', 'room guest']);

  $rooMaster = User::create([
    'name' => 'chu tro',
    'email' => 'chutro@gmail.com',
    'password' => bcrypt(123456),
  ]);
  $rooMaster->assignRole(['room master', 'room guest']);

  $roomGuest = User::create([
    'name' => 'khachthue',
    'email' => 'khachthue@gmail.com',
    'password' => bcrypt(123456),
  ]);

  $roomGuest->assignRole(['room guest']);
});



Route::post('upload/image', 'CkeditorController@upload')->name('ckeditor.upload');
