<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class ApiTest extends Controller
{
    public function fetch(){
        $response = Http::get('http://localhost:8080/all');

        $clients = json_decode($response->body());
        foreach($clients as $client){
            echo $client->name;

        }
    }
    public function createClient(Request $req){
        $email = $req->email;
        $name = $req->name;
        $emailConfirm = 0;
        $phone = $req->phone;
        $password = $req->password;
        Http::post("http://localhost:8080/signup?email={$email}&isEmailConfirmed={$emailConfirm}&name={$name}&password={$password}&phone={$phone}");

        echo "saved";
        return redirect("/");

    }
}
