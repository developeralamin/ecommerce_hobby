<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SocialController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\ProductController;


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

// Socialite Login in Website
// Socialite Login in Website

Route::get('login/github',[SocialController::class,'redirectToProvider'])->name('redirectToProvider');

Route::get('login/github/callback',[SocialController::class,'handleProviderCallback'])->name('handleProviderCallback');

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('users')->group(function (){

Route::get('/view',[UserController::class,'UserView'])->name('user.view');
Route::get('/add',[UserController::class,'UserAdd'])->name('user.add');
Route::post('/store',[UserController::class,'UserStore'])->name('user.store');
Route::get('/edit/{id}',[UserController::class,'UserEdit'])->name('user.edit');
Route::post('/update/{id}',[UserController::class,'UserUpdate'])->name('user.update');
Route::get('/delete/{id}',[UserController::class,'UserDelete'])->name('user.delete');

});

Route::prefix('profile')->group(function (){

Route::get('/view',[ProfileController::class,'ViewProfile'])->name('profile.view');
Route::get('/edit',[ProfileController::class,'EditProfile'])->name('profile.edit');
Route::post('/store',[ProfileController::class,'StoreProfile'])->name('profile.store');
Route::get('/password/view',[ProfileController::class,'PasswordView'])->name('password.view');
Route::post('/password/update',[ProfileController::class,'PasswordUpdate'])->name('password.update');

});


Route::prefix('category')->group(function (){

Route::get('/view',[CategoryController::class,'CategoryView'])->name('category.view');
Route::get('/add',[CategoryController::class,'CategoryAdd'])->name('category.add');
Route::post('/store',[CategoryController::class,'CategoryStore'])->name('category.store');
Route::get('/edit/{id}',[CategoryController::class,'CategoryEdit'])->name('category.edit');
Route::post('/update/{id}',[CategoryController::class,'CategoryUpdate'])->name('category.update');
Route::get('/delete/{id}',[CategoryController::class,'CategoryDelete'])->name('category.delete');

});


Route::prefix('subcategory')->group(function (){

Route::get('/view',[SubCategoryController::class,'subcategoryView'])->name('subcategory.view');
Route::get('/add',[SubCategoryController::class,'subcategoryAdd'])->name('subcategory.add');
Route::post('/store',[SubCategoryController::class,'subcategoryStore'])->name('subcategory.store');
Route::get('/edit/{id}',[SubCategoryController::class,'subcategoryEdit'])->name('subcategory.edit');
Route::post('/update/{id}',[SubCategoryController::class,'subcategoryUpdate'])->name('subcategory.update');
Route::get('/delete/{id}',[SubCategoryController::class,'subcategoryDelete'])->name('subcategory.delete');

});

//product all routes here


Route::prefix('product')->group(function (){

Route::get('/view',[ProductController::class,'ProductView'])->name('product.view');
Route::get('/add',[ProductController::class,'ProductAdd'])->name('product.add');
Route::post('/store',[ProductController::class,'ProductStore'])->name('product.store');
Route::get('/edit/{id}',[ProductController::class,'ProductEdit'])->name('product.edit');
Route::post('/update/{id}',[ProductController::class,'ProductUpdate'])->name('product.update');
Route::get('/delete/{id}',[ProductController::class,'ProductDelete'])->name('product.delete');

});
