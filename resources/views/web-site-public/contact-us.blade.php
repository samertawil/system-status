@extends('layouts.master')


 

@section('content')
 

<section>

    <div class="container  ">
        <div class="row justify-content-between">
        <div class="card card-solid col-lg-6  my-3 ">
            <div class="card-body pb-0">
                <div class="row">
                    {{-- <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column"> --}}
                    <div class="col-12 d-flex align-items-stretch flex-column">
                        <div class="card bg-light d-flex flex-fill">
                            <div class="card-header text-muted border-bottom-0">
                                Digital Strategist
                            </div>
                            <div class="card-body pt-0">
                                <div class="row">
                                    <div class="col-lg-7">
                                        <h2 class="lead"><b>Nicole Pearson</b></h2>
                                        <p class="text-muted text-sm"><b>About: </b> Web Designer / UX / Graphic Artist
                                            / Coffee Lover </p>
                                        <ul class="ml-4 mb-0 fa-ul text-muted">
                                            <li class="small"><span class="fa-li"><i
                                                        class="fas fa-lg fa-building"></i></span> Address: Demo Street
                                                123, Demo City 04312, NJ</li>
                                            <li class="small"><span class="fa-li"><i
                                                        class="fas fa-lg fa-phone"></i></span> Phone #: + 800 - 12 12 23
                                                52</li>
                                        </ul>
                                    </div>
                                    <div class="col-lg-5 text-center">
                                        <img src="{{ asset('media/html/pic/ahed.jpg') }}" alt="user-avatar"
                                            class="img-circle img-fluid">
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="text-right">
                                    <a href="#" class="btn btn-sm bg-teal">
                                        <i class="fas fa-comments"></i>
                                    </a>
                                    <a href="#" class="btn btn-sm btn-primary">
                                        <i class="fas fa-user"></i> View Profile
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>






                </div>
            </div>
       

        </div>


      
        <div class="col-lg-5  my-3 border" >
            <div class="form-group">
                <label class="form-label pt-1" for="send_to_name">اسم المرسل</label>
                <input type="text" id="send_to_name" class="form-control">
            </div>
            <div class="form-group">
                <label for="inputEmail" class="form-label pt-1 ">الايميل</label>
                <input type="email" id="inputEmail" class="form-control">
            </div>
            <div class="form-group">
                <label for="inputSubject" class="form-label pt-1">الموضوع</label>
                <input type="text" id="inputSubject" class="form-control">
              </div>
              <div class="form-group">
                <label for="inputMessage" class="form-label pt-1">الرسالة</label>
                <textarea id="inputMessage" class="form-control" rows="4"></textarea>
              </div>
              <div class="form-group my-3">
                <input type="submit" value="ارسال ايميل" class="btn btn-md btn-dark">
              </div>
        </div>
    </div>
    </div>
</section>

@endsection
