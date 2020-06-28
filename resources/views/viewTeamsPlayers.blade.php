@extends('layouts.master')

@section('title', 'View Teams')

@section('content')
    <div class="container" style="margin-top:30px;">
     
        <h2 style="text-align:center; margin-bottom:20px;"> List of Players  </h2>
        <h2 style="text-align:center; margin-bottom:20px;"> <b> {{ $teams->name }} </b> </h2>
        <ul class="list-inline">
          
           @if(count($teams->players) > 0)
            @foreach($teams->players as $team)
              
               <div class="col-sm-6 col-xs-12">
                    <div class="panel panel-default text-center">
                        <div class="panel-heading">
                            <h1> {{ $team['firstname'] }} {{ $team['lastname'] }} </h1>
                        </div>
                        <div class="panel-body">
                            <p> <img class="playeriamgse" src="{{ asset('uploads/players/'.$team->logo) }}"> </p>
                            <p><strong>Jersey Number </strong>  - {{ $team['jersey'] }} </p>
                            <p><strong>Match Played </strong>  - {{ $team['matchplayed'] }} </p>
                            <p><strong>Total Runs </strong> - {{ $team['total_runs'] }}  </p>
                            <p><strong>Highest Score </strong> -   {{ $team['high_score'] }} </p>
                            <p><strong> Total 50's  </strong> -   {{ $team['total_fifty'] }} </p>
                            <p><strong>Total 100's  </strong> -   {{ $team['total_hundreds'] }} </p>
                   
                         </div>
                    
                    </div> 
               </div> 

            @endforeach
            @else
            <div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    Ooops !!.. <b> No Players has been added in {{ $teams->name }} Team.</b> Admin has the rights to manage players from the Admin Panel.
            </div>
            @endif
         </ul> 
            
       
  
    </div>
@endsection