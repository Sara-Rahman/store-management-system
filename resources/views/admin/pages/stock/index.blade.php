@extends('admin.master')
@section('content')
<div class="container">
<h1>Stock</h1>

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


 <a href="{{route('stock.create')}}" button type="submit" class="btn btn-primary">Create Stock</button> </a>

<div>
              <table class="table" style="text-align: center;">
                <thead class="thead-dark">
                  <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Item Name</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Price</th>
                    @if(auth()->user()->role->name!='Admin')
                    <th scope="col">Action</th>
                    @endif
                  </tr>
                </thead>
                <tbody>
                    @foreach($stocks as $key=>$item)

                    <tr>
                     
                      <th>{{$key+1}}</th>
                      <td>{{$item->item->name}}</td>
                      <td>{{$item->quantity}}</td>
                      <td>{{$item->price}}</td>
                     
                      @if(auth()->user()->role->name!='Admin')
                      <td>
                        <div style="display: flex; justify-content:center">
                        <a  class="btn btn-warning me-2" href="{{ route('stock.edit',$item->id)}}"><i class="fas fa-edit"></i></a> 
                        <form action="{{ route('stock.destroy',$item->id)}}" method="POST">
                          @csrf
                          @method('DELETE')
                          <div>
                              <button class="btn btn-danger" type="submit"><i class="fas fa-trash"></i></button>
  
                          </div>
  
                          </form>
                        </div>
                      </td>
                      @endif
                    </tr>

            @endforeach
                 
                </tbody>
              </table>
</div>
</div>
@endsection
