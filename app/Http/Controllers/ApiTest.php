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
    public function loginClient(Request $req){
        $email = $req->email;
        $password = $req->password;
        $responseClient = Http::get("http://localhost:8080/login?email={$email}&password={$password}");
        $responseUser = Http::get("http://localhost:8080/loginUser?email={$email}&password={$password}");
        $responseAdmin = Http::get("http://localhost:8080/loginAdmin?email={$email}&password={$password}");
        $clients = json_decode($responseClient->body());
        $users = json_decode($responseUser->body());
        $admins = json_decode($responseAdmin->body());
        if($clients != [] || $users != [] || admins != []){
            return redirect("/home");

        }else{
            return "no user with that name or password";
        }
    }
}
