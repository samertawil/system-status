@extends('layouts.app-master')

@section('title', ucfirst('****'))

@section('page-name', ucfirst('****'))

@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active">*****</li>
@endsection

@section('app-content')

@include('layouts._alert_session')

@include('layouts._error_form')




@endsection
