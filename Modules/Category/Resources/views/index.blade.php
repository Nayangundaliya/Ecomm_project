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
                    <h1 class="m-0">Category</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- Main content -->

    {{-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
        Launch demo modal
    </button>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div> --}}
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
                                <a class="btn btn-primary" href="{{ url('/admin/category/create') }}" role="button"><i
                                        class="fa fa-plus" aria-hidden="true">&nbsp&nbsp</i> Add Category </i></a>
                                &nbsp&nbsp
                                {{-- <a class="btn btn-danger" href="{{ url('/') }}/style-trach" role="button"><i
                                        class="fa fa-trash" aria-hidden="true"></i>&nbsp&nbsp Trash Record</a> --}}
                            </div>
                        </div>
                    <div class="card-header">
                        <form action="" method="GET" role="search">
                            <div class="col-sm-6">
                                <div class="input-group">
                                    <input type="text" class="form-control  mr-2" name="search" placeholder="Search option"> <span class="input-group-btn">
                                        <button type="submit" class="btn btn-primary">
                                            <span class="glyphicon glyphicon-search">Search</span>
                                        </button>
                                    </span>
                                </div>
                            </div>
                        </form>
                    </div>



                        <!-- /.card-header -->
                        <div class="card-body">
                            <table class="table container table-hover text-center">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Category Name</th>
                                        <th>Status</th>
                                        <th colspan="1" class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white">
                                    @foreach ($category as $data)
                                    <tr>
                                        <td scope="row">{{ $data->id }}</td>
                                        <td>{{ $data->name }}</td>
                                        <td>{{ $data->status == "1" ? "Hidden" : "Visible"}}</td>
                                        <td>
                                            <div class="d-flex justify-content-around">
                                                <a id="" class="btn btn-primary"
                                                    href="{{ url('/admin/category/edit') }}/{{ $data->id }}"
                                                    role="button"><i class="fa fa-edit" aria-hidden="true"></i></a>
                                                <a id="" class="btn btn-danger"
                                                    href="{{ url('/admin/category/destory') }}/{{ $data->id }}"
                                                    role="button"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach

                                </tbody>
                            </table>

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