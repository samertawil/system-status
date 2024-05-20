@extends('layouts.app-master')

@section('title', ucfirst('posts by user'))

@section('page-name', ucfirst('posts by user'))

@section('css-links')

<link rel="stylesheet" href="{{asset('css/dataTables.dataTables.css')}}">
@endsection

@section('app-content')

    @include('layouts._alert_session')

    @include('layouts._error_form')
    


    <table class="table text-center cell-border w-75" style="direction: rtl;" id="myTable">
        <thead class="text-center ">
            <tr>
                <th>post title</th>
                <th>description</th>
                <th>cat name</th>
                <th>full name</th>
                <th>status</th>
               
                
            </tr>
        </thead>
        <tbody class="text-center">
            
        </tbody>
    </table>

 
@endsection

@section('js')

<script src="{{asset('js/dataTables.js')}}"></script>

  {{-- <script>
    let table = new DataTable('#myTable');
</script>  --}}

  <script>
    $(document).ready(function () {
        $('#myTable').DataTable({
            "processing":true,
            "serverside":true,
            "paging":true,
            // "scrollY":"500px",
            "scrollcollapse":true,
            "order":[],
            "ajax":"{{route('api.data.index',Auth::id())}}",
            "columns": [
                {"data":"title" , "orderable":false},
                {"data":"description" ,  "searchable": false },
                {"data":"categoryname.category_name"},
                {"data":"username.full_name"},
                {"data":"statusname.status_name"},
                             
            ],
           
        }); 
        

    });
</script>  
@endsection

 
