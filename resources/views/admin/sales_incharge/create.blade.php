@extends('layouts.admin')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Create Sales Incharge</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('website') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('sales_incharge.index') }}">Sales Incharge list</a></li>
                        <li class="breadcrumb-item active">Create Sales Incharge</li>
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
                                <h3 class="card-title">Create Sales Incharge</h3>
                                <a href="{{ route('sales_incharge.index') }}" class="btn btn-primary">Go Back to Sales Incharge List</a>
                            </div>
                        </div>
                                    <form action="{{ route('sales_incharge.store') }}" method="POST" enctype="multipart/form-data" id="regForm">
                                        @csrf
                                        <div class="card-body">
                                            @include('includes.errors')
                                            <div class="row justify-content-center">
                                                <!--------------------------------Profile Information--------------------------------->
                                            <div class="col-md-8">
                                                <div class="card card-primary">
                                                    <div class="card-header">
                                                        <h3 class="card-title" style="margin-right: 3rem">Sales Incharge Register</h3>
                                                            <div class="card-tools">
                                                                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                                                    <i class="fas fa-minus" ></i></button>
                                                            </div>
                                                    </div>
                                                        <div class="card-body">
                                                            <div class="form-group ">
                                                                <label for="employee_id" class="required">Employee Name</label>
                                                                <select name="employee_id" id="employee_id" class="form-control" required>
                                                                    <option value="{{ old('employee_id') }}"  style="display: none" selected>Select Employee Name</option>
                                                                    @foreach($employees as $employee)
                                                                        <option value="{{ $employee->id }}"> {{ optional($employee->user)->name }} </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>

                                                            <div class="form-group ">
                                                                <label for="office_type" class="required">Office Type</label>
                                                                <select name="office_type" id="office_type" class="form-control" required>
                                                                    <option value="{{ old('office_type') }}" style="display: none" selected value="">Select Office Type</option>
                                                                    @foreach(config("site.office_types" ) as $key=>$text)
                                                                        <option value="{{$key}}"> {{$text}} </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="form-group" id="D">
                                                                <label for="division_id">Division Name</label>
                                                                <select  name="division_id" id="division_id" class="form-control">
                                                                    <option value="{{ old('division_id') }}" style="display: none" selected>Select Division Name</option>
                                                                    @foreach($divisions as $d)
                                                                        <option value="{{ $d->id }}"> {{ $d->name }} </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="form-group " id="Z">
                                                                <label for="zone_id">Zone Name</label>
                                                                <select  name="zone_id" id="zone_id" class="form-control">
                                                                    <option value="{{ old('zone_id') }}" style="display: none" selected>Select Zone Name</option>

                                                                    @foreach($divisions as $division)
                                                                        @foreach($division->zones as $zone)
                                                                            <option data-chained="{{$division->id}}" value="{{$zone->id}}">
                                                                                {{$zone->name}}
                                                                            </option>
                                                                        @endforeach
                                                                    @endforeach
                                                                </select>
                                                            </div>

                                                            <div class="form-group "id="A">
                                                                <label for="area_id">Area Name</label>
                                                                <select  name="area_id" id="area_id" class="form-control">
                                                                    <option value="{{ old('area_id') }}" style="display: none" selected>Select Area Name</option>

                                                                    @foreach($zones as $zone)
                                                                        @foreach($zone->areas as $area)
                                                                            <option data-chained="{{$zone->id}}" value="{{$area->id}}">
                                                                                {{$area->name}}
                                                                            </option>
                                                                        @endforeach
                                                                    @endforeach
                                                                </select>
                                                            </div>

                                                            <div class="form-group">
                                                                <div class="form-check">
                                                                    <input type="hidden" name="is_active" value="0" >
                                                                    <input name="is_active" class="form-check-input" type="checkbox" value="1" id="is_active" checked>
                                                                    <label class="form-check-label" for="is_active">
                                                                        Active?
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- /.card -->
                                                    </div>
                                                </div>

                                            </div>
                                              <div class="card-footer">
                                            <button type="submit" class="btn btn-lg btn-primary">Submit</button>
                                        </div>
                                        </div>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
    </div>
@endsection

@section('style')
    <link rel="stylesheet" href="{{ asset('/admin/css/summernote-bs4.min.css') }}">
    <style>

        #D, #Z, #A{
            display: none;
        }
    </style>
@endsection

@section('script')
    <script src="{{ asset('/admin/js/summernote-bs4.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>

    <script>
        $('#description').summernote({
            placeholder: 'Hello Bootstrap 4',
            tabsize: 2,
            height: 300
        });
        $("#zone_id").chained("#division_id");
        $("#area_id").chained("#zone_id");

        $(document).ready(function() {
            $.viewMap = {
                '0' : $([]),
                'D' : $('#D'),
                'Z' : $('#D,#Z'),
                'A' : $('#D, #Z, #A'),


            };


            $('#office_type').change(function() {
                if($(this).val() == 'D') {
                    $("#division_id").attr("required", true);
                    $("#zone_id").removeAttr("required");
                    $("#area_id").removeAttr("required");

                    $("#division_id").closest('.form-group').find('label').addClass("required");
                    $("#zone_id").closest('.form-group').find('label').removeClass("required");
                    $("#area_id").closest('.form-group').find('label').removeClass("required");

                } else if ($(this).val() == 'Z') {
                    $("#division_id").attr("required", true);
                    $("#zone_id").attr("required", true);
                    $("#area_id").removeAttr("required");

                    $("#division_id").closest('.form-group').find('label').addClass("required");
                    $("#zone_id").closest('.form-group').find('label').addClass("required");
                    $("#area_id").closest('.form-group').find('label').removeClass("required");
                } else if ($(this).val() == 'A') {
                    $("#division_id").attr("required", true);
                    $("#zone_id").attr("required", true);
                    $("#area_id").attr("required", true);

                    $("#division_id").closest('.form-group').find('label').addClass("required");
                    $("#zone_id").closest('.form-group').find('label').addClass("required");
                    $("#area_id").closest('.form-group').find('label').addClass("required");
                }

                $.each($.viewMap, function() { this.hide(); });
                // show current
                $.viewMap[$(this).val()].show();
            });
        });
    </script>
@endsection
