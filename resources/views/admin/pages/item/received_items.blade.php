@extends('admin.master')
@section('content')
<div class="container">
<h1>Item</h1>

<hr>
@if(session()->has('danger'))
<p class="alert alert-danger">
  {{session()->get('danger')}}
</p>
@endif
@if ($errors->any())
    <div class="alert alert-warning" role="alert">
        <ul>
              @foreach ($errors->all() as $error)
                  <li>
                      {{$error}}
                  </li>   
              @endforeach
        </ul>
    </div>
@endif

<div>
              <table class="table" style="text-align: center;">
                <thead class="thead-dark">
                  <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Price</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach($received as $key=>$data)
                    {{-- @dd($data) --}}
                      <tr>
                        <th>{{$key+1}}</th>                        
                        <td>
                          @foreach($data->item_requisitions as $value)
                             <p>{{$value->item->name}}-{{$value->quantity}}</p>
                           @endforeach
                      </td>
                       <td>{{$value->price}}</td>
  
          
                      </tr>
  
              @endforeach
                   
                 
                </tbody>
              </table>
</div>
</div>
@endsection
