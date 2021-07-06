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
        if($clients != []){

            foreach($clients as $client){
                session()->put('TypeUser', "Client");
                session()->put('id', $client->id);
                session()->put('userName', $client->name);
                session()->put('email', $client->email);
            }
            // echo session('TypeUser');
            return redirect("/home");
        }else if($users != []){
            foreach($users as $user){

                session()->put('TypeUser', "User");
                session()->put('id', $user->id);
                session()->put('userName', $user->userName);
                session()->put('email', $user->email);
                session()->put('Client_id', $user->client_id);
            }
            return redirect("/home");
        }else if($admins != []){
            foreach($admins as $admin){

                session()->put('TypeUser', "Admin");
                session()->put('id', $admin->id);
                session()->put('userName', $admin->userName);
                session()->put('email', $admin->email);
                session()->put('role', $admin->role);
            }
            return redirect("/home");
        }else{
            return "no user with that name or password";
        }
    }
}
