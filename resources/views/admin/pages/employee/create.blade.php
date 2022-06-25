@extends('admin.master')
@section('content')
<div class="container">
 <h1>Add Employee</h1>
 <hr>
 @if(session()->has('success'))
<p class="alert alert-success">
  {{session()->get('success')}}
</p>
@endif

@if ($errors->any())
<div class="alert alert-danger">
  <ul>
    @foreach ($errors->all() as $error)
      <li>
        {{$error}}
      </li>   
    @endforeach
  </ul>
</div>
@endif
 <form action="{{route('employee.store')}}" method="POST">
   @csrf
   <div class="row">
    <div class="form-group ">
        <label for="role">Select Role <i class="text-danger">*</i></label>
        <select class="form-control" id="role" name="role_id">
            @foreach ($roles as $role)
                <option value="{{$role->id}}">{{$role->name}}</option>
            @endforeach
        </select> 
      </div> 
         <div class="form-group mt-2 ">
           <label for="name">Name <i class="text-danger">*</i> </label>
           <input type="text" class="form-control" id="name" name="name" placeholder="Enter Employee Name" required>
         </div>
         <div class="form-group mt-2 ">
           <label for="email">Email <i class="text-danger">*</i></label>
           <input type="text" class="form-control" id="email" name="email" placeholder="Enter Employee Email" required>
         </div>
         <div class="form-group mt-2 ">
           <label for="phone">Phone <i class="text-danger">*</i></label>
           <input type="text" class="form-control" id="phone" name="phone" placeholder="Enter Phone" required>
         </div>
         <div class="form-group mt-2 ">
           <label for="address">Address <i class="text-danger">*</i></label>
           <input type="text" class="form-control" id="address" name="address" placeholder="Enter Employee Address" required>
         </div>
         <div class="form-group mt-2 ">
             <label for="password">Password <i class="text-danger">*</i></label>
             <input type="password" class="form-control" id="password" name="password" placeholder="Enter Password" required>
         </div>
   </div>
   <button type="submit" class="btn btn-success btn-sm mt-2 mb-3" style="text-align:right;">Save</button>
 </form>
</div>
 @endsection