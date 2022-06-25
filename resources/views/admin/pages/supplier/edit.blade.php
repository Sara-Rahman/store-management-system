@extends('admin.master')
@section('content')
<div class="container">
 <h1>Edit Supplier</h1>
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
 <form action="{{route('supplier.update',$supplier->id)}}" method="POST">
    @method('PUT')
   @csrf
   <div class="row">
    
         <div class="form-group mt-2 ">
           <label for="name">Name <i class="text-danger">*</i> </label>
           <input type="text" class="form-control" id="name" name="name" value="{{$supplier->name}}" placeholder="Enter Supplier Name" >
         </div>
         <div class="form-group mt-2 ">
           <label for="email">Email <i class="text-danger">*</i></label>
           <input type="text" class="form-control" id="email" name="email" value="{{$supplier->email}}"  placeholder="Enter Supplier Email" >
         </div>
         <div class="form-group mt-2 ">
           <label for="phone">Phone <i class="text-danger">*</i></label>
           <input type="text" class="form-control" id="phone" name="phone" value="{{$supplier->phone}}"  placeholder="Enter Supplier Phone" >
         </div>
         <div class="form-group mt-2 ">
           <label for="address">Address <i class="text-danger">*</i></label>
           <input type="text" class="form-control" id="address" name="address" value="{{$supplier->address}}"  placeholder="Enter Supplier Address" >
         </div>
         
   </div>
   <button type="submit" class="btn btn-success mt-2 mb-3" style="text-align:right;">Update</button>
 </form>
</div>
 @endsection