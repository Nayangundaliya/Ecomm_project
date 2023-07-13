@extends('layout.layout')

@section("changePassword")
   <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="min-height: 117px;">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Change Password</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div> 
     <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
     
        
       
        <!-- Main row -->
      <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- jquery validation -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Change Password</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form  action="{{url('/')}}/change-password" method="post">
                @csrf
               
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputPassword1">Current Password</label>
                    <input type="password" name="current_password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                     <span class="text-danger">
                          @error('current_password')
                                {{$message}}
                          @enderror
                       </span>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">New Password</label>
                    <input type="password" name="new_password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                      <span class="text-danger">
                          @error('new_password')
                                {{$message}}
                          @enderror
                       </span>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Conform Password</label>
                    <input type="password" name="password_confirmation" class="form-control" id="exampleInputPassword1" placeholder="Password">
                        <span class="text-danger">
                          @error('password_confirmation')
                                {{$message}}
                          @enderror
                       </span>
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
            </div>
          <!--/.col (left) -->
          <!-- right column -->
          <div class="col-md-6">

          </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
  </div>
  <!-- /.content-wrapper --> 
@endsection