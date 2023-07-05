@extends('admin.layouts.master')

@section('content')


<div class="container mt-5 p-5">
    
            <nav arial-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active" aria-current="page">

                    Register employee

                    </li>

                </ol>

            </nav>

                    @if(Session::has('message'))
                                <div class="alert alert-success" role="alert">
                                {{Session::get('message')}}

                                </div>
                            
                                @endif



<form action="{{route('users.store')}}" method="post" enctype="multipart/form-data">@csrf

<div class="row justify-content-center" >
    <div class=" col-md-8">

    <div class="card">
        <div class="card-header">General Information</div>
       
        <div class=" card-body">

            <div class="form-group">
            <label>First name</label>
            <input type="text" name="firstname" class="form-control" required="">
             </div>

             <div class="form-group">
            <label>Last name</label>
            <input type="text" name="lastname" class="form-control" required="">
             </div>

             <div class="form-group">
            <label>Address </label>
            <input type="text" name="address" class="form-control" required="">
             </div>

             <div class="form-group">
            <label>Mobile number</label>
            <input type="text" name="mobile_number" class="form-control" required="">
             </div>

             <div class="form-group m-2">
            <label>Department</label>
            <select type="text" name="department_id"  required="">

                  @foreach(App\Models\Department::all() as $department)

                    <option value ="{{$department->id}}">

                    {{$department->name}}


                    </option>


                    @endforeach


             </select>

             </div>

             <div class="form-group">
            <label>Designation</label>
            <input type=" text" name="designation" class="form-control" required="">
             </div>

             <div class="form-group">
            <label>Start Date</label>
            <input type="date" name="start_from" class="form-control" required="" placeholder=" dd-mm-yyyy">
             </div>

             <div class="form-group">
            <label>Image</label>
            <input type="file"  name="image" class="form-control" required="">
             </div>




</div>



</div>


</div>



<div  class="col-md-4">

<div class="card m-2">

<div class="card-header">Login Information</div>
<div class="form-body">

    <div class="form-group m-2">

    <label>Email</label>

    <input type="email" name="email" class="form-control" required="">


    </div>

                <div class="form-group m-2">

            <label>Password</label>

            <input type="password" name="password" class="form-control" required="">


            </div>

                    <div class="form-group m-2">

                    <label> Role</label>

                    <select type="role_id" name="role_id"  required="">
                    @foreach(App\Models\Role::all() as $role)

            <option value ="{{$role->id}}">

            {{$role->name}}


            </option>


            @endforeach

                    </select>

                    </div>

</div>

</div>
<br>

        <div class="form-group m-2">

        <button type="submit" class="btn btn-primary">Submit</button>
        
            
        </button>

        </div>

</div>





</div>

</form>

</div>

@endsection