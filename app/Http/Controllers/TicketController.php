<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
class TicketController extends Controller
{
    public function ticket(){
        return view('tickets');
    }

    public function getProjectTickets(Request $req){
        // $project_id = $req->project_id;
        $project_id = $req->route('project_id');
        $responseUser = Http::get("http://localhost:8080/user/project/tickets?Project_id={$project_id}");
        $tickets = json_decode($responseUser->body());
        return view('tickets', [
            "tickets" => $tickets
        ]);
    }
    public function showCreateTicket(){
        return view('User/createTickets');
    }
    public function createTicket(Request $req){
        echo "bruh";

        $project_id = $req->route('project_id');
        // $client_id = session('Client_id');
        // $user_id = session('id');
        // $projectName = $req->name;
        // $projectDescription = $req->description;
        // Http::post("http://localhost:8080/user/project/ticket?Project_id=10&deadLine=12%2F12%2F2020&description=qwewqeweweq&gravity=MILD&name=asdsad&urgency=false");

        // return redirect('/project/{$project_id}');
    }
}
