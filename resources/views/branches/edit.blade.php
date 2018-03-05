@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Branches</h1>

@stop

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Edit Company</h3>
                </div>
                <div class="box-body">
                    {!! Form::model($branch, ['route'=>['branches.update', $branch->id], 'method'=>'patch']) !!}
                    @include('branches._partials.form')
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