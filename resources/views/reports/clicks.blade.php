@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Button Click Report</h1>
@stop

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Report Generator</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                    class="fa fa-minus"></i>
                        </button>
                    </div>

                </div>
                <div class="box-body">
                    <form action="{!! url('reports/clicks') !!}" class="form-horizontal" method="GET">
                        <div class="row">

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="" class="col-sm-4 control-label">Company</label>
                                    <div class="col-sm-8">
                                        {!! Form::select('company_id', $companies, null, ['class'=> 'form-control','id'=>'company']) !!}
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="" class="col-sm-4 control-label">Branches</label>
                                    <div class="col-sm-8">
                                        <select name="branch_id" id="branches" class="form-control">
                                        </select>
                                    </div>
                                </div>
                            </div>


                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="" class="col-sm-4 control-label">From</label>
                                    <div class="col-sm-8">
                                        {!! Form::input('datetime-local', 'from', null, ['class'=> 'form-control']) !!}
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="" class="col-sm-4 control-label">To</label>
                                    <div class="col-sm-8">
                                        {!! Form::input('datetime-local', 'to', null, ['class'=> 'form-control']) !!}
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="" class="col-sm-4 control-label">Serial</label>
                                    <div class="col-sm-8">
                                        {!! Form::text('serial_number', null, ['class'=> 'form-control']) !!}
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-offset-6 col-md-3">
                                <div class="form-group">
                                    <div class="col-sm-offset-4 col-sm-8">
                                        <button class="btn btn-block btn-primary"><span class="fa fa-search"></span>
                                            Search
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </form>
                </div>

            </div>
        </div>
        <div class="row">
            <div class="panel">
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-boredered">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Serial</th>
                                <th>Company</th>
                                <th>Branch</th>
                                <th>Type</th>
                                <th>Time</th>
                                @if(!empty($groupBy))
                                    <th>count</th>
                                @endif
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($buttonClicks as $buttonClick)
                                <tr>
                                    <td>{!! $loop->index + 1 !!}</td>
                                    <td>{!! $buttonClick->button->serial_number !!}</td>
                                    <td>{!! $buttonClick->company->name !!}</td>
                                    <td>{!! $buttonClick->branch->branch !!}</td>
                                    <td>{!! $buttonClick->buttonType->button_type !!}</td>
                                    <td>{!! $buttonClick->created_at !!}</td>
                                    @if(!empty($groupBy))
                                        <td>{!! $buttonClick->count !!}</td>
                                    @endif
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
    <style>
        div.col-sm-4 {
            vertical-align: middle;
        }
    </style>

@endpush

@push('js')

    <script type="text/javascript">
        $(document).ready(function () {

            var x = $('#company').val();
            getBranches(x);

            $('#company').change(function () {
                getBranches($(this).val());
            })

        });

        getBranches = function (id) {
            $.get('http://' + window.location.host + '/company/' + id + '/branches', function (data) {
                getOptionTag(data);
            })
        };


        getOptionTag = function (data) {
            var options = '<option value="">All</option>';

            $.each(data, function (index, row) {
                options += '<option value="' + row.id + '">' + row.branch + '</option>'
            });

            $('#branches').html(options);
            @if(!empty($request))
            $("#branches").val({!! $request->get('branch_id') !!});
            @endif
        }
    </script>
    {{--<script>--}}
    {{--$(document).ready(function () {--}}
    {{--$('#companies').DataTable();--}}
    {{--})--}}
    {{--</script>--}}

@endpush