@extends('admin.master')
@section('content')
<div class="container">
 <h1>Add Item</h1>
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
 <form action="{{route('item.store')}}" method="POST" enctype="multipart/form-data">
   @csrf
   <div class="row">
    
         <div class="form-group mt-2 ">
           <label for="name">Name <i class="text-danger">*</i> </label>
           <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name" required>
         </div>
         <div class="form-group mt-2 ">
           <label for="description">Description <i class="text-danger">*</i></label>
           <input type="text" class="form-control" id="description" name="description" placeholder="Enter  Description" required>
         </div>
         <div class="form-group mt-2 ">
           <label for="price">Price <i class="text-danger">*</i></label>
           <input type="number" class="form-control" id="price" name="price" placeholder="Enter Price" required>
         </div>
         <div class="mt-2">
          <label for="item_image" class="form-label">Insert Image</label>
          <input class="form-control" type="file" id="item_image" name="item_image">
      </div>
        
        
   </div>
   <button type="submit" class="btn btn-success mt-2 mb-3" style="text-align:right;">Save</button>
 </form>
</div>
 @endsection