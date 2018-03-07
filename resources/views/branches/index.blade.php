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
                    <h3 class="box-title">Branch List</h3>
                    <a href="{!! route('branches.create') !!}" class="btn btn-primary bg-blue-gradient pull-right"> <i
                                class="fa fa-plus"></i> Create Branch</a>
                </div>
                <div class="box-body">
                    <div class="table-responsive">
                        <table id="branches" class="table table-hover table-bordered">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Branch</th>
                                <th>Company</th>
                                <th>Address</th>
                                <th>Phone</th>
                                <th>Controls</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($branches as $branch)
                                <tr>
                                    <td>{!! $branch->id !!}</td>
                                    <td>{!! $branch->branch !!}</td>
                                    <td>{!! $branch->company->name !!}</td>
                                    <td>{!! $branch->address !!}</td>
                                    <td>{!! $branch->phone !!}</td>
                                    <td>
                                        {!! Form::open(['route'=> ['branches.destroy', $branch->id], 'method'=>'delete']) !!}
                                        <a href="{!! route('branches.edit', $branch->id) !!}"
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
            $('#branches').DataTable();
        })
    </script>

@endpush