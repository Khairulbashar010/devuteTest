<?php

namespace App\Http\Controllers\Admin\SequrityQuestions;

use Illuminate\Http\Request;
use App\Models\SequrityQuestion;
use App\Http\Controllers\Controller;

class SequrityQuestionController extends Controller
{
    public function index()
    {
        $questionData = SequrityQuestion::orderBy('question', 'asc')->get();
        $rowCount = SequrityQuestion::count();
        return view('admin.sequrityQuestion.index', compact('questionData', 'rowCount'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.sequrityQuestion.create',compact('SupplierById'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
        ]);
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator);
        }
        $StoreQuestion = new SequrityQuestion();
        $StoreQuestion->question = $request->question;
        $StoreQuestion->save();

        $notification = array(
            'message' => 'Sequrity question data has been created successfully.',
            'alert-type' => 'success'
        );
        return redirect('admin/sequrity-questions')->with($notification);
    }

    public function edit($id)
    {
        $SupplierById = SequrityQuestion::findOrFail($id);
        return view('admin.sequrityQuestion.create', compact('SupplierById'));
    }

    public function destroy($id)
    {
        $DeleteQuestion = SequrityQuestion::findOrFail($id);
        $DeleteQuestion->delete();

        $notification = array(
            'message' => 'Sequrity question data has been deleted successfully.',
            'alert-type' => 'warning'
        );
        return redirect('admin/sequrity-questions')->with($notification);
    }
}
