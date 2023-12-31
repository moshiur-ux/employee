<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Leave;
class LeaveController extends Controller
{
   
    public function index()
    {
        $leaves = Leave::latest()->get();
        return view('admin.leave.index',compact('leaves'));
    }

    
    public function create()
    {
        $leaves = Leave::latest()->where('user_id',auth()->user()->id)->get();
      
        return view('admin.leave.create',compact('leaves'));
    }

   
    public function store(Request $request)
    {
        $this->validate($request,[
            'from'=>'required',
            'to'=>'required',
            'description'=>'required',
            'type'=>'required'
        ]);
        $data = $request->all();
        $data['user_id'] = auth()->user()->id;
        $data['message']='';
        $data['status']=0;
        Leave::create($data);
        return redirect()->back()->with('message','Leave Created!');

    }

  
    public function show($id)
    {
        //
    }

   
    public function edit($id)
    {
        $leave = Leave::find($id);
        return view('admin.leave.edit',compact('leave'));
    }

    
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'from'=>'required',
            'to'=>'required',
            'description'=>'required',
            'type'=>'required'
        ]);
        $data = $request->all();
        $leave = Leave::find($id);
        $data['user_id'] = auth()->user()->id;
        $data['message']='';
        $data['status']=0;
        $leave->update($data);
        return redirect()->route('leaves.create')->with('message','Leave updated');
    }

    
    public function destroy($id)
    {
        Leave::find($id)->delete();
        return redirect()->route('leaves.create')->with('message','Leave deleted');
    }

    public function acceptReject(Request $request,$id){
        $status = $request->status;
        $message = $request->message;
        $leave = Leave::find($id);
        $leave->update([

            'status' =>$status,
            'message'=>$message

        ]);
        return redirect()->route('leaves.index')->with('message','Leave updated');
    }
}
