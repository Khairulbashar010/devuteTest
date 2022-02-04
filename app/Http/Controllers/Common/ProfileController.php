<?php

namespace App\Http\Controllers\Common;

use Illuminate\Support\Facades\Validator;
use App\Models\SequrityQuestionAnswer;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;

class ProfileController extends Controller
{
    public function index(){
        $answers = SequrityQuestionAnswer::where('user_id', auth()->user()->id)->first();
        return view('common.profile', compact('answers'));
    }

    public function updateProfile(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => [ 'required', 'string', 'max:30'],
            'mother_maiden_name' => [ 'required', 'string', 'max:255'],
            'first_pet' => [ 'required', 'string', 'max:255'],
            'favourite_teacher' => [ 'required', 'string', 'max:255'],
            'password' => [ 'required'],
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }
        if(!Hash::check($request->password, auth()->user()->password)){
            $notification = [
                'alert-type' => 'error',
                'message' => 'Incorrect password provided'
            ];
            return redirect('common/profile')->with($notification);
        }
        try {
            User::where('id', auth()->user()->id)->update([
                'name' => $request->name,
            ]);
            SequrityQuestionAnswer::updateOrCreate([
                'user_id' => auth()->user()->id,
            ], [
                'mother_maiden_name' => $request->mother_maiden_name,
                'first_pet' => $request->first_pet,
                'favourite_teacher' => $request->favourite_teacher,
            ]);
        } catch (\Exception $e) {
            $notification = [
                'alert-type' => 'error',
                'message' => $e->getMessage()
            ];
            return redirect('/common/profile')->with($notification);
        }
        $notification = [
            'alert-type' => 'success',
            'message' => 'Data updated successfully'
        ];
        return redirect('/common/profile')->with($notification);
    }
}
