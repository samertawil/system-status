@extends('layouts.app-master')

@section('page-name', 'index status')

@section('title', 'status')

@section('app-content')

    <div class="container" style="direction: rtl;">
        @include('apps.modules.status.index_table')
    </div>

   
@endsection

