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
                    <h3 class="box-title">User List</h3>
                    {{--<a href="{!! route('button-types.create') !!}" class="btn btn-primary bg-blue-gradient pull-right"> <i--}}
                    {{--class="fa fa-plus"></i> Create Button Type</a>--}}
                </div>
                <div class="box-body">
                    <div class="table-responsive">
                        <table id="buttonTypes" class="table table-hover table-bordered">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Company</th>
                                <th>Role</th>
                                <th>Controls</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <td>{!! $loop->index + 1 !!}</td>
                                    <td>{!! $user->name !!}</td>
                                    <td>{!! $user->email !!}</td>
                                    <td>{!! $user->company->name ?? null !!}</td>
                                    <td>{!! $user->roles->pluck('name')[0] ?? null !!}</td>
                                    <td>
                                        {!! Form::open(['route'=> ['users.destroy', $user->id], 'method'=>'delete']) !!}
                                        <a href="{!! route('users.edit', $user->id) !!}"
                                           class="btn btn-primary btn-flat btn-sm"><i class="fa fa-edit"></i>
                                        </a>
                                        <a href="{!! route('users.permissions.index', $user->id) !!}"
                                           class="btn btn-warning btn-flat btn-sm"><i class="fa fa-lock"></i>
                                        </a>
                                        <button class="btn btn-danger btn-flat btn-sm" type="submit"><i
                                                    class="fa fa-trash"></i>
                                        </button>
                                        {{--<button class="btn btn-sm btn-flat btn-warning"><i class="fa fa-key"></i>--}}
                                        {{--</button>--}}
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
            $('#buttonTypes').DataTable();
        })
    </script>

@endpush