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
                                        {!! Form::select('company_id', $companies, $company_id, ['class'=> 'form-control','id'=>'company']) !!}
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
                                    <label for="" class="col-sm-4 control-label">Serial</label>
                                    <div class="col-sm-8">
                                        {!! Form::text('serial_number', $serial_number, ['class'=> 'form-control']) !!}
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                {{--<div class="form-group">--}}
                                    {{--<label for="" class="col-sm-4 control-label">Paginate</label>--}}
                                    {{--<div class="col-sm-8">--}}
                                        {{--{!! Form::text('paginate', old('paginate'), ['class'=> 'form-control', 'No. of records']) !!}--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            </div>


                        </div>

                        <div class="row">

                            {{--<div class="col-md-3">--}}
                            {{--<div class="form-group">--}}
                            {{--<label for="" class="col-sm-4 control-label">From</label>--}}
                            {{--<div class="col-sm-8">--}}
                            {{--{!! Form::text('from', null, ['class'=> 'form-control', 'data-format'=>'dd/MM/yyyy hh:mm:ss ']) !!}--}}
                            {{--</div>--}}
                            {{--</div>--}}
                            {{--</div>--}}
                            <div class='col-md-3'>
                                <div class="form-group">
                                    <label for="" class="col-sm-4 control-label">From</label>
                                    <div class="col-sm-8">
                                        <div class='input-group date datetimepicker1'>
                                            {{--<input type='text' class="form-control" name="from"/>--}}
                                            {!! Form::text('from', $from, ['class'=> 'form-control']) !!}
                                            <span class="input-group-addon">
                                                <span class="glyphicon glyphicon-calendar"></span>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class='col-md-3'>
                                <div class="form-group">
                                    <label for="" class="col-sm-4 control-label">To</label>
                                    <div class="col-sm-8">
                                        <div class='input-group date datetimepicker1'>
                                            {!! Form::text('to', $to, ['class'=> 'form-control']) !!}

                                            <span class="input-group-addon">
                                                <span class="glyphicon glyphicon-calendar"></span>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>



                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="" class="col-sm-4 control-label">Counts By</label>
                                    <div class="col-sm-8">
                                        {!! Form::select('count_by', $groups, $group_id, ['class'=> 'form-control','id'=>'company']) !!}
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
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
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                {{--<th>--}}
                                {{--{!! Form::checkbox('check_all', '', null,['class'=>'checkbox check-all']) !!}--}}
                                {{--</th>--}}
                                <th>#</th>
                                @if(!empty($buttonClicks->first()->button))
                                    <th>Serial</th>
                                @endif
                                @if(!empty($buttonClicks->first()->company))
                                    <th>Company</th>
                                @endif
                                @if(!empty($buttonClicks->first()->branch))
                                    <th>Branch</th>
                                @endif
                                @if(!empty($buttonClicks->first()->buttonType))
                                    <th>Type</th>
                                @endif
                                @if(!empty($buttonClicks->first()->created_at))
                                    <th>Time</th>
                                @endif
                                @if(!empty($request->count_by) || !empty($buttonClicks->first()->clicks))
                                    <th>Clicks</th>
                                @endif
                                @if(!empty($buttonClicks->first()->button))
                                    <th>Delete</th>
                                @endif
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($buttonClicks as $buttonClick)
                                <tr>
                                    {{--<td>--}}
                                    {{--{!! Form::checkbox("multiple_delete[{$buttonClick->id}]", "", null,['class'=>'checkbox multiple-select']) !!}--}}
                                    {{--</td>--}}
                                    <td>{!! $loop->index + 1 !!}</td>
                                    @if(!empty($buttonClick->button))
                                        <td>{!! $buttonClick->button->serial_number !!}</td>
                                    @endif
                                    @if(!empty($buttonClick->company))
                                        <td>{!! $buttonClick->company->name !!}</td>
                                    @endif
                                    @if(!empty($buttonClick->branch))
                                        <td>{!! $buttonClick->branch->branch !!}</td>
                                    @endif
                                    @if(!empty($buttonClick->buttonType))
                                        <td>{!! $buttonClick->buttonType->button_type !!}</td>
                                    @endif
                                    @if(!empty($buttonClick->created_at))
                                        <td>{!! $buttonClick->created_at !!}</td>
                                    @endif
                                    @if(!empty($request->count_by) || $buttonClicks->clicks > 0)
                                        <td>{!! $buttonClick->clicks !!}</td>
                                    @endif
                                    @if(!empty($buttonClicks->first()->button))
                                        <td>
                                            {{Form::open(['route'=> ['clicks.delete', $buttonClick->id], 'method'=>'delete'])}}
                                            <button class="btn btn-danger btn-flat btn-sm" type="submit"><i
                                                        class="fa fa-trash"></i></button>
                                            {{ Form::close() }}
                                        </td>
                                    @endif
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <br>
                    {{--@if(!empty($buttonClicks->links()))--}}
                    <div class="col-md-4">
                        {{ $buttonClicks->links() }}
                    </div>
                    {{--@endif--}}
                </div>
            </div>
        </div>
    </div>

@stop

@push('css')
    {{--<link rel="stylesheet" type="text/css" href="{!! asset('http://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css') !!}"/>--}}
    <link href="//cdn.rawgit.com/Eonasdan/bootstrap-datetimepicker/e8bddc60e73c1ec2475f827be36e1957af72e2ea/build/css/bootstrap-datetimepicker.css"
          rel="stylesheet">

    <style>
        div.col-sm-4 {
            vertical-align: middle;
        }
    </style>

@endpush

@push('js')

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
    <script type="text/javascript" src="//code.jquery.com/jquery-2.1.1.min.js"></script>
    <script type="text/javascript" src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>

    <script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment-with-locales.js"></script>


    <script src="//cdn.rawgit.com/Eonasdan/bootstrap-datetimepicker/e8bddc60e73c1ec2475f827be36e1957af72e2ea/src/js/bootstrap-datetimepicker.js"></script>
    <script type="text/javascript">
        $(function () {
            $('.datetimepicker1').datetimepicker({
                format: 'YYYY-MM-DD H:m:s'
            });
        });
    </script>
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
    {{--$('.check-all').click(function () {--}}
    {{--var x = $(this).val();--}}
    {{--console.log(x);--}}
    {{--var checkBoxes = $('.multiple-select');--}}
    {{--checkBoxes.prop('checked', x);--}}
    {{--})--}}
    {{--</script>--}}

@endpush