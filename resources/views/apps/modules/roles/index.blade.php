@extends('layouts.app-master')

@section('page-name', 'permission groups list مجموعات الصلاحيات')

@section('title', 'permission index')

@section('app-content')

    <div class="m-3">
        @php
            $url = URL::current();
            $parts = explode('/', $url);
            $length = count($parts);
        @endphp


        <a @class([
            'btn btn-md btn-info fw-bold border-0',
            'd-none' => $parts[$length - 1] == 1,
        ]) href="{{ route('admin.roles.index', 1) }}">Trashed data</a>

        <div @class([
            'd-none' => $parts[$length - 1] == 0,
        ])>

            <a class="btn btn-md btn-info fw-bold border-0" @class(['btn btn-md btn-success  fw-bold border-0 ']) href="{{ route('admin.roles.index', 0) }}">Index</a>


        </div>



    </div>


    @include('layouts._addNewButton', ['urlname' => 'admin/roles/create'])

    @include('layouts._alert_session')



    <div class="container">
        <table class="table border  " id="mytable" style="direction: rtl;">
            <thead>
                <tr>
                    <th>id</th>
                    <th>group name</th>
                    <th>user#</th>
                    <th>controll</th>
                </tr>


            </thead>
            <tbody>
                @foreach ($roles as $role)
                    <tr>
                        <td>{{ $role->id }}</td>
                        <td>

                            <button type="button" class="btn fw-bold border-0 text-primary" data-toggle="modal"
                                data-target="#Modal{{ $role->name }}" title="show abilities">
                                {{ $role->name }}
                            </button>
                            <div class="modal fade" id="Modal{{ $role->name }}" tabindex="-1"
                                aria-labelledby="exampleModalLabel" aria-hidden="true" style="direction: ltr;">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title  " id="exampleModalLabel">abilites of <span
                                                    class="fw-bold text-primary text-lg">{{ $role->name }}</span> role
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">


                                            <div>
                                                @foreach (\App\Models\role::where('name', $role->name)->get() as $data)
                                                    <ul>
                                                        @foreach ($data->abilities as $ability_name)
                                                            <li>{{ $ability_name }}</li>
                                                        @endforeach

                                                    </ul>
                                                @endforeach
                                            </div>
                                        </div>

                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Close</button>

                                        </div>
                                    </div>
                                </div>
                            </div>

                        </td>
                        <td>{{ $role->usersRelation_count }}</td>
                        <td class="d-flex ">
                            @if (!$role->deleted_at)
                                <div>
                                    <button class="btn"> <a href="{{ route('admin.roles.edit', $role->id) }}"> <i
                                                class="fa fa-edit text-info fs-5" title="restore"></i></a></button>
                                </div>
                            @else
                                <div>
                                    <form action="{{ route('admin.roles.restore', $role->id) }}" method="post">
                                        <button class="btn"><i class="fas fa-trash-restore text-success fs-5"
                                                title="restore"></i></button>
                                        @csrf
                                        @method('put')
                                    </form>

                                </div>
                            @endif

                            <div class="mx-3">
                                @if (!$role->deleted_at)
                                    <form action="{{ route('admin.roles.destroy', $role->id) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" onclick="alert('are you sure?')" class="btn"> <i
                                                class="fa fa-trash text-danger fs-5" title="delete"></i></button>
                                    </form>
                                @else
                                    <form action="{{ route('admin.roles.ForecDelete', $role->id) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit"
                                            onclick="alert('are you sure? you will be not able to restore it')"
                                            class="btn"> <i class="fa fa-trash text-dark fs-5"
                                                title="delete"></i></button>
                                    </form>
                                @endif
                            </div>

                        </td>

                    </tr>
                @endforeach



            </tbody>
        </table>
    </div>


@endsection

@include('layouts._datatable')
