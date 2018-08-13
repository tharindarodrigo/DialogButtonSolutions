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
                    <h3 class="box-title">Buttons List</h3>
                    <a href="{!! route('buttons.create') !!}" class="btn btn-primary bg-blue-gradient pull-right"> <i
                                class="fa fa-plus"></i> Create Buttons</a>
                </div>
                <div class="box-body">
                    <div class="table-responsive">
                        <table id="buttons" class="table table-hover table-bordered">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Serial</th>
                                <th>Company</th>
                                <th>Branch</th>
                                <th>Type</th>
                                <th>Identifier</th>
                                <th>Controls</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(count($buttons)>0)
                                @foreach($buttons as $button)
                                    <tr>
                                        <td>{!! $loop->index +1 !!}</td>
                                        <td>{!! $button->serial_number !!}</td>
                                        <td>{!! $button->company->name !!}</td>
                                        <td>{!! $button->branch->branch !!}</td>
                                        <td>{!! $button->buttonType->button_type !!}</td>
                                        <td>{!! $button->identifier !!}</td>
                                        <td>
                                            {!! Form::open(['route'=> ['buttons.destroy', $button->id], 'method'=>'delete']) !!}
                                            <a href="{!! route('buttons.edit', $button->id) !!}"
                                               class="btn btn-primary btn-flat btn-sm"><i class="fa fa-edit"></i>
                                            </a>
                                            <button class="btn btn-danger btn-flat btn-sm" type="submit"><i
                                                        class="fa fa-trash"></i>
                                            </button>
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
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