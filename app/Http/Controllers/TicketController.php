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
        $client_id = session('Client_id');
        $responseUser = Http::get("http://localhost:8080/user/project/tickets?Project_id={$project_id}");
        $responseTeam = Http::get("http://localhost:8080/users/project?project_id={$project_id}");
        $responseTeamAdmin = Http::get("http://localhost:8080/users/project/admins?project_id={$project_id}");
        $tickets = json_decode($responseUser->body());
        $TeamMembers = json_decode($responseTeam->body());
        $TeamMembersAdmins = json_decode($responseTeamAdmin->body());
        if(session('TypeUser') == "User"){
            return view('tickets', [
                "tickets" => $tickets,
                "TeamMembers" => $TeamMembers,
                "TeamMembersAdmins" => $TeamMembersAdmins
            ]);
        }else{
            return view('Admin/AdminTickets', [
                "tickets" => $tickets,
                "TeamMembers" => $TeamMembers,
                "TeamMembersAdmins" => $TeamMembersAdmins
            ]);
        }
    }
    public function showCreateTicket(){
        return view('User/createTickets');
    }
    public function createTicket(Request $req){

        $project_id = $req->route('project_id');
        $deadLine =strval($req->deadLine);
        $description= $req->description;
        $name = $req->name;
        $gravity = $req->gravity;
        $urgency = $req->urgency;

        if($urgency != 1){
            $urgency = 0;
        }

        Http::post("http://localhost:8080/user/project/ticket?Project_id={$project_id}&deadLine={$deadLine}&description={$description}&gravity={$gravity}&name={$name}&urgency={$urgency}");

        $pathback = "/project/{$project_id}";
        return redirect($pathback);
    }
    public function showEditAdminTicket(){
        return view('Admin/AdminEditTicket');
    }
    public function AdminEditTicket(Request $req){

        echo $req->IssueOrRequest;
        if($req->IssueOrRequest == "issue"){
            $issue = 1;
            $request = 0;
        }else{
            $issue = 0;
            $request = 1;
        }
        $ticket_id = $req->ticket_id;
        $project_id= $req->route('project_id');

        Http::post("http://localhost:8080/helpdesk/project/ticket/{ticketId}?Project_id={$project_id}&id={$ticket_id}&isIssue={$issue}&isRequest={$request}");

        $pathback = "/project/{$project_id}";
        return redirect($pathback);
    }
}
