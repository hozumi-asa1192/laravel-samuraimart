<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WebController;
use App\Http\Middleware\NotSubscribed;
use App\Http\Middleware\Subscribed;
use App\Http\Controllers\SubscriptionController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/',[WebController::class,'index'])->name('web.index');


Route::middleware(['auth','verified'])->group(function () {

    Route::resource('shops',ShopController::class);

    Route::get('/shops/{shop}/reviews/create', [ReviewController::class, 'create'])->middleware([Subscribed::class])->name('reviews.create');
    Route::post('/shops/{shop}/reviews/store', [ReviewController::class, 'store'])->middleware([Subscribed::class])->name('reviews.store');

    Route::post('favorites/{shop_id}',[FavoriteController::class,'store'])->name('favorites.store');
    Route::delete('favorite/{shop_id}',[FavoriteController::class,'destroy'])->name('favorites.destroy');

    Route::controller(UserController::class)->group(function () {
         Route::get('users/mypage', 'mypage')->name('mypage');
         Route::get('users/mypage/edit', 'edit')->name('mypage.edit');
         Route::put('users/mypage', 'update')->name('mypage.update');
         Route::get('users/mypage/password/edit','edit_password')->name('mypage.edit_password');
         Route::put('users/mypage/password','update_password')->name('mypage.update_password');
         Route::get('users/mypage/favorite','favorite')->middleware([Subscribed::class])->name('mypage.favorite');
         Route::get('users/mypage/reservation', 'reservation')->middleware([Subscribed::class])->name('mypage.reservation');
     });

    Route::get('/shops/{shop}/reservations/create', [ReservationController::class, 'create'])->middleware([Subscribed::class])->name('reservations.create');
    Route::post('/shops/{shop}/reservations/store', [ReservationController::class, 'store'])->middleware([Subscribed::class])->name('reservations.store');
    Route::delete('reservation/{reservation_id}',[ReservationController::class,'destroy'])->name('reservations.destroy');

    Route::controller(SubscriptionController::class)->group(function () {
        Route::get('subscription/create', 'create')->middleware([NotSubscribed::class])->name('subscription.create');
        Route::post('subscription','store')->middleware([NotSubscribed::class])->name('subscription.store');
        Route::get('subscription/edit', 'edit')->middleware([Subscribed::class])->name('subscription.edit');
        Route::put('subscription', 'update')->middleware([Subscribed::class])->name('subscription.update');
        Route::get('subscription/cancel','cancel')->name('subscription.cancel');
        Route::delete('subscription','destroy')->name('subscription.destroy');
    });

});
require __DIR__.'/auth.php';
