<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ProjectController extends Controller
{
    public function getProject(){
        if(session('TypeUser') == "User"){
            $sessionID = session('id');
            $sessionClient_id = session('Client_id');
            $responseUser = Http::get("http://localhost:8080/user/projects?Client_id={$sessionClient_id}&id={$sessionID}");

            $responseClient= Http::get("http://localhost:8080/client/projects?Client_id={$sessionClient_id}");

                $projects = json_decode($responseUser->body());
                return view('projects', [
                    "projects" => $projects
                ]);
        }else if(session('TypeUser') == "Admin"){
            $sessionID = session('id');
            $responseAdmin = Http::get("http://localhost:8080/helpdesk/projects?id={$sessionID}");

            $projects = json_decode($responseAdmin->body());
            return view('adminProjects', [
                "projects" => $projects
            ]);
        }
    }

    // else{//fix this
    //     $projects = json_decode($responseClient->body());
    //     return view('home', [
    //         "projects" => $projects
    //     ]);
    // }
    // public function getProjectAdmin(){
    //     if(session('TypeUser') == "Admin"){
    //         $sessionID = session('id');
    //         $responseAdmin = Http::get("http://localhost:8080/helpdesk/projects?id={$sessionID}");

    //         $projects = json_decode($responseAdmin->body());
    //         return view('adminProjects', [
    //             "projects" => $projects
    //         ]);
    //     }
    // }

}
