<?php

use App\Http\Controllers\Admin\AboutUsController;
use Illuminate\Support\Facades\Route;


use App\Http\Controllers\Admin\frontendController;
use App\Http\Controllers\Admin\CategoriesController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\frontend\FrontController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\frontend\CartController;
use App\Http\Controllers\frontend\CheckoutController;
use App\Http\Controllers\frontend\UserController;
use App\Http\Controllers\frontend\contactComplains;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\frontend\DistrictController;
use App\Http\Controllers\frontend\ProvinceController;
use App\Http\Controllers\Admin\SettingLogoController;
use App\Http\Controllers\Admin\SettingController;
use Illuminate\support\Facades\Mail;
use App\Mail\WelcomeMail;

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

Route::get('/', [FrontController::class,  'mainpage'])->name('home');
Route::get('/category', [FrontController::class,  'category']);
Route::get('danh-muc/{slug}', [FrontController::class,  'viewCategory'])->name('categories.detail');
Route::get('danh-muc/{slug}/tim-kiem', [FrontController::class,  'viewCategoryFilter'])->name('categories.filter');
Route::get('san-pham/{prod_slug}', [FrontController::class,  'eachProdView'])->name('product.detail');
Route::get('bai-viet', [FrontController::class, 'getListBlog'])->name('blogs.list');
Route::get('bai-viet/{slug}', [FrontController::class, 'showBlog'])->name('blogs.show');
Route::get('tags/{slug}', [FrontController::class, 'showTag'])->name('Tags.show');
Route::get('cua-hang', [FrontController::class, 'shop'])->name('shop.index');
Route::get('cua-hang/tim-kiem', [FrontController::class, 'shopFilter'])->name('shop.filter');
Route::post('ket-qua-tim-kiem', [FrontController::class, 'searchProduct'])->name('product.search');
Route::get('ve-chung-toi', [FrontController::class, 'AboutUs'])->name('aboutUs.client');
Route::get('ket-qua-tim-kiem', function () {
    return view('errors.404');
});

Auth::routes(['verify' => true]);

Route::get('/email', function () {
    Mail::to('mrmoiz1.dev@gmail.com')->send(new WelcomeMail());
    return new WelcomeMail();
});

Route::post('/district/{district}', [DistrictController::class, 'index']);
Route::post('/province/{province}', [ProvinceController::class, 'index']);
Route::post('add-to-cart', [CartController::class, 'addProduct']);
Route::post('delete-cart-item', [CartController::class, 'deleteProduct']);
Route::post('update-cart', [CartController::class, 'updateCart'])->name('cart.update');
Route::post('searchProduct', [FrontController::class, 'searchProducts']);

Route::get('contact', [contactComplains::class,  'index'])->name('contact');
Route::post('sendMessage', [contactComplains::class,  'submitForm'])->name('contact.message');
// Route::view('about', 'frontend.About')->name('about');

Route::get('cart', [CartController::class, 'viewCart'])->name('cart');

Route::middleware(['auth'])->group(function () {

    Route::get('thanh-toan', [CheckoutController::class, 'index'])->name('checkout');
    Route::post('place-order', [CheckoutController::class, 'placeOrder']);
    Route::get('don-hang-cua-toi', [UserController::class, 'index'])->name('my-order');
    Route::get('don-hang/{id}', [UserController::class, 'viewOrder'])->name('view-order');
    Route::get('xoa-don-hang/{id}', [UserController::class, 'removeOrder'])->name('remove-order');
});



// Admin DashBoard Routes
Route::middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('/dashboard', function () {
        return view('Admin.dashboard');
    });
});



Route::middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('/dashboard', 'App\Http\Controllers\Admin\frontendController@index');

    // Categories Routes

    Route::get('/categories', 'App\Http\Controllers\Admin\CategoriesController@index');
    Route::get('/add-category', 'App\Http\Controllers\Admin\CategoriesController@add');
    Route::post('insert-category', 'App\Http\Controllers\Admin\CategoriesController@insert');
    Route::get('edit-category/{id}', [CategoriesController::class, 'edit']);
    Route::put('update-category/{id}', [CategoriesController::class, 'update']);
    Route::delete('delete-category/{category}', [CategoriesController::class, 'destroy'])->name('category.destroy');


    // Product Routes
    Route::get('/products', 'App\Http\Controllers\Admin\ProductController@index');
    Route::get('/add-product', 'App\Http\Controllers\Admin\ProductController@add');
    Route::post('insert-product', 'App\Http\Controllers\Admin\ProductController@insert');
    Route::get('edit-product/{id}', [ProductController::class, 'edit']);
    Route::put('update-product/{id}', [ProductController::class, 'update']);
    Route::delete('delete-product/{id}', [ProductController::class, 'destroy'])->name('product.destroy');
    Route::put('update-order/{id}', [UserController::class, 'updateOrder']);

    Route::get('orders', [OrderController::class, 'index']);
    Route::get('admin/view-order/{id}', [OrderController::class, 'view']);
    Route::put('update-order/{id}', [OrderController::class, 'updateOrder']);
    Route::get('order-history', [OrderController::class, 'orderHistory']);

    Route::get('users', [DashboardController::class, 'users']);
    Route::get('view-user/{id}', [DashboardController::class, 'viewUser']);


    Route::get('message', [contactComplains::class, 'viewcomplains']);

    // Blog Routes
    Route::resource('blog', BlogController::class);

    // Tag Routes
    Route::resource('tag', TagController::class);

    //Slider Route
    Route::resource('slider', SliderController::class);


    //Setting logo Route
    Route::get('settings/logo', [SettingLogoController::class, 'editLogo'])->name('logo.edit');
    Route::put('settings/logo/update', [SettingLogoController::class, 'updateLogo'])->name('logo.update');
    Route::resource('/setting', SettingController::class);

    //About Us Route
    Route::resource('/about-us', AboutUsController::class);
});


Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});
