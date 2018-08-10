@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Companies</h1>
@stop

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Companies List</h3>
                    @role('super_admin')
                    <a href="{!! route('companies.create') !!}" class="btn btn-primary bg-blue-gradient pull-right"> <i
                                class="fa fa-plus"></i> Create Company</a>
                    @endrole
                </div>
                <div class="box-body">
                    <div class="table-responisve">
                        <table id="companies" class="table table-hover table-bordered">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Company</th>
                                <th>Controls</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($companies as $company)
                                <tr>
                                    <td>{!! $company->id !!}</td>
                                    <td>{!! $company->name !!}</td>
                                    <td>
                                        {!! Form::open(['route'=> ['companies.destroy', $company->id], 'method'=>'delete']) !!}
                                        <a href="{!! route('companies.edit', $company->id) !!}"
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