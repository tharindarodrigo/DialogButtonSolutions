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
                    <h3 class="box-title">Button Types List</h3>
                    <a href="{!! route('button-types.create') !!}" class="btn btn-primary bg-blue-gradient pull-right"> <i
                                class="fa fa-plus"></i> Create Button Type</a>
                </div>
                <div class="box-body">
                    <div class="table-responisve">
                    <table id="buttonTypes" class="table table-hover table-bordered">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Button Type</th>
                            <th>Message + Notify Color</th>
                            @role('super_admin')
                            <th>Controls</th>
                            @endrole
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($buttonTypes as $buttonType)
                            <tr>
                                <td>{!! $buttonType->id !!}</td>
                                <td>{!! $buttonType->button_type !!}</td>
                                <td class="bg-{!! $buttonType->notification_color !!}">
                                    {!! $buttonType->message !!}
                                </td>
                                @role('super_admin')
                                <td>
                                    {!! Form::open(['route'=> ['button-types.destroy', $buttonType->id], 'method'=>'delete']) !!}
                                    <a href="{!! route('button-types.edit', $buttonType->id) !!}"
                                       class="btn btn-primary btn-flat btn-sm"><i class="fa fa-edit"></i>
                                    </a>
                                    <button class="btn btn-danger btn-flat btn-sm" type="submit"><i class="fa fa-trash"></i>
                                    </button>
                                    {!! Form::close() !!}
                                </td>
                                @endrole
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
            $('#buttonTypes').DataTable();
        })
    </script>

@endpush