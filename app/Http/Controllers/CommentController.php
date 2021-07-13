<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CommentController extends Controller
{
    public function getComments(Request $req){
        $project_id = $req->route('project_id');
        $ticket_id = $req->route('ticket_id');
        $responseTicket = Http::get("http://localhost:8080/user/project/ticket/{ticketId}?Project_id={$project_id}&id={$ticket_id}");
        $responseComment = Http::get("http://localhost:8080/user/project/ticket/getComment?ticket_id={$ticket_id}");
        $tickets = json_decode($responseTicket->body());
        $comments = json_decode($responseComment->body());
        return view("Comments", [
            "tickets" => $tickets,
            "comments" => $comments
        ]);

    }
    public function postComments(Request $req){
        $text = $req->text;
        $ticket_id = $req->route('ticket_id');
        $project_id = $req->route('project_id');
        $owner = session("userName");
        $currentDateTime = date('Y-m-d');
        Http::post("http://localhost:8080/user/project/ticket/addComment?creationDate={$currentDateTime}&owner={$owner}&text={$text}&ticket_id={$ticket_id}");

        $pathback = "/project/{$project_id}/ticket/{$ticket_id}/comments";
        return redirect($pathback);
    }
}
