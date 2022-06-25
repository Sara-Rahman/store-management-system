@extends('admin.master')
@section('content')
<div class="container">
<h1>Supplier</h1>

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

 <a href="{{route('supplier.create')}}" button type="submit" class="btn btn-primary">Create Supplier</button> </a>



<div>
              <table class="table" style="text-align: center;">
                <thead class="thead-dark">
                  <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Address</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach($suppliers as $key=>$supplier)

                    <tr>
                     
                      <th>{{$key+1}}</th>
                      <td>{{$supplier->name}}</td>
                      <td>{{$supplier->email}}</td>
                      <td>{{$supplier->phone}}</td>
                      <td>{{$supplier->address}}</td>
                      <td>{{$supplier->status}}</td>
                      <td>
                        <div style="display: flex">
                        <a  class="btn btn-warning me-2" href="{{ route('supplier.edit',$supplier->id)}}"><i class="fas fa-edit"></i></a> 
                        <form action="{{ route('supplier.destroy',$supplier->id)}}" method="POST">
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
