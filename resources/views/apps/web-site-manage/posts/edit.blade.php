@extends('layouts.app-master')

@section('title', ucfirst('edit post'))

@section('page-name', ucfirst('تعديل مدونة'))

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



            <form action="{{ route('user.post.update', $post->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group ">
                            <label>blog title</label>
                            <input name="title" type="text" class="form-control" placeholder="Enter blog title"
                                value="{{ $post->title }}">
                            
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label>description</label>
                            <textarea name="description" class="form-control" rows="3" placeholder="Enter description">{{ $post->description }}</textarea>
                          
                        </div>
                    </div>

                </div>

                <div class="py-3">

                    <div>
                        <div class=" d-flex justify-content-between">

                            <div class="form-group d-flex justify-content-between">
                                <div class="form-check">

                                    <input class="form-check-input" type="radio" name="post_type" value="16"
                                        id="value_16" {{ $post->post_type == 16 ? 'checked' : '' }}>
                                    <label class="form-check-label mx-4" for="value_16">مدونة عامة للنشر</label>
                                </div>
                                <div class="form-check ">

                                    <input class="form-check-input" type="radio" name="post_type" value="17"
                                        id="value_17" {{ $post->post_type == 17 ? 'checked' : '' }}>
                                    <label class="form-check-label mx-4" for="value_17">مدونة شخصية خاصة</label>
                                </div>

                            </div>

                            <div class="form-group d-flex justify-content-between">
                                <div class="form-check">

                                    <input class="form-check-input" type="radio" name="comment_able" value="19"
                                        id="value_19" {{ $post->comment_able == 19 ? 'checked' : '' }}>
                                    <label class="form-check-label mx-4" for="value_19">التعليقات مغلقة</label>
                                </div>
                                <div class="form-check ">

                                    <input class="form-check-input" type="radio" name="comment_able" value="20"
                                        id="value_20" {{ $post->comment_able == 20 ? 'checked' : '' }}>
                                    <label class="form-check-label mx-4" for="value_20">التعليقات مفتوحة</label>
                                </div>

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
                                        <option value="{{ $post->category_id }}" hidden>
                                            {{ $post->categoryname->category_name }}</option>
                                        @foreach ($categories as $category)
                                            @php
                                                $categorystatus =
                                                    $category->status_id == 36
                                                        ? ' :: ' . $category->statusname->status_name
                                                        : '';
                                            @endphp

                                            <option value="{{ $category->id }}">{{ $category->category_name }} <span
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
                                    <option value="{{$post->status_id}}" hidden>{{$post->statusname->status_name}}</option>
                                    @foreach ($Poststypedata->where('p_id', 21) as $data)
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
                                id="tags_id" value="{{$post->tags}}">
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


