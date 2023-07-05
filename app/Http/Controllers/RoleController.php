<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\Models\Role;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles=Role::all();
        return view('admin.role.index',compact('roles'));
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.role.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name'=>'required|unique:roles'    

        ]);
        Role::create($request->all());
        return redirect()->back()->with('message','Role created Successfully');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $role =Role::find($id);
        return view('admin.role.edit',compact('role'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $this->validate($request,[

            'name'=>'required|unique:roles,name,'.$id


        ]);
        $role =Role::find($id);
        //$data=$request->all();
        $role->update($request->all());
        return redirect()->route('roles.index')->with('message','Record update Successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $role =Role::find($id);
        $role->delete();
        return redirect()->route('roles.index')->with('message','Record deleted Successfully');

    }
}
