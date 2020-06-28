@extends('admin.layouts.layout')
@section('title','View Player')
@section('content')
<div class="content-header">
     
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
         <div class="col-md-12">
           

<div class="box box-primary">
    <div class="box-body box-profile">
    <center> <img class="profile-user-img img-responsive img-circle" src="{{ asset('uploads/players/'.$player->logo) }}"></center>
    <h3 class="profile-username text-center">{{ $player->firstname }} {{ $player->lastname }}</h3>
    <p class="text-bold text-center">{{ $player->team->name  }}</p>
       <ul class="list-group list-group-unbordered teamsss">
         
          <li class="list-group-item">
            <b>Belongs To </b> - <a class="pull-right">{{ $player->team->name  }} </a>
          </li>

          <li class="list-group-item">
            <b>Logo </b> - <a class="pull-right"><img class="profile-user-img img-responsive img-circle" src="{{ asset('uploads/teams/'.$player->team->logo) }}"> </a>
          </li>

          <li class="list-group-item">
            <b>Matches </b> - <a class="pull-right"> {{ $player->matchplayed  }} </a>
          </li>

          <li class="list-group-item">
            <b>Jersey Number </b> - <a class="pull-right"> {{ $player->jersey  }} </a>
          </li>
          <li class="list-group-item">
            <b>Total Runs  </b> - <a class="pull-right"> {{ $player->total_runs  }} </a>
          </li>
         
          <li class="list-group-item">
            <b>Highest Score  </b> - <a class="pull-right"> {{ $player->high_score  }} </a>
          </li>

          <li class="list-group-item">
            <b>Total 50's  </b> - <a class="pull-right"> {{ $player->total_fifty  }} </a>
          </li>
          <li class="list-group-item">
            <b>Total 100's  </b> - <a class="pull-right"> {{ $player->total_hundreds  }} </a>
          </li>
         
              
        </ul>     
 </div>
            <!-- /.box-body -->
          </div>
         </div>
      </div><!-- /.container-fluid -->
    </section>
@endsection
 
 