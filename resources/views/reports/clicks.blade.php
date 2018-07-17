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
                                    <label for="" class="col-sm-4 control-label">Serial</label>
                                    <div class="col-sm-8">
                                        {!! Form::text('serial_number', old('serial_number'), ['class'=> 'form-control']) !!}
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="" class="col-sm-4 control-label">Paginate</label>
                                    <div class="col-sm-8">
                                        {!! Form::text('paginate', old('paginate'), ['class'=> 'form-control', 'No. of records']) !!}
                                    </div>
                                </div>
                            </div>


                        </div>

                        <div class="row">

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
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="" class="col-sm-4 control-label">Counts By</label>
                                    <div class="col-sm-8">
                                        {!! Form::select('count_by', $groups, null, ['class'=> 'form-control','id'=>'company']) !!}
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
                                @if(!empty($request->count_by))
                                    <th>Clicks</th>
                                @endif
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($buttonClicks as $buttonClick)
                                <tr>
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
                                    @if(!empty($request->count_by))
                                        <td>{!! $buttonClick->clicks !!}</td>
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

@endpush