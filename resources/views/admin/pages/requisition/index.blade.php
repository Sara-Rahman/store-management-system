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

@if(getPermissions(auth()->user()->role_id,'requisition.create'))
 <a href="{{route('requisition.create')}}" button type="submit" class="btn btn-primary">Create Requisition</button> </a>
@endif
<div>
              <table class="table" style="text-align: center;">
                <thead class="thead-dark">
                  <tr>
                    <th scope="col">ID</th>
                    @if(auth()->user()->role->name!='Store Executive')
                    <th scope="col">Requested By</th>
                    @endif
                    <th scope="col">Item List</th> 
                    <th scope="col">Price</th> 
                    <th scope="col">Status</th>
                    @if(auth()->user()->role->name!='Store Executive')
                    <th scope="col">Action</th>
                    @endif
                  </tr>
                </thead>
                <tbody>
                    @foreach($requisitions as $key=>$data)
                  {{-- @dd($data) --}}
                    <tr>
                      <th>{{$key+1}}</th>
                      @if(auth()->user()->role->name!='Store Executive')
                      <td>{{$data->user->name}}</td>
                      @endif
                      
                      <td>
                        @foreach($data->item_requisitions as $value)
                           <p>{{$value->item->name}}-{{$value->quantity}}</p>
                         @endforeach
                    </td>
                    <td>{{$data->price}}</td>
                     
                      <td>
                        @if($data->status=='pending')
                        <button class="btn btn-warning">{{$data->status}}</button>
                        @elseif($data->status=='Approved')
                        <button class="btn btn-success">{{$data->status}}</button>
                        @else
                        <button class="btn btn-danger">{{$data->status}}</button>
                        @endif
                      </td>

                      <td>
                        <div style="display: flex; justify-content:center">
                          @if(auth()->user()->role->name=='Employee')
                          {{-- @if(getPermissions(auth()->user()->role_id,'requisition.edit')) --}}
                        <a  class="btn btn-warning me-2" href="{{ route('requisition.edit',$data->id)}}"><i class="fas fa-edit"></i></a>   
                        {{-- @if(getPermissions(auth()->user()->role_id,'requisition.destroy')) --}}
                        <form action="{{ route('requisition.destroy',$data->id)}}" method="POST">
                          @csrf
                          @method('DELETE')
                          <div>
                              <button class="btn btn-danger" type="submit"><i class="fas fa-trash"></i></button>
                          </div>
                          </form>
                          @endif
                        </div>
                        @if(auth()->user()->role->name=='Admin')
                        <a @if($data->status=='pending') href="{{route('approved',$data->id)}}" @endif><button class="btn btn-success" @if($data->status!='pending') disabled @endif>Approve</button></a>
                        <a @if($data->status=='pending') href="{{route('rejected',$data->id)}}" @endif><button class="btn btn-danger" @if($data->status!='pending') disabled @endif>Reject</button></a>
                        @endif
                      </td>
                    </tr>

            @endforeach
                 
                </tbody>
              </table>
</div>
</div>
@endsection
