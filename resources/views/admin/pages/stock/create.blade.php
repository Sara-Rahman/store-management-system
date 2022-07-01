@extends('admin.master')
@section('content')
<div class="container">
 <h1>Add Stock</h1>
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
 <form action="{{route('stock.store')}}" method="POST">
   @csrf
   <div class="row">
    <div class="form-group ">
      <label for="item">Select Item <i class="text-danger">*</i></label>
      <select class="form-control" id="item" name="item_id">
          @foreach ($items as $item)
              <option value="{{$item->id}}">{{$item->name}}</option>
          @endforeach
      </select> 
    </div> 
         
         <div class="form-group mt-2 ">
           <label for="quantity">Quantity <i class="text-danger">*</i></label>
           <input type="number" class="form-control" id="quantity" name="quantity" placeholder="Enter Quantity" required>
         </div>
         </div>
         
         <div class="form-group mt-2 ">
           <label for="price">Price <i class="text-danger">*</i></label>
           <input type="number" class="form-control" id="price" name="price" placeholder="Enter Price" required>
         </div>
        
         <button type="submit" class="btn btn-success mt-2 mb-3" style="text-align:right;">Save</button>

   </div>
 </form>
</div>
 @endsection