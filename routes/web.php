<?php

// BackEndImports
use App\Http\Controllers\backend\AuthController;
use App\Http\Controllers\backend\BannerController;
use App\Http\Controllers\backend\BrandController;
use App\Http\Controllers\backend\CategoriesController;
use App\Http\Controllers\backend\ContactController as ContactAdminController;
use App\Http\Controllers\backend\DashboardController;
use App\Http\Controllers\backend\MenuController;
use App\Http\Controllers\backend\OrderController;
use App\Http\Controllers\backend\PostController;
// FrontEndImports
use App\Http\Controllers\backend\ProductAdminController;
use App\Http\Controllers\backend\TopicController;
use App\Http\Controllers\backend\UserController as UserAdminController;
use App\Http\Controllers\frontend\CartController;
use App\Http\Controllers\frontend\ContactController;
use App\Http\Controllers\frontend\HomeController;
use App\Http\Controllers\frontend\ProductController;
use App\Http\Controllers\frontend\UserController;
use App\Http\Middleware\LoginAdmin;
use Illuminate\Support\Facades\Route;

// FrontEndRoutes
Route::group([], function () {
    // Home-Trang chủ
    Route::get('/', [HomeController::class, 'index'])->name('site.home');
    Route::redirect('/home', '/phghuy_ltw2/public');

    // Product-Sản Phẩm
    Route::get('product', [ProductController::class, 'index'])->name('site.product.index');
    Route::get('/product/{slug}', [ProductController::class, 'detail'])->name('site.product.detail');
    Route::get('/live-search', [ProductController::class, 'liveSearch'])->name('site.liveSearch');

    // Contact-Liên hệ
    Route::get('aboutUs', [ContactController::class, 'aboutUs'])->name('site.contact.aboutUs');
    Route::get('contact', [ContactController::class, 'index'])->name('site.contact.index');
    Route::post('contact', [ContactController::class, 'store'])->name('site.contact.store');

    // Cart- Giỏ hàng
    Route::prefix('cart')->group(function () {
        Route::get('/', [CartController::class, 'index'])->name('site.cart.index');
        Route::post('add', [CartController::class, 'addcart'])->name('site.cart.add');
        Route::post('update', [CartController::class, 'updatecart'])->name('site.cart.update');
        Route::get('del/{id}', [CartController::class, 'delcart'])->name('site.cart.del');
        Route::get('delall', [CartController::class, 'delallcart'])->name('site.cart.delall');
    });

    // Login - Đăng nhập
    Route::get('login', [UserController::class, 'index'])->name('login');
    Route::post('login', [UserController::class, 'doLogin'])->name('site.user.dologin');
    Route::get('register', [UserController::class, 'signup'])->name('site.user.register');
    Route::post('register', [UserController::class, 'doRegister'])->name('site.user.doregister');
    Route::get('signup', [UserController::class, 'signup'])->name('site.user.signup');
    Route::get('forgot', [UserController::class, 'forgot'])->name('site.user.forgot');

    // Frontend Routes protected by Auth
    Route::middleware('auth:web')->group(function () {
        Route::get('checkout', [CartController::class, 'checkout'])->name('site.cart.checkout');
        Route::post('checkout', [CartController::class, 'docheckout'])->name('site.cart.docheckout');
        Route::get('checkout/thanks', [CartController::class, 'thanks'])->name('site.cart.thanks');

        Route::post('logout', [UserController::class, 'logout'])->name('site.user.logout');
        Route::get('profile', [UserController::class, 'profile'])->name('site.user.profile');
    });
});

// BackendAdmin-Quản lý admin
Route::prefix('admin')->group(function () {
    Route::get('login', [AuthController::class, 'login'])->name('admin.login');
    Route::post('login', [AuthController::class, 'doLogin'])->name('admin.doLogin');
});

