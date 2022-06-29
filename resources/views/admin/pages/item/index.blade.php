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

 <a href="{{route('item.create')}}" button type="submit" class="btn btn-primary">Create Item</button> </a>
<div>
              <table class="table" style="text-align: center;">
                <thead class="thead-dark">
                  <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Description</th>
                    <th scope="col">Image</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach($items as $key=>$item)

                    <tr>
                     
                      <th>{{$key+1}}</th>
                      <td>{{$item->name}}</td>
                      <td>{{$item->description}}</td>
                      <td><img src="{{url('/uploads/items/'.$item->image)}}" style="border-radius:4px" width="100px"
                        alt="item image"></td>
                      <td>{{$item->status}}</td>
                      <td>
                        <div style="display: flex; justify-content:center">
                        <a  class="btn btn-warning me-2" href="{{ route('item.edit',$item->id)}}"><i class="fas fa-edit"></i></a> 
                        <form action="{{ route('item.destroy',$item->id)}}" method="POST">
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
