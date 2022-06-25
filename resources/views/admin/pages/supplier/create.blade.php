@extends('admin.master')
@section('content')
<div class="container">
 <h1>Add Supplier</h1>
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
 <form action="{{route('supplier.store')}}" method="POST">
   @csrf
   <div class="row">
    
         <div class="form-group mt-2 ">
           <label for="name">Name <i class="text-danger">*</i> </label>
           <input type="text" class="form-control" id="name" name="name" placeholder="Enter Supplier Name" required>
         </div>
         <div class="form-group mt-2 ">
           <label for="email">Email <i class="text-danger">*</i></label>
           <input type="text" class="form-control" id="email" name="email" placeholder="Enter Supplier Email" required>
         </div>
         <div class="form-group mt-2 ">
           <label for="phone">Phone <i class="text-danger">*</i></label>
           <input type="text" class="form-control" id="phone" name="phone" placeholder="Enter Phone" required>
         </div>
         <div class="form-group mt-2 ">
           <label for="address">Address <i class="text-danger">*</i></label>
           <input type="text" class="form-control" id="address" name="address" placeholder="Enter Supplier Address" required>
         </div>
        
   </div>
   <button type="submit" class="btn btn-success mt-2 mb-3" style="text-align:right;">Save</button>
 </form>
</div>
 @endsection