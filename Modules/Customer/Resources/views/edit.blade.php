@extends('layout.layout')

@section('main')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" style="min-height: 117px;">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Customer</h1>
                </div>
                <!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- Main content -->
    <section class="content">
        <div class="d-flex flex-row-reverse ">
            <a name="" id="" class="btn btn-primary" href="{{ url('/admin/customer') }}" role="button">Back</a>
        </div>
        <div class="container-fluidr">

            <div class="row d-flex  justify-content-center">
                <div class="col-8">

                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title ">Edit Customer</h3>
                        </div>
                        <form action="{{ url('/admin/customer/update') }}/{{ $customer->id }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">

                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">First Name</label>
                                        <input type="text" class="form-control" name="first_name" value="{{ $customer->first_name}}" placeholder="Enter Style">


                                        <span class="text-danger">
                                            @error('first_name')

                                            {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Last Name</label>
                                        <input type="text" class="form-control" name="last_name" value="{{ $customer->last_name}}" placeholder="Enter Key Value">


                                        <span class="text-danger">
                                            @error('last_name')


                                            {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">country</label>

                                        <input type="text" class="form-control" name="country" value="{{ $customer->country}}" placeholder="country">


                                        <span class=" text-danger">
                                            @error('country')

                                            {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">city</label>

                                        <input type="text" class="form-control" name="city" value="{{ $customer->city}}" placeholder="city">


                                        <span class=" text-danger">
                                            @error('city')

                                            {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Phone</label>

                                        <input type="text" class="form-control" name="phone_no" value="{{ $customer->phone_no}}" placeholder="city">



                                        <span class=" text-danger">
                                            @error('phone_no')


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

