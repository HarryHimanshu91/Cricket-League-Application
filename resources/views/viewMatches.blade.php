@extends('layouts.master')

@section('title', 'Cricket League')

@section('content')
    <div class="container" style="margin-top:30px;">
     
        <h2 style="text-align:center; margin-bottom:20px;"> List of Upcoming Matches </h2>
        @if(count($matches) >0 )
            @foreach($matches as $match)
            <div class="col-sm-6 col-xs-12">
                <div class="panel panel-default text-center">
                    <div class="panel-heading">
                        <h1> {{ $match->team1 }} Vs {{ $match->team2 }}</h1>
                    </div>
                    <div class="panel-body">
                        <p><strong>Date</strong>  -  {{ $match->date }} </p>
                        <p><strong>Time</strong>  - {{ $match->time }} </p>
                        <p><strong>Stadium</strong> -  {{ $match->location['stadium'] }} </p>
                        <p><strong>City</strong> -   {{ $match->location['city'] }} </p>
                    
                    </div>
                
                </div> 
            </div> 
            @endforeach
           
            @else
            <div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    Sorry !!.. <b> Upcoming Matches</b>  Not Found. Admin has the rights to create matches from the Admin Panel.
            </div>
        @endif
    </div>

    <div class="container" style="margin-top:30px;"> 
      <hr>
      <h2 style="text-align:center; margin-bottom:20px;"> List of Finished Matches </h2>
           @if(count($matchesFinish) >0 )
            @foreach($matchesFinish as $match)
                <div class="col-sm-6 col-xs-12">
                    <div class="panel panel-default text-center" style="background:#67b7e8;">
                        <div class="panel-heading">
                            <h1> {{ $match->team1 }} Vs {{ $match->team2 }}</h1>
                        </div>
                        <div class="panel-body">
                            <p><strong>Date</strong>  -  {{ $match->date }} </p>
                            <p><strong>Time</strong>  - {{ $match->time }} </p>
                            <p><strong>Stadium</strong> -  {{ $match->location['stadium'] }} </p>
                            <p><strong>City</strong> -   {{ $match->location['city'] }} </p>
                            <p class="winerclass"><strong>Winner</strong> -   {{ $match->winner}} </p>
                        </div>
                    
                    </div> 
                </div> 
            @endforeach
            @else
            <div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    Sorry !!.. <b> No Completed Matches</b> are Found. Admin has the rights to manage matches from the Admin Panel.
            </div>
           @endif
    </div>
@endsection