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
    
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table class="table container table-hover text-center">
                                <thead>
                                    <tr>
                                        <th>Srno</th>
                                        <th>Product Name</th>
                                        <th>Key</th>
                                        <th>Size</th>
                                        <th>Color</th>
                                        <th colspan="1" class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white">
                                    @php
                                    $no = 1;
                                    @endphp
                                    {{-- @foreach ($styles as $value) --}}
                                    <tr>
                                        {{-- <td scope="row">{{ $no++ }}</td>
                                        <td>{{ $value->style_name }}</td>
                                        <td>{{ $value->key }}</td>
                                        <td>
                                            <ul>
                                                @foreach ($value->sizes as $size)
                                                <div class="form-check form-check-inline">
                                                    <li class="form-check-input">{{ $size->size }}</li>
                                                </div>
                                                @endforeach
                                            </ul>
                                        </td> --}}
                                        <td>
                                            <ul>
                                                {{-- @foreach ($value->colors as $color)
                                                <div class="form-check form-check-inline">
                                                    <li class="form-check-input">
                                                        <div
                                                            style="background-color:{{ $color->key_name }}; height: 15px; width: 15px; display: inline-block; border:1.5px solid black;">
                                                        </div>
                                                        {{ $color->name }}
                                                    </li>
                                                </div>
                                                @endforeach --}}
                                            </ul>
                                        </td>
                                        <td>
                                            {{-- <div class="d-flex justify-content-around">
                                                <a id="" class="btn btn-primary" href="style/edit/{{ $value->id }}"
                                                    role="button"><i class="fa fa-edit" aria-hidden="true"></i></a>
                                                <a id="" class="btn btn-danger" href="style/delete/{{ $value->id }}"
                                                    role="button"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                            </div> --}}
                                        </td>
                                    </tr>
                                    {{-- @endforeach --}}
    
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