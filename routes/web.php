<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\OfferCategoryController;
use App\Http\Controllers\Admin\OfferController;
use App\Http\Controllers\Admin\FeatureController;
use App\Http\Controllers\Admin\ShippingCategoryController;
use App\Http\Controllers\Admin\EmployeesController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\UsersController;


use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\RolesController;

use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\CheckOutController;

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

Auth::routes();


Route::get('/', [FrontendController::class, 'index'])->name('home');

Route::match(['get', 'post'],'/admin', [LoginController::class, 'adminLogin'])->name('admin');
Route::match(['get', 'post'],'/adminLogout', [LoginController::class, 'adminLogout'])->name('adminLogout');
Route::match(['get', 'post'],'/login', [LoginController::class, 'login'])->name('login');
Route::match(['get', 'post'],'/register', [RegisterController::class, 'register'])->name('register');

// Forgot Password
Route::match(['get', 'post'],'/forgot-password', [ForgotPasswordController::class, 'forgotPassword'])->name('forgotPassword');
Route::get('/reset-password/{token}', [ResetPasswordController::class, 'resetPassword'])->name('passwordReset');
Route::post('/reset-password', [ResetPasswordController::class, 'updatePassword'])->name('updatePassword');


// Brands
Route::get('/viewBrands', [BrandController::class, 'index'])->name('viewBrands');
Route::get('/addBrand', [BrandController::class, 'add'])->name('addBrand');
Route::post('/storeBrand', [BrandController::class, 'store'])->name('storeBrand');
Route::get('/deleteBrand/{id}', [BrandController::class, 'delete'])->name('deleteBrand');
Route::get('/editBrand/{id}', [BrandController::class, 'edit'])->name('editBrand');
Route::post('/updateBrand/{id}', [BrandController::class, 'update'])->name('updateBrand');

// Features
Route::get('/viewFeatures', [FeatureController::class, 'index'])->name('viewFeatures');
Route::get('/addFeature', [FeatureController::class, 'add'])->name('addFeature');
Route::post('/storeFeature', [FeatureController::class, 'store'])->name('storeFeature');
Route::get('/deleteFeature/{id}', [FeatureController::class, 'delete'])->name('deleteFeature');
Route::get('/editFeature/{id}', [FeatureController::class, 'edit'])->name('editFeature');
Route::post('/updateFeature/{id}', [FeatureController::class, 'update'])->name('updateFeature');

// Shipping Category
Route::get('/viewShippingCategories', [ShippingCategoryController::class, 'index'])->name('viewShippingCategories');
Route::get('/addShippingCategory', [ShippingCategoryController::class, 'add'])->name('addShippingCategory');
Route::post('/storeShippingCategory', [ShippingCategoryController::class, 'store'])->name('storeShippingCategory');
Route::get('/deleteShippingCategory/{id}', [ShippingCategoryController::class, 'delete'])->name('deleteShippingCategory');
Route::get('/editShippingCategory/{id}', [ShippingCategoryController::class, 'edit'])->name('editShippingCategory');
Route::post('/updateShippingCategory/{id}', [ShippingCategoryController::class, 'update'])->name('updateShippingCategory');


Route::get('/addCategory', [CategoryController::class, 'add'])->name('addCategory');

