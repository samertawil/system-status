@extends('layouts.app-master')
 @section('css-links')


 @endsection
 

@section('app-content')
 

  <div class="row container" style="direction: rtl;"  >
    <div class="form-group  col-6">
        <select class="form-select" >
            @foreach ( $cities as $city )
            <option value="{{$city->id}}" id="c1">{{$city->city_name}}</option>
            
            @endforeach
           
           
        </select>
        
    </div>

    <div class="col-6">
        <select class="form-select">
          @foreach ( $areas->where('city_id',$city->id) as $area )
          <option value="">{{$area->area_name}}</option>
          @endforeach
         
        </select>
       
    </div>

         
  </div>

  </div>

  <script src="{{asset('js/myproject.js')}}">
 
  </script>

@endsection


