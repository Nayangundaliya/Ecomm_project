@extends('layout.layout')

@section("main")

   <!-- Content Wrapper. Contains page content -->

 
  <div class="content-wrapper" style="min-height: 117px;">
    
     {{-- <nav class="navbar">
      <div class="container-fluid d-flex justify-content-start">
          <a name="" id="" class="btn btn-primary" href="{{url("/")}}/export" role="button"></a>
      </div>
        <div class="container-fluid d-flex justify-content-end">
            <form class="d-flex "  action="{{url("/")}}/dashboard" method="post">
                @csrf
              <select name="lang" class="me-2">
                    <option value="en">English</option>
                    <option value="hi">Hindi</option>
                    <option value="gu">Gujrati</option>
                    <option value="ar">Arabic</option>
                </select><br>
                <button class="btn bg-primary  text-white" name="submit" type="submit">Click</button>
            </form>
        </div>
    </nav> --}}
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div> 
     <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Main row -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{ $totalorder }}</h3>
        
                <p>New Orders</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="{{ url('admin/order') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>{{ $totalproduct }}<sup style="font-size: 20px"></sup></h3>
        
                <p>Total Product</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href='{{ url('admin/products') }}' class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>{{ $totaluser }}</h3>
        
                <p>User Registrations</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="{{ url('admin/customer') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>65</h3>
        
                <p>Unique Visitors</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
  </div>
  <!-- /.content-wrapper --> 
@endsection