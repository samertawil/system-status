<div>


    <section class=" bg-dark  py-5" style="background-image:url({{ asset('media/html/pic/landing.svg') }});">

        <div class="container d-lg-flex text-light align-items-center justify-content-between ">
            <div style="height: 250px; width:350px;">
                <img src="{{ asset('media/html/logo/1.png') }}" style="height: 100%; width: 100%;">
            </div>
            <div class="text-sm-center m-auto ">
                <h1 class="fw-bold text-warning ">AL-HADDAD for jewrely</h1>
                <h5 class="my-4">since 1968</h5>
                <a href="https://facebook.com"><i class="fa-brands fa-facebook text-primary"
                        style="font-size: 22px;"></i></a>
                <a href="https://twitter.com"><i class="fa-brands fa-twitter text-info mx-2"
                        style="font-size: 22px;"></i></a>
            </div>
        </div>
    </section>

    <svg viewBox="15 12 1470 48" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path
            d="M0 11C3.93573 11.3356 7.85984 11.6689 11.7725 12H1488.16C1492.1 11.6689 1496.04 11.3356 1500 11V12H1488.16C913.668 60.3476 586.282 60.6117 11.7725 12H0V11Z"
            fill="#13263c"></path>
    </svg>


    <section>

        <div class="text-center py-3">
            <p class="fs-2 fw-bolder">Some Of Our Prodcuts</p>
            <span class="text-muted">Save thousands to millions of bucks by using single tool</span>
        </div>

        <div class="">
            <div class="row  justify-content-around my-3">

                @foreach ($cards_data as $card_data)
                    <div class="card col-sm-12 col-md-6 col-lg-2 border-0  p-1">
                        <div class="card-body border ">

                            <div class="" style=" width: 100%;">

                                @if ($card_data->card_img)
                                    <?php $arrLength = count($card_data->card_img); ?>
                                @endif

                                <?php $img = $card_data->card_img ? $card_data->card_img[$arrLength - 1] : '3.png'; ?>

                                <img src="{{ asset('storage/' . $img) }}" alt="no picture available"
                                    style="height: 100%; width: 100%; object-fit:contain; overflow:hidden;">

                            </div>

                            <div class="card-title fw-bold mt-3 text-center" style="float:none !important;">
                                <p>{{ Strtoupper($card_data->card_title) }}</p>
                            </div>

                            <div class="card-text  text-start">

                                <?php $counter = strlen($card_data->card_text); ?>

                                @if ($counter >= 30)
                                    <span>{!! Str::limit(ucfirst($card_data->card_text), 100, '...') !!} </span> <a href="#"> more</a>
                                @else
                                    <p>{!! Str::limit(ucfirst($card_data->card_text), 100, '...') !!}
                                @endif

                            </div>
                            <div class="card-footer text-start border-0 mx-0"
                                style="background-color: white !important;">


                                <div class="mt-3 text-center">
                                    <a href="{{ route('show', $card_data->id) }}" target="_blank"> <button
                                            type="submit" class="btn border fw-bold  btn-sm px-4  text-end">
                                            تفاصيل </button></a>
                                </div>


                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>


        <div class=" pb-5 ">

            <div style="height: 634px; width:900px;" class="container bg-dark-with-pic p-0">

                <div id="carouseCard" class="carousel slide container p-0" data-bs-ride="carousel"
                    style="height: 100%; width: 100%;">
                    <div class="carousel-indicators  ">
                        @foreach ($gallaries_data as $key => $gallary_data)
                            <button type="button" data-bs-target="#carouseCard" data-bs-slide-to="{{ $key }}"
                                class="active" aria-current="true" aria-label="{{ $key }}"></button>
                        @endforeach

                    </div>



                    <div class="carousel-inner" style="height:100%; width: 100%;">

                        @foreach ($gallaries_data as $key => $gallary_data)
                            <div class=" carousel-item {{ $key == 0 ? 'active' : '' }}"
                                style="height: 100%; width: 100%;">
                                @php
                                    $arraylength = count($gallary_data->card_img);
                                @endphp
                                <img src="{{ asset('storage/' . $gallary_data->card_img[$arraylength - 1]) }}"
                                    class="d-block w-100 "style="width:100%; height: 80%; object-fit: contain;"
                                    alt="...">
                                <div class="carousel-caption d-none d-md-block ">
                                    <h5 class="fw-bold ">{{ $gallary_data->card_title }}</h5>
                                    <p>{{ $gallary_data->card_text }}</p>
                                </div>

                            </div>
                        @endforeach

                    </div>

                    <button class="carousel-control-prev" type="button" data-bs-target="#carouseCard"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouseCard"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>

                </div>
            </div>


            <div class="my-5" style="direction: ltr;">

                <div class="mx-5">
                    <p class=" h3 fw-bold text-center">What Our Clients Say</p>
                    <p class="text-muted text-center w-50  m-auto">Save thousands to millions of bucks by using single
                        tool
                        for different amazing and great useful admin</p>
                    <div class="d-lg-flex justify-content-between my-4">


                        <div>
                            <div class="card-body">
                                <div class="d-flex mb-4 ">
                                    <div class="rating-label me-2 checked">
                                        <i class="fa-solid fa-star text-warning fs-5"></i>
                                    </div>
                                    <div class="rating-label me-2 checked">
                                        <i class="fa-solid fa-star text-warning fs-5"></i>
                                    </div>
                                    <div class="rating-label me-2 checked">
                                        <i class="fa-solid fa-star text-warning fs-5"></i>
                                    </div>
                                    <div class="rating-label me-2 checked">
                                        <i class="fa-solid fa-star text-warning fs-5"></i>
                                    </div>
                                    <div class="rating-label me-2 checked">
                                        <i class="fa-solid fa-star text-warning fs-5"></i>
                                    </div>
                                </div>
                                <div class="card-title fs-4 fw-bolder">This is by far the cleanest template
                                    and the most well structured</div>
                                <div class="card-text text-muted">The most well thought out design theme I have ever
                                    used. The codes
                                    are up to tandard. The css styles are very clean. In fact the cleanest and the most
                                    up
                                    to standard I have ever seen.</div>
                                <div class="d-flex py-3 align-items-center">
                                    <img src="{{ asset('media/html/pic/150-2.jpg') }}" alt=""
                                        style="height: 70px; width:70px;">
                                    <div class="px-2">
                                        <p class="text-start fw-bolder mt-3"style="line-height: .1px;">Paul Miles</p>
                                        <p class="text-start text-muted" style="line-height: .1px;">Development Lead
                                        </p>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="card-body">
                                <div class="d-flex mb-4 ">
                                    <div class="rating-label me-2 checked">
                                        <i class="fa-solid fa-star text-warning fs-5"></i>
                                    </div>
                                    <div class="rating-label me-2 checked">
                                        <i class="fa-solid fa-star text-warning fs-5"></i>
                                    </div>
                                    <div class="rating-label me-2 checked">
                                        <i class="fa-solid fa-star text-warning fs-5"></i>
                                    </div>
                                    <div class="rating-label me-2 checked">
                                        <i class="fa-solid fa-star text-warning fs-5"></i>
                                    </div>
                                    <div class="rating-label me-2 checked">
                                        <i class="fa-solid fa-star text-warning fs-5"></i>
                                    </div>
                                </div>
                                <div class="card-title fs-4 fw-bolder">This is by far the cleanest template
                                    and the most well structured</div>
                                <div class="card-text text-muted">The most well thought out design theme I have ever
                                    used. The codes
                                    are up to tandard. The css styles are very clean. In fact the cleanest and the most
                                    up
                                    to standard I have ever seen.</div>
                                <div class="d-flex py-3 align-items-center">
                                    <img src="{{ asset('media/html/pic/150-2.jpg') }}" alt=""
                                        style="height: 70px; width:70px;">
                                    <div class="px-2">
                                        <p class="text-start fw-bolder mt-3"style="line-height: .1px;">Paul Miles</p>
                                        <p class="text-start text-muted" style="line-height: .1px;">Development Lead
                                        </p>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="card-body">
                                <div class="d-flex mb-4 ">
                                    <div class="rating-label me-2 checked">
                                        <i class="fa-solid fa-star text-warning fs-5"></i>
                                    </div>
                                    <div class="rating-label me-2 checked">
                                        <i class="fa-solid fa-star text-warning fs-5"></i>
                                    </div>
                                    <div class="rating-label me-2 checked">
                                        <i class="fa-solid fa-star text-warning fs-5"></i>
                                    </div>
                                    <div class="rating-label me-2 checked">
                                        <i class="fa-solid fa-star text-warning fs-5"></i>
                                    </div>
                                    <div class="rating-label me-2 checked">
                                        <i class="fa-solid fa-star text-warning fs-5"></i>
                                    </div>
                                </div>
                                <div class="card-title fs-4 fw-bolder">This is by far the cleanest template
                                    and the most well structured</div>
                                <div class="card-text text-muted">The most well thought out design theme I have ever
                                    used. The codes
                                    are up to tandard. The css styles are very clean. In fact the cleanest and the most
                                    up
                                    to standard I have ever seen.</div>
                                <div class="d-flex py-3 align-items-center">
                                    <img src="{{ asset('media/html/pic/150-2.jpg') }}" alt=""
                                        style="height: 70px; width:70px;">
                                    <div class="px-2">
                                        <p class="text-start fw-bolder mt-3"style="line-height: .1px;">Paul Miles</p>
                                        <p class="text-start text-muted" style="line-height: .1px;">Development Lead
                                        </p>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


    </section>
