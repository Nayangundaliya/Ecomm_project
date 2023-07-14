@extends('layout.layout')

@section('main')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" style="min-height: 117px;">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Category</h1>
                </div>
                <!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- Main content -->
    <section class="content">
        <div class="d-flex flex-row-reverse ">
            <a name="" id="" class="btn btn-primary" href="{{ url('/admin/category') }}" role="button">Back</a>
        </div>
        <div class="container-fluidr">
            <div class="row d-flex  justify-content-center ">
                <div class="col-8 ">

                    <div class="card card-primary shadow">
                        <div class="card-header text-center">
                            <h3 class="card-title ">Add Category</h3>
                        </div>
                        <form action="{{ url('/admin/category/store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Category Name</label>
                                    <input type="text" class="form-control" name="name" placeholder="Enter Style">
                                    <span class="text-danger">
                                        @error('name')
                                        {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Slug</label>
                                    <input type="text" class="form-control" name="slug" placeholder="Enter Key Value">
                                    <span class="text-danger">
                                        @error('slug')
                                        {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Discription</label>
                                    <textarea class="form-control" rows="3" name="description"
                                        placeholder="Enter ..."></textarea>
                                    <span class="text-danger">
                                        @error('discription')
                                        {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Image</label>
                                    <input type="file" class="form-control" name="image">
                                    <span class="text-danger">
                                        @error('image')
                                        {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Meta Tital</label>
                                    <input type="text" class="form-control" name="meta_title"
                                        placeholder="Enter Key Value">
                                    <span class="text-danger">
                                        @error('meta_title')
                                        {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Meta Keyword</label>
                                    <input type="text" class="form-control" name="meta_keyword"
                                        placeholder="Enter Key Value">
                                    <span class="text-danger">
                                        @error('meta_keyword')
                                        {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Meta Discription</label>
                                    <textarea class="form-control" rows="3" name="meta_description"
                                        placeholder="Enter ..."></textarea>
                                    <span class="text-danger">
                                        @error('meta_description')
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