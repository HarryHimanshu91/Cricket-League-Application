<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Team;
use File;
use App\Player;
use Validator;

class PlayerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $players = Player::with('team')->orderBy('id','desc')->get();
      //  dd($players);
        return view('admin.views.viewPlayer',compact('players'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {  
        $teams = Team::all();
        return view('admin.views.createPlayer',compact('teams'));
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
            'firstname'   =>  'required|unique:players,firstname',
            'lastname'    =>  'required',
            'team_id'     =>  'required',
            'logo'        =>  'required|image|mimes:jpeg,jpg,png|max:2048',
            'jersey'      =>  'required|max:3|unique:players,jersey',
            'matchplayed' =>  'required|max:3',
            'total_runs'     =>  'required|max:6',
            'high_score'     =>  'required|max:3',
            'total_fifty'    =>  'required|max:3',
            'total_hundreds' =>  'required|max:3',
        ]);
        $image = $request->file('logo');
        $new_name = rand() . '.' . $image->getClientOriginalExtension(); 
        $image->move("uploads/players" , $new_name );

        $obj = new Player();
        $obj->firstname= request('firstname');
        $obj->lastname = request('lastname');
        $obj->team_id  = request('team_id');
        $obj->jersey   = request('jersey');
        $obj->matchplayed    = request('matchplayed');
        $obj->total_runs     = request('total_runs');
        $obj->high_score     = request('high_score');
        $obj->total_fifty    = request('total_fifty');
        $obj->total_hundreds = request('total_hundreds');
        $obj->logo = $new_name;
        $obj->save();
            
        if($obj)
        {
            $notification = array(
            'message' => 'Success ! Player has been added successfully', 
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
        $player = Player::with('team')->where('id',$id)->first();
       // dd($player);
        return view('admin.views.showPlayer',compact('player'));
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
        $player = Player::with('team')->where('id',$id)->first();
       // dd($player);
        return view('admin.views.editPlayer',compact('player','teams' ));
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
        $image_name = $request->hidden_image;
        $image = $request->file('logo');
        if($image !='')
        {
            $request->validate([
                'firstname'   =>  'required',
                'lastname'    =>  'required',
                'team_id'     =>  'required',
                'logo'        =>  'required|image|mimes:jpeg,jpg,png|max:2048',
                'jersey'      =>  'required|max:3',
                'matchplayed' =>  'required|max:3',
                'total_runs'     =>  'required|max:6',
                'high_score'     =>  'required|max:3',
                'total_fifty'    =>  'required|max:3',
                'total_hundreds' =>  'required|max:3',
            ]);
           
            $image_name = rand() . '.' . $image->getClientOriginalExtension();
            $image->move("uploads/players" , $image_name );

        }
        else
        {
            $request->validate([
                'firstname'   =>  'required',
                'lastname'    =>  'required',
                'team_id'     =>  'required',
                'jersey'      =>  'required|max:3',
                'matchplayed' =>  'required|max:3',
                'total_runs'     =>  'required|max:6',
                'high_score'     =>  'required|max:3',
                'total_fifty'    =>  'required|max:3',
                'total_hundreds' =>  'required|max:3',
                
            ]);
        }
        $obj = Player::find($id);
        $obj->firstname= request('firstname');
        $obj->lastname = request('lastname');
        $obj->team_id  = request('team_id');
        $obj->jersey   = request('jersey');
        $obj->matchplayed    = request('matchplayed');
        $obj->total_runs     = request('total_runs');
        $obj->high_score     = request('high_score');
        $obj->total_fifty    = request('total_fifty');
        $obj->total_hundreds = request('total_hundreds');
        $obj->logo = $image_name;
        $obj->save();
        if($obj)
        {
            $notification = array(
            'message' => 'Success ! Player has been updated successfully', 
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
        $player = Player::where('id', $id )->delete();
        if($player)
        {
            $notification = array(
            'message' => 'Success ! Player has been deleted successfully', 
            'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);

        }
    }
}
