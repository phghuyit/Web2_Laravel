<?php

use App\Http\Controllers\backend\BannerController;
use App\Http\Controllers\backend\BrandController;
use App\Http\Controllers\backend\CategoriesController;
use App\Http\Controllers\backend\ContactController as ContactAdminController;
use App\Http\Controllers\backend\DashboardController;
use App\Http\Controllers\backend\MenuController;
use App\Http\Controllers\backend\OrderController;
use App\Http\Controllers\backend\PostController;
use App\Http\Controllers\backend\ProductAdminController;
// FrontEndImports
use App\Http\Controllers\backend\TopicController;
use App\Http\Controllers\backend\UserController as UserAdminController;
use App\Http\Controllers\frontend\CartController;
use App\Http\Controllers\frontend\ContactController;
use App\Http\Controllers\frontend\HomeController;
// BackEndImports
use App\Http\Controllers\frontend\ProductController;
use App\Http\Controllers\frontend\UserController;
use Illuminate\Support\Facades\Route;

// FrontEndRoutes
// Home-Trang chủ

Route::get('/', [HomeController::class, 'index'])->name('site.home');
Route::redirect('/home', '/phghuy_ltw2/public');

// Product-Sản Phẩm

Route::get('product', [ProductController::class, 'index'])->name('site.product.index');
Route::get('/product/{slug}', [ProductController::class, 'detail'])->name('site.product.detail');
// Contact-Liên hệ

Route::get('contact', [ContactController::class, 'index'])->name('site.contact.index');
Route::post('contact', [ContactController::class, 'store'])->name('site.contact.store');

// Cart- Giỏ hàng

Route::get('cart', [CartController::class, 'index'])->name('site.cart.index');

// Login - Đăng nhập

Route::get('login', [UserController::class, 'index'])->name('site.user.login');
// BackendAdmin-Quản lý admin

Route::prefix('admin')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('admin.dashboard');

    Route::prefix('product')->group(function () {
        Route::get('edit/{id}', [ProductAdminController::class, 'edit'])->name('admin.product.edit');
        Route::get('/trash', [ProductAdminController::class, 'trash'])->name('product.trash');
        Route::put('restore/{id}', [ProductAdminController::class, 'restore'])->name('admin.product.restore');
        Route::delete('delete/{id}', [ProductAdminController::class, 'delete'])->name('admin.product.del');
        Route::get('/show/{id}', [ProductAdminController::class, 'show'])->name('product.show');
    });
    Route::resource('product', ProductAdminController::class);

    Route::prefix('brand')->group(function () {
        Route::get('edit/{id}', [BrandController::class, 'edit'])->name('admin.brand.edit');
        Route::get('/trash', [BrandController::class, 'trash'])->name('brand.trash');
    });
    Route::resource('brand', BrandController::class);

    Route::prefix('cate')->group(function () {
        Route::get('edit/{id}', [CategoriesController::class, 'edit'])->name('cate.edit');
        Route::get('/trash', [CategoriesController::class, 'trash'])->name('cate.trash');
    });
    Route::resource('cate', CategoriesController::class);

    Route::prefix('contact')->group(function () {
        Route::get('edit/{id}', [ContactAdminController::class, 'edit'])->name('contact.edit');
        Route::get('/trash', [ContactAdminController::class, 'trash'])->name('contact.trash');
    });
    Route::resource('contact', ContactAdminController::class);

    Route::prefix('menu')->group(function () {
        Route::get('edit/{id}', [MenuController::class, 'edit'])->name('menu.edit');
        Route::get('/trash', [MenuController::class, 'trash'])->name('menu.trash');
    });
    Route::resource('menu', MenuController::class);

    Route::prefix('order')->group(function () {
        Route::get('edit/{id}', [OrderController::class, 'edit'])->name('order.edit');
        Route::get('/trash', [OrderController::class, 'trash'])->name('order.trash');
    });
    Route::resource('order', OrderController::class);

    Route::prefix('post')->group(function () {
        Route::get('edit/{id}', [PostController::class, 'edit'])->name('post.edit');
        Route::get('/trash', [PostController::class, 'trash'])->name('post.trash');
    });
    Route::resource('post', PostController::class);

    Route::prefix('topic')->group(function () {
        Route::get('edit/{id}', [TopicController::class, 'edit'])->name('topic.edit');
        Route::get('/trash', [TopicController::class, 'trash'])->name('topic.trash');
    });
    Route::resource('topic', TopicController::class);

    Route::prefix('user')->group(function () {
        Route::get('edit/{id}', [UserAdminController::class, 'edit'])->name('user.edit');
        Route::get('/trash', [UserAdminController::class, 'trash'])->name('user.trash');
    });
    Route::resource('user', UserAdminController::class);

    Route::prefix('banner')->group(function () {
        Route::get('edit/{id}', [BannerController::class, 'edit'])->name('banner.edit');
        Route::get('/trash', [BannerController::class, 'trash'])->name('banner.trash');
    });
    Route::resource('banner', BannerController::class);
});
