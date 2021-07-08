<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\ApiTest;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\userController;
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
Route::get('/', [WelcomeController::class, 'welcome']);
Auth::routes();

Route::get('/home', [HomeController::class, 'index'] )->name('home');
// Route::get('/tickets', [TicketController::class, 'ticket']);

Route::get('/fetch', [ApiTest::class, 'fetch']);

Route::post('test', [ApiTest::class, 'createClient']);

Route::get('loginUser', [ApiTest::class, 'loginClient']);

Route::get('/home', function(){
    if(session('id') != null){
        return view('home');
    }
    return redirect('/');
});
// Route::get('/', function(){
//     if(session() == null){

//         return redirect('/home');
//     }
//     return redirect('/');
// });

Route::get('/project/create',[ProjectController::class,'showCreateProject']);
Route::get('/projects',[ProjectController::class,'getProject']);
Route::get('/project/{project_id}/tickets',[TicketController::class,'getProjectTickets'])->name('Tickets');
Route::post('project/Createprojects',[ProjectController::class,'createProject']);
Route::get('/team', [userController::class, 'getsUserTeam']);

