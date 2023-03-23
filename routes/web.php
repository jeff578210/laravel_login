<?php

use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return "Hello World";
// });
Route::post('/login', "App\Http\Controllers\UserController@checkLogin");
// 傳回註冊頁
Route::get('/register',function(){
    return view('register');
});
// 傳回燈入頁
Route::get('/',function(){
    return view("index");
});
// 登入成功頁
Route::get('/home',function(){
    return view("home");
});
// 檢查帳號是否有重複
Route::get('/memberCheck',"App\Http\Controllers\UserController@accCheck");
// 資料存進資料庫
Route::post('/createUser',"App\Http\Controllers\UserController@createUser");
