<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
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

    public function forgotPassword(){
        return view('auth.forgot_password');
    }

    public function submitAnswer($id){
        return view('auth.sequrity_question', compact('id'));
    }

    public function checkEmail(Request $request){
        $validator = Validator::make($request->all(), [
            'email' => [ 'required', 'regex:/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix','email', 'max:255']
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }
        $user = User::where('email', $request->email)->with('answers')->first();
        if(!$user){
            return redirect()->back()->withErrors('Email not registered');
        }
        return redirect('forgot-password/security-questions/'.$user->id);
    }

    public function checkAnswer(Request $request){
        $validator = Validator::make($request->all(), [
            'question' => [ 'required','max:20'],
            'answer' => [ 'required'],
            'user_id' => [ 'required'],
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }
        $user = User::where('id', $request->user_id)->with('answers')->first();
        if(!$user->answers){
            return redirect()->back()
                        ->withErrors('Security Answers Not Found')
                        ->withInput();
        }
        if(strcasecmp($user->answers[$request->question], $request->answer) == 0){
            return redirect('forgot-password/update-password/'.$user->id);
        }
        return redirect()->back()
                        ->withErrors('Wrong Answer')
                        ->withInput();
    }

    public function viewChangePassword($id){
        return view('auth.change_password', compact('id'));
    }

    public function updatePassword(Request $request){
        $validator = Validator::make($request->all(), [
            'password' => ['required', 'confirmed', 'min:8'],
            'password_confirmation' => ['required', 'min:8'],
            'user_id' => ['required'],
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }
        $user = User::where('id', $request->user_id)->update([
            'password' => Hash::make($request->password),
        ]);
        $notification = [
            'ErrorMessage' => "Password was updated",
            "password-change" => "true"
        ];
        return redirect('')->with($notification);
    }
}
