@extends('layout.layout')

@section('main')
<div class="content-wrapper" style="min-height: 117px;">

    {{-- <nav class="navbar">
        <div class="container-fluid d-flex justify-content-start">
            <a name="" id="" class="btn btn-primary" href="{{url("/")}}/export" role="button"></a>
        </div>
    </nav> --}}
    {{--, --}}
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Product</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- Main content -->

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 ">
                    <div class="card">
                            
                        @if (session()->has('massage'))
                        <div class="alert alert-success alert-dismissible " role="alert">
                            <h5>{{ session()->get('massage') }}</h5>
                        </div>
                        @endif
                        <div class="card-header d-flex flex-row-reverse">
                            
                            <div>
                                <a class="btn btn-primary" href="{{ url('/admin/products/create') }}" role="button"><i
                                        class="fa fa-plus" aria-hidden="true">&nbsp&nbsp</i> Add Product </i></a>
                                &nbsp&nbsp
                                {{-- <a class="btn btn-danger" href="{{ url('/') }}/style-trach" role="button"><i
                                        class="fa fa-trash" aria-hidden="true"></i>&nbsp&nbsp Trash Record</a> --}}
                            </div>
                        </div>
                        <div class="card-header">
                            <form action="" method="GET" role="search">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="input-group">
                                            <input type="text" class="form-control  mr-2" name="search" placeholder="Search option"> <span
                                                class="input-group-btn">
                                                <button type="submit" class="btn btn-primary">
                                                    <span class="glyphicon glyphicon-search"><i class="fa fa-solid fa-magnifying-glass"></i></span>
                                                </button>
                                            </span>
                                        </div>
                                    
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="d-flex flex-row-reverse ">
                                            <a name="" id="" class="btn btn-primary" href="{{ url('/admin/products') }}" role="button">Back</a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
    
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table class="table container table-hover text-center">
                                <thead>
                                    <tr>
                                        <th>Srno</th>
                                        <th>Product Name</th>
                                        <th>Category</th>
                                        <th>Brand Name</th>
                                        <th>Small Description</th>
                                        <th>Description</th>
                                        <th>Original Price</th>
                                        <th>Selling Price</th>
                                        <th>Image</th>
                                        <th>Quantity</th>
                                        <th>Status</th>
                                        <th colspan="1" class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white">
                                    @php
                                    $no = 1;
                                    @endphp
                                    @foreach ($products as $product)
                                        <tr>
                                            <td scope="row">{{ $no++ }}</td>
                                            <td>{{ $product->name }}</td>
                                            <td>{{ $product->category->name }}</td>
                                            <td>{{ $product->brand }}</td>
                                            <td>{{ $product->small_description }}</td>
                                            <td>{{ $product->description }}</td>
                                            <td>{{ $product->original_price }}</td>
                                            <td>{{ $product->selling_price }}</td>
                                            <td>
                                                <!-- Button trigger modal -->
                                                <button type="button" class="btn" data-toggle="modal" data-target="#exampleModal">
                                                    <img src="{{$image = asset('/uploads/product/'.$product->image)}}" style="width: 30px " alt="">
                                                </button>


                                                
                                                <!-- Modal -->
                                                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Product Image</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <img src="{{$image}}" style="width: 300px " alt="">
                                                        </div>
                                                        <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        </div>
                                                    </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>{{ $product->quantity }}</td>
                                            <td>{{ $product->status == "1" ? "Hidden" : "Visible"}}</td>
                                            <td>
                                                <button class="btn"><a href="/admin/products/edit/{{$product['id']}}" class=""><i class="fa fa-thin fa-pen-to-square"></i></a></button>
                                                <button class="btn"><a href="products/destory/{{$product['id']}}" class="text-danger"><i class=" fa fa-duotone fa-trash"></i></a></button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            
                            {{-- <div class="d-flex justify-content-center">
                                {{ $product->links('pagination::bootstrap-4') }}
                              </div> --}}
                            {{-- <div class="d-flex  justify-content-around mt-5">
                                {{ $styles->links() }}
                                {{ $styles->count() }} out of {{ $styles->total() }}
                            </div> --}}
    
                        </div>
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
@endsection

{{-- @extends('layout.layout')

@section('product')
<div class="content-wrapper" style="min-height: 117px;">

    <nav class="navbar">
        <div class="container-fluid d-flex justify-content-start">
            <a name="" id="" class="btn btn-primary" href="{{url("/")}}/export" role="button"></a>
        </div>
    </nav>
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Product</h1>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection --}}