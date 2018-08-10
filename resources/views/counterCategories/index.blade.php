@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Counter Categories</h1>
@stop

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Counter Category List</h3>
                    <a href="{!! route('companies.create') !!}" class="btn btn-primary bg-blue-gradient pull-right"> <i
                                class="fa fa-plus"></i> Create Company</a>
                </div>
                <div class="box-body">
                    <div class="table-responisve">
                        <table id="companies" class="table table-hover table-bordered">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Company</th>
                                <th>Counter Category</th>
                                <th>Controls</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($counterCategories as $counterCategory)
                                <tr>
                                    <td>{!! $counterCategory->id !!}</td>
                                    <td>{!! $counterCategory->company->name !!}</td>
                                    <td>{!! $counterCategory->counter_category !!}</td>
                                    <td>
                                        {!! Form::open(['route'=> ['counter-categories.destroy', $counterCategory->id], 'method'=>'delete']) !!}
                                        <a href="{!! route('counter-categories.edit', $counterCategory->id) !!}"
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