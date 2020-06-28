@extends('admin.layouts.layout')
@section('title','Manage Match')
@section('content')
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"> Manage Match </h1>
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
                <h3 class="card-title"> Manage Match </h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
            

              <form role="form" method="post" action="{{ route('match-resultSave', $matches->id ) }}">
                 {{ method_field('PUT') }}
                 {{ csrf_field() }}
                <div class="card-body">
                  <div class="form-group">
                         <label for="exampleInputFile"> Match Between </label>
                         <input type="text" disabled class="form-control" value="{{ $matches->team1 }} vs {{ $matches->team2}}"> 
                  </div>
                 
                  <div class="form-group">
                         <label for="exampleInputFile"> Match Location </label>
                         <input type="text" disabled class="form-control" value="{{ $matches->location['stadium'] }}, {{ $matches->location['city'] }}"> 
                  </div>

                  <div class="form-group">
                         <label for="exampleInputFile"> Match date time  </label>
                         <input type="text" disabled class="form-control" value="{{ $matches->date }}, {{ $matches->time }}"> 
                  </div>

                  <div class="form-group">
                         <label for="exampleInputFile"> Match Winner  </label>
                         <select name="winner" class="form-control @error('winner') is-invalid @enderror">
                            <option value="">Select Winner </option>
                            <option value="{{ $matches->team1 }}">{{ $matches->team1 }}</option>
                            <option value="{{ $matches->team2 }}">{{ $matches->team2 }}</option>
                         </select>
                         @error('winner')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong> 
                            </span>
                        @enderror
                  </div>

                  <input type="hidden" name="points" value="1">
                  <input type="hidden" name="status" value="1">

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
 
 