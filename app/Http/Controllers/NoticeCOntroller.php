<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notice;
class NoticeCOntroller extends Controller
{
   
    public function index()
    {
       $notices = Notice::latest()->get();
       return view('admin.notice.index',compact('notices'));
    }

   
    public function create()
    {
        return view('admin.notice.create');
    }

    
    public function store(Request $request)
    {
        $this->validate($request,[
            'title'=>'required',
            'description'=>'required',
            'date'=>'required',
            'name'=>'required'
        ]);
        Notice::create($request->all());
        return redirect()->route('notices.index')->with('message','Notice created Successfully');
    }

  
    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $notice = Notice::find($id);
        return view('admin.notice.edit',compact('notice'));
    }

   
    public function update(Request $request, $id)
    {
        $notice = Notice::find($id);
        $notice->update($request->all());
        return redirect()->route('notices.index')->with('message','Notice updated Successfully');
    }

  
    public function destroy($id)
    {
        Notice::find($id)->delete();
        return redirect()->route('notices.index')->with('message','Notice deleted Successfully');
    }
}
