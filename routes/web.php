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
use App\Http\Controllers\Admin\HomeAdsController;
use App\Http\Controllers\Admin\HomeOfferController;
use App\Http\Controllers\Admin\OfferCategoryController;
use App\Http\Controllers\Admin\OfferController;
use App\Http\Controllers\Admin\BlogCategoryController;
use App\Http\Controllers\Admin\BlogPostController;
use App\Http\Controllers\Admin\NewCustomerOfferController;
use App\Http\Controllers\Admin\ShoppingCartOfferController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\CouponCodeController;
use App\Http\Controllers\Admin\FeatureController;
use App\Http\Controllers\Admin\ShippingCategoryController;
use App\Http\Controllers\Admin\EmployeesController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\UsersController;


use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\RolesController;

use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Frontend\ProductDetailController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\CheckOutController;
use App\Http\Controllers\Frontend\UserDashboardController;
use App\Http\Controllers\Frontend\PayPalController;
use App\Http\Controllers\Frontend\ShopByCategoryController;
use App\Http\Controllers\Frontend\ShopByBrandController;
use App\Http\Controllers\Frontend\BlogController;


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

Route::post('/updateCategorySort/{id}', [CategoryController::class, 'updateCategorySort'])->name('updateCategorySort');
Route::get('/viewCategoriess', [CategoryController::class, 'view'])->name('viewCategoriess');

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
    Route::get('/viewOfferCategories', [OfferCategoryController::class, 'index'])->name('viewOfferCategories');
    Route::get('/createOfferCategory', [OfferCategoryController::class, 'create'])->name('createOfferCategory');
    Route::post('/storeOfferCategory', [OfferCategoryController::class, 'store'])->name('storeOfferCategory');
    Route::get('/deleteOfferCategory/{id}', [OfferCategoryController::class, 'delete'])->name('deleteOfferCategory');
    Route::get('/editOfferCategory/{id}', [OfferCategoryController::class, 'edit'])->name('editOfferCategory');
    Route::post('/updateOfferCategory/{id}', [OfferCategoryController::class, 'update'])->name('updateOfferCategory');

// Offers
Route::get('/viewOffers', [OfferController::class, 'index'])->name('viewOffers');
Route::get('/addOffer', [OfferController::class, 'create'])->name('addOffer');
Route::post('/storeOffer', [OfferController::class, 'store'])->name('storeOffer');
Route::get('/deleteOffer/{id}', [OfferController::class, 'delete'])->name('deleteOffer');
Route::get('/editOffer/{id}', [OfferController::class, 'edit'])->name('editOffer');
Route::post('/updateOffer/{id}', [OfferController::class, 'update'])->name('updateOffer');


Route::get('/searchProduct', [ProductController::class, 'search'])->name('searchProduct');
Route::match(['get', 'post'],'/getSubCategories', [ProductController::class, 'subCategories'])->name('getSubCategories');


// Home Page Ads
Route::get('/createHomePageAds', [HomeAdsController::class, 'create'])->name('createHomePageAds');
Route::post('/storeHomePageAds', [HomeAdsController::class, 'store'])->name('storeHomePageAds');
Route::get('/editHomePageAds', [HomeAdsController::class, 'edit'])->name('editHomePageAds');
Route::post('/updateHomePageAds', [HomeAdsController::class, 'update'])->name('updateHomePageAds');
Route::post('/deleteHomePageAd', [HomeAdsController::class, 'delete'])->name('deleteHomePageAd');


// Home Page Offer
Route::get('/createHomePageOffer', [HomeOfferController::class, 'create'])->name('createHomePageOffer');
Route::post('/storeHomePageOffer', [HomeOfferController::class, 'store'])->name('storeHomePageOffer');
Route::get('/editHomePageOffer', [HomeOfferController::class, 'edit'])->name('editHomePageOffer');
Route::post('/updateHomePageOffer', [HomeOfferController::class, 'update'])->name('updateHomePageOffer');




// Newly Signup Customer Offers
Route::get('/viewNewlySignUpCustomerOffers', [NewCustomerOfferController::class, 'index'])->name('viewNewlySignUpCustomerOffers');
Route::get('/createNewCustomerOffer', [NewCustomerOfferController::class, 'create'])->name('createNewCustomerOffer');
Route::post('/storeNewCustomerOffer', [NewCustomerOfferController::class, 'store'])->name('storeNewCustomerOffer');
Route::get('/deleteNewCustomerOffer/{id}', [NewCustomerOfferController::class, 'delete'])->name('deleteNewCustomerOffer');
Route::get('/editNewCustomerOffer/{id}', [NewCustomerOfferController::class, 'edit'])->name('editNewCustomerOffer');
Route::post('/updateNewCustomerOffer/{id}', [NewCustomerOfferController::class, 'update'])->name('updateNewCustomerOffer');


// Shopping Cart Offers
Route::get('/viewShoppingCartOffers', [ShoppingCartOfferController::class, 'index'])->name('viewShoppingCartOffers');
Route::get('/createShoppingCartOffer', [ShoppingCartOfferController::class, 'create'])->name('createShoppingCartOffer');
Route::post('/storeShoppingCartOffer', [ShoppingCartOfferController::class, 'store'])->name('storeShoppingCartOffer');
Route::get('/deleteShoppingCartOffer/{id}', [ShoppingCartOfferController::class, 'delete'])->name('deleteShoppingCartOffer');
Route::get('/editShoppingCartOffer/{id}', [ShoppingCartOfferController::class, 'edit'])->name('editShoppingCartOffer');
Route::post('/updateShoppingCartOffer/{id}', [ShoppingCartOfferController::class, 'update'])->name('updateShoppingCartOffer');

