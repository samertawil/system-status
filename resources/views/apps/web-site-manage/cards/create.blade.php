@extends('layouts.app-master')

@section('title', ucfirst('add new card'))

@section('page-name', ucfirst('add new card'))

@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active">add new card</li>
@endsection

@section('app-content')


    @include('layouts._alert_session')

    @include('layouts._error_form')



    <div class="card card-primary container my-1">
        <div class="card-header">
            <h3 class="card-title">Cards & Gallary</h3>
        </div>

        <form method="post" action="{{ route('admin.cards.store') }}" enctype="multipart/form-data">
            @csrf


            <div class="card-body">
                <div class="form-group">
                    <label for="card_title">العنوان</label>
                    <input type="text" name="card_title" class="form-control @error('card_title') is-invalid @enderror"
                        id="card_title" placeholder="card_title" value="{{ old('card_title') }}">
                    @error('card_title')
                        @foreach ($errors->get('card_title') as $error)
                            <li class="invalid-feedback">{{ $error }}</li>
                        @endforeach
                    @enderror
                </div>
                <div class="form-group">
                    <label for="card_text">النص</label>
                    <input type="text" name="card_text" @class(['form-control', 'is-invalid' => $errors->has('card_text')]) id="card_text"
                        placeholder="card_text" value="{{ old('card_text') }}">
                    @error('card_text')
                        @foreach ($errors->get('card_text') as $error)
                            <li class="invalid-feedback">{{ $error }}</li>
                        @endforeach
                    @enderror
                </div>

                <div class="form-group">
                    <label for="card_img">اضافة مرفقات</label>
                    <input type="file" name="card_img[]" @class ([
                        ' custom-file',
                        'form-control',
                        'is-invalid' => $errors->has('card_img'),
                    ]) accept="image/*" multiple>
                    @error('card_img')
                        @foreach ($errors->get('card_img') as $error)
                            <li class="invalid-feedback">{{ $error }}</li>
                        @endforeach
                    @enderror
                </div>

                <div class="form-group d-flex">
                    <div class="form-check">
                        <label for="gallary_id" class="form-check-label  ">gallary</label>
                        <input name="status_id" class="form-check-input mx-2" type="radio" value="46" id="gallary_id" checked
                            @checked(old('status_id') == 46)>
                    </div>
                    <div class="form-check mx-4">
                        <label for="card_id" class="form-check-label  ">Cards</label>
                        <input name="status_id" class="form-check-input mx-2" type="radio" value="45" id="card_id"
                            @checked(old('status_id') == 45)>
                    </div>
                </div>

                <div class="form-group d-flex ">

                    <div class="form-check">
                        <label class="form-check-label " for="value_1">active</label>
                        <input class="form-check-input mx-2" type="radio" name="active" value="1"  
                            @checked(old('active') == 1) id="value_1">
                    </div>

                    <div class="form-check mx-4">
                        <label class="form-check-label " for="value_0">not active </label>
                        <input class="form-check-input mx-2" type="radio" name="active" value="0"
                            @checked(old('active') == 0) id="value_0">
                    </div>

                </div>

            </div>



            @include('layouts.2button', ['name' => 'save', 'name1' => 'CLEAR'])

        </form>
    </div>

@endsection
