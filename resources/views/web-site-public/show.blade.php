@extends('layouts.master')

@section('links')
    <link rel="stylesheet" href="{{ asset('css/web-site/pace-theme-flat-top.css') }}">
    <link rel="stylesheet" href="{{ asset('css/web-site/adminlte.min.css') }}">
@endsection

@section('css')
@endsection


@section('content')


    <section class="content my-5 container" style="margin-top: 200px !important;">


        <div class="card">
            <div class="card-header">


                <h3 class="card-title">{{ $data->card_title }}</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <div class="card-text">{{ $data->card_text }}</div>
            </div>

            <div class="card-footer">
                Created At : {{ $data->created_at->format('M d Y h:24') }} Created By : {{ $data->username->full_name }}
            </div>

        </div>

        <div>

            @if ($data->card_img)
                @foreach ($data->card_img as $img)
                    <img src="{{ asset('storage/' . $img) }}" alt="" style="height: 200px; width:200px;">
                @endforeach
            @else
                <p class="text-danger fw-bold text-center">no picture</p>
            @endif


        </div>
    </section>

@endsection

@section('js')
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/pace.min.js') }}"></script>
    <script src="{{ asset('js/adminlte.min.js') }}"></script>
@endsection
