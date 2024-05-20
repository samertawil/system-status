@extends('layouts.master')


@section('content')
    <div class=" container my-5">
        <div class="card card-primary">
            <div class="card-header">
                <h4 class="card-title">Gallary Lightbox</h4>
            </div>
            <div class="card-body">
                <div class="row">


                    @foreach ($gallaries_data as $gallary_data)
                        @foreach ($gallary_data->card_img as $img)
                            <div class="col-2">
                                <a href="{{ asset('storage/' . $img) }}" data-toggle="lightbox" data-title="sample 1 - white"
                                    data-gallery="gallery" title="{{ $gallary_data->card_text }}" target="_blank">
                                    <img src="{{ asset('storage/' . $img) }}" class="img-fluid mb-2" alt="white sample"
                                        style="height: 250px; width:250px; object-fit:contain;">
                                </a>
                                <p class="text-center bg-light" >{{ $gallary_data->card_title }}
                                </p>
                            </div>
                        @endforeach
                    @endforeach





                </div>
            </div>
        </div>
    </div>
@endsection
