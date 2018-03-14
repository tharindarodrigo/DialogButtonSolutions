@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1>Button Triggers</h1>
@stop

@section('content')
    <div class="container-fluid">
        <div class="row" id="app">
            <div class="panel">
                <div class="panel-body">

                    {{--@for($x=0; $x<10; $x++)--}}
                        {{--<div class="row">--}}
                            {{--@for($y=1; $y<11; $y++)--}}
                                {{--<div class="col-md-1">--}}
                                    {{--<button class="btn btn-lg btn-flat btn-default btn-dark btn-block--}}

                                    {{--">--}}
                                        {{--{!! $x*10+$y !!}--}}
                                    {{--</button>--}}
                                {{--</div>--}}
                            {{--@endfor--}}
                        {{--</div>--}}
                        {{--<br>--}}
                    {{--@endfor--}}
                    <buttongrid></buttongrid>
                </div>

            </div>

        </div>
    </div>
@stop
@push('css')
    <style>
        /*.button {*/
        /*background-color: #004A7F;*/
        /*-webkit-border-radius: 10px;*/
        /*border-radius: 10px;*/
        /*border: none;*/
        /*color: #FFFFFF;*/
        /*cursor: pointer;*/
        /*display: inline-block;*/
        /*font-family: Arial;*/
        /*font-size: 20px;*/
        /*padding: 5px 10px;*/
        /*text-align: center;*/
        /*text-decoration: none;*/
        /*}*/
        @-webkit-keyframes glowing {
            0% {
                background-color: #B20000;
                -webkit-box-shadow: 0 0 3px #B20000;
                color: #FFFFFF;
            }
            50% {
                background-color: #FF0000;
                -webkit-box-shadow: 0 0 40px #FF0000;
                color: #FFFFFF
            }
            100% {
                background-color: #B20000;
                -webkit-box-shadow: 0 0 3px #B20000;
                color: #FFFFFF
            }
        }

        @-moz-keyframes glowing {
            0% {
                background-color: #B20000;
                -moz-box-shadow: 0 0 3px #B20000;
                color: #FFFFFF
            }
            50% {
                background-color: #FF0000;
                -moz-box-shadow: 0 0 40px #FF0000;
                color: #FFFFFF
            }
            100% {
                background-color: #B20000;
                -moz-box-shadow: 0 0 3px #B20000;
                color: #FFFFFF
            }
        }

        @-o-keyframes glowing {
            0% {
                background-color: #B20000;
                box-shadow: 0 0 3px #B20000;
                color: #FFFFFF
            }
            50% {
                background-color: #FF0000;
                box-shadow: 0 0 40px #FF0000;
                color: #FFFFFF
            }
            100% {
                background-color: #B20000;
                box-shadow: 0 0 3px #B20000;
                color: #FFFFFF
            }
        }

        @keyframes glowing {
            0% {
                background-color: #B20000;
                box-shadow: 0 0 3px #B20000;
                color: #FFFFFF
            }
            50% {
                background-color: #FF0000;
                box-shadow: 0 0 40px #FF0000;
                color: #FFFFFF
            }
            100% {
                background-color: #B20000;
                box-shadow: 0 0 3px #B20000;
                color: #FFFFFF
            }
        }

        .button {
            -webkit-animation: glowing 1500ms infinite;
            -moz-animation: glowing 1500ms infinite;
            -o-animation: glowing 1500ms infinite;
            animation: glowing 1500ms infinite;
        }
    </style>
@endpush

@push('js')
    <script src="{!! asset('js/app.js') !!}"></script>


@endpush
