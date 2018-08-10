
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
                    <h3 class="box-title">Create Counter</h3>
                </div>
                <div class="box-body">
                    {!! Form::open(['route'=>['counters.store']]) !!}
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

@endpush