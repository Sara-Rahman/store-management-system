@extends('admin.master')
@section('content')
<div class="container">
 <h1>Edit Employee</h1>
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
 <form action="{{route('employee.update',$employee->id)}}" method="POST">
    @method('PUT')
   @csrf
   <div class="row">
    <div class="form-group">
        <label for="role_id"><b>Select Role</label></b>
        <select name="role_id" class="form-control">
    
          @foreach ($roles as $data)
    
          <option
          @if($data->id==$employee->role_id)
                selected
                @endif
            value="{{$data->id}}">{{$data->name}}</option>
            @endforeach
        </select>
      </div>
         <div class="form-group mt-2 ">
           <label for="name">Name <i class="text-danger">*</i> </label>
           <input type="text" class="form-control" id="name" name="name" value="{{$employee->name}}" placeholder="Enter Employee Name" >
         </div>
         <div class="form-group mt-2 ">
           <label for="email">Email <i class="text-danger">*</i></label>
           <input type="text" class="form-control" id="email" name="email" value="{{$employee->email}}"  placeholder="Enter Employee Email" >
         </div>
         <div class="form-group mt-2 ">
           <label for="phone">Phone <i class="text-danger">*</i></label>
           <input type="text" class="form-control" id="phone" name="phone" value="{{$employee->phone}}"  placeholder="Enter Employee Email" >
         </div>
         <div class="form-group mt-2 ">
           <label for="address">Address <i class="text-danger">*</i></label>
           <input type="text" class="form-control" id="address" name="address" value="{{$employee->address}}"  placeholder="Enter Employee Address" >
         </div>
         <div class="form-group mt-2 ">
             <label for="password">Password <i class="text-danger">*</i></label>
             <input type="password" class="form-control" id="password" name="password" placeholder="Enter Password" >
         </div>
   </div>
   <button type="submit" class="btn btn-success mt-2 mb-3" style="text-align:right;">Update</button>
 </form>
</div>
 @endsection