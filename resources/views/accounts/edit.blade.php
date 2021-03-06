@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Users</h1>
@stop

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Profile</h3>
                    {{--<a href="{!! route('button-types.create') !!}" class="btn btn-primary bg-blue-gradient pull-right"> <i--}}
                    {{--class="fa fa-plus"></i> Create Button Type</a>--}}
                </div>
                <div class="box-body">
                    {!! Form::open(['route'=>['users.update', $user->id], 'method' => 'put']) !!}
                    <div class="form-group">
                        <label for="">Email</label>
                        <p>{!! $user->email !!}</p>
                    </div>
                    <div class="form-group">
                        <label for="">Name</label>
                        <p>{!! $user->name !!}</p>
                    </div>
                    <div class="form-group">
                        <label for="">Role</label>
                        {!! Form::select('role', $roles, $roleId, ['class'=> 'form-control'] ) !!}
                    </div>

                    <div class="form-group">
                        <label for="">Company</label>
                        {!! Form::select('company_id', $companies, $user->company_id, ['class'=> 'form-control'] ) !!}
                    </div>
                    <button class="btn btn-primary"> Update</button>
                    <a href="{!! route('users.index') !!}" class="btn btn-warning">Cancel</a>
                    {!! Form::close() !!}
                </div>

            </div>
        </div>
    </div>

@stop

@push('css')
    {{--<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs/dt-1.10.16/datatables.min.css"/>--}}


@endpush

@push('js')
    {{--<script src="{!! asset('js/app.js') !!}"></script>--}}
    {{--<script type="text/javascript" src="https://cdn.datatables.net/v/bs/dt-1.10.16/datatables.min.js"></script>--}}
    <script>
        $(document).ready(function () {
            $('#buttonTypes').DataTable();
        })
    </script>

@endpush