Route::prefix('admin')->middleware(LoginAdmin::class)->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::post('logout', [AuthController::class, 'logout'])->name('admin.logout');
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
        Route::put('restore/{id}', [BrandController::class, 'restore'])->name('brand.restore');
        Route::delete('delete/{id}', [BrandController::class, 'delete'])->name('brand.del');
    });
    Route::resource('brand', BrandController::class);

    Route::prefix('cate')->group(function () {
        Route::get('edit/{id}', [CategoriesController::class, 'edit'])->name('cate.edit');
        Route::get('/trash', [CategoriesController::class, 'trash'])->name('cate.trash');
        Route::put('restore/{id}', [CategoriesController::class, 'restore'])->name('cate.restore');
        Route::delete('delete/{id}', [CategoriesController::class, 'delete'])->name('cate.del');
    });
    Route::resource('cate', CategoriesController::class);

    Route::prefix('contact')->group(function () {
        Route::get('edit/{id}', [ContactAdminController::class, 'edit'])->name('contact.edit');
        Route::get('/trash', [ContactAdminController::class, 'trash'])->name('contact.trash');
        Route::put('restore/{id}', [ContactAdminController::class, 'restore'])->name('contact.restore');
        Route::delete('delete/{id}', [ContactAdminController::class, 'delete'])->name('contact.del');
    });
    Route::resource('contact', ContactAdminController::class);

    Route::prefix('menu')->group(function () {
        Route::get('edit/{id}', [MenuController::class, 'edit'])->name('menu.edit');
        Route::get('/trash', [MenuController::class, 'trash'])->name('menu.trash');
        Route::put('restore/{id}', [MenuController::class, 'restore'])->name('menu.restore');
        Route::delete('delete/{id}', [MenuController::class, 'delete'])->name('menu.del');
    });
    Route::resource('menu', MenuController::class);

    Route::prefix('order')->group(function () {
        Route::get('edit/{id}', [OrderController::class, 'edit'])->name('order.edit');
        Route::get('/finish', [OrderController::class, 'finish'])->name('order.finish');
        Route::get('/trash', [OrderController::class, 'trash'])->name('order.trash');
        Route::put('restore/{id}', [OrderController::class, 'restore'])->name('order.restore');
        Route::delete('delete/{id}', [OrderController::class, 'delete'])->name('order.del');
    });
    Route::resource('order', OrderController::class);

    Route::prefix('post')->group(function () {
        Route::get('edit/{id}', [PostController::class, 'edit'])->name('post.edit');
        Route::get('/trash', [PostController::class, 'trash'])->name('post.trash');
        Route::put('restore/{id}', [PostController::class, 'restore'])->name('post.restore');
        Route::delete('delete/{id}', [PostController::class, 'delete'])->name('post.del');
        Route::get('/show/{id}', [PostController::class, 'show'])->name('post.show');
    });
    Route::resource('post', PostController::class);

    Route::prefix('topic')->group(function () {
        Route::get('edit/{id}', [TopicController::class, 'edit'])->name('topic.edit');
        Route::get('/trash', [TopicController::class, 'trash'])->name('topic.trash');
        Route::put('restore/{id}', [TopicController::class, 'restore'])->name('topic.restore');
        Route::delete('delete/{id}', [TopicController::class, 'delete'])->name('topic.del');
    });
    Route::resource('topic', TopicController::class);

    Route::prefix('user')->group(function () {
        Route::get('edit/{id}', [UserAdminController::class, 'edit'])->name('user.edit');
        Route::get('/trash', [UserAdminController::class, 'trash'])->name('user.trash');
        Route::put('restore/{id}', [UserAdminController::class, 'restore'])->name('user.restore');
        Route::delete('delete/{id}', [UserAdminController::class, 'delete'])->name('user.del');
    });
    Route::resource('user', UserAdminController::class);

    Route::prefix('banner')->group(function () {
        Route::get('edit/{id}', [BannerController::class, 'edit'])->name('banner.edit');
        Route::get('/trash', [BannerController::class, 'trash'])->name('banner.trash');
        Route::put('restore/{id}', [BannerController::class, 'restore'])->name('banner.restore');
        Route::delete('delete/{id}', [BannerController::class, 'delete'])->name('banner.del');
    });
    Route::resource('banner', BannerController::class);

});
