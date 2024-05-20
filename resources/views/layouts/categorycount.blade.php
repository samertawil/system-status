                 {{-- <div class="card mb-4">
                     <div class="card-header">Categories</div>
                     <div class="card-body">
                         <div class="row">
                             @foreach ($categories as $category)
                                 <div class="col-sm-6">
                                     <ul class="text-primary">
                                         <li>
                                             <a href="{{ route('blogscateroty', $category->id) }}"
                                                 style="text-decoration-line:none;"> {{ $category->category_name }}</a>
                                         </li>
                                     </ul>
                                 </div>
                             @endforeach

                         </div>
                     </div>
                 </div> --}}
                 
                 <div class="card mb-4">
                    <div class="card-header">Categories</div>
                    <div class="card-body">
                        <div class="row">
                            @foreach ($categoriescount as $categorycount)
                                <div class="col-sm-6">
                                    <ul class="text-primary">
                                        <li>
                                            <a href="{{ route('blogscateroty', $categorycount->category_id) }}"
                                                style="text-decoration-line:none;"> {{$categorycount->categoryname->category_name.' '.'('.$categorycount->total.')' }}</a>
                                        </li>
                                    </ul>
                                </div>
                            @endforeach

                        </div>
                    </div>
                </div>
                 