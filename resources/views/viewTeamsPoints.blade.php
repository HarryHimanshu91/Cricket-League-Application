
@extends('layouts.master')

@section('title', 'Cricket League')

@section('content')
    <div class="container" style="margin-top:30px;">
     
        <h2 style="text-align:center; margin-bottom:20px;"> List of Points - {{ $name }} </h2>
      

        <div class="col-sm-6 col-xs-12">
            <div class="panel panel-default text-center">
                <div class="panel-heading">
                     <h1> Team Name - {{ $name }} </h1>
                </div>
                <div class="panel-body">
                    <p><strong>Total Match Played </strong>  -  {{ $totalMatchPlayed }} </p>
                    <p><strong>Win</strong>  -  {{ $win }} </p>
                    <p><strong>Loss</strong>  -  {{ $totalLost }} </p>
                    <p><strong>Points</strong>  - {{ $win }}</p>
                   
                    
                </div>
              
            </div> 
            </div>

    </div>
@endsection