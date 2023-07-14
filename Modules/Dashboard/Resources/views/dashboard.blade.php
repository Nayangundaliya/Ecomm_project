@extends('layout.layout')

@section("main")

   <!-- Content Wrapper. Contains page content -->

 
  <div class="content-wrapper" style="min-height: 117px;">
    
     <nav class="navbar">
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
    </nav>
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"></h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div> 
     <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
     
        
       
        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <section class="col-lg-8 connectedSortable ui-sortable">
            <!-- Custom tabs (Charts with tabs)-->
            <div class="card">
              <div class="card-header ui-sortable-handle" style="cursor: move;">
                <h3 class="card-title">
                  <i class="fas fa-chart-pie mr-1"></i>
               
                  
                </h3>
                <div class="card-tools">
                  <ul class="nav nav-pills ml-auto">
                    <li class="nav-item">
                      <a class="nav-link active" href="#revenue-chart" data-toggle="tab"></a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="#sales-chart" data-toggle="tab"></a>
                    </li>
                  </ul>
                </div>
              </div><!-- /.card-header -->
              
            </div>
            <!-- /.card -->

           
         
            
          </section>
          <!-- right col -->
          <section class="col-lg-4 connectedSortable ui-sortable">
            
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3></h3>

                <p></p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
            </div>
            <div class="small-box bg-success">
              <div class="inner">
                <h3></h3>

                <p></p>
              </div>
              <div class="icon">
                <i class="fas fa-regular fa-heart"></i>
              </div>
            </div>
        
          </section> 
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
  </div>
  <!-- /.content-wrapper --> 
@endsection