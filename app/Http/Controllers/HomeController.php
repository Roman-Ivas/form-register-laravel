<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    // public function register(Request $req){
    //     if($req->isMethod('post')){
    //         $login=$req->input("login");
    //         $email=$req->input("email");
    //         $age=$req->input("age");
    //         $pass=$req->input("pass");
    //         $passCom=$req->input("passCom");



    //         return view("home.info")
    //         ->with("login",$login)
    //         ->with("email",$email)
    //         ->with("age",$age)
    //         ->with("pass",$pass)
    //         ->with("passCom",$passCom);
    //     }
    //     return view("home.register");
    // }

    public function register(){
        return view("home.register");
    }

    public function info(Request $request){
        $login = $request->input('login');
        $email = $request->input('email');
        $age = $request->input('age');
        $pass = $request->input('pass');
        $passCon = $request->input('passCon');

        if ($pass !== $passCon) {
            return redirect('home/register')->with('error', 'Пароли не совпадают');
        }

        if ($age < 18) {
            return redirect('home/register')->with('error', 'Доступ запрещен: пользователю меньше 18 лет');
        }
        return view("home/info",compact('login', 'email', 'age','pass','passCon'));
    }
}
