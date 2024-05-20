<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('css/my_style.css') }}">
    <title>{{ env('APP_NAME') }}</title>
</head>

<style>
    .image {
        margin: 70px 30px;
    }


    @font-face {
        font-family: 'Droid';
        src: url(../font/Droid.Arabic.Kufi_DownloadSoftware.iR_.ttf);
    }

    body {
        font-family: 'Droid', Arial, Helvetica, sans-serif !important;
        font-size: 14px;
        font-weight: 600;
        direction: rtl;

    }


    .main_div {
        border: 0.5px solid #ddd;
        width: 63%;
        height: 500px;
        margin: 100px auto;
        box-shadow: 5px 5px 15px 1px #ddd;
    }

    .main_div .left_side {

        width: 50%;
        height: 100%;
    }

    .main_div .left_side .image {
        width: 100%;
        height: 100%;
    }

    .main_div .left_side .image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .righ_side {
        margin-top: 80px;
    }

    .righ_side .main_form {
        width: 60%;
        margin: auto;
    }

    #ok_btn {
        width: 100%;
    }
</style>

@include('layouts._error_form')


<body>

    <nav class="navbar navbar-light bg-white shadow-sm" style="direction: ltr;">
        <div class="container">
            <a class="navbar-brand" href="http://bloggi.test">
                Status&amp;Systems
            </a>
  
            
                <ul class="navbar-nav ms-auto">

                  
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('register')}}">انشاء حساب</a>
                    </li>
                </ul>
        </div>
    </nav>


    <div class="main_div row">

       

        <div class="righ_side col-6  ">

            <p class="h3 text-center mb-5">تسجيل الدخول</p>
            <form action="{{ Route('login') }}" method="POST" class="main_form">

                @csrf
                <div class="form-group">
                    <label for="user_name">اسم المستخدم</label>
                    <input type="text" name="user_name" placeholder="اسم المستخدم"
                        class="form-control my-1
                        @error('user_name') is-invalid @enderror"
                        value="{{ old('user_name') }}" autocomplete="user_name" autofocus>

                    @error('user_name')
                        <span class="invalid-feedback" role="alert">
                            <small>{{ $message }}</small>
                        </span>
                    @enderror

                </div>
                <div class="form-group my-3">
                    <label for="password">الاسم</label>
                    <input type="password" name="password" autocomplete placeholder="كلمة المرور"
                        class="form-control my-1
                    @error('password') is-invalid @enderror">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <small>{{ $message }}</small>
                        </span>
                    @enderror

                </div>


                <button class="btn btn-success  mt-3" id="ok_btn">دخول</button>
            </form>


        </div>

        <div class="left_side col-6">
            <div class="image" style="width: 450px; height:300px;">
                <img src="{{ asset('storage/' . '3.png') }}">


            </div>

        </div>

    </div>


    <script src="{{ asset('js/bootstrap.js') }}"></script>
    <script src="{{ asset('js/jQuery.js') }}"></script>


</body>

</html>
