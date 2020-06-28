@extends('admin.layouts.layout')
@section('title','Create Player')
@section('content')
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"> Create Player </h1>
          </div><!-- /.col -->
         
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
     
      <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title"> Create Player </h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
            

              <form role="form" method="post" action="{{ route('player.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="card-body">

                 <div class="row mb-2">
                    <div class="col-md-6">
                        <label for="exampleInputEmail1"> Player First Name </label>
                        <input type="text" class="form-control @error('firstname') is-invalid @enderror" value="{{ old('firstname') }}" name="firstname" placeholder="Enter Player First Name">
                        @error('firstname')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong> 
                        </span>
                        @enderror
                    </div>
                    
                    <div class="col-md-6">
                        <label for="exampleInputEmail1"> Player Last Name </label>
                        <input type="text" class="form-control @error('lastname') is-invalid @enderror" value="{{ old('lastname') }}" name="lastname" placeholder="Enter Player Last Name">
                        @error('lastname')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong> 
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-2">
                    <div class="col-md-6">
                            <label for="exampleInputFile"> Select Team </label>
                            <select name="team_id" class="form-control @error('team_id') is-invalid @enderror">
                                <option value="">Select Team </option>
                                    @foreach($teams as $team)
                                    <option value="{{ $team->id }}" {{ (old('team_id')== $team->id ) ? 'selected' : '' }}> {{ $team->name }} </option>
                                    @endforeach
                            </select>
                            @error('team_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong> 
                            </span>
                            @enderror
                        
                        </div>
                    
                    <div class="col-md-6">
                        <label for="exampleInputFile"> Player Image </label>
                        <input type="file" class="form-control @error('logo') is-invalid @enderror" name="logo">
                        @error('logo')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong> 
                        </span>
                        @enderror
                    </div>
                </div>


                <div class="row mb-2">
                    <div class="col-md-6">
                        <label for="exampleInputEmail1"> Player Jersey Number </label>
                        <input type="number" class="form-control @error('jersey') is-invalid @enderror" value="{{ old('jersey') }}" name="jersey" placeholder="Enter Player Jersey Number">
                        @error('jersey')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong> 
                        </span>
                        @enderror
                    </div>
                    
                    <div class="col-md-6">
                        <label for="exampleInputEmail1"> Match Played </label>
                        <input type="number" class="form-control @error('matchplayed') is-invalid @enderror" value="{{ old('matchplayed') }}" name="matchplayed" placeholder="Enter Player Match Played">
                        @error('matchplayed')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong> 
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-2">
                    <div class="col-md-6">
                        <label for="exampleInputEmail1"> Player Total Runs  </label>
                        <input type="number" class="form-control @error('total_runs') is-invalid @enderror" value="{{ old('total_runs') }}" name="total_runs" placeholder="Enter Player Total Runs">
                        @error('total_runs')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong> 
                        </span>
                        @enderror
                    </div>
                    
                    <div class="col-md-6">
                        <label for="exampleInputEmail1"> Player Highest Score  </label>
                        <input type="number" class="form-control @error('high_score') is-invalid @enderror" value="{{ old('high_score') }}" name="high_score" placeholder="Enter Player High Score">
                        @error('high_score')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong> 
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-2">
                    <div class="col-md-6">
                        <label for="exampleInputEmail1"> Player 50's  </label>
                        <input type="number" class="form-control @error('total_fifty') is-invalid @enderror" value="{{ old('total_fifty') }}" name="total_fifty" placeholder="Enter Player Fifties">
                        @error('total_fifty')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong> 
                        </span>
                        @enderror
                    </div>
                    
                    <div class="col-md-6">
                        <label for="exampleInputEmail1"> Player 100's  </label>
                        <input type="number" class="form-control @error('total_hundreds') is-invalid @enderror" value="{{ old('total_hundreds') }}" name="total_hundreds" placeholder="Enter Player Hundreds">
                        @error('total_hundreds')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong> 
                        </span>
                        @enderror
                    </div>
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
 
 