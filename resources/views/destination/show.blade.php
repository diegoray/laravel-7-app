@extends('main')

@section('title', 'Destination Details')

@section('breadcrumbs')

    @if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
    @endif

    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>Destination</h1>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="page-header float-right">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li><a href="">Destination</a></li>
                        <li><a href="">Data</a></li>
                        <li class="active">Detail</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="content mt-3">
        <div class="animated fadeIn">

            <div class="card">
                <div class="card-header">
                    <div class="pull-left">
                        <strong>Destination Details</strong>
                    </div>
                    <div class="pull-right">
                        <a href="{{ url('destinations') }}" class="btn btn-secondary btn-sm">
                            <i class="fa fa-undo"></i> Back
                        </a>
                    </div>
                </div>
                <div class="card-body table-responsive">
                    <div class="row">
                        <div class="col-md-8 offset-md-2">
                            <table class="table table-bordered">
                                <tr>
                                    <th style="width: 30%;">Name</th>
                                    <td>{{ $destination->name }}</td>
                                </tr>
                                <tr>
                                    <th>Class</th>
                                    <td>{{ $destination->class->name }}</td>
                                </tr>
                                <tr>
                                    <th>Price</th>
                                    <td>{{ $destination->price }}</td>
                                </tr>
                                <tr>
                                    <th>Capacity</th>
                                    <td>{{ $destination->capacity }}</td>
                                </tr>
                                <tr>
                                    <th>Info</th>
                                    <td>{{ $destination->info }}</td>
                                </tr>
                                <tr>
                                    <th>Created At</th>
                                    <td>{{ $destination->created_at }}</td>
                                </tr>
                            </table>
                            
                        </div>
                    </div>
                   
                </div>
            </div>


           
        </div>
    </div>
@endsection