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
        $projects = json_decode($responseUser->body());
        return view('home', [
            "projects" => $projects
        ]);
    }
}
