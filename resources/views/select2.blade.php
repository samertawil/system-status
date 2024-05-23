@extends('layouts.app-master')
 @section('css-links')

 {{-- <style>
     .container {
        direction: rtl;
    }
 </style> --}}

 @endsection
 

@section('app-content')
 
  <div class="row container" style="direction: rtl;">
    <div class="form-group  col-6">
        <select class="form-select">
            @foreach ( $cities as $city )
            <option>{{$city->city_name}}</option>
            @endforeach
           
        </select>
    </div>

    <div class="col-6">
        <input class="form-control">
    </div>
  </div>


 
 


@endsection

<script>
  let user='samer';
  console.log(Math.random( )*5000)
</script>