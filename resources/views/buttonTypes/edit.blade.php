{{--@extends('layouts.app')--}}

{{--@section('content')--}}
{{--<div class="container">--}}
{{--<div class="row justify-content-center">--}}
{{--<div class="col-md-12">--}}
{{--<div class="card">--}}
{{--<buttonTypes></buttonTypes>--}}
{{--</div>--}}
{{--</div>--}}
{{--</div>--}}
{{--</div>--}}
{{--@endsection--}}

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
                    <h3 class="box-title">Edit Button Type</h3>
                </div>
                <div class="box-body">
                    {!! Form::model($buttonType, ['route'=>['button-types.update', $buttonType->id], 'method'=>'patch']) !!}
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
    {{--<script src="{!! asset('js/app.js') !!}"></script>--}}

@endpush