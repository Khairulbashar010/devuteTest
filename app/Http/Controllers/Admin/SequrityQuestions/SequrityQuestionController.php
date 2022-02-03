<?php

namespace App\Http\Controllers\Admin\SequrityQuestions;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SequrityQuestion;

class SequrityQuestionController extends Controller
{
    public function index()
    {
        $questionData = SequrityQuestion::orderBy('company_name', 'asc')->get();
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
        $SupplierById = null;
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
            'company_name' => ['required', 'string', 'max:255'],
            'phone' => ['required'],
        ]);
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator);
        }
        $StoreSupplier = new SequrityQuestion();
        $StoreSupplier->userId = auth()->user()->id;
        $StoreSupplier->company_name = $request->company_name;
        $StoreSupplier->email = $request->email;
        $StoreSupplier->phone = $request->phone;
        $StoreSupplier->address = $request->address;
        $StoreSupplier->save();

        $notification = array(
            'message' => 'SequrityQuestion data has been created successfully.',
            'alert-type' => 'success'
        );
        return redirect('admin/sequrityQuestion')->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $SupplierById = SequrityQuestion::findOrFail($id);
        return view('admin.sequrityQuestion.create', compact('SupplierById'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'company_name' => ['required', 'string', 'max:255'],
            'phone' => ['required'],
            'id' => ['required'],
        ]);
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator);
        }
        $UpdateSupplier = SequrityQuestion::find($id);
        $UpdateSupplier->company_name = $request->company_name;
        $UpdateSupplier->email = $request->email;
        $UpdateSupplier->phone = $request->phone;
        $UpdateSupplier->address = $request->address;
        $UpdateSupplier->save();
        $notification = array(
            'message' => 'SequrityQuestion data has been updated successfully.',
            'alert-type' => 'success'
        );
        return redirect('admin/sequrityQuestion')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $DeleteSubCategory = SequrityQuestion::findOrFail($id);
        $DeleteSubCategory->delete();

        $notification = array(
            'message' => 'SequrityQuestion data has been deleted successfully.',
            'alert-type' => 'warning'
        );
        return redirect('admin/sequrityQuestion')->with($notification);
    }
}
