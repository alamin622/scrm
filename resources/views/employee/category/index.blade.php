@extends('layouts.admin')
@section('content')

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Category List</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('website')}}">Home</a></li>
                        <li class="breadcrumb-item active">Category</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header ">
                            <h3 class="card-title">Category List</h3>

                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-0">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th style="width: 250px">Sl No.</th>
                                    <th> Category Name</th>


                                </tr>
                                </thead>
                                <tbody>
                                @if($categories->count()>0)


                                @foreach($categories as $category)

                                <tr>
                                    <td>{{$loop->iteration}}</td>

                                    <td>{{$category->name}}</td>
                                    @endforeach
                                @else
                                <tr>
                                    <td colspan="5">
                                        <h5 class="text-center">No Category Found</h5>
                                    </td>
                                </tr>
                                @endif
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer d-flex justify-content-center">
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
   
@endsection
