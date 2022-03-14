<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\DishController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\RestaurantController;
use App\Http\Controllers\UserController;
use App\Models\Cart;
use Illuminate\Support\Facades\Route;

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

Route::get('/' , [Controller::class, 'welcome'])->name('welcome');

Route::get('signup' , [UserController::class, 'signup'])->name('signup');
Route::post('signup' , [UserController::class, 'signupPost']);

Route::get('signin' , [UserController::class, 'signin'])->name('signin');
Route::post('signin' , [UserController::class, 'signinPost']);

Route::get('noaccess', [Controller::class , 'noaccessView'])->name('noaccess');

Route::middleware(['protectedPage'])->group(function () {

Route::get('lk' , [UserController::class, 'lk'])->name('lk');

Route::get('logout' , [UserController::class, 'logout'])->name('logout');

Route::get('DishList/{id}' , [DishController::class, 'DishList'])->name('DishList');
Route::post('DishList/{id}' , [DishController::class, 'DishListPost']);

Route::get('cart', [CartController::class , 'cartView'])->name('cart');
Route::post('cart' , [CartController::class, 'CartPost']);


Route::get('profile' , [UserController::class, 'profile'])->name('profile');
Route::post('profile' , [UserController::class, 'profilePost']);

Route::get('order' , [OrderController::class, 'OrderView'])->name('order');
Route::post('order' , [OrderController::class, 'OrderPost']);

Route::get('delete/{id}' , [Controller::class, 'DeleteView'])->name('delete');
Route::post('delete/{id}' , [Controller::class, 'DeleteCartPost']);

Route::get('/update/{id}', [UserController::class, 'update'])->name('update');
Route::post('/update/{id}', [UserController::class, 'updatePost']);

Route::get('/updatePassword/{id}', [UserController::class, 'updatePassword'])->name('updatePassword');
Route::post('/updatePassword/{id}', [UserController::class, 'updatePasswordPost']);

Route::get('accessOrder' , [OrderController::class, 'accessOrder'])->name('accessOrder');

Route::get('payment' , [OrderController::class, 'payment'])->name('payment');

Route::get('deleteOrder/{id}' , [UserController::class, 'deleteOrderView'])->name('deleteOrder');
Route::post('deleteOrder/{id}' , [UserController::class, 'deleteOrderPost']);

});

Route::middleware(['protectedAdmin'])->group(function () {

Route::get('admin' , [UserController::class, 'admin'])->name('admin');

Route::get('addRestaurant' , [RestaurantController::class, 'addRestaurant'])->name('addRestaurant');
Route::post('addRestaurant' , [RestaurantController::class, 'addRestaurantPost']);

Route::get('addDish' , [DishController::class, 'addDish'])->name('addDish');
Route::post('addDish' , [DishController::class, 'addDishPost']);

Route::get('updateOrder/{id}' , [UserController::class, 'updateOrderView'])->name('updateOrder');
Route::post('updateOrder/{id}' , [UserController::class, 'updateOrderPost']);

Route::get('updateRestaurant/{id}' , [RestaurantController::class, 'updateRestaurantView'])->name('updateRestaurant');
Route::post('updateRestaurant/{id}' , [RestaurantController::class, 'updateRestaurantPost']);

Route::get('dishUpdate/{id}' , [DishController::class, 'dishUpdateView'])->name('updateDish');
Route::post('dishUpdate/{id}' , [DishController::class, 'dishUpdatePost']);

Route::get('addTag' , [RestaurantController::class, 'addTag'])->name('addTag');
Route::post('addTag' , [RestaurantController::class, 'addTagPost']);
});