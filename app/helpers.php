<?php

use App\Mail\WelcomeMail;
use App\Models\VerifyEmail;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;


function sendCode($user) {
    $code = Str::random(40);
    VerifyEmail::create([
        'user_id' => $user->id,
        'code' => $code,
    ]);
    Mail::to($user->email)->send(new WelcomeMail($user, $code));
}