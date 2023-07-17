@extends('layout.layout')

@section('main')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" style="min-height: 117px;">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Product Edit</h1>
                </div>
                <!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- Main content -->
    <section class="content">
        <div class="d-flex flex-row-reverse ">
            <a name="" id="" class="btn btn-primary" href="{{ url('/admin/products') }}" role="button">Back</a>
        </div>
        <div class="container-fluidr">

            <div class="row d-flex  justify-content-center">
                <div class="col-8">

                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title ">Edit products</h3>
                        </div>
                        <form action="{{ url('/admin/products/update') }}/{{ $products->id }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Product Name</label>
                                            <input type="text" class="form-control" name="name" value="{{ $products->name}}"
                                                placeholder="Enter Style">
                                            <span class="text-danger">
                                                @error('name')
                                                {{ $message }}
                                                @enderror
                                            </span>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Slug</label>
                                            <input type="text" class="form-control" name="slug" value="{{ $products->slug}}"
                                                placeholder="Enter Key Value">
                                            <span class="text-danger">
                                                @error('slug')
                                                {{ $message }}
                                                @enderror
                                            </span>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Category</label>
                                            <select name="category_id" id="Select" class="form-select">
                                                <option value="{{$products->category_id}}">{{$products->category_id}}</option>
                                                @foreach($categories as $category)
                                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                                @endforeach
                                            </select>
                                            <span class="text-danger">
                                                @error('category')
                                                {{ $message }}
                                                @enderror
                                            </span>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Brand</label>
                                                <select name="brand" id="Select" class="form-select">
                                                    <option value="{{$products->brand}}">{{$products->brand}}</option>
                                                    @foreach($brands as $brand)
                                                    <option value="{{$brand->name}}">{{$brand->name}}</option>
                                                    @endforeach
                                                </select>
                                            <span class="text-danger">
    
                                                @error('brand')
                                                {{ $message }}
                                                @enderror
                                            </span>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Small Discription</label>
                                            <textarea class="form-control" rows="3" name="small_description"
                                                placeholder="Enter ...">{{ $products->small_description}}</textarea>
                                            <span class=" text-danger">
                                                @error('small_discription')
                                                {{ $message }}
                                                @enderror
                                            </span>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Discription</label>
                                            <textarea class="form-control" rows="3" name="description"
                                                placeholder="Enter ...">{{ $products->description}}</textarea>
                                            <span class=" text-danger">
                                                @error('discription')
                                                {{ $message }}
                                                @enderror
                                            </span>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Image</label>
                                            <input type="file" class="form-control" name="image">
                                            <img class="mt-1" src="{{ asset('/uploads/product/'.$products->image) }}"
                                                alt="image" width="50px" height="50px">
                                            <span class="text-danger">
                                                @error('image')
                                                {{ $message }}
                                                @enderror
                                            </span>
                                        </div>
                                        <select class="form-control" name="status">
                                            <option selected>Active</option>
                                            <option>Inactive</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Original Price</label>
                                            <input type="text" class="form-control" name="original_price" value="{{ $products->original_price}}"
                                                placeholder="Enter Style">
                                            <span class="text-danger">
                                                @error('original_price')
                                                {{ $message }}
                                                @enderror
                                            </span>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Selling Price</label>
                                            <input type="text" class="form-control" name="selling_price" value="{{ $products->selling_price}}"
                                                placeholder="Enter Style">
                                            <span class="text-danger">
                                                @error('selling_price')
                                                {{ $message }}
                                                @enderror
                                            </span>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Quantity</label>
                                            <input type="text" class="form-control" name="quantity" value="{{ $products->quantity}}"
                                                placeholder="Enter Style">
                                            <span class="text-danger">
                                                @error('quantity')
                                                {{ $message }}
                                                @enderror
                                            </span>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </div>
                                    <!-- /.card-body -->

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