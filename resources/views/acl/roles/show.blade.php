@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">button Information</div>

                    <div class="card-body">

                        <div class="form-group">
                            <h5>button Name: </h5>
                            {!! $button->name !!}
                        </div>
                        <hr>
                        <div class="form-group">
                            <h5>Branches</h5>
                            @foreach($button->branches as $branch)
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
