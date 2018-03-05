{{--@extends('layouts.app')--}}


@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Button Types</h1>
@stop

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Create Button Type</h3>
                </div>
                <div class="box-body" id="app">
                    {!! Form::open(['route'=>['button-types.store']]) !!}
                    @include('buttonTypes._partials.form')
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