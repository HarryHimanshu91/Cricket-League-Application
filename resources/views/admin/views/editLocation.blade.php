@extends('admin.layouts.layout')
@section('title','Update Location')
@section('content')
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"> Update Location </h1>
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
                <h3 class="card-title"> Update Location </h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
            

              <form role="form" method="post" action="{{ route('locations.update', $location->id ) }}" >
                 {{ method_field('PUT') }}
                 {{ csrf_field() }}
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1"> Stadium Name </label>
                    <input type="text" class="form-control @error('stadium') is-invalid @enderror" value="{{ $location->stadium }}" name="stadium" placeholder="Enter Stadium Name">
                     @error('stadium')
                     <span class="invalid-feedback" role="alert">
                         <strong>{{ $message }}</strong> 
                     </span>
                     @enderror
                  </div>
                 
                  <div class="form-group">
                    <label for="exampleInputEmail1"> City Name </label>
                    <input type="text" class="form-control @error('city') is-invalid @enderror" value="{{ $location->city }}" name="city" placeholder="Enter City Name">
                     @error('city')
                     <span class="invalid-feedback" role="alert">
                         <strong>{{ $message }}</strong> 
                     </span>
                     @enderror
                  </div>
                
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Update</button>
                </div>
              </form>
            </div>
            <!-- /.card -->

          

          

         

          </div>
       
        
       
      </div><!-- /.container-fluid -->
    </section>
@endsection
 
 