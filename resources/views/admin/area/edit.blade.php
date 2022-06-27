@extends('layouts.admin')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Edit Area</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('website') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('area.index') }}">Area list</a></li>
                        <li class="breadcrumb-item active">Edit  Area</li>
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
                                <h3 class="card-title">Edit Area- {{ $area->name }}</h3>
                                <a href="{{ route('area.index') }}" class="btn btn-primary">Go Back to Area List</a>
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <div class="row">
                                <div class="col-12 col-lg-6 offset-lg-3 col-md-8 offset-md-2">
                                    <form action="{{ route('area.update', [$area->id]) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <div class="card-body">
                                            @include('includes.errors')

                                            <div class="form-group ">
                                                <label for="division">Division Name</label>
                                                <select name="division" id="division" class="form-control">
                                                    <option value="" style="display: none" selected>Select Customer type</option>
                                                    @foreach($divisions as $d)
                                                        <option value="{{ $d->id }}"> @if($area->division_id == $d->id) selected @endif> {{ $d->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="form-group ">
                                                <label for="zone">Zone Name</label>
                                                <select name="zone" id="zone" class="form-control">
                                                    <option value="" style="display: none" selected>Select Zone</option>
                                                    @foreach($zones as $z)
                                                        <option value="{{ $z->id }}"> @if($area->zone_id == $z->id) selected @endif> {{ $z->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="name">Area Name</label>
                                                <input type="name" name="name" class="form-control" value="{{ $area->name }}" placeholder="Enter name">
                                            </div>
                                        </div>
                                        <div class="card-footer">
                                            <button type="submit" class="btn btn-lg btn-primary">Update  Area</button>
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
