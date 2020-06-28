@extends('admin.layouts.layout')
@section('title','Create Team')
@section('content')
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"> Create Teams</h1>
          </div><!-- /.col -->
         
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
     
      <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title"> Create Team </h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
            

              <form role="form" method="post" action="{{ route('teams.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1"> Team Name </label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" name="name" placeholder="Enter Team Name">
                     @error('name')
                     <span class="invalid-feedback" role="alert">
                         <strong>{{ $message }}</strong> 
                     </span>
                     @enderror
                  </div>
                 
                  <div class="form-group">
                    <label for="exampleInputFile"> Team Logo</label>
                    <input type="file" class="form-control @error('logo') is-invalid @enderror" name="logo">
                    @error('logo')
                     <span class="invalid-feedback" role="alert">
                         <strong>{{ $message }}</strong> 
                     </span>
                     @enderror
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
       
        
       
      </div><!-- /.container-fluid -->
    </section>
@endsection
 
 