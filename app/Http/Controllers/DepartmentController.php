<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
 use App\Models\Department;


class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $departments= Department::all();
        return view('admin.department.index',compact('departments'));
        

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.department.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $this->validate($request ,[
            'name'=>'required|unique:departments'

        ]);

        $data = $request->all();
         Department::create($data);
         return redirect()->back()->with('message' ,'Deparment created Successfully');


        
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
        $department =Department::find($id);
        return view('admin.department.edit',compact('department'));

         
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $department =Department::find($id);
        $data=$request->all();
        $department->update($data);
        return redirect()->route('departments.index')->with('message','Record update Successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $department =Department::find($id);
        $department->delete();
        return redirect()->route('departments.index')->with('message','Record deleted Successfully');

    }
}
