@extends('layouts.app-master')


@section('page-name','user blogs')

@section('title','user blogs')


@section('app-content')
    <div class="container" style="direction: rtl;">
   

                      <div class="row">

                    @forelse ($postsdata as $postdata)
                        <div class="col-lg-6">

                            @if ($postdata->post_img)
                                <?php $arrLength = count($postdata->post_img); ?>
                            @endif

                            <div class="card mb-4">

                                <div class="my-3" style="height: 200px; width:100%;">

                                    <?php $img = $postdata->post_img ? $postdata->post_img[$arrLength - 1] : '3.png'; ?>

                                    <a href="#!"><img class="card-img-top"src="{{ asset('storage/' . $img) }}"
                                            alt="..."
                                            style="height: 100%; width:100; object-fit: contain; overflow: hidden;" /></a>

                                </div>


                                <div class="card-body">
                                    <div class="d-flex  justify-content-between">
                                        <div class="small text-muted">{{ $postdata->created_at->format('d/m/Y') }}</div>
                                        <div class="small text-muted">created by : <a
                                                href="">{{ $postdata->username->full_name }}</a></div>

                                    </div>


                                    <h2 class="card-title h4">{{ $postdata->title }}</h2>


                                    <form action="{{ route('showblog', $postdata->id) }}" method="get">

                                        <p>{!! Str::limit($postdata->description, 80, '....') !!}</p><button type="submit" class="btn btn-primary">Read
                                            more →</button>
                                    </form>

                                </div>
                            </div>


                        </div>
                        @empty
                        <div class="text-center h4 text-danger fw-bold"> <p>No Post For User</p></div>
                     
                    @endforelse

         
                </div>
            </div>
        @endsection
 
 