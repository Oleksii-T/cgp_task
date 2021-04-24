@extends('layouts.admin-lte')

@section('content')
        <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Clients</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{route('client.index')}}">Clients</a></li>
                    <li class="breadcrumb-item active">Client create</li>
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
                            <h3 class="card-title">Create new client</h3>
                        </div>
                        <form method="post" action="{{route('client.store')}}">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="name">Client name</label>
                                    <input type="text" name="name" class="form-control" id="name" placeholder="Client" value="{{old('name')}}">
                                    <x-server-input-error inputName='name'/>
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" name="email" class="form-control" id="email" placeholder="Email" value="{{old('email')}}">
                                    <x-server-input-error inputName='email'/>
                                </div>
                                <div class="form-group">
                                    <label for="founded-at">Phone</label>
                                    <input type="text" name="phone" class="form-control" id="phone" placeholder="Phone" value="{{old('phone')}}">
                                    <x-server-input-error inputName='phone'/>
                                </div>
                                <div class="form-group">
                                    <label for="companies">Companies ids</label>
                                    <input type="text" name="companies" class="form-control" id="companies" placeholder="Companies ids" value="{{old('companies')}}">
                                    <x-server-input-error inputName='companies'/>
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