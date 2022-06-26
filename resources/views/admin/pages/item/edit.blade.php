@extends('admin.master')
@section('content')
<div class="container">
 <h1>Edit Item</h1>
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
 <form action="{{route('item.update',$item->id)}}" method="POST">
    @method('PUT')
   @csrf
   <div class="row">
    
         <div class="form-group mt-2 ">
           <label for="name">Name <i class="text-danger">*</i> </label>
           <input type="text" class="form-control" id="name" name="name" value="{{$item->name}}" placeholder="Enter Name" >
         </div>
         <div class="form-group mt-2 ">
           <label for="email">Description <i class="text-danger">*</i></label>
           <input type="text" class="form-control" id="email" name="email" value="{{$item->description}}"  placeholder="Enter Description >
         </div>
         <div class="form-group mt-2">
           <label for="phone">Price <i class="text-danger">*</i></label>
           <input type="text" class="form-control" id="phone" name="phone" value="{{$item->price}}"  placeholder="Enter Price" >
         </div>
         <div class="mt-2">
          <label for="item_image" class="form-label">Insert Image</label>
          <input class="form-control" type="file" id="item_image" name="item_image">
      </div>
        
         
   </div>
   <button type="submit" class="btn btn-success mt-2 mb-3" style="text-align:right;">Update</button>
 </form>
</div>
 @endsection