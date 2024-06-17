 @extends('layouts.master')

 @section('content')

     @include('layouts._error_form')

     <div class="container mt-5">
         <div class="row">
             <div class="col-lg-8">

                 <article>

                     <header class="mb-4">

                         <h1 class="fw-bolder mb-1">{{ $data->title }}</h1>

                         <div class="text-muted fst-italic mb-2">Posted on {{ $data->created_at->format('l jS \of F Y') }}
                         </div>

                         <a class="badge bg-secondary text-decoration-none link-light"
                             href="#!">{{ $data->categoryname->status_name }}</a>

                     </header>


                     @php
                         if ($data->post_img) {
                             $arrlength = count($data->post_img);
                         }
                         $img = $data->post_img ? $data->post_img[$arrlength - 1] : '3.png';
                     @endphp


                     <figure class="mb-4"><img class="img-fluid rounded" src="{{ asset('storage/' . $img) }}"
                             alt="..." /></figure>

                     <section class="mb-5">
                         <p class="fs-5 mb-4">{{ $data->description }}</p>


                     </section>
                 </article>
                 <!-- Comments section-->
                 <section class="mb-5">
                     <div class="card bg-light">
                         <div class="card-body">

                             @include('layouts._alert_session')

                             <!-- Comment form-->
                             @if ($data->comment_able == 20)
                                 <form action="{{ route('user.comment.store', $data->id) }}" method="post"
                                     enctype="multipart/form-data" class="mb-4">
                                     @csrf
                                     <textarea name="comment" @class(['form-control', 'is-invalid' => $errors->has('comment')]) rows="3"
                                         placeholder="Join the discussion and leave a comment!"></textarea>
                                     @include('layouts._show_error', ['field_name' => 'comment'])
                                     @include('layouts.2button', ['name' => 'LEAVE COMMENT'])
                                 </form>
                             @endif

                             <!-- Comment with nested comments-->
                             <!-- Single comment-->

                             @forelse ($comments  as $comment)
                                 <div class="text-end">
                                     <div class="fw-bold">{{ $comment->full_name ? $comment->full_name : 'Guest' }}</div>
                                 </div>
                                 <div class="d-flex my-3 py-3 align-items-center border ">
                                     <div class="flex-shrink-0 "><img class="rounded-circle"
                                             src="https://dummyimage.com/50x50/ced4da/6c757d.jpg" alt="..." />
                                     </div>
                                     <div>
                                         <div class="mx-2">
                                             <p>{{ $comment->comment }}</p>
                                         </div>

                                     </div>
                                 </div>

                                 @if ($comment->user_id = Auth::id())
                                     <div class="d-flex justify-content-end">
                                         <div class="mx-2">


                                             <button class="btn btn-info btn-sm" type="button" data-bs-toggle="modal"
                                                 id="m1" data-bs-target="#edit{{ $comment->id }}">EDIT
                                             </button>

                                             <div class="modal fade" id="edit{{ $comment->id }}" tabindex="-1"
                                                 aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                 <div class="modal-dialog">
                                                     <div class="modal-content">
                                                         <div class="modal-header">
                                                             <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                                             <button type="button" class="btn-close btn-sm    m-1"
                                                                 data-bs-dismiss="modal" aria-label="Close"></button>
                                                         </div>

                                                         <div class="modal-body">
                                                             <form
                                                                 action="{{ route('user.comment.update', $comment->id) }}"
                                                                 method="post">
                                                                 @csrf
                                                                 @method('put')
                                                                 <input class="form-control" name="comment" type="text"
                                                                     id="pass_id" value="{{ $comment->comment }}">

                                                                 <div
                                                                     class="modal-footer d-flex w-100 justify-content-between">
                                                                     <button type="BUTTON"
                                                                         class="btn btn-secondary text-end"
                                                                         data-bs-dismiss="modal">CLOSE</button>
                                                                     @include('layouts.2button', [
                                                                         'name' => 'UPDATE',
                                                                     ])

                                                                 </div>
                                                             </form>
                                                         </div>

                                                     </div>
                                                 </div>
                                             </div>
                                         </div>


                                         <form action="{{ route('user.comment.destroy', $comment->id) }}" method="post">
                                             @csrf
                                             @method('delete')
                                             <button class="btn btn-danger btn-sm">delete</button>
                                         </form>
                                     </div>
                                 @endif



                             @empty
                                 <div class="text-center text-primary h4 fw-bold">
                                     <p>No Comments Yet</p>
                                 </div>
                             @endforelse



                         </div>
                     </div>
                 </section>
             </div>
             <!-- Side widgets-->
             <div class="col-lg-4">
                 <!-- Search widget-->
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

                 <div class="card mb-4">
                     <div class="card-header">Side Widget</div>
                     <div class="card-body">You can put anything you want inside of these side widgets. They are easy to
                         use,
                         and feature the Bootstrap 5 card component!</div>
                 </div>

                 <div class="card">
                     <div class="card-body text-center">
                         <div class="card-title">
                             <p class="fw-bold fs-4">Images for post</p>
                         </div>
                         <div>
                             @if ($data->post_img)
                                 @foreach ($data->post_img as $img)
                                     <div>
                                         <a href="{{ asset('storage/' . $img) }}" target="_blank"> <img
                                                 src="{{ asset('storage/' . $img) }}" class="my-2"
                                                 style="height: 250px; width:100%; object-fit:cover; overflow: hidden;"></a>
                                     </div>
                                 @endforeach
                             @else
                                 <p class="fw-bold">no images is posted</p>
                             @endif

                         </div>

                     </div>
                 </div>
             </div>
         </div>
     </div>






     <script src="{{ asset('js/jQuery.js') }}"></script>

     {{-- <script>
         $(document).ready(function() {
             $("#editmodal").on("show.bs.modal", function(e) {
                 var id = $(e.relatedTarget).data('target-id');
                 $('#pass_id').val(id);
             });
         });
     </script> --}}


 @endsection
