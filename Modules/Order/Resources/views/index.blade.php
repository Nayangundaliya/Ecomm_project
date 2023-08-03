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
                <h1 class="m-0">Order</h1>
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
                            {{-- <a class="btn btn-primary" href="{{ url('/admin/order/create') }}" role="button"><i class="fa fa-plus" aria-hidden="true">&nbsp&nbsp</i> Add Order </i></a>
                            &nbsp&nbsp --}}
                            {{-- <a class="btn btn-danger" href="{{ url('/') }}/style-trach" role="button"><i class="fa fa-trash" aria-hidden="true"></i>&nbsp&nbsp Trash Record</a> --}}
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
                        <table class="table table-hover text-center">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Order Name</th>
                                    <th>Status</th>
                                    <th colspan="1" class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white">
                                @foreach ($order as $data)
                                <tr>
                                    <td scope="row">{{ $data->id }}</td>
                                <td>{{ $data->name }}</td>
                                <td>{{ $data->status == "1" ? "Hidden" : "Visible"}}</td>
                                <td>
                                    <button class="btn"><a href="{{ url('/admin/order/edit') }}/{{ $data->id }}" class=""><i class="fa fa-thin fa-pen-to-square"></i></a></button>
                                    <button class="btn"><a href="{{ url('/admin/order/destory') }}/{{ $data->id }}" class="text-danger"><i class=" fa fa-duotone fa-trash"></i></a></button>
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


