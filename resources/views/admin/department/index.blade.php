@extends('admin.layouts.master')

@section('content')
<div class="container mt-5">
    <div class="row ">
        <div class="col-md-12">

            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">All Departments</li>
              </ol>
            </nav>
            @if(Session::has('message'))
                <div class="alert alert-success">
                    {{Session::get('message')}}
                </div>
            @endif

            {{auth()->user()}}

         
           <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>SN</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Edit</th>
                    <th>Delete</th>
                    
                </tr>
            </thead>
           
            <tbody>
                @if(count($departments)>0)
                @foreach($departments as $key=>$department)
                <tr>
                    <td>{{$key+1}}</td>
                    <td>{{$department->name}}</td>
                    <td>{{$department->description}}</td>
                    <td>
                      
                        <a href="{{route('departments.edit',[$department->id])}}"><i class="fas fa-edit"></i></a></td>
                      
                        <td><a href="" data-bs-toggle="modal" data-bs-target="#exampleModal{{$department->id}}"><i class=" fas fa-trash"></i></a>
                    
                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal{{$department->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form action="{{route('departments.destroy',[$department->id])}} " method="post">@csrf
        {{method_field('DELETE')}}
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel"></h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        
        Do you want to delete?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-outline-danger">Delete</button>
      </div>
    </div>
</form>
  </div>
</div>
                <!--Modal end-->

                   
                    </td>
                
                
                </tr>
                @endforeach
                @else
                <td>No departments to display</td>
                @endif
               
               
              
            </tbody>
        </table>
        </div>
    </div>
</div>
@endsection
