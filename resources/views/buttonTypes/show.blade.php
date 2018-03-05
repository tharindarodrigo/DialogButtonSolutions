@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">buttonType Information</div>

                    <div class="card-body">

                        <div class="form-group">
                            <h5>buttonType Name: </h5>
                            {!! $buttonType->name !!}
                        </div>
                        <hr>
                        <div class="form-group">
                            <h5>Branches</h5>
                            @foreach($buttonType->branches as $branch)
                                <hr>

                                <ul>
                                    <li><strong>Branch &nbsp;&nbsp;: </strong>{!! $branch->branch !!} </li>
                                    <li><strong>Address : </strong>{!! $branch->address !!}</li>
                                    <li><strong>Phone &nbsp;&nbsp;&nbsp;: </strong>{!! $branch->phone !!}</li>

                                </ul>
                            @endforeach
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection
