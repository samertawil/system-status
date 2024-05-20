@extends('layouts.app-master')

@section('app-content')


    <div class="container">
        <button class="btn btn-primary" id="load-data">load email</button>
    </div>

    <div class="data-wrapper container">

    </div>

@section('js')
    <script>
        $('#load-data').click(function() {
            // alert('ddd');
            $.ajax({
                type: 'get',
                url: 'http://bloggi.test/api/visitormail',
                success: function(res) {

                    res.forEach(element => {

                        var tablex = `<table class="table   text-center" id="mytable" style="direction: rtl;">
        <thead>
            <tr>
                <th>id</th>
                <th>sender name</th>
                
            </tr>

        </thead>
        <tbody>
          
                <tr>
                    <td>${element.id}</td>
                    <td>${element.name}</td>
                    <tr>   


        </tbody>
    </table>`;

                        $('.data-wrapper').append(tablex)
                    });


                }
            });

        });
    </script>
@endsection


@endsection
