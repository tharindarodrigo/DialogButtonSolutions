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
    <script>
        $(document).ready(function () {

            var x = $('#company').val();
            getBranches(x);

            $('#company').change(function () {
                getBranches($(this).val());
            })

        });

        getBranches = function (id) {
            $.get('http://' + window.location.host + '/company/' + id + '/branches', function (data) {
                getOptionTag(data);
            })
        };


        getOptionTag = function (data) {
            var options = '';

            $.each(data, function (index, row) {
                options += '<option value="' + row.id + '">' + row.branch + '</option>'
            });

            $('#branches').html(options);
        }
    </script>
@endpush