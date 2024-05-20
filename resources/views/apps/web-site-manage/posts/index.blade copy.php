@extends('layouts.app-master')

@section('title', ucfirst('posts by user'))

@section('page-name', ucfirst('posts by user'))

@section('css-links')

<link rel="stylesheet" href="{{asset('css/dataTables.dataTables.css')}}">
@endsection

@section('app-content')

    @include('layouts._alert_session')

    @include('layouts._error_form')



    <table class="table text-center" style="direction: rtl;" id="myTable">
        <thead class="text-center">
            <tr>
                <th>post title</th>
                <th>description</th>
                <th>cat_id</th>

                <th>pic</th>
                <th>status_id</th>
                <th>comment_able</th>
                <th>created at</th>
                <th>updated at</th>`
                <th>post_type</th>
                <th >controls</th>
                
            </tr>
        </thead>
        <tbody class="text-center">
            @foreach ($posts as $post)
                <tr>
                    <td>{{ $post->title }}</td>
                    <td>{{ $post->description }}</td>
                    <td>{{ $post->categoryname->category_name }}</td>

                    <td>
                        @if ($post->post_img)
                            @foreach ($post->post_img as $img)
                                <a href="{{ asset('storage/' . $img) }}" target="_blank"><img
                                        src="{{ asset('storage/' . $img) }}" alt="" style="height: 70px; width:70px;">
                                </a>
                            @endforeach
                        @endif
                    </td>

                    <td>{{ $post->statusname->status_name }}</td>
                    <td>{{ $post->commentstatusname->status_name }}</td>
                    <td>{{ $post->created_at->format('d/m/Y') }}</td>
                    <td>{{ $post->updated_at->format('d/m/Y') }}</td>
                    <td>{{$post->posttypename->status_name}}</td>
              <td class="text-center d-flex" >
                <form action="{{ route('user.post.edit', $post->id) }}" method="get" enctype="multipart/form-data">
                    @csrf
                  
                    <button type="submit" class="btn btn-md bg-warning"> <i class="fas fa-edit"></i> </button> 
                </form>

                <a href="#" class="btn btn-md bg-danger mx-2"><i class="fas fa-trash"></i></a> 
              </td>
               
         
             
            </tr>

            @endforeach

        </tbody>
    </table>


@endsection

@section('js')

<script src="{{asset('js/dataTables.js')}}"></script>
{{-- 
<script>
    let table = new DataTable('#myTable');
</script> --}}

<script>
    $(document).ready(function () {
        $('#myTable').DataTable({
            "processing":true,
            "serverside":true,
            "ajax":"{{route('user.post.index',Auth::id())}}"
        });

    });
</script>
@endsection