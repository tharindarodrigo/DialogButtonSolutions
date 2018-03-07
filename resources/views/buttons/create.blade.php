@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Buttons</h1>
@stop

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Create Buttons</h3>
                </div>
                <div class="box-body" id="app">
                    {!! Form::open(['route'=>['buttons.store']]) !!}
                    @include('buttons._partials.form')
                    {!! Form::close() !!}
                </div>

            </div>
        </div>
    </div>

@stop

@push('css')
    {{--<link rel="stylesheet" href="/css/admin_custom.css">--}}
@endpush

@push('js')
    <script type="text/javascript" src="{!! asset('js/branch-loader.js') !!}"></script>
@endpush