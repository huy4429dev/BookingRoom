<?php

use App\Models\Categories;
use App\Models\Motelroom;
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

/*===============================================================================
                                   PAGE MEMBER 
=================================================================================*/

Route::get('/about', function () {
  return view('about');
});

Route::get('/contact', function () {
  return view('contact');
});


Route::namespace('Page')->group(function () {

  Route::get('/', 'HomeController@index')->name('home');

  Route::post('/search-motel', 'MotelRoomController@SearchMotelAjax');


/*===========================================
      User
  ===========================================*/


  Route::group(['prefix' => 'user'], function () {
    
      Route::post('contact', 'ContactController@create');
    
      Route::post('login', 'UserController@login')->name('user.login');
    
      Route::post('register', 'UserController@register')->name('user.register');

  });

/*===========================================
      Blog
  ===========================================*/

  Route::group(['prefix' => 'blog'], function () {

     Route::get('/', 'BlogController@index');
     Route::get('/{id}', 'BlogController@detail'); 

  });

  /*===========================================
      Room
  ===========================================*/

  Route::group(['prefix' => 'room'], function () {

    Route::get('/','MotelRoomController@index');
    Route::get('/{slug}','MotelRoomController@detail');
    Route::post('/{slug}/add-customer','MotelRoomController@addCustomer');
    

  });
  
  

  Route::group(['middleware' => ['role:room master']], function () {


    Route::group(['prefix' => 'user'], function () {

      Route::get('post', 'UserController@createPost')->name('user.post.create');
      Route::post('post/create', 'UserController@storePost')->name('user.post.store');
      Route::get('post/edit/{slug}', 'UserController@editPost')->name('user.post.edit');
      Route::get('profile', 'UserController@profile')->name('user.profile');
      Route::post('profile/edit-avatar', 'UserController@editProfileAvatar')->name('user.profile.edit.avatar');
      Route::post('profile/edit', 'UserController@editProfile')->name('user.profile.edit');
    });
  });
});





Auth::routes();


/*===========================================
      Login social 
  ===========================================*/

Route::get('auth/google', 'Auth\GoogleController@redirectToGoogle');
Route::get('auth/google/callback', 'Auth\GoogleController@handleGoogleCallback');
Route::get('auth/facebook', 'Auth\FacebookController@redirect');
Route::get('auth/facebook/callback', 'Auth\FacebookController@callback');


/*===============================================================================
                                   ADMIN MANAGE 
=================================================================================*/

Route::namespace('Admin')->group(function () {


  Route::group(['middleware' => ['role:admin']], function () {

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
      // Route::resource('admin/user/admin', 'adminController');
      Route::resource('admin/user/guest-room', 'guestController');
      Route::resource('admin/user/master-room', 'masterController');
      Route::resource('admin/user/staff', 'staffController');
    });

    /*===========================================
      user profile
      ===========================================*/

    Route::namespace('Profile')->group(function () {
      Route::get('admin/profile', 'ProfileController@index')->name('adminUser.profile');
      Route::get('admin/profile/{id}', 'ProfileController@getProfile');
      Route::post('admin/profile/upload', 'ProfileController@upload');
      Route::post('admin/profile/{id}/edit', 'ProfileController@edit');
    });
  });
});

/*===========================================
    User
  ===========================================*/




/*===========================================
    Upload images
  ===========================================*/
Route::post('upload/image', 'CkeditorController@upload')->name('ckeditor.upload');







/*===============================================================================
                                  MAKE USER 
=================================================================================*/


/*===========================================
    Make roles
  ===========================================*/

Route::get('/make-role', function () {
  $role = Role::create(['name' => 'admin']);
  $role = Role::create(['name' => 'staff']);
  $role = Role::create(['name' => 'room master']);
  $role = Role::create(['name' => 'room guest']);
});



/*===========================================
    Make permission
  ===========================================*/

Route::get('/make-permission', function () {

  $permission = Permission::create(['name' => 'admin manage']);
  $permission = Permission::create(['name' => 'staff manage']);
  $permission = Permission::create(['name' => 'post room']);
});


/*===========================================
    Asign role
  ===========================================*/

Route::get('/asign-role', function () {

  $roleAdmin            = Role::find(1);
  $roleStaff            = Role::find(2);
  $roleRoomMaster       = Role::find(3);
  $permissionAdmin      = Permission::find(1);
  $permissionStaff      = Permission::find(2);
  $permissionRoomMaster = Permission::find(3);

  $roleAdmin->givePermissionTo([$permissionAdmin . $permissionStaff, $permissionRoomMaster]);
  $roleStaff->givePermissionTo([$permissionStaff, $permissionRoomMaster]);
  $roleRoomMaster->givePermissionTo([$permissionRoomMaster]);
});



/*===========================================
    Make user
  ===========================================*/

Route::get('/make-user', function () {

  $admin = User::create([
    'name' => 'admin',
    'email' => 'admin@gmail.com',
    'password' => bcrypt(123456),
  ]);

  $admin->assignRole(['admin']);

  $staff = User::create([
    'name' => 'nhan vien',
    'email' => 'nhanvien@gmail.com',
    'password' => bcrypt(123456),
  ]);

  $staff->assignRole(['staff']);

  $rooMaster = User::create([
    'name' => 'chu tro',
    'email' => 'chutro@gmail.com',
    'password' => bcrypt(123456),
  ]);

  $rooMaster->assignRole(['room master']);

  // $roomGuest = User::create([
  //   'name' => 'khachthue',
  //   'email' => 'khachthue@gmail.com',
  //   'password' => bcrypt(123456),
  // ]);

  // $roomGuest->assignRole(['room guest']);
});



Route::post('upload/image', 'CkeditorController@upload')->name('ckeditor.upload');
