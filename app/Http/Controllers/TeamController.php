<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use File;
use App\Team;
use Validator;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $teams = Team::orderBy('id', 'desc')->get();
       return view('admin.views.viewTeam', compact('teams'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.views.createTeam');
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
            'name'    =>  'required|unique:teams,name',
            'logo'    =>  'required|image|mimes:jpeg,jpg,png|max:2048'
        ]);
        $image = $request->file('logo');
        $new_name = rand() . '.' . $image->getClientOriginalExtension(); 
        $image->move("uploads/teams" , $new_name );

        $obj = new Team();
        $obj->name= request('name');
        $obj->logo = $new_name;
        $obj->save();
            
        if($obj)
        {
            $notification = array(
            'message' => 'Success ! Team has been added successfully', 
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
        $team = Team::where('id',$id)->first();
        return view('admin.views.editTeam',compact('team'));
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
                'name'    =>  'required',
                'logo'        =>  'required|image|mimes:jpeg,jpg,png|max:2048'
            ]);
           
            $image_name = rand() . '.' . $image->getClientOriginalExtension();
            $image->move("uploads/teams" , $image_name );

        }
        else
        {
            $request->validate([
                'name'    =>  'required',
                
            ]);
        }
        $obj = Team::find($id);
        $obj->name= request('name');
        $obj->logo = $image_name;
        $obj->save();
        if($obj)
        {
            $notification = array(
            'message' => 'Success ! Team has been updated successfully', 
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
        $team = Team::where('id', $id )->delete();
        if($team)
        {
            $notification = array(
            'message' => 'Success ! Team has been deleted successfully', 
            'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);

        }
    }
}
