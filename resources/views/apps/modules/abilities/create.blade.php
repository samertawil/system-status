@extends('layouts.app-master')

@section('page-name', 'create abilities')

@section('title', 'create abilities')

@section('app-content')

    @include('layouts._alert_session')

    @include('layouts._error_form')

    <div style="direction: rtl;">
        <div class="container">
            <div class="card-body">

                {{-- form-control text-start  --}}


                <form action="{{ route('admin.abilities.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group ">
                                <label>ability name</label>
                                <input name="ability_name" type="text" placeholder="ability_name" value="{{old('ability_name')}}"
                                    @class([
                                        'form-control',
                                        'text-start',
                                        'is-invalid' => $errors->has('ability_name'),
                                    ])>
                                    @include('layouts._show_error',['field_name'=>'ability_name'])
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>ability_description</label>
                                <input name="ability_description" 
                                    placeholder="ability_description" value="{{old('ability_description')}}" @class([
                                        'form-control',
                                        'is-invalid'=>$errors->has('ability_description'),
                                    ]) ></input>
                                        @include('layouts._show_error',['field_name'=>'ability_description'])
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>url</label>
                                <input name="url" class="form-control" placeholder="url" value="{{old('url')}}"></input>
                            </div>
                        </div>

                    </div>


                    <div class="py-3">
                        <div class="row">
                            <div class="col-sm-6">

                                <div class="d-flex justify-content-around">

                                    <div class="form-check">
                                        <input name="activation" type="radio" id="active" value="active"
                                            class="form-check-input @error('activation') is-invalid 

                                            @enderror" @checked(old('activation') === 'active')>
                                        <label class="form-check-label mx-4" for="active">active</label>
                                    </div>

                                    <div class="form-check">
                                        <input name="activation" type="radio" id="not_active" value="not active"
                                            class="form-check-input @error('activation') is-invalid)
                                                
                                            @enderror"  @checked(old('activation') === 'not active')>
                                        <label class="form-check-label mx-4" for="not_active">not active</label>
                                    </div>


                                </div>

                            </div>
                            <div class="col-sm-6">
                                <div class="">
                                    <div class="form-group">
                                        <select name="module_id" class="form-control">
                                            <option value="" hidden>اختار نظام</option>
                                            @foreach ($statuses->where('p_id', 1) as $status)
                                                <option value="{{ $status->id }}">{{ $status->status_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>



                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>description</label>
                                <textarea name="description" class="form-control" rows="3" placeholder="Enter description">{{old('description')}}</textarea>
                            </div>
                        </div>

                    </div>

                    @include('layouts.2button', ['name' => 'SAVE'])

                </form>
            </div>

        </div>
    </div>



@endsection
