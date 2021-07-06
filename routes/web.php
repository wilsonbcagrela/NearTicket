<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\ApiTest;
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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [WelcomeController::class, 'welcome']);
Auth::routes();

Route::get('/home', [HomeController::class, 'index'] )->name('home');

Route::get('/fetch', [ApiTest::class, 'fetch']);

Route::post('test', [ApiTest::class, 'createClient']);

Route::get('loginUser', [ApiTest::class, 'loginClient']);

Route::get('/home', function(){
    if(session('id') != null){
        return view('home');
    }
    return redirect('/');
});

// Route::get('sessionSet', [SessionController::class, 'storeSessionData'])->name('session.set');

// Route::get('sessionGet', [SessionController::class, 'getSessionData'])->name('session.get');

