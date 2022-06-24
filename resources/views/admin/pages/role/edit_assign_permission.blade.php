@extends('admin.master')
@section('content')

<h1>Edit Assiginging Permissions</h1>
<div class="card p-3">
  
  <form action="{{route('update.permission')}}" method="POST" >  
      @method('PUT')
 
      @csrf
      <input type="hidden" name="role_id" value="{{$roles->id}}">

          @foreach($modules as $module)
            <div class="form-group">
                  <h1 class="mt-1" for="exampleInputEmail1"><h3>{{$module->name}}</h3></h1>
                  <hr>
                    @foreach($module->assign_permissions as $permission)
                  
                      <div class="form-check">
                          <input
                           @php 
                           if(in_array($permission->id,$permissions)) {echo "checked"; }
                          @endphp 
                          name="assign_permissions[]" class="form-check-input" type="checkbox" value="{{$permission->id}}"  id="flexCheckDefault">
                          <label class="form-check-label" for="flexCheckDefault">
                            {{ucfirst(str_replace('.',' ',$permission->name))}}
                          </label>
                      </div>
                    @endforeach
                

            </div>
          @endforeach
          <br>
          <button type="submit" class="btn btn-success">Submit</button>

  </form>
</div>
@endsection