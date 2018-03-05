@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1>Button Triggers</h1>
@stop

@section('content')
    <div class="row" id="app">
        <div class="col-md-8">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Notifications</h3>
                </div>
                {{--<Notifications></Notifications>--}}
            </div>
        </div>
        <div class="col-md-4">
            <Notification></Notification>
        </div>
    </div>
@stop
@push('css')
    {{--<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs/dt-1.10.16/datatables.min.css"/>--}}

@endpush

@push('js')
    <script src="{!! asset('js/app.js') !!}"></script>
    {{--<script type="text/javascript" src="https://cdn.datatables.net/v/bs/dt-1.10.16/datatables.min.js"></script>--}}
    {{--<script>--}}
    {{--$(document).ready(function () {--}}
    {{--$('#companies').DataTable();--}}
    {{--})--}}
    {{--</script>--}}

@endpush
