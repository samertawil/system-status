@extends('layouts.app-master')

@section('page-name', 'users groups list مجموعات الصلاحيات')

@section('title', 'user roles ')

@section('app-content')

    @include('layouts._alert_session')

    @include('layouts._error_form')

    <div style="direction: rtl;">
        <div class="container">
            <div class="card-body">




                <form action="{{ route('admin.users.update', $user->id) }}" method="post" enctype="multipart/form-data">

                    @csrf
                    @method('put')
                    
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group ">
                                <label>user name</label>
                                <input class="form-control" type="text" value="{{ $user->user_name }}" disabled>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label>full name</label>
                                    <input name="full_name" placeholder="full name" value="{{ $user->full_name }}"
                                        @class(['form-control', 'is-invalid' => $errors->has('full_name')])></input>
                                    @include('layouts._show_error', [
                                        'field_name' => 'full_name',
                                    ])
                                </div>
                            </div>

                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label>email</label>
                                    <input name="email" placeholder="email" value="{{ $user->email }}"
                                        @class(['form-control', 'is-invalid' => $errors->has('email')])></input>
                                    @include('layouts._show_error', [
                                        'field_name' => 'email',
                                    ])
                                </div>
                            </div>

                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label>email_verified_at</label>
                                    <input name="email_verified_at" placeholder="email_verified_at"
                                        value="{{ $user->email_verified_at }}" @class([
                                            'form-control',
                                            'is-invalid' => $errors->has('email_verified_at'),
                                        ])></input>
                                    @include('layouts._show_error', [
                                        'field_name' => 'email_verified_at',
                                    ])
                                </div>
                            </div>

                        </div>


                        <div class="py-3">
                            <div class="row">
                                <div class="col-sm-6">

                                    <div class="d-flex justify-content-around">

                                        <div class="form-check">
                                            <input name="user_activation" type="radio" id="active" value="1"
                                                class="form-check-input @error('user_activation') is-invalid 

                                            @enderror"
                                                {{-- @checked(old('user_activation') === '1') --}} @checked($user->user_activation === '1')>
                                            <label class="form-check-label mx-4" for="active">active</label>
                                        </div>

                                        <div class="form-check">
                                            <input name="user_activation" type="radio" id="not_active" value="0"
                                                class="form-check-input @error('user_activation') is-invalid)
                                                
                                            @enderror"
                                                {{-- @checked(old('user_activation') === '0')> --}} @checked($user->user_activation === '0')>
                                            <label class="form-check-label mx-4" for="not_active">not active</label>
                                        </div>


                                    </div>

                                </div>
                                <div class="col-sm-6">
                                    <div class="">
                                        <div class="form-group">
                                            <select name="user_type" class="form-control">
                                                <option value="{{$user->user_type}}" hidden>{{$user->usertype->status_name}}</option>
                                                @foreach ($statuses as $status)
                                    <option value="{{$status->id }}">{{ $status->status_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>


                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-check ">
                            @foreach ($roles_group as $role_group)
                                <input name="role_id[]" type="checkbox" value="{{ $role_group->id }}"
                                    id="{{ $role_group->id }}" class="form-check-input "
                                    @foreach ($granted_groups as $granted)
                    
                                @if (in_array($granted->role_id, [$role_group->id] ?? [])) checked @endif @endforeach>
                    
                                <label for="{{ $role_group->id }}" class="form-check-label mx-4">
                                    {{ $role_group->name }}</label>
                            @endforeach
                    
                        </div>

                

                        @include('layouts.2button', ['name' => 'UPDATE'])

                </form>
            </div>

        </div>
    </div>
   
@endsection
