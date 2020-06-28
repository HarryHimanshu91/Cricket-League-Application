@extends('layouts.master')

@section('title', 'Cricket League')

@section('content')
    <div class="container" style="margin-top:30px;">
        <h2 style="text-align:center; margin-bottom:20px;"> List of Team Points </h2>
        <span> Click any Team to see its Points </span>
        <ul class="list-inline">
           @foreach($teams as $team)
            <li><a href="{{ route('teamPoints',$team->name) }}"> {{ $team->name }}</a></li>
            @endforeach
         </ul> 
    </div>
@endsection