// Coupon Codes
Route::get('/viewCouponCodes', [CouponCodeController::class, 'index'])->name('viewCouponCodes');
Route::get('/createCouponCode', [CouponCodeController::class, 'create'])->name('createCouponCode');
Route::post('/storeCouponCode', [CouponCodeController::class, 'store'])->name('storeCouponCode');
Route::get('/deleteCouponCode/{id}', [CouponCodeController::class, 'delete'])->name('deleteCouponCode');
Route::get('/editCouponCode/{id}', [CouponCodeController::class, 'edit'])->name('editCouponCode');
Route::post('/updateCouponCode/{id}', [CouponCodeController::class, 'update'])->name('updateCouponCode');

// Blog Categories
Route::get('/viewBlogCategories', [BlogCategoryController::class, 'index'])->name('viewBlogCategories');
Route::get('/createBlogCategory', [BlogCategoryController::class, 'create'])->name('createBlogCategory');
Route::post('/storeBlogCategory', [BlogCategoryController::class, 'store'])->name('storeBlogCategory');
Route::get('/deleteBlogCategory/{id}', [BlogCategoryController::class, 'delete'])->name('deleteBlogCategory');
Route::get('/editBlogCategory/{id}', [BlogCategoryController::class, 'edit'])->name('editBlogCategory');
Route::post('/updateBlogCategory/{id}', [BlogCategoryController::class, 'update'])->name('updateBlogCategory');


// Blog Categories
Route::get('/viewBlogPosts', [BlogPostController::class, 'index'])->name('viewBlogPosts');
Route::get('/addBlogPost', [BlogPostController::class, 'create'])->name('addBlogPost');
Route::post('/storeBlogPost', [BlogPostController::class, 'store'])->name('storeBlogPost');
Route::get('/deleteBlogPost/{id}', [BlogPostController::class, 'delete'])->name('deleteBlogPost');
Route::get('/editBlogPost/{id}', [BlogPostController::class, 'edit'])->name('editBlogPost');
Route::post('/updateBlogPost/{id}', [BlogPostController::class, 'update'])->name('updateBlogPost');
Route::match(['get', 'post'],'/getBlogSubCategories', [BlogPostController::class, 'subCategories'])->name('getBlogSubCategories');


// Blog Categories
Route::get('/viewCustomers', [CustomerController::class, 'index'])->name('viewCustomers');
Route::get('/deleteCustomer/{id}', [CustomerController::class, 'delete'])->name('deleteCustomer');
Route::get('/searchCustomer', [CustomerController::class, 'search'])->name('searchCustomer');


// Frontend Routes 
Route::post('filterByCategory', [FrontendController::class, 'filterByCategory'])->name('filterByCategory');



// Cart
Route::get('viewCart', [CartController::class, 'index'])->name('viewCart');
Route::get('add-to-cart', [CartController::class, 'addToCart'])->name('add.to.cart');
Route::patch('update-cart', [CartController::class, 'update'])->name('update.cart');
Route::post('remove-from-cart', [CartController::class, 'remove'])->name('remove.from.cart');

// Product Detail
Route::get('product/{slug}', [ProductDetailController::class, 'productDetail'])->name('productDetail');
Route::get('allProducts', [ProductDetailController::class, 'allProducts'])->name('allProducts');
Route::get('filter.by.product.pack', [ProductDetailController::class, 'filterByProductPack'])->name('filter.by.product.pack');


// User Dashboard
Route::get('myDashboard', [UserDashboardController::class, 'index'])->name('myDashboard');
Route::get('myProfile', [UserDashboardController::class, 'myProfile'])->name('myProfile');
Route::get('changePassword', [UserDashboardController::class, 'changePassword'])->name('changePassword');
Route::get('manageAddress', [UserDashboardController::class, 'manageAddress'])->name('manageAddress');
Route::get('myOrders', [UserDashboardController::class, 'myOrders'])->name('myOrders');
Route::get('invoice/{invoice_number}', [UserDashboardController::class, 'invoice'])->name('invoice');

// Shop By Category || Brand
Route::get('category/{slug}', [ShopByCategoryController::class, 'index'])->name('shop.by.category');
Route::get('brand/{slug}', [ShopByBrandController::class, 'index'])->name('shop.by.brand');

// Blog Detail
Route::get('single_category_blog/{id}', [BlogController::class, 'singleCategoryBlog'])->name('single.category.blog');


// Food Federation
Route::get('the-organic-food-federation', [FrontendController::class, 'organicFoodFederation'])->name('the-organic-food-federation');
Route::get('usda-organic', [FrontendController::class, 'usdaOrganic'])->name('usda-organic');
Route::get('soil-association-organic', [FrontendController::class, 'soilAssociationOrganic'])->name('soil-association-organic');

// Cookie
Route::get('cookie', [FrontendController::class, 'cookie'])->name('cookie');

// Checkout
Route::get('checkout', [CheckOutController::class, 'index'])->name('checkout');

// paypal
Route::get('payment', [PayPalController::class, 'payment'])->name('payment');
Route::get('cancel', [PayPalController::class, 'cancel'])->name('payment.cancel');
Route::get('payment/success', [PayPalController::class, 'success'])->name('payment.success');