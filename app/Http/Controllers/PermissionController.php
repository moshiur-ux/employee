<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Permission;
class PermissionController extends Controller
{
    
    public function index()
    {
        $permissions = Permission::get();
        return view('admin.permission.index',compact('permissions'));
       
    }

   
    public function create()
    {
  
        return view('admin.permission.create');
    }

   
    public function store(Request $request)
    {
        $this->validate($request,[
            'role_id'=>'required|unique:permissions',
            'name'=>'required'
        ]);
        Permission::create($request->all());
        return redirect()->back()->with('message','Permission Updated!');

      
    }

    
    public function show($id)
    {
        //
    }

   
    public function edit($id)
    {
        $permission =  Permission::find($id);
        return view('admin.permission.edit',compact('permission'));
        
    }

    
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'name'=>'required'
        ]);
        $permission = Permission::find($id);
        $permission->update($request->all());
        return redirect()->back()->with('message','Permission updated');
    
        
    }

    public function destroy($id)
    {
        
       Permission::find($id)->delete();
       return redirect()->back()->with('message','Permission deleted'
    );
      

    }
}
