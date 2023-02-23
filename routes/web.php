<?php

use App\Http\Controllers\AuthController;
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

Route::get('/', function () {
    return view('welcome');
});


Route::get('login',[AuthController::class,'loginpage'])->name('login')->middleware('alreadyLoggedIn');

Route::post('login',[AuthController::class,'userlogin'])->name('userlogin');

Route::get('register',[AuthController::class,'registerpage'])->name('register')->middleware('alreadyLoggedIn');

Route::post('register',[AuthController::class,'userregister'])->name('userregister');

Route::get('home',function(){
    return view('home');
})->name('home')->middleware('checkAuth');

Route::get('logout',function(){
    if(session()->has('loginId')){
        session()->pull('loginId');
        return redirect('login')->with('success','Logout Successfull');
    }
})->name('logout')->middleware('checkAuth');