Route::group(['namespace' => 'Admin', 'middleware' => ['auth','permission']], function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

// Categories
    Route::get('/viewCategories', [CategoryController::class, 'index'])->name('viewCategories');
    Route::post('/storeCategory', [CategoryController::class, 'store'])->name('storeCategory');
    Route::get('/deleteCategory/{id}', [CategoryController::class, 'delete'])->name('deleteCategory');
    Route::get('/editCategory/{id}', [CategoryController::class, 'edit'])->name('editCategory');
    Route::post('/updateCategory/{id}', [CategoryController::class, 'update'])->name('updateCategory');

// Products
    Route::get('/viewProducts', [ProductController::class, 'index'])->name('viewProducts');
    Route::get('/createProduct', [ProductController::class, 'create'])->name('createProduct');
    Route::post('/storeProduct', [ProductController::class, 'store'])->name('storeProduct');
    Route::get('/deleteProduct/{id}', [ProductController::class, 'delete'])->name('deleteProduct');
    Route::get('/editProduct/{id}', [ProductController::class, 'edit'])->name('editProduct');
    Route::post('/updateProduct/{id}', [ProductController::class, 'update'])->name('updateProduct');
    


// users
    Route::group(['prefix' => 'users'], function() {
        Route::get('/', [UsersController::class, 'index'])->name('users.index');
        Route::get('/create', [UsersController::class, 'create'])->name('users.create');
        Route::post('/create', [UsersController::class, 'store'])->name('users.store');
// Route::get('/{user}/show', 'UsersController@show')->name('users.show');
        Route::get('/{user}/edit', [UsersController::class, 'edit'])->name('users.edit');
        Route::patch('/{user}/update', [UsersController::class, 'update'])->name('users.update');
        Route::match(['get', 'post'],'/{user}/delete', [UsersController::class, 'destroy'])->name('users.destroy');
    });


// Permissions

    Route::resource('permissions', PermissionsController::class);

    Route::group(['prefix' => 'roles'], function() {
        Route::get('/', [RolesController::class, 'index'])->name('roles.index');
        Route::get('/create', [RolesController::class, 'create'])->name('roles.create');
        Route::post('/create', [RolesController::class, 'store'])->name('roles.store');
        Route::get('/{role}/show', [RolesController::class, 'show'])->name('roles.show');
        Route::get('/{role}/edit', [RolesController::class, 'edit'])->name('roles.edit');
        Route::patch('/{role}/update', [RolesController::class, 'update'])->name('roles.update');
        Route::match(['get','post'],'/{role}/delete', [RolesController::class, 'destroy'])->name('roles.destroy');
    });
// Orders
    Route::get('/orders', [OrderController::class, 'index'])->name('orders');
    Route::get('/orderDetails/{id}', [OrderController::class, 'orderDetails'])->name('orderDetails');
});


// Offer Category
    Route::get('/offerCategories', [OfferCategoryController::class, 'index'])->name('offerCategories');
    Route::get('/createOfferCategory', [OfferCategoryController::class, 'create'])->name('createOfferCategory');
    Route::post('/storeOfferCategory', [OfferCategoryController::class, 'store'])->name('storeOfferCategory');
    Route::get('/deleteOfferCategory/{id}', [OfferCategoryController::class, 'delete'])->name('deleteOfferCategory');
    Route::get('/editOfferCategory/{id}', [OfferCategoryController::class, 'edit'])->name('editOfferCategory');
    Route::post('/updateOfferCategory/{id}', [OfferCategoryController::class, 'update'])->name('updateOfferCategory');

// Offers
Route::get('/offers', [OfferController::class, 'index'])->name('offers');
Route::get('/createOffer', [OfferController::class, 'create'])->name('createOffer');
Route::post('/storeOffer', [OfferController::class, 'store'])->name('storeOffer');
Route::get('/deleteOffer/{id}', [OfferController::class, 'delete'])->name('deleteOffer');
Route::get('/editOffer/{id}', [OfferController::class, 'edit'])->name('editOffer');
Route::post('/updateOffer/{id}', [OfferController::class, 'update'])->name('updateOffer');


Route::get('/searchProduct', [ProductController::class, 'search'])->name('searchProduct');
Route::match(['get', 'post'],'/getSubCategories', [ProductController::class, 'subCategories'])->name('getSubCategories');




// Frontend Routes 

// Route::get('/cart', [CartController::class, 'index'])->name('cart');
// Route::get('add.to.cart/{id}', [CartController::class, 'addToCart'])->name('addToCart');
// Route::patch('update-cart', [CartController::class, 'update'])->name('update.cart');
// Route::delete('remove-from-cart', [CartController::class, 'remove'])->name('remove.from.cart');
// Route::get('category/{catId}', [FrontendController::class, 'filterByCategory'])->name('filterByCategory');