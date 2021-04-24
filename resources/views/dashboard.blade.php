@extends('layouts.admin-lte')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Overview</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item active">Overview</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- /.col-md-6 -->
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="m-0">Companies</h5>
                        </div>
                        <div class="card-body">
                            <h6 class="card-title">Total companies - {{$cmps}}</h6>

                            <p class="card-text">_</p>
                            <a href="{{route('company.create')}}" class="btn btn-primary">Add company</a>
                            <a href="{{route('company.index')}}" class="btn btn-primary">View all companies</a>
                        </div>
                    </div>

                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <h5 class="m-0">Clients</h5>
                        </div>
                        <div class="card-body">
                            <h6 class="card-title">Total clients - {{$clns}}</h6>

                            <p class="card-text">_</p>
                            <a href="{{route('client.create')}}" class="btn btn-primary">Add client</a>
                            <a href="{{route('client.index')}}" class="btn btn-primary">View clients</a>
                        </div>
                    </div>
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <h5 class="m-0">Clients</h5>
                        </div>
                        <div class="card-body">
                            <h6 class="card-title">Total users - {{$usrs}}</h6>

                            <p class="card-text">_</p>
                        </div>
                    </div>
                </div>
                <!-- /.col-md-6 -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
@endsection
