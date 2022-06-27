@extends('admin.master')
@section('content')
<div class="container">
<h1>Requisition</h1>

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


 <a href="{{route('requisition.create')}}" button type="submit" class="btn btn-primary">Create Requisition</button> </a>

<div>
              <table class="table" style="text-align: center;">
                <thead class="thead-dark">
                  <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Requested By</th>
                    <th scope="col">Item List</th>  
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach($requisitions as $key=>$data)

                    <tr>
                      <th>{{$key+1}}</th>
                      <td>{{$data->requested_by}}</td>
                      <td>
                        @foreach($item_requisition as $value)
                           <p>{{$value->item->name}}-{{$value->quantity}}</p>
                         @endforeach
                    </td> 
                      

                      
                      <td>{{$data->status}}</td> 
                      <td>
                        <div style="display: flex; justify-content:center">
                        <a  class="btn btn-warning me-2" href="{{ route('stock.edit',$data->id)}}"><i class="fas fa-edit"></i></a> 
                        <form action="{{ route('requisition.destroy',$data->id)}}" method="POST">
                          @csrf
                          @method('DELETE')
                          <div>
                              <button class="btn btn-danger" type="submit"><i class="fas fa-trash"></i></button>
  
                          </div>
  
                          </form>
                        </div>
                      </td>
                    </tr>

            @endforeach
                 
                </tbody>
              </table>
</div>
</div>
@endsection
