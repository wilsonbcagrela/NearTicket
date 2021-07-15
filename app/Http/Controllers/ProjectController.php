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
            return view('User/projects', [
                "projects" => $projects
            ]);
        }else if(session('TypeUser') == "Admin"){
            $sessionID = session('id');
            $responseAdmin = Http::get("http://localhost:8080/helpdesk/projects?id={$sessionID}");

            $projects = json_decode($responseAdmin->body());
            return view('Admin/adminProjects', [
                "projects" => $projects
            ]);
        }else if(session('TypeUser') == "Client"){
            $sessionID = session('id');
            $responseClient = Http::get("http://localhost:8080/client/projects?Client_id={$sessionID}");
            $responseUsersOfClientv = Http::get("http://localhost:8080/client/users?Client_id={$sessionID}");
            $projects = json_decode($responseClient->body());
            $users = json_decode($responseUsersOfClientv->body());

            return view('User/projects', [
                "projects" => $projects,
                "users" => $users
            ]);
        }
    }

    public function showCreateProject(){
        return view('createProject');
    }

    public function createProject(Request $req){
        $client_id = session('Client_id');
        $user_id = session('id');
        $projectName = $req->name;
        $projectDescription = $req->description;
        Http::post("http://localhost:8080/user/project?Client_id={$client_id}&description={$projectDescription}&id={$user_id}&name={$projectName}");

        return redirect('/projects');
    }

    public function showAddUser(){
        return view('User/addUsersProject');
    }
    public function AddUser(Request $req){
        $client_id = session('Client_id');
        $project_id = $req->route('project_id');
        $userName = $req->userName;
        Http::post("http://localhost:8080/user/project/addUser?Client_id={$client_id}&Project_id={$project_id}&userName={$userName}");

        $pathback = "/project/{$project_id}";
        return redirect($pathback);
    }
}
