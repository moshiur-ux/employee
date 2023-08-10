<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $users= User::get();
        return view('admin.user.index',compact('users'));
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        return view('admin.user.create');
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request,[
             'firstname'=>'required',
             'lastname'=>'required',
             'email' => 'required| string| email| max:255| unique:users',
            'password' => 'required|string',
            'department_id'=>'required',
            'role_id'=>'required',
            'image'=>'required|mimes:jpeg,jpg,png',
             'start_from'=>'required',
             'designation'=>'required'

        ]);

        $data  = $request->all();
        if($request->hasFile('image')){
            $image=$request->image->hashName();
            $request->image->move(public_path('profile'),$image);

        }else{
            $image='moshi.jpg';
        }

        $data['name']=$request->firstname.' '.$request->lastname
        ;
        $data['image']=$image;
        $data['password']= bcrypt($request->password);
        User::create($data);
        return redirect()->back()->with('message','User created 
        Successfully');
       

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
        $user =User::find($id);
        return view('admin.user.edit',compact('user'));
        

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        
        $this->validate($request,[
            'name'=>'required',
            'email' =>'
            required| string| email| max:255| unique:users,email,'.$id,
           'department_id'=>'required',
           'role_id'=>'required',
           'image'=>'required|mimes:jpeg,jpg,png',
            'start_from'=>'required',
            'designation'=>'required'

       ]);
       $data  = $request->all();
       $user= User::find($id);
       if($request->hasFile('image')){
           $image=$request->image->hashName();
           $request->image->move(public_path('profile'),$image);

       }
       else{
           $image = $user->image;
       }
       if($request->password)
       {
        $password=$request->password;
       }
       else{
        $password=$user->password;

       }
       $data['image']=$image;
       $data['password']=bcrypt($password);
       $user->update($data);
       return redirect()->back()->with('message','User Updated
       Successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        User::find($id)->delete();
        return redirect()->back()->with('message','User Deleted
        Successfully');
        
    }
}
