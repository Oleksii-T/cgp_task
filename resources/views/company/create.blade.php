@extends('layouts.admin-lte')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Companies</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{route('company.index')}}">Companies</a></li>
                    <li class="breadcrumb-item active">Company create</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-6">
                <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Create new company</h3>
                        </div>
                        <form method="post" action="{{route('company.store')}}">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="name">Company Name</label>
                                    <input type="text" name="name" class="form-control" id="name" placeholder="Company" value="{{old('name')}}">
                                    <x-server-input-error inputName='name'/>
                                </div>
                                <div class="form-group">
                                    <label for="director">Director name</label>
                                    <input type="text" name="director" class="form-control" id="director" placeholder="Director" value="{{old('director')}}">
                                    <x-server-input-error inputName='director'/>
                                </div>
                                <div class="form-group">
                                    <label for="founded-at">Founded at date</label>
                                    <input type="text" name="founded_at" class="form-control" id="founded-at" placeholder="Founded at" value="{{old('founded_at')}}">
                                    <x-server-input-error inputName='founded_at'/>
                                </div>
                                <div class="form-group">
                                    <label for="clients">Client ids</label>
                                    <input type="text" name="clients" class="form-control" id="clients" placeholder="Clients" value="{{old('clients')}}">
                                    <x-server-input-error inputName='clients'/>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
                <!--/.col (left) -->
            </div>
        </div>
    </section>
    <!-- /.content -->
@endsection