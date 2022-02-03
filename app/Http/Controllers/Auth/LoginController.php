<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request){
        try {
            $user = User::where('email', $request->email)->first();
            if(!$user) {
                $notification = [
                    'ErrorMessage' => "Email is incorrect",
                    "email" => "true"
                ];
                return back()->withInput()->with($notification);
            }
            if(Hash::check($request->password, $user->password)){
                if($user->role_id == 2){
                    Auth::login($user);
                    return redirect('user/dashboard');
                } elseif($user->role_id == 1){
                    Auth::login($user);
                    return redirect('admin/dashboard');
                }
            } else {
                $notification = [
                    'ErrorMessage' => "Password is incorrect",
                    "password" => "true"
                ];
                return back()->withInput()->with($notification);
            }
        } catch (\Exception $e) {
            $notification = [
                'ErrorMessage' => "Error occured",
            ];
            return back()->withInput()->with($notification);
        }
    }
}
