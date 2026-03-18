<?php

use Illuminate\Support\Facades\Route;
//FrontEndImports
    use App\Http\Controllers\frontend\HomeController;
    use App\Http\Controllers\frontend\ProductController;
    use App\Http\Controllers\frontend\ContactController;
    use App\Http\Controllers\frontend\CartController;
    use App\Http\Controllers\frontend\UserController;
//BackEndImports
    use App\Http\Controllers\backend\DashboardController;
    use App\Http\Controllers\backend\BEProductController;


//FrontEndRoutes
    //Home-Trang chủ

        Route::get('/', [HomeController::class,'index'])->name('site.home');
        Route::redirect('/home', '/phghuy_ltw2/public');
    
        //Product-Sản Phẩm

        Route::get('product', [ProductController::class,'index'])->name('site.product.index');
        Route::get('/product/{slug}', [ProductController::class,'detail'])->name('site.product.detail');
    
        //Contact-Liên hệ

        Route::get('contact',[ContactController::class,'index'])->name('site.contact.index');
        Route::post('contact',[ContactController::class,'store'])->name('site.contact.store');

        //Cart- Giỏ hàng

        Route::get('cart',[CartController::class,'index'])->name('site.cart.index');

        //Login - Đăng nhập

        Route::get('login',[UserController::class,'index'])->name('site.user.login');
//BackendAdmin-Quản lý admin

    Route::prefix('admin')->group(function(){
        Route::get('/',[DashboardController::class,'index'])->name('admin.dashboard');

        Route::prefix('product')->group(function(){
            Route::get('/',[ProductAdminController::class,'index'])->name('admin.product.index');
            Route::get('edit/{id}',[ProductAdminController::class,'edit'])->name('admin.product.edit');
        });
        Route::resource('products', ProductAdminController::class);
    });
