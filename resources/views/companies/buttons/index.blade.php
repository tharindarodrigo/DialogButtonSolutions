@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Button Types</div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="">Company Name</label>
                                    <select name="" id="" class="form-control">
                                        <option value="">Lorem.</option>
                                        <option value="">Accusantium!</option>
                                        <option value="">Veniam!</option>
                                        <option value="">Hic!</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="">Branch</label>
                                    <select name="" id="" class="form-control">
                                        <option value="">Lorem.</option>
                                        <option value="">Accusantium!</option>
                                        <option value="">Veniam!</option>
                                        <option value="">Hic!</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="">Button Type</label>
                                    <select name="" id="" class="form-control">
                                        <option value="">Lorem.</option>
                                        <option value="">Accusantium!</option>
                                        <option value="">Veniam!</option>
                                        <option value="">Hic!</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="">Identifier</label>
                                    <input type="text" class="form-control">
                                </div>
                            </div>

                        </div>


                    </div>
                    <div class="card-footer">
                        <button class="btn btn-primary">Save</button>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Dialog Axiata - Head Quaters
                    </div>
                    <div class="card-body">
                        <div class="alert alert-secondary" role="alert">
                            A button has been clicked
                        </div>

                        <div class="table-responsive">

                            <table class="table table-striped table-sm table-bordered">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Company</th>
                                    <th>Branch</th>
                                    <th>Identifier</th>
                                    <th>Button Type</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Dialog Axiata</td>
                                    <td>Head Quaters</td>
                                    <td>4th Floor 1st Meeting Room</td>
                                    <td>Tea button</td>
                                    <td>
                                        <button class="btn btn-danger btn-sm">Delete</button>
                                        <button class="btn btn-primary btn-sm">Edit</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Dialog Axiata</td>
                                    <td>Modern Arcade</td>
                                    <td>6th Floor 1st Wash Room</td>
                                    <td>Wash Room Unclean</td>
                                    <td>
                                        <button class="btn btn-danger btn-sm">Delete</button>
                                        <button class="btn btn-primary btn-sm">Edit</button>
                                    </td>
                                </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection