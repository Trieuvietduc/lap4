<?php

use App\Http\Controllers\Authcontroller;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RoomController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\UserController;
use App\Models\Product;

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

Route::get('/', function () {
    return view('welcome');
});
Route::get('home', function(){
   return view('home');
});

Route::middleware('admin')->prefix('/users')->name('users.')->group(function () {
    Route::get('/', [UserController::class, 'index'])->name('list');
    Route::post('search', [UserController::class, 'search'])->name('search');
    Route::delete('/delete/{id}',[UserController::class, 'delete'] )->name('delete');
    Route::get('/create',[UserController::class, 'create'] )->name('create');
    Route::post('/store',[UserController::class, 'store'] )->name('store');
    Route::get('/edit/{id}',[UserController::class, 'edit'] )->name('edit');
    Route::post('/update/{user}',[UserController::class, 'update'] )->name('update');
});
Route::middleware('admin')->prefix('/products')->name('products.')->group(function(){
    Route::get('/', [ProductController::class, 'index'])->name('list');
    Route::get('/create', [ProductController::class, 'create'])->name('create');
    Route::post('/store', [ProductController::class, 'store'])->name('store');
    Route::delete('/delete/{id}',[ProductController::class, 'delete'] )->name('delete');
    Route::get('/status/{product}',[ProductController::class, 'status'] )->name('status');
    Route::get('/search',[ProductController::class, 'search'] )->name('search');
});
Route::prefix('/room')->name('room.')->group(function(){
    Route::get('/',[RoomController::class,'list'])->name('room_list')->middleware('auth');
});
Route::middleware('guest')->prefix('/auth')->name('auth.')->group(function(){
    Route::get('/login',[Authcontroller::class,'list'])->name('getlogin');
    Route::post('/login',[Authcontroller::class,'post'])->name('postlogin')->middleware('admin');
    Route::get('/register',[Authcontroller::class,'registerindex'])->name('getregister');
    Route::post('/register/add',[Authcontroller::class,'registercreate'])->name('getregisteradd');
});

