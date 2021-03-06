@extends('admin.master')
@section('content')
<div class="container">
<h1>Employee</h1>

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

 <a href="{{route('employee.create')}}" button type="submit" class="btn btn-primary">Create Employee</button> </a>



<div>
              <table class="table" style="text-align: center;">
                <thead class="thead-dark">
                  <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Address</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach($employees as $key=>$employee)

                    <tr>
                      
                      <th>{{$key+1}}</th>
                      <td>{{$employee->name}}</td>
                      <td>{{$employee->email}}</td>
                      <td>{{$employee->phone}}</td>
                      <td>{{$employee->address}}</td>
                      <td>
                        
                        <div style="display: flex">
                        <a  class="btn btn-warning me-2" href="{{ route('employee.edit',$employee->id)}}"><i class="fas fa-edit"></i></a> 
                        <form action="{{ route('employee.destroy',$employee->id)}}" method="POST">
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
