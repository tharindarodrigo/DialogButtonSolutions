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
                                        @role('super_admin')
                                        <button class="btn btn-danger btn-flat btn-sm" type="submit"><i
                                                    class="fa fa-trash"></i>
                                        </button>
                                        @endrole
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
    <script>
        var settings = {
            "async": true,
            // "crossDomain": true,
            "url": "http://178.128.19.124/api/user-info",
            "method": "GET",
            "headers": {
                "Accept": "application/json",
                "Content-Type": "application/json",
                "Authorization": "Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6ImU1OGRhMWJhODk5NjkwNmE5ZTUxMWRiNzZlYWNmNjcyNWU4OGU1ZTgzM2NmMWZjYTZmZjI3MThlNTg2MTNhOGIwNjJmMTk5MWYyYjllZmZlIn0.eyJhdWQiOiIxIiwianRpIjoiZTU4ZGExYmE4OTk2OTA2YTllNTExZGI3NmVhY2Y2NzI1ZTg4ZTVlODMzY2YxZmNhNmZmMjcxOGU1ODYxM2E4YjA2MmYxOTkxZjJiOWVmZmUiLCJpYXQiOjE1MzQ4MTg3NDIsIm5iZiI6MTUzNDgxODc0MiwiZXhwIjoxNTY2MzU0NzQyLCJzdWIiOiI0MDMiLCJzY29wZXMiOltdfQ.wfuvID7XZ3ShX6ShPmqMnQH9VDgslAiGY43LodEVqZxyK8B4yYAIfvo2i0C8tIy2BXIK-1CByqItvOpIqDy6Z59yL13NuZB_PjQ5oJ0cn04LoeSy1tM8mgajLrs29OVDNfyjVy9ZOqGdGKrVZ_HsSvGlmjp_2o6cj0TNJx8qpoTGhv5PZpnB61TKYTTEBoJoApABgP-ZBT-0dnMYn63CdnngySJT-7ZjjhC4J8edOCk4kmi2DA7SSgGn5JYUMEqjvIsOTDDuWMJraMtIshZvXQRMCn3KrZNoMxv7SDeaQftUPwXlrU5bemWyHp2mGp3XpVydfinJed-s7JVXqPWXCQymTEGUd6AdyRBpL6qmzfTbFda7GKtGaTebS2jyYcrGL4IM6hEmMq_pDgZ7GadycJhhb4rotzVSVMQN2X4A4XOHWUibi3FkeCJJ1v_oOOYuKx59bBsi-LuqeyI8XsnpWDiZqW8sKzV5bSoKqAKpbix5Swiyu_uGBoJJACHFXTZ1sPQ3eALqPKwGsQ2nIMiQpJKTo0gM0OVKWnidLfY66cDHQWaPszVdlE9YV9385aO9u4YQ3ygr_SrIhRHb83bNtpzLZeBBURHDS5XU3mlJ8SE20rwWvgMqMBmaogIruFei8KIGOQ5D_f0Ly-LqmN2oVtRyEM--8L-01G_sfEdyqiA",
                "Cache-Control": "no-cache",
                "Postman-Token": "b89ea4ce-924c-416f-94a6-32fc3f35f4be"
            }
        }

        $.ajax(settings).done(function (response) {
            console.log(response);
        });
    </script>

@endpush