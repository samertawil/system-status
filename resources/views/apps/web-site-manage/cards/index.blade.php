@extends('layouts.app-master')
@section('title', ucfirst('admin card table'))

@section('page-name', ucfirst('admin card table'))



@section('app-content')

    @include('layouts._alert_session')



    @include('layouts._addNewButton', ['urlname' => 'admin/cards/create'])


    <div class="container" style="direction: rtl;">
        <table class="table text-center">
            <thead>
                <tr>
                    <th>card title</th>
                    <th>card text</th>
                    <th>active</th>
                    <th>user_id</th>
                    <th>status_id</th>
                    <th>created_date</th>
                    <th>card img</th>
                    <th>actions</th>
                </tr>

            </thead>
            <tbody>

                @foreach ($cards_data as $card_data)
                    <tr>
                        <td>{{ $card_data->card_title }}</td>
                        <td>{{ $card_data->card_text }}</td>
                        <td>{{ $card_data->active == 1 ? 'active' : 'not active' }}</td>
                        <td>{{ $card_data->username->full_name }}</td>
                        <td>{{ $card_data->statusname->status_name }}</td>
                        <td>{{ date('d/m/Y', strtotime($card_data->created_at)) }}</td>
                        <td>
                            @if ($card_data->card_img)
                                @foreach ($card_data->card_img as $data)
                                    <a href="{{ asset('storage/' . $data) }}" target="_blank"><img
                                            src="{{ asset('storage/' . $data) }}" alt=""
                                            style="height: 50px; width:50px;"> </a>
                                @endforeach
                            @endif

                        </td>
                        <td class="d-flex align-items-center justify-content-between">
                            <button class="d-inline btn  btn-sm  edit_btn ">
                                <a class="d-inline " href="{{ route('admin.cards.edit', $card_data->id) }}">
                                    <i class="fas fa-edit" style="font-size: 22px;"></i></a>
                            </button>
                            <form action="{{ route('admin.cards.destroy', $card_data->id) }}" method="post">
                                <button type="submit" class="btn btn-sm"><i
                                        class=" m-auto fas fa-trash text-danger mx-3 h5"></i></button>

                                @csrf
                                @method('delete')
                            </form>

                        </td>

                    </tr>
                @endforeach



            </tbody>

        </table>
    </div>


@endsection

{{-- href="{{ url("admin/cards/{$card_data->id}/edit") }}"> --}}
