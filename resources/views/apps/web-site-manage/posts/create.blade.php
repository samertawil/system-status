@extends('layouts.app-master')

@section('title', ucfirst('posts'))

@section('page-name', ucfirst('اضافة مدونة'))

@section('css-links')

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="{{ asset('css/summernote-bs4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/codemirror.css') }}">
    <link rel="stylesheet" href="{{ asset('css/monokai.css') }}">
@endsection

@section('app-content')

    @include('layouts._alert_session')

    @include('layouts._error_form')


    <div class="card card-warning container" style="direction: rtl;">

        <div class="card-body">
            <div class="info-box bg-gradient-info">
                <span class="info-box-icon"><i class="far fa-bookmark"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Bookmarks</span>
                    <span class="info-box-number">41,410</span>
                    <div class="progress">
                        <div class="progress-bar" style="width: 70%"></div>
                    </div>
                    <span class="progress-description">
                        70% Increase in 30 Days
                    </span>
                </div>
            </div>


            <form action="{{ route('user.post.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group ">
                            <label>blog title</label>
                            <input name="title" type="text" class="form-control" placeholder="Enter blog title">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label>description</label>
                            <textarea name="description" class="form-control" rows="3" placeholder="Enter description"></textarea>
                        </div>
                    </div>

                </div>
                <div class="py-3">
                    <div class="row">
                        <div class="col-sm-6">

                            <div class="d-flex justify-content-around">
                                @foreach ($Postsdata->where('p_id', 15) as $data)
                                    <div class="form-check">
                                        <input name="post_type" type="radio" id="{{ $data->id }}"
                                            value="{{ $data->id }}" class="form-check-input">
                                        <label class="form-check-label mx-4"
                                            for="{{ $data->id }}">{{ $data->status_name }}</label>
                                    </div>
                                @endforeach

                            </div>

                        </div>
                        <div class="col-sm-6">
                            <div class="d-flex justify-content-around">
                                @foreach ($Postsdata->where('p_id', 18) as $data)
                                    <div class="form-check">
                                        <input name="comment_able" type="radio" id="{{ $data->id }}"
                                            class="form-check-input" value="{{ $data->id }}" class="form-check-input">
                                        <label class="form-check-label mx-4"
                                            for="{{ $data->id }}">{{ $data->status_name }}</label>
                                    </div>
                                @endforeach

                            </div>
                        </div>
                    </div>
                </div>


                <div class=" py-3">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="row align-items-center">
                                <div class="form-group col-sm-10">
                                    <label>category_id</label>
                                    <select name="category_id" class="form-control">
                                        <option value="" hidden> اختار تصنيف للمدونة </option>
                                        @foreach ($categories as $category)

                                            @php  
           $categorystatus =  $category->status_id == 36? ' :: ' . $category->statusname->status_name : '';
                                           @endphp

                       <option  value="{{ $category->id }}">{{ $category->category_name }}<span
                                                    class="text-danger">{{ $categorystatus }}</span>


                                            </option>
                                        @endforeach


                                    </select>
                                </div>
                                <div class="col-sm-2">
                                    <div class="form-group">
                                        <label>more</label>
                                        <button type="button" class="btn btn-md btn-info border-0 " data-toggle="modal"
                                            data-target="#add_category_id">more</button>
                                    </div>

                                </div>
                            </div>

                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>status_id </label>
                                <select name="status_id" class="form-control">
                                    <option value="" hidden> اختار حالة للمدونة </option>
                                    @foreach ($Postsdata->where('p_id', 21) as $data)
                                        <option value="{{ $data->id }}">{{ $data->status_name }}</option>
                                    @endforeach


                                </select>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>tags</label>
                            <input name="tags" type="text" class="form-control" placeholder="tags is here"
                                id="tags_id">
                        </div>

                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>file upload</label>
                            <input type="file" name="post_img[]" class="form-control" placeholder="upload file" multiple>
                        </div>

                    </div>
                </div>

                @include('layouts.2button', ['name' => 'save'])

            </form>
        </div>

    </div>



@endsection
@section('js')
    <script src="{{ asset('js/summernote-bs4.min.js') }}"></script>
    <script>
        < script >
            $(function() {
                // Summernote
                $('#summernote').summernote()

                // CodeMirror
                CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
                    mode: "htmlmixed",
                    theme: "monokai"
                });
            }) <
            />
    </script>
@endsection


<!-- Modal -->
<div class="modal fade" id="add_category_id" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">category name modal</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form action="{{ route('user.category.store') }}" method="post">
                    @csrf
                    <section class="d-lg-flex justify-content-evenly align-items-center border  ">

                        <div class="form-group px-2">
                            <label for="category_name_id" style="text-align:right !important;">category_name</label>
                            <input name="category_name" type="text" class="form-control" id="category_name_id">

                        </div>


                    </section>
                    <div class="d-flex justify-content-between">

                        @include('layouts.2button')
                        <div class="card-footer bg-white">
                            <button type="button" class=" btn btn-dark " data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">close</span>
                            </button>
                        </div>

                    </div>
                </form>
            </div>



        </div>
    </div>
</div>
