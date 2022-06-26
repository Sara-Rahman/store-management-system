@extends('admin.master')
@section('content')
<div class="container">
 <h1>Edit Stock</h1>
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
 <form action="{{route('stock.update',$stock->id)}}" method="POST">
    @method('PUT')
   @csrf
   <div class="row">
    
    <div class="form-group">
      <label for="item">Item Name</label>
      <input type="text" class="form-control" id="item" name="item" value="{{$stock->item->name}}" readonly >
   
    </div>
         <div class="form-group mt-2 ">
           <label for="quantity">Quantity <i class="text-danger">*</i></label>
           <input type="number" class="form-control" id="quantity" name="quantity" value="{{$stock->quantity}}"  placeholder="Enter Description" >
         </div>
        
        
         
   </div>
   <button type="submit" class="btn btn-success mt-2 mb-3" style="text-align:right;">Update</button>
 </form>
</div>
 @endsection