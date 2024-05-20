<!DOCTYPE html>
<html lang="ar">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('css/all.min.css') }}">
   
  <link rel="stylesheet" href="{{ asset('css/web-site/adminlte.min.css') }}">
  <link rel="stylesheet" href="{{ asset('css/web-site/main.css') }}">

    @yield('links')
    <title>{{env('app_name')}}</title>
</head>
<style>
    .bg-dark{
        background-color: #13263c !important;
        
    }

    .bg-dark-with-pic{
        background-color: #13263c !important;
        background-image:url({{asset('media/html/pic/landing.svg')}});
    }

</style>

@yield('css')

<body>
    <div>
        <div>

            @include('layouts.top-navbar')

        </div>


        <div>

            @yield('content')

        </div>



        <div>
            @include('web-site-public.footer')
        </div>


    </div>









    @yield('js')



    <script src="{{ asset('js/jQuery.js') }}"></script>
    <script src="{{ asset('js/all.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.js') }}"></script>
</body>

</html>


