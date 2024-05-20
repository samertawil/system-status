@extends('layouts.app-master')

@section('page-name', 'create status')

@section('title', 'status')

@section('app-content')

    @include('layouts._alert_session')

    @include('layouts._error_form')

    <div class="container " style="direction: rtl;">
        <form action="{{ route('admin.status.store') }}" method="post">
            @csrf
            <section class="d-lg-flex justify-content-evenly align-items-center border  ">

                <div class="form-group px-2">
                    <label for="status_name_id" style="text-align:right !important;">status_name</label>
                    <input name="status_name" value="{{ old('status_name') }}" type="text"
                     @class(['form-control',
                      'is-invalid' => $errors->has('status_name'),
                   ])
                        id="status_name_id">
                    @include('layouts._show_error', ['field_name' => 'status_name'])
                </div>



                <div class="form-group px-2">
                    <label for="parent_id_id">parent_id</label>
                    <select class="custom-select form-control" name="p_id">
                        <option value="">///</option>
                        @foreach ($parentsname_data as $parentname_data)
                            <option value="{{ $parentname_data->id }}">{{ $parentname_data->status_name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group px-2">
                    <label for="used_in_system_id">used in system</label>
                    <input name="used_in_system" type="number" class="form-control" id="used_in_system_id"
                        value="{{ old('used_in_system') }}">
                </div>

                <div class="form-group px-2">
                    <label for="route_name_id">route_name</label>
                    <input name="route_name" type="text" class="form-control" id="route_name_id"
                        value="{{ old('route_name') }}">
                </div>

                <div class="form-group px-2">
                    <label for="page_name_id">page_name</label>
                    <input name="page_name" type="text" class="form-control" id="page_name_id"
                        value="{{ old('page_name') }}">
                </div>

            </section>

            <div class="d-flex">
                <div class="form-group px-2">
                    <label for="note_id">description</label>
                    <input name="description" type="text" class="form-control" id="note_id"
                        value="{{ old('description') }}">
                </div>

                <div class="form-group px-2">
                    <label for="route_system_name_id">route_system_name</label>
                    <input name="route_system_name" type="text" id="route_system_name_id"
                        value="{{ old('route_system_name') }}" @class ([
                            'form-control',
                            'is-invalid' => $errors->has('route_system_name'),
                        ])>
                    @include('layouts._show_error', ['field_name' => 'route_system_name'])
                </div>

            </div>


            @include('layouts.2button', ['name' => 'save'])

        </form>
        @include('apps.modules.status.index_table')
    </div>

@endsection
