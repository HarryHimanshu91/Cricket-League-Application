@extends('layouts.master')

@section('title', 'View Teams')

@section('content')
    <div class="container" style="margin-top:30px;">
     
        <h2 style="text-align:center; margin-bottom:20px;"> List of Teams  </h2>
        <span> Click any Team to see its Players </span>
          
        <ul class="list-inline">
           @foreach($teams as $team)
            <li><a href="{{ route('showIdTeam',$team->id) }}"> {{ $team->name }}</a></li>
            @endforeach
         </ul> 
            
       
  
    </div>
@endsection