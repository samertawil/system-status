@extends('layouts.app-master')

@section('page-name', 'users')
@section('title', 'users')

@section('app-content')


    <div class="container">
        <table class="table border text-center" id="mytable" style="direction: rtl;">
            <thead>
                <tr>
                    <th>#</th>
                    <th>id</th>
                    <th>user name</th>
                    <th>full name</th>
                    <th>email</th>
                    {{-- <th>email_verified_at</th> --}}
                    <th>status_id</th>
                    <th>user_activation</th>
                    <th>user id</th>
                    <th>user type</th>
                    <th>controll</th>
                </tr>

            </thead>
            <tbody>
                @foreach ($users as $key=>$user)
                    <tr>
                        <td>{{$key+1}}</td>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->user_name }}</td>
                        <td>{{ $user->full_name }}</td>
                        <td>{{ $user->email }}</td>
                        {{-- <td>{{ $user->email_verified_at }}</td> --}}
                        <td>{{ $user->status_id }}</td>
                        <td>{{ $user->user_activation }}</td>
                        <td>{{ $user->user_id }}</td>
                        <td><span @class([
                            'text-info' => $user->user_type == 32,
                        ])>{{ $user->usertype->status_name }}</span></td>
                        <td class="d-flex align-items-center justify-content-between">
                            <button class="d-inline btn  btn-sm  edit_btn " title="edit">
                                <a class="d-inline " href="{{route('admin.users.edit',$user->id)}}">
                                    <i class="fas fa-edit" style="font-size: 22px;"></i></a>
                            </button>
                            <form action="#" method="post">
                                <button type="submit" class="btn btn-sm"><i
                                        class=" m-auto fas fa-trash text-danger mx-3 h5"></i></button>

                                @csrf
                                @method('delete')
                            </form>

                        </td>


                    </tr>
                @endforeach



            </tbody>
        </table>
    </div>


@endsection

@include('layouts._datatable')
