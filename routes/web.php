<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\adminController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\UserController;

use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\TagController;

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

// Route::get('/', function () {
//     return view('welcome');
// });


//cart controller
Route::get('cart', [CartController::class, 'cartList'])->name('cart.list');
Route::post('cart', [CartController::class, 'addToCart'])->name('cart.store');
Route::post('update-cart', [CartController::class, 'updateCart'])->name('cart.update');
Route::post('remove', [CartController::class, 'removeCart'])->name('cart.remove');
Route::post('clear', [CartController::class, 'clearAllCart'])->name('cart.clear');

//Route::get('cart', [App\Http\Controllers\ProductController::class, 'totalcart'])->name('cart');

Route::get('add/to/cart/{id}', [App\Http\Controllers\ProductController::class, 'cart'])->name('add/to/cart');

Route::get('single/{id}', [App\Http\Controllers\ProductController::class, 'singleproduct'])->name('single');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('product' , ProductController::class);
Route::resource('/category' , CategoryController::class );


Route::group(['prefix'=>'admin'], function () {
    Route::group(['middleware'=>'guest:admin'] , function(){
    Route::view('login', 'admin.login')->name('admin.login');
    Route::post('/login', [App\Http\Controllers\AdminController::class, 'login'])->name('admin.login');

   
    // Admin Auth Routes
});

    Route::group(['middleware'=>'admin.auth'] , function(){
        route::view('home' , 'admin.home')->name('admin.home');

        Route::post('/logout', [App\Http\Controllers\AdminController::class, 'logout'])->name('admin.logout');

         Route::get('/home','App\Http\Controllers\Admin\HomeController@index')->name('admin.home');
    // Users Routes
    Route::resource('/user','App\Http\Controllers\Admin\UserController');
    
    // Roles Routes
    Route::resource('/role','App\Http\Controllers\Admin\RoleController');
    // Permission Routes
    Route::resource('/permission','App\Http\Controllers\Admin\PermissionController');
    // Post Routes
    Route::resource('/post','App\Http\Controllers\Admin\PostController');
    // Tag Routes
    Route::resource('/tag','App\Http\Controllers\Admin\TagController');
    // Category Routes
    Route::resource('/category','App\Http\Controllers\Admin\CategoryController');

        
    });
});

// User Routes
Route::group(['prefix' => ''],function(){
    Route::get('/','App\Http\Controllers\HomeController@index');
    Route::get('post/{post}','App\Http\Controllers\user\PostController@post')->name('post');

    Route::get('post/tag/{tag}','App\Http\Controllers\user\HomeController@tag')->name('tag');
    Route::get('post/category/{category}','App\Http\Controllers\user\HomeController@category')->name('category');

    //vue routes
    Route::post('getPosts','App\Http\Controllers\user\PostController@getAllPosts');
    Route::post('saveLike','App\Http\Controllers\user\PostController@saveLike');
});
