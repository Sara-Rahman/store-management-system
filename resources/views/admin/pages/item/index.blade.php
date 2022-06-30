@extends('admin.master')
@section('content')

<a class="btn btn-primary mt-2" href="{{route('item.create')}}">Create Item</a>

<item-component/>


@endsection

@push('js')
  <script>
 
  </script>
@endpush
