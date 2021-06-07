<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class ApiTest extends Controller
{
    public function fetch(){
        $response = Http::get('http://localhost:8080/all');

        // $quizzes = json_decode($response->body());

        // foreach($quizzes as $quiz){

        //     echo $quiz;
        // }
        $clients = json_decode($response->body());
        foreach($clients as $client){
            echo $client->name;

        }
        // return $clients->name;
        // echo "hello world";
    }
}
