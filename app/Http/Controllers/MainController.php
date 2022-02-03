<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    public function login_form(){
        return view('auth.admin.login');
    }

    public function registration_form(){
        return view('auth.admin.register');
    }

    public function verifyEmail($code){
        dd($code);
        return view('auth.admin.register');
    }
}
