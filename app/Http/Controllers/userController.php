<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class userController extends Controller
{
    public function getsUserTeam(){
        if(session('TypeUser') == "User"){
            $client_id = session('Client_id');
            $user_id = session('id');
            $responseTeam = Http::get("http://localhost:8080/users?Client_id={$client_id}");
            $responseClient = Http::get("http://localhost:8080/user/client?id={$user_id}");
            $client = json_decode($responseClient->body());
            $team = json_decode($responseTeam->body());
            return view('User/UserTeam',[
                "team" => $team,
                "client" => $client
            ]);
        }else if(session('TypeUser') == "Admin"){
            $responseTeam = Http::get("http://localhost:8080/helpdesk/admins");
            $team = json_decode($responseTeam->body());
            return view('Admin/AdminTeam',[
                "team" => $team
            ]);
        }else if(session('TypeUser') == "Client"){
            $client_id = session('id');
            $responseTeam = Http::get("http://localhost:8080/client/users?Client_id={$client_id}");
            $team = json_decode($responseTeam->body());
            return view('User/UserTeam',[
                "team" => $team,
            ]);
        }

    }
    public function getsTeamView(){
        return view('User/UserTeam');
    }
}
