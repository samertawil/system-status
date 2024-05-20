@extends('layouts.app-master')

@section('page-name', 'permission groups list مجموعات الصلاحيات')

@section('title', 'permission index')

@section('app-content')

    @include('layouts._alert_session')

    @include('layouts._error_form')

    <div class="container text-end" style="direction: rtl;">

        <form action="{{ route('admin.roles.update', $roles->id) }}" method="post">
        <form action="#" method="post">

            @csrf
            @method('put')

            @include('apps.modules.roles._role_form')

            @include('layouts.2button',['name'=>'UPDATE'])

        </form>


    </div>

@endsection
