@extends('admin.master')
@section('content')
<div class="container">
<h1>Create Requisition</h1>
<hr>
@if(session()->has('success'))
<p class="alert alert-success">
  {{session()->get('success')}}
</p>
@endif
<br>

<div style="text-align:center;">
  <form action="{{route('requisition.store')}}" method="POST" enctype="multipart/form-data">
    @csrf

          <div>
            <table class="table">
                <thead>
                  <tr>
                    <th class="col-4"><h5>Item</h5></th>
                    <th class="col-4"><h5>Quantity</h5></th>
                    <th class="col-4"><h5>Action</h5></th>                    
                  </tr>
                </thead>
                <tbody>
                  <tr>
                   <td class="col-4"><select id="item_id" name="item_id[]" class="form-control"> @foreach($items as $item)<option value="{{$item->id}}">{{$item->name}}</option> @endforeach</select></td>
                   <td class="col-4"><input type="number" name="quantity[]" class="form-control" placeholder="Enter Quantity" min="1" value=""/></td>
                   <td class="col-4">
                    <a href="javascript:void(0);" class="add_button btn btn-info">+</a>
                    <a href="javascript:void(0);" class="remove_button btn btn-danger">-</a></td>

                  </tr>
                </tbody>
              </table>
        </div>
        {{-- after clicking add button --}}
        <div class="row field_wrapper" style="display: flex;">
          <div class="col-4">
            
          </div>
        
          <div class="col-4">
           
        </div>
          <div class="col-4">
           
        </div>
         
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script type="text/javascript">
          $(document).ready(function(){
              var maxField = 10; //Input fields increment limitation
              var addButton = $('.add_button'); //Add button selector
              var wrapper = $('.field_wrapper'); //Input field wrapper
              var fieldHTML = '<div class="requisition row d-flex"><div class="col-4"><select id="item_id" name="item_id[]" class="form-control"> @foreach($items as $item)<option value="{{$item->id}}">{{$item->name}}</option> @endforeach</select></div><div class="col-4"><input type="number" name="quantity[]" class="form-control" placeholder="Enter Quantity" min="1" value=""/></div><div class="col-4"><a href="javascript:void(0);" class="add_button btn btn-info">+</a><a href="javascript:void(0);" class="remove_button btn btn-danger">-</a></div><hr class="row" style="height:1px; margin-left:0.5rem; margin-top: 1rem;"></div>'; //New input field html 
              var x = 1; //Initial field counter is 1
              
              //Once add button is clicked
              $(addButton).click(function(){
                  //Check maximum number of input fields
                  if(x < maxField){ 
                      x++; //Increment field counter
                      $(wrapper).append(fieldHTML); //Add field html
                  }
              });
              
              //Once remove button is clicked
              $(wrapper).on('click', '.remove_button', function(e){
                  e.preventDefault();
                  $(this).closest('.requisition').remove(); //Remove field html
                  x--; //Decrement field counter
              });
          });
          </script>


    </div>   
    <button type="submit" class="btn btn-success btn-sm mt-2" style="text-align:right;">Save</button>
  </form>
</div>
</div>
@endsection