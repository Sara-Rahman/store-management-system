@extends('admin.master')
@section('content')

<style>
    .size {
        width: 100%;
        height: 100%;
        
    }

</style>
<div class="container" style="display: grid; margin-left: -15px;">
    <div class="row" style="height: 90px;">
        <div class="col-md-2 card-body" style="padding:3px;"><a class="btn btn-success size"
                href="{{route('employee.index')}}"><i style="font-size: 30px;" class="fa-solid fa-id-badge"></i> 
                Employee</a></div>
        <div class="col-md-2 card-body" style="padding:3px;"><a class="btn btn-success size"
                href="{{route('stock.index')}}"><i style="font-size:30px;" class="fa-solid fa-arrow-trend-up"></i> Stock
                </a></div>
        <div class="col-md-2 card-body" style="padding:3px;"><a class="btn btn-success size"
                href="{{route('requisition.index')}}"><i style="font-size: 30px;" class="fa-brands fa-first-order"></i> 
                Requisition</a></div>
        <div class="col-md-2 card-body" style="padding:3px;"><a class="btn btn-success size"
                href="{{route('item.index')}}"><i style="font-size: 35px;" class="fa-solid fa-store"></i> 
                Items</a></div>
        <div class="col-md-2 card-body" style="padding:3px;"><a class="btn btn-success size"
                href="{{route('executive.index')}}"><i style="font-size: 30px;" class="fa-solid fa-id-badge"></i>
                Store Executive</a></div>
    </div>
    <div class="row" style="height: 90px;">
        <div class="col-md-2 card-body" style="padding:3px;"><a class="btn btn-success size"
                href="{{route('role.index')}}"><i style="font-size: 30px;" class="fa-solid fa-id-badge"></i> Supplier</a></div>
        <div class="col-md-2 card-body" style="padding:3px;"><a class="btn btn-success size" href="#"><i style="font-size:30px" class="fa-solid fa-people-arrows-left-right"></i>
                Roles</a></div>
      
    </div>
</div>

@endsection
