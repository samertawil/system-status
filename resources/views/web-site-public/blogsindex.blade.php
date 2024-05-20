 @extends('layouts.master')





 @section('content')
     <div class="py-5  border-bottom mb-4 bg-dark text-light  ">
         <div class="container">
             <div class="text-center my-5">
                 <h1 class="fw-bolder">Welcome to Blog Home !</h1>
                 <p class="lead mb-0"> Blog homepage</p>


             </div>
             <div class="text-center ">
                 <a class="btn btn-md  bg-info px-5  my-auto"href="{{ route('user.post.create') }}">نشر مدونة</a>
             </div>
         </div>
     </div>


     <div class="container">
         <div class="row">

             <div class="col-lg-8">

                 <div class="card mb-4">

                     @forelse ($lastpostsdata as $lastpostdata)
                         <div class="my-3" style="height: 250px; width:100%;">
                             @if ($lastpostdata->post_img)
                                 <?php $arrLength1 = count($lastpostdata->post_img); ?>
                             @endif

                             @php
                                 $img1 = $lastpostdata->post_img ? $lastpostdata->post_img[$arrLength1 - 1] : '3.png';
                             @endphp

                             <a href="#!"><img class="card-img-top" src="{{ asset('storage/' . $img1) }}"
                                     alt="..."
                                     style="height: 100%; width:100%; object-fit: fill; overflow: hidden;" /></a>
                         </div>

                         <div class="card-body">
                             <div class="d-flex justify-content-between">
                                 <div class="small text-muted">{{ $lastpostdata->created_at->format('d/m/Y') }}</div>
                                 <div class="small text-muted">created by : <a
                                         href="#">{{ $lastpostdata->username->full_name }}</a></div>
                             </div>

                             <h2 class="card-title">{{ $lastpostdata->title }}</h2>


                             <form action="{{ route('showblog', $lastpostdata->id) }}" method="get">

                                 <p>{!! Str::limit($lastpostdata->description, 150, '....') !!}</p><button type="submit" class="btn btn-primary">Read more
                                     →</button>
                             </form>


                         </div>
                         @empty 
                         <div class="text-center" >
                            <p class="text-danger fw-bold h4 my-3">لا يوجد اي مدونة للعرض</p>
                         </div>
                        
                     @endforelse
                 </div>

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
                                         <span>{{ $postdata->categoryname->category_name }}</span>
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
                          
                     @endforelse




                 </div>

             </div>

             <div class="col-lg-4">

                 <div class="card mb-4">
                     <div class="card-header">Search</div>
                     <div class="card-body">
                         <div class="input-group">
                             <input class="form-control" type="text" placeholder="Enter search term..."
                                 aria-label="Enter search term..." aria-describedby="button-search" />
                             <button class="btn btn-primary" id="button-search" type="button">Go!</button>
                         </div>
                     </div>
                 </div>

@include('layouts.categorycount')


                 <div class="card mb-4">
                     <div class="card-header">Side Widget</div>
                     <div class="card-body">You can put anything you want inside of these side widgets. They are easy to
                         use, and feature the Bootstrap 5 card component!</div>
                 </div>
             </div>
         </div>
     </div>
 @endsection
