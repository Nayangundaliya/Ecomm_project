@extends('layout.layout')

@section('main')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" style="min-height: 117px;">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Brand</h1>
                </div>
                <!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- Main content -->
    <section class="content">
        <div class="d-flex flex-row-reverse ">
            <a name="" id="" class="btn btn-primary" href="{{ url('/admin/brand') }}" role="button">Back</a>
        </div>
        <div class="container-fluidr">
            <div class="row d-flex  justify-content-center ">
                <div class="col-8 ">

                    <div class="card card-primary shadow">
                        <div class="card-header text-center">
                            <h3 class="card-title ">Add Brand</h3>
                        </div>
                        <form action="{{ url('/admin/brand/store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Brand Name</label>
                                    <input type="text" class="form-control" name="name" placeholder="Enter Name">
                                    <span class="text-danger">
                                        @error('name')
                                        {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Slug</label>
                                    <input type="text" class="form-control" name="slug" placeholder="Enter Slug">
                                    <span class="text-danger">
                                        @error('slug')
                                        {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                                <select class="form-control" name="status">
                                    <option selected>Active</option>
                                    <option>Inactive</option>
                                </select>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                        </form>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
</div>
<!-- /.content-wrapper -->
@endsection

