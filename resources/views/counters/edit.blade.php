@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Counters</h1>
@stop

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Edit Counter</h3>
                </div>
                <div class="box-body">
                    {!! Form::model($counter, ['route'=>['counters.update', $counter->id], 'method'=>'patch']) !!}
                    @include('counters._partials.form')
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
    {{--<script src="{!! asset('js/app.js') !!}"></script>--}}

@endpush