<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Team;
use App\Location;
use App\Match;
use File;
use Validator;

class MatchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $matches = Match::with('location')->get();
        // dd($matches);
        return view('admin.views.viewMatch',compact('matches'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $teams = Team::all();
        $locations = Location::all();
        return view('admin.views.createMatch', compact('teams','locations'));  
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'team1'    =>  'required',
            'team2'    =>  'required|different:team1',
            'date'     =>  'required',
            'time'     =>  'required',
            'location_id' =>  'required',
           
        ]);
    
        $obj = new Match();
        $obj->team1= request('team1');
        $obj->team2 = request('team2');
        $obj->date  = request('date');
        $obj->time   = request('time');
        $obj->location_id   = request('location_id');
        $obj->save();
            
        if($obj)
        {
            $notification = array(
            'message' => 'Success ! Match has been added successfully', 
            'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);

        }
        else
        {
            $notification = array(
            'message' => 'Error ! Something went wrong', 
            'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $teams = Team::all();
        $locations = Location::all();
        $matches = Match::with('location')->where('id',$id )->first();
        return view('admin.views.editMatch', compact('teams','locations','matches')); 
    }

    public function matchmanage($id)
    {
        $teams = Team::all();
        $locations = Location::all();
        $matches = Match::with('location')->where('id',$id )->first();
        return view('admin.views.manageMatch', compact('teams','locations','matches')); 
    }
    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'team1'    =>  'required',
            'team2'    =>  'required|different:team1',
            'date'     =>  'required',
            'time'     =>  'required',
            'location_id' =>  'required',
           
        ]);
    
        $obj = Match::find($id);
        $obj->team1= request('team1');
        $obj->team2 = request('team2');
        $obj->date  = request('date');
        $obj->time   = request('time');
        $obj->location_id   = request('location_id');
        $obj->save();
            
        if($obj)
        {
            $notification = array(
            'message' => 'Success ! Match has been updated successfully', 
            'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);

        }
        else
        {
            $notification = array(
            'message' => 'Error ! Something went wrong', 
            'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }
          
    }


    public function matchresultSave(Request $request, $id)
    {
        $request->validate([
            'winner' =>  'required',
           
        ]);
    
        $obj = Match::find($id);
        $obj->winner = request('winner');
        $obj->points = request('points');
        $obj->status = request('status');
        $obj->save();
            
        if($obj)
        {
            $notification = array(
            'message' => 'Success ! Match Winner has been updated successfully', 
            'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);

        }
        else
        {
            $notification = array(
            'message' => 'Error ! Something went wrong', 
            'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }
       
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $match = Match::where('id', $id )->delete();
        if($match)
        {
            $notification = array(
            'message' => 'Success ! Match has been deleted successfully', 
            'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);

        }
    }
}
