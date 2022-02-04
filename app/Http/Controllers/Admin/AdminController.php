<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SequrityQuestionAnswer;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.dashboard');
    }
    public function answers()
    {
        $AnswersData = SequrityQuestionAnswer::with('user')->get();
        $rowCount = SequrityQuestionAnswer::count();
        return view('admin.answers', compact('AnswersData', 'rowCount'));
    }
}
