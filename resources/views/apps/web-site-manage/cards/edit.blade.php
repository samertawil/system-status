@extends('layouts.app-master')

@section('title', ucfirst('edit card'))

@section('page-name', ucfirst('edit card'))

@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active">edit card</li>
@endsection

@section('app-content')

    @include('layouts._alert_session')

    @include('layouts._error_form')

 

    <div class="card card-primary container my-1">
        <div class="card-header">
            <h3 class="card-title">Quick Example</h3>
        </div>

        <form method="post" action="{{ route('admin.cards.update',$data->id) }}" enctype="multipart/form-data">
            @method('put')
            @csrf


            <div class="card-body">
                <div class="form-group">
                    <label for="card_title">العنوان</label>
                    <input type="text" name="card_title" class="form-control  " id="card_title" placeholder="card_title"
                        value="{{ $data->card_title }}">

                </div>
                <div class="form-group">
                    <label for="card_text">النص</label>
                    <input type="text" name="card_text" id="card_text" class="form-control" placeholder="card_text"
                        value="{{ $data->card_text }}">

                </div>

                <div class="form-group">
                    <label for="card_img">اضافة مرفقات</label>
                    <input type="file" name="card_img[]" accept="image/*" class="form-control" multiple>
                    @if ($data->card_img)
                        <div style="height: 100px; width: 50vw; margin-top:10px; " class="d-flex  justify-content-start ">
                            @foreach ($data->card_img as $data_img)
                                <a href="{{ asset('storage/' . $data_img) }}" target="_blank">
                                    <img src="{{ asset('storage/' . $data_img) }}"
                                        style="height: 100%;width: 100%; padding-left:20px;">
                                </a>
                            @endforeach

                        </div>
                    @endif


                </div>

                <div class="form-group d-flex">
                    <div class="form-check">
                        <label for="gallary_id" class="form-check-label  ">gallary</label>
                        <input name="status_id" class="form-check-input mx-2" type="radio" value="46" id="gallary_id" {{$data->status_id==46?
                        'checked':''}}>
                    </div>
                    <div class="form-check mx-4">
                        <label for="card_id" class="form-check-label  ">Cards</label>
                        <input name="status_id" class="form-check-input mx-2" type="radio" value="45" id="card_id" {{$data->status_id==45?'checked':''}}>
                    </div>
                </div>


                <div class="form-group d-flex">
                    <div class="form-check">
                        <label class="form-check-label " for="value_1">active</label>
                        <input class="form-check-input  mx-3" type="radio" name="active" value="1" {{$data->active==1?'checked':''}}>
                    </div>
                    <div class="form-check mx-4">
                        <label class="form-check-label " for="value_0">not active </label>
                        <input class="form-check-input mx-2 " type="radio" name="active" value="0"  {{$data->active==0?'checked':''}}>
                    </div>

                </div>

            </div>




            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>

@endsection


 