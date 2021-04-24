@extends('layouts.admin-lte')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Companies</h1>
                    <br>
                    <a href="{{route('company.create')}}" class="btn btn-success">Add company</a>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                    <li class="breadcrumb-item active">Companies</li>
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
                    @foreach ($companies as $c)
                        <div class="card">
                            <div class="card-header">
                                <h5 class="m-0">[{{$c->id}}] {{$c->name}}</h5>
                            </div>
                            <div class="card-body">
                                <h6 class="card-title">Director - {{$c->director}}</h6>

                                <p class="card-text">Founded at {{$c->founded_at}}</p>
                                <p class="card-text">Clients amount: {{$c->clients()->count()}}</p>
                                <a href="{{route('company.edit', ['company'=>$c->id])}}" class="btn btn-primary">Edit company</a>
                                <form style="display:inline" method="post" action="{{route('company.destroy', ['company'=>$c->id])}}">
                                    @method('DELETE')
                                    @csrf
                                    <button class="btn btn-danger">Delete company</button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                    <div class="pagination-field">
                        {{ $companies->appends(request()->input())->links() }}
                    </div>
                </div>
                <!-- /.col-md-6 -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
@endsection