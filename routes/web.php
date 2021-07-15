<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\ApiTest;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\userController;
use App\Http\Controllers\CommentController;
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

//middleware to prevent access
Route::get('/home', function(){
    if(session('id') != null){
        return view('home');
    }
    return redirect('/');
});
Route::get('/', function(){
    if(session('id') == null){

        return view('welcome');
    }
    return redirect('/home');
});

Route::get('/project/create',[ProjectController::class,'showCreateProject']);
Route::post('project/Createprojects',[ProjectController::class,'createProject']);
Route::get('/projects',[ProjectController::class,'getProject']);
Route::get('/project/{project_id}',[TicketController::class,'getProjectTickets'])->name('Tickets');
Route::get('/project/{project_id}/create/ticket',[TicketController::class,'showCreateTicket']);
Route::post('project/{project_id}/create/createTicket',[TicketController::class,'createTicket']);
Route::get('/team', [userController::class, 'getsUserTeam']);

Route::get('/project/{project_id}/ticket/{ticket_id}',[TicketController::class,'showEditAdminTicket']);
Route::post('project/{project_id}/ticket/EditTicket',[TicketController::class,'AdminEditTicket']);

Route::get('/project/{project_id}/ticket/{ticket_id}/admin',[TicketController::class,'showEditAdminissueOrRequest']);
Route::post('project/{project_id}/ticket/{ticket_id}/EditTicketIssueRequest',[TicketController::class,'AdminEditTicketissueOrRequest']);

Route::get('/project/{project_id}/addUser',[ProjectController::class,'showAddUser']);
Route::Post('/project/{project_id}/addUserToProject',[ProjectController::class,'AddUser']);

Route::get('/project/{project_id}/ticket/{ticket_id}/comments',[CommentController::class,'getComments']);
Route::post('/project/{project_id}/ticket/{ticket_id}/postComment',[CommentController::class,'postComments']);

Route::get('/project/{project_id}/ticket/{ticket_id}/edit',[TicketController::class,'showEditTicketUser']);
Route::post('/project/{project_id}/ticket/{ticket_id}/editTicketUser',[TicketController::class,'editTicketUser']);
