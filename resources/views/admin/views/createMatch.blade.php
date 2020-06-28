@extends('admin.layouts.layout')
@section('title','Create Team')
@section('content')
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"> Create Match </h1>
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
                <h3 class="card-title"> Create Match </h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
            

              <form role="form" method="post" action="{{ route('match-store') }}">
                @csrf
                <div class="card-body">
                  <div class="form-group">
                         <label for="exampleInputFile"> Select Team 1 </label>
                            <select name="team1" class="form-control @error('team1') is-invalid @enderror">
                                <option value="">Select Team </option>
                                    @foreach($teams as $team)
                                    <option value="{{ $team->name }}" {{ (old('team1')== $team->name ) ? 'selected' : '' }}> {{ $team->name }} </option>
                                    @endforeach
                            </select>
                            @error('team1')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong> 
                            </span>
                            @enderror
                  </div>
                 
                  <div class="form-group">
                         <label for="exampleInputFile"> Select Team 2 </label>
                            <select name="team2" class="form-control @error('team2') is-invalid @enderror">
                                <option value="">Select Team </option>
                                    @foreach($teams as $team)
                                    <option value="{{ $team->name }}" {{ (old('team2')== $team->name ) ? 'selected' : '' }}> {{ $team->name }} </option>
                                    @endforeach
                            </select>
                            @error('team2')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong> 
                            </span>
                            @enderror
                  </div>

                  <div class="form-group">
                         <label for="exampleInputFile"> Choose Date </label>
                         <input type="text" class="form-control @error('date') is-invalid @enderror" name="date" id="datepicker" placeholder="Enter Date" value="{{ old('date') }}">  
                         @error('date')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong> 
                            </span>
                         @enderror
                  </div>

                  <div class="form-group">
                         <label for="exampleInputFile"> Choose Time </label>
                         <input type="time" class="form-control @error('time') is-invalid @enderror" name="time"  placeholder="Enter time" value="{{ old('time') }}">  
                         @error('time')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong> 
                            </span>
                         @enderror
                  </div>
                  

                  <div class="form-group">
                         <label for="exampleInputFile"> Select Location </label>
                            <select name="location_id" class="form-control @error('location_id') is-invalid @enderror">
                                <option value="">Select Stadium </option>
                                    @foreach($locations as $location)
                                    <option value="{{ $location->id }}" {{ (old('location_id')== $location->id ) ? 'selected' : '' }}> {{ $location->stadium }} , {{ $location->city }}</option>
                                    @endforeach
                            </select>
                            @error('location_id')
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
 
 