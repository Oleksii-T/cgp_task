@extends('layouts.admin-lte')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Clients</h1>
                    <br>
                    <a href="{{route('client.create')}}" class="btn btn-success">Add client</a>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                    <li class="breadcrumb-item active">Clients</li>
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
                    @foreach ($clients as $c)
                        <div class="card">
                            <div class="card-header">
                                <h5 class="m-0">[{{$c->id}}] {{$c->name}}</h5>
                            </div>
                            <div class="card-body">
                                <h6 class="card-title">Email - {{$c->email}}</h6>
                                <br>
                                <h6 class="card-title">Phone - {{$c->phone}}</h6>
                                <p class="card-text">Added {{$c->created_at->diffForHumans()}}
                                    <br>
                                    Client of {{$c->companies()->count()}} companies</p>
                                <a href="{{route('client.edit', ['client'=>$c->id])}}" class="btn btn-primary">Edit client</a>
                                <form style="display:inline" method="post" action="{{route('client.destroy', ['client'=>$c->id])}}">
                                    @method('DELETE')
                                    @csrf
                                    <button class="btn btn-danger">Delete client</button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                    <div class="pagination-field">
                        {{ $clients->appends(request()->input())->links() }}
                    </div>
                </div>
                <!-- /.col-md-6 -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
@endsection
