<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ProjectController extends Controller
{
    public function getProjectUser(){
        $sessionID = session('id');
        $sessionClient_id = session('Client_id');
        $responseUser = Http::get("http://localhost:8080/user/projects?Client_id={$sessionClient_id}&id={$sessionID}");
        $responseAdmin = Http::get("http://localhost:8080/helpdesk/projects?id={$sessionID}");
        $responseClient= Http::get("http://localhost:8080/client/projects?Client_id={$sessionClient_id}");
        if(session('TypeUser') == "User"){
            $projects = json_decode($responseUser->body());
            return view('home', [
                "projects" => $projects
            ]);
        }else if(session('TypeUser') == "Admin"){
            $projects = json_decode($responseAdmin->body());
            return view('home', [
                "projects" => $projects
            ]);
        }else{//fixed this
            $projects = json_decode($responseClient->body());
            return view('home', [
                "projects" => $projects
            ]);
        }

    }
}
