@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Roles</h1>
@stop

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Role List</h3>
                    <a href="{!! route('roles.create') !!}" class="btn btn-primary bg-blue-gradient pull-right"> <i
                                class="fa fa-plus"></i> Create Role</a>
                </div>
                <div class="box-body">
                    <div class="table-responsive">
                        <table id="buttons" class="table table-hover table-bordered">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Role</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($roles as $role)
                                    <tr>
                                        <td>{!! $role->id !!}</td>
                                        <td>{!! $role->name !!}</td>
                                        <td>
                                            {!! Form::open(['route'=> ['roles.destroy', $role->id], 'method'=>'delete']) !!}
                                            <a href="{!! route('roles.edit', $role->id) !!}"
                                               class="btn btn-primary btn-flat btn-sm"><i class="fa fa-edit"></i>
                                            </a>
                                            <button class="btn btn-danger btn-flat btn-sm" type="submit"><i
                                                        class="fa fa-trash"></i>
                                            </button>
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
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
            $('#buttons').DataTable();
        })
    </script>

@endpush