<?php

use App\Http\Controllers\admin\loginController as adminLoginController;
use App\Http\Controllers\admin\userController as adminUserController;
use App\Http\Controllers\courier\loginController as courierLoginController;
use App\Http\Controllers\courier\homeController as courierHomeController;
use App\Http\Controllers\homeController;
use App\Http\Controllers\aboutController;
use App\Http\Controllers\addressController;
use App\Http\Controllers\admin\homeController as adminHomeController;
use App\Http\Controllers\admin\productController as adminProductController;
use App\Http\Controllers\admin\OrderController as adminOrderController;
use App\Http\Controllers\admin\ProfileController as adminProfileController;
// use App\Http\Controllers\admin\userController as adminUserController;
use App\Http\Controllers\authController;
use App\Http\Controllers\cartController;
use App\Http\Controllers\checkOutController;
use App\Http\Controllers\contactUsController;
use App\Http\Controllers\discoverController;
use App\Http\Controllers\orderController;
use App\Http\Controllers\productController;
use App\Http\Controllers\profileController;
use App\Models\address;
use Illuminate\Support\Facades\Route;

// USER HERE

Route::get('', [homeController::class, 'index'])->name('home');
Route::get('home', [homeController::class, 'index'])->name('home');

Route::get('about', [aboutController::class, 'index'])->name('about');

Route::get('register', [authController::class, 'register'])->name('register');
Route::post('register', [authController::class, 'store']);

Route::get('login', [authController::class, 'login'])->name('login');
Route::post('login', [authController::class, 'authenticate']);

Route::post('logout', [authController::class, 'logout'])->name('logout');

Route::get('product/{id}', [productController::class, 'productDetails'])->name('productDetail');

Route::get('discover', [discoverController::class, 'index'])->name('discover');

Route::get('contactUs', [contactUsController::class, 'contactUs'])->name('contactUs');
Route::get('contactUs_r', [contactUsController::class, 'contactUs_r'])->name('contactUs_r');
Route::post('submit-form', [contactUsController::class, 'submitForm'])->name('submitForm');


Route::get('order/{category?}', [orderController::class, 'index', ($category = "Current")])->name('order');
Route::get('orderdetail/{id}}', [orderController::class, 'detail'])->name('orderDetail');
Route::get('deleteOrder/{id}}', [orderController::class, 'delete'])->name('deleteOrder');
Route::get('refund/{id}}', [orderController::class, 'refund'])->name('refund');

Route::get('cart', [cartController::class, 'index'])->name('cart');
Route::get('add-cart/{id}', [cartController::class, 'addCart'])->name('cart.add');
Route::post('/cart/increment/{id}', [cartController::class, 'incrementCart'])->name('cart.increment');
Route::post('/cart/decrement/{id}', [cartController::class, 'decrementCart'])->name('cart.decrement');
Route::delete('cart/{id}', [cartController::class, 'destroy'])->name('cart.destroy');

Route::get('checkout', [CartController::class, 'checkout'])->name('checkout');
Route::post('add-order', [checkOutController::class, 'addOrder'])->name('checkout.add');

Route::get('/choose-address', [addressController::class, 'chooseAddress'])->name('address.chooseAddress');

Route::get('/address/{id}/edit', [addressController::class, 'edit'])->name('address.edit');
Route::get('/add-address', function () {
    return view('addAddress');
});
Route::put('/address/{id}/update', [addressController::class, 'update'])->name('address.update');

Route::get('/addresses', [addressController::class, 'index'])->name('address.index');
Route::get('/addresses/primary/{id}', [addressController::class, 'setPrimary'])->name('address.primary');
Route::get('/addresses/create', [addressController::class, 'create'])->name('address.create');
Route::post('/addresses/create', [addressController::class, 'store']);
Route::get('/addresses/{address}', [addressController::class, 'destroy'])->name('address.destroy');

// Route::get('/refund/{id}', [orderController::class, 'refund'])->name('order.refund');
Route::post('/refund/store/{id}', [orderController::class, 'storerefund'])->name('order.storeRefund');

Route::get('/profile', [profileController::class,'index'])->name('profile');
Route::get('/profile/edit', [profileController::class,'editPersonalData'])->name('profile.editPersonalData');
Route::post('/profile/updatePicture', [profileController::class,'updatePicture'])->name('profile.updatePicture');
Route::post('/profile/updatePersonalData', [profileController::class,'updatePersonalData'])->name('profile.updatePersonalData');



// ADMIN DOWN HERE

Route::group(['prefix' => 'admin'], function () {


    Route::group(['middleware' => 'admin.guest'], function () {
        Route::get('login', [adminLoginController::class, 'index'])->name('admin.login');
        Route::post('authenticate', [adminLoginController::class, 'authenticate'])->name('admin.authenticate');
    });


    Route::group(['middleware' => 'admin.auth'], function () {
        Route::get('home', [adminHomeController::class, 'index'])->name('admin.home');
        Route::post('logout', [adminLoginController::class, 'logout'])->name('admin.logout');
        Route::get('users', [adminUserController::class, 'index'])->name('admin.users');
        Route::get('banUsers/{userId}', [adminUserController::class, 'banUsers'])->name('admin.banUsers');
        Route::get('products', [adminProductController::class, 'index'])->name('admin.products');
        Route::post('addProducts', [adminProductController::class, 'store'])->name('admin.addProduct');
        Route::get('addProducts', [adminProductController::class, 'addProduct'])->name('admin.addProduct');
        Route::get('product/{product}', [adminProductController::class, 'destroy'])->name('admin.delete');
        Route::get('product/{product}/edit', [adminProductController::class, 'edit'])->name('admin.editProduct');
        Route::put('admin/product/{product}', [adminProductController::class, 'update'])->name('admin.updateProduct');
        Route::get('orderAdmin', [adminOrderController::class, 'index'])->name('admin.orderAdmin');
        Route::get('profileAdmin', [adminProfileController::class, 'index'])->name('admin.profileAdmin');
        Route::get('product/{product?}', [adminProductController::class, 'search'])->name('admin.searchProduct');
        Route::get('users/search', [adminUserController::class, 'search'])->name('admin.searchUsers');
        Route::get('orderAdmin', [adminOrderController::class, 'index'])->name('admin.orderAdmin');
        Route::get('/orderAdmin/search', [adminOrderController::class, 'search'])->name('admin.searchOrder');
        Route::get('orderAdmin/{id?}', [adminOrderController::class, 'detail'])->name('admin.orderDetail');
        Route::get('orderAdmin/{id?}/acc', [adminOrderController::class, 'accRefund'])->name('admin.accRefund');
        Route::get('orderAdmin/{id?}/rej', [adminOrderController::class, 'rejRefund'])->name('admin.rejRefund');
    });
});


// Courier Down Here

Route::group(['prefix' => 'courier'], function(){

    Route::group(['middleware' => 'courier.guest'], function () {
        Route::get('login', [courierLoginController::class, 'index'])->name('courier.login');
        Route::post('authenticate', [courierLoginController::class, 'authenticate'])->name('courier.authenticate');
    });


    Route::group(['middleware' => 'courier.auth'], function(){
        Route::get('home', [courierHomeController::class, 'index'])->name('courier.home');
        Route::get('home/update/{id?}', [courierHomeController::class, 'update'])->name('courier.update');
        Route::get('home/find', [courierHomeController::class, 'cari'])->name('courier.find');
        Route::post('logout', [courierLoginController::class, 'logout'])->name('courier.logout');
    });
});
