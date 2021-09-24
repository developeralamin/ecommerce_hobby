<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ContactController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SocialController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CouponContorller;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\CheckOutController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\WishListController;
use App\Http\Controllers\NewsLetterController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\VisitorController;


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

//Laravel Prevent Browser Back Button After Logout

Route::group(['middleware' => 'prevent-back-history'],function(){
  Auth::routes();
  



Route::get('login/github',[SocialController::class,'redirectToProvider'])->name('redirectToProvider');

Route::get('login/github/callback',[SocialController::class,'handleProviderCallback'])->name('handleProviderCallback');

Route::get('/', function () {
    return view('welcome');
});


//Start middlearee

Route::group(['middleware' => 'auth'],function(){



Route::prefix('visitor')->group(function (){

Route::get('/visitor',[VisitorController::class,'Visitorareaere'])->name('visitor');


});

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


Route::prefix('coupon')->group(function (){

Route::get('/coupon-view',[CouponContorller::class,'couponView'])->name('coupon.view');
Route::get('/coupon-add',[CouponContorller::class,'couponAdd'])->name('coupon.add');
Route::post('/coupon-store',[CouponContorller::class,'couponStore'])->name('coupon.store');
Route::get('/coupon-edit/{id}',[CouponContorller::class,'couponEdit'])->name('coupon.edit');
Route::post('/coupon-update/{id}',[CouponContorller::class,'couponUpdate'])->name('coupon.update');
Route::get('/coupon-delete/{id}',[CouponContorller::class,'couponDelete'])->name('coupon.delete');

Route::get('/coupon-inactive/{id}',[CouponContorller::class,'couponInActive'])->name('coupon.inactive');
Route::get('/coupon-active/{id}',[CouponContorller::class,'couponActive'])->name('coupon.active');

});




Route::prefix('newsletter')->group(function (){

Route::get('/news-view',[NewsLetterController::class,'newsView'])->name('news.view');
Route::get('/news-delete/{id}',[NewsLetterController::class,'newsDelete'])->name('news.delete');

Route::get('/contact-view',[NewsLetterController::class,'contactView'])->name('contact.view');
Route::get('/contact-delete/{id}',[NewsLetterController::class,'contactdelete'])->name('contact.delete');

});



//All Frontend Routes Here


});// End protected middleware all route here






Route::get('/all-product',[FrontendController::class,'AllProduct'])->name('AllProduct');

Route::get('/item/{slug}',[FrontendController::class,'SingleProduct'])->name('SingleProduct');

Route::get('/category-show/{cat_id}',[FrontendController::class,'CategoryWiseProduct'])->name('CategoryWiseProduct');


Route::post('/singel-cart-show/{product_id}',[FrontendController::class,'SingleCartProduct'])->name('SingleCartProduct');

Route::get('/cart-all',[FrontendController::class,'SingleCart'])->name('SingleCart');



//Cart Action here
// Route::get('/cart-show', [CartController::class, 'CouponApply'])->name('CouponShow');
// Route::get('/cart-show/{coupon}',[CartController::class,'CouponApply'])->name('CouponApply');

Route::get('/cart-show', [CartController::class, 'CartShow'])->name('CartShow');
Route::get('/cart-show/{coupon}', [CartController::class, 'CartShow'])->name('CartCoupon');



Route::get('/cart-delete/{cart_id}',[CartController::class,'DeleteCart'])->name('DeleteCart');
Route::post('/cart-update',[CartController::class,'SingleCartUpdate'])->name('SingleCartUpdate');


//checkoutcontroller
Route::get('/checkout',[CheckOutController::class,'CheckOut'])->name('CheckOut');
//PaymentController
Route::post('/payment',[PaymentController::class,'Payment'])->name('Payment');

//WishList Controller portion

Route::get('/wishlist/{product_id}',[WishListController::class,'WishList'])->name('wishlist');
Route::get('/wishlist-page',[WishListController::class,'WishListPage'])->name('WishListPage');
Route::get('/wishlist-Delete/{wishlist_id}',[WishListController::class,'WishListDelete'])->name('WishListDelete');







Route::get('/admin/dashboard', [App\Http\Controllers\AdminController::class, 'index'])->name('adminDashboard');

Route::get('/customer/dashboard', [App\Http\Controllers\CustomerController::class, 'index'])->name('customerDashboard');


//Customer profile settings route here

Route::prefix('settings')->group(function (){

Route::get('/customer/profile', [App\Http\Controllers\CustomerController::class, 'profile'])->name('customerProfile');

Route::get('/edit/profile/{id}', [App\Http\Controllers\CustomerController::class, 'Editprofile'])->name('EditcustomerProfile');

Route::post('/store_customer/profile/{id}', [App\Http\Controllers\CustomerController::class, 'Updateprofile'])->name('UpdatecustomerProfile');

Route::get('/customer-password/view',[CustomerController::class,'customerPasswordView'])->name('customerpassword.view');

Route::post('/customer-password/update',[CustomerController::class,'customerPasswordUpdate'])->name('customerpassword.update');


});


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/',[FrontendController::class,'FrontPage'])->name('FrontPage');

Route::get('/contact-single',[FrontendController::class,'ContactSingle'])->name('ContactSingle');
Route::post('/contact',[FrontendController::class,'ContactHere'])->name('ContactHere');

Route::post('/news-letter',[FrontendController::class,'news_letter'])->name('news_letter');
Route::get('/social_button',[FrontendController::class,'social_button'])->name('social_button');


Route::get('/Visitorarea',[FrontendController::class,'Visitorarea'])->name('Visitorarea');



});
////Laravel Prevent Browser Back Button After Logout