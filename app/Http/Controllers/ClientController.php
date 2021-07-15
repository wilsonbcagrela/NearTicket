<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ClientController extends Controller
{
    public function showCreateUser(){
        return view("Client/InviteTeam");
    }
    public function postUser(Request $req){
        $sessionID = session('id');
        $userName = $req->userName;
        $firstName = $req->firstName;
        $lastName = $req->lastName;
        $email = $req->email;
        $phone = $req->phone;
        $password = $req->password;
        Http::post("http://localhost:8080/client/user?Client_id={$sessionID}&email={$email}&firstName={$firstName}&lastName={$lastName}&password={$password}&phone={$phone}&userName={$userName}");
        return redirect("/home");
    }
}
