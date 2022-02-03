<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VerifyEmail;
use App\Models\User;

class MainController extends Controller
{
    public function login_form(){
        return view('auth.admin.login');
    }

    public function registration_form(){
        return view('auth.admin.register');
    }

    public function verifyEmail($code){
        $codeData = VerifyEmail::where('code', $code)->with('user')->first();
        if(!$codeData){
            dd("Not Found");
        }
        if($codeData->user->email_verified){
            Auth::login($codeData->user);
            return redirect('user/dashboard');
        }
        $verifyEmail = User::where('id',$codeData->user->id)->update([
            'email_verified' => 1,
            'email_verified_at' => now(),
        ]);
        $codeData->delete();
        dd($verifyEmail);
    }
}
