@extends('layouts.admin')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Edit Role</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('website') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('role.index') }}">Role list</a></li>
                        <li class="breadcrumb-item active">Edit Role</li>
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
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex justify-content-between align-items-center">
                                <h3 class="card-title">Edit Role - {{ $role->name }}</h3>
                                <a href="{{ route('role.index') }}" class="btn btn-primary">Go Back to Role List</a>
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <div class="row">
                                <div class="col-12 col-lg-6 offset-lg-3 col-md-8 offset-md-2">
                                    <form action="{{ route('role.update', [$role->id]) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <div class="card-body">
                                            @include('includes.errors')
                                            <div class="form-group">
                                                <label for="name">Role name</label>
                                                <input type="name" name="name" class="form-control" value="{{ $role->name }}" placeholder="Enter name">
                                            </div>

                                            <div class="form-group">
                                                <label for="slug">slug</label>
                                                <textarea name="slug" id="slug" rows="4" class="form-control"
                                                          placeholder="Enter description"> {{ $role->slug }} </textarea>
                                            </div>
                                      
                                          
                                        </div>
                                        <div class="card-footer">
                                            <button type="submit" class="btn btn-lg btn-primary">Update Role</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
