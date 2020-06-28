<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Location;
use Validator;

class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $locations = Location::all();
        return view('admin.views.viewLocations', compact('locations')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.views.createLocation'); 
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
            'stadium'    =>  'required',
            'city'    =>  'required',
           
        ]);
       
        $obj = new Location();
        $obj->stadium= request('stadium');
        $obj->city= request('city');
        $obj->save();
            
        if($obj)
        {
            $notification = array(
            'message' => 'Success ! Location has been added successfully', 
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
        $location = Location::where('id',$id)->first();
        return view('admin.views.editLocation',compact('location'));
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
            'stadium'    =>  'required',
            'city'    =>  'required',
           
        ]);
       
        $obj = Location::find($id);
        $obj->stadium= request('stadium');
        $obj->city= request('city');
        $obj->save();
            
        if($obj)
        {
            $notification = array(
            'message' => 'Success ! Location has been Updated Successfully', 
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
        $Location = Location::where('id', $id )->delete();
        if($Location)
        {
            $notification = array(
            'message' => 'Success ! Location has been deleted successfully', 
            'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);

        }
    }
}
