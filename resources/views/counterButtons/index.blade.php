@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Counters</h1>
@stop

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Counter List</h3>
                    <a href="{!! route('counter-buttons.create') !!}" class="btn btn-primary bg-blue-gradient pull-right"> <i
                                class="fa fa-plus"></i> Create Counter</a>
                </div>
                <div class="box-body">
                    <div class="table-responisve">
                        <table id="companies" class="table table-hover table-bordered">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>serial No.</th>
                                <th>Counter title</th>
                                <th>Incr. Value</th>
                                <th>Controls</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($counterButtons as $counterButton)
                                <tr>
                                    <td>{!! $loop->index+1 !!}</td>
                                    <td>{!! $counterButton->serial !!}</td>
                                    <td>{!! $counterButton->counter->title !!}</td>
                                    <td>{!! $counterButton->increment_value !!}</td>

                                    <td>
                                        {!! Form::open(['route'=> ['counter-buttons.destroy', $counterButton->id], 'method'=>'delete']) !!}
                                        <a href="{!! route('counter-buttons.edit', $counterButton->id) !!}"
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
            $('#companies').DataTable();
        })
    </script>

@endpush