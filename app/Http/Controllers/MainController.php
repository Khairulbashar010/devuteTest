<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
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
            return view('auth.admin.code-error');
        }
        if($codeData->user->email_verified){
            Auth::login($codeData->user);
            $codeData->delete();
            $notification = [
                'alert-type' => 'success',
                'message' => 'Email already verified'
            ];
            return redirect('common/profile')->with($notification);
        }
        $verifyEmail = User::where('id',$codeData->user->id)->update([
            'email_verified' => 1,
            'email_verified_at' => now(),
        ]);
        $codeData->delete();
        Auth::login($codeData->user);
        $notification = [
            'alert-type' => 'success',
            'message' => 'Email verified successfully'
        ];
        return redirect('common/profile')->with($notification);
    }

    public function verificationEmail(Request $request){
        $validator = Validator::make($request->all(), [
            'email' => [ 'required', 'regex:/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix','email', 'max:255']
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }
        $user = User::where('email', $request->email)->first();
        if(!$user){
            return view('auth.admin.code-error')->withErrors('User of this email not found');
        }
        sendCode($user);
        return view('auth.admin.re-verify-email');
    }
}
