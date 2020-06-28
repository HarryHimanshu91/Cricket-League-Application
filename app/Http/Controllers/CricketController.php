<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Match;
use App\Location;
use App\Team;
use App\Player;
use DB;
class CricketController extends Controller
{
    public function showUpcomingMatches()
    {
        $matches = Match::with('location')->where('status',0)->get();
        $matchesFinish = Match::with('location')->where('status',1)->get();
        return view('viewMatches', compact('matches','matchesFinish') );
    }

    public function showTeams()
    {
        $teams = Team::all();
        return view('viewTeams', compact('teams') );
    }

    public function showTeamsMember($id)
    {
        $teams = Team::with('players')->where('id',$id)->first();
        return view('viewTeamsPlayers', compact('teams') );
    }

    // public function showPoint()
    // {
    //     $teams = Team::all();
    //     return view('showPointTeams', compact('teams') );
    // }

     public function Points()
     {
         $teams = Team::all();
         return view('viewPoints',compact('teams'));
     }

    public function TeamsPoints($name)
    {
        $win = Match::where('winner',$name)->count();
        $team1 = Match::where('team1',$name)->count();
        $team2 = Match::where('team2',$name)->count();
        $totalMatchPlayed = $team1 + $team2 ;
        $totalLost =  $totalMatchPlayed - $win;
        // dd($totalLost);
        return view('viewTeamsPoints',compact('name', 'win','totalMatchPlayed','totalLost'));
    }
}
