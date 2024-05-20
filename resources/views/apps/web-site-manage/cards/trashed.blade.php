@extends('layouts.app-master')

@section('title', ucfirst('trashed data'))

@section('page-name', ucfirst('trashed data'))

@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active">trashed data</li>
@endsection

@section('app-content')

    @include('layouts._alert_session')

    @include('layouts._error_form')

    <table class="table">
        <thead>
            <tr>
                <th>card title</th>
                <th>card text</th>
                <th>active</th>
                <th>user_id</th>
                <th>created_date</th>
                <th>deleted_date</th>
                <th>card img</th>
                <th>actions</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                @foreach ($trash_data as $data)
                    <td>{{ $data->card_title }}</td>
                    <td>{{ $data->card_text }}</td>
                    <td>{{ $data->active == 1 ? 'active' : 'not active' }}</td>
                    <td>{{ $data->username->full_name }}</td>
                    <td>{{ date('d/m/Y', Strtotime($data->created_at)) }}</td>
                    <td>{{ date('d/m/Y', Strtotime($data->deleted_at)) }}</td>
                    <td>
                        @if ($data->card_img)
                            @foreach ($data->card_img as $file_data)
                                <a href="{{ asset('storage/' . $file_data) }}" target="_blank"><img
                                        src="{{ asset('storage/' . $file_data) }}" alt=""
                                        style="height: 50px; width:50px;">
                                </a>
                            @endforeach
                        @endif

                    </td>

                    <td class="d-flex">
                        <form action="{{ route('admin.cards.forecdelete', $data->id) }}" method="post">
                            @csrf
                            @method('delete')
                            <button class="btn btn-md" type="submit"
                                onclick="return confirm('هل انت متاكد من المسح الكلي مع العلم سيتم حذف المرفقات نهائيا')"><i
                                    class="fa fa-trash text-danger"></i></button>
                        </form>

                        <form action="{{route('admin.cards.restore',$data->id)}}" method="post">
                            @csrf
                            @method('put')
                            <button class="btn btn-md" type="submit"><i class="fa fa-restore text-success h5"></i></button>
                        </form>
                    </td>
            </tr>
            @endforeach

        </tbody>
    </table>


@endsection
