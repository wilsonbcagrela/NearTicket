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
        if(session('TypeUser') == "User" || session('TypeUser') == "Client"){
            return view('tickets', [
                "tickets" => $tickets,
                "TeamMembers" => $TeamMembers,
                "TeamMembersAdmins" => $TeamMembersAdmins
            ]);
        }else{
            if(session("role")=="TECHNICIAN"){
                //returns issues
                $technicianTickets = Http::get("http://localhost:8080/technician/project/tickets?Project_id={$project_id}");
                $tickets = json_decode($technicianTickets->body());

            }else if(session("role")=="CONSULTANT"){
                //returns requests
                $consultantTickets = Http::get("http://localhost:8080/consultant/project/tickets?Project_id={$project_id}");
                $tickets = json_decode($consultantTickets->body());

            }
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
        $deadLine =$req->deadLine;
        $description= $req->description;
        $name = $req->name;
        $gravity = $req->gravity;
        $urgency = $req->urgency;
        $owner = session("userName");
        $currentDateTime = date('Y-m-d');
        if($urgency != 1){
            $urgency = 0;
        }

        Http::post("http://localhost:8080/user/project/ticket?Project_id={$project_id}&creationDate={$currentDateTime}&deadLine={$deadLine}&description={$description}&gravity={$gravity}&name={$name}&owner={$owner}&urgency={$urgency}");

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

        Http::put("http://localhost:8080/helpdesk/project/ticket/{ticketId}?Project_id={$project_id}&id={$ticket_id}&isIssue={$issue}&isRequest={$request}");

        $pathback = "/project/{$project_id}";
        return redirect($pathback);
    }
    public function showEditAdminissueOrRequest(){
        return view('Admin/AdminEditIssueOrRequest');
    }
    public function AdminEditTicketissueOrRequest(Request $req){
        $project_id = $req->route('project_id');
        $ticket_id = $req->route('ticket_id');
        $status = $req->status;
        $supervisor = session("userName");
        if(session("role")=="TECHNICIAN"){
            Http::put("http://localhost:8080/technician/project/ticket/{ticketId}?Project_id={$project_id}&id={$ticket_id}&status={$status}&supervisor={$supervisor}");
        }else{
            Http::put("http://localhost:8080/consultant/project/ticket/{ticketId}?Project_id={$project_id}&id={$ticket_id}&status={$status}&supervisor={$supervisor}");
        }

        $pathback = "/project/{$project_id}";
        return redirect($pathback);
    }
    public function showEditTicketUser(Request $req){
        $project_id = $req->route('project_id');
        $ticket_id = $req->route('ticket_id');
        $responseTicket = Http::get("http://localhost:8080/user/project/ticket/{ticketId}?Project_id={$project_id}&id={$ticket_id}");
        $tickets = json_decode($responseTicket->body());
        return view('User/UserEditTicket', [
            "tickets" => $tickets
        ]);
    }
    public function editTicketUser(Request $req){
        $project_id = $req->route('project_id');
        $ticket_id = $req->route('ticket_id');
        $deadLine =$req->deadLine;
        $description= $req->description;
        $name = $req->name;
        $gravity = $req->gravity;
        $urgency = $req->urgency;
        if($urgency != 1){
            $urgency = 0;
        }
        Http::put("http://localhost:8080/user/project/ticket/{ticketId}?Project_id={$project_id}&deadLine={$deadLine}&description={$description}&gravity={$gravity}&id={$ticket_id}&name={$name}&urgency={$urgency}");

        $pathback = "/project/{$project_id}";
        return redirect($pathback);
    }
    public function deleteTicket(Request $req){
        //not implemented
    }
}
