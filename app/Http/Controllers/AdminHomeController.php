<?php

namespace App\Http\Controllers;
use App\Admin;
use Illuminate\Http\Request;
use Validator;
use Auth;
use Session;

use App\Team;
use App\Player;
use App\Match;
use App\Location;

class AdminHomeController extends Controller
{
    public function dashboard()
    {
        $countTeams = Team::count();
        $countTotalPlayers = Player::count();
        $countTotalMatches = Match::count();
        $countLocation = Location::count();
        // dd($countTotalMatches);
        return view('admin.views.dashboard', compact('countTeams','countTotalPlayers','countTotalMatches','countLocation'));
    }

    public function adminLoginForm()
    {
        if (session("is_active") == 1) {
            return redirect("/dashboard");
        } else {
            return view("admin.views.login");
        }
     
    }
    
    public function checklogin(Request $request)
    {
        $validator = Validator::make(array(
            "email" => $request->email,
            "password" => $request->password
                ), array(
            "email" => "required",
            "password" => "required"
         ));

        if ($validator->fails())
        {
          return redirect("login")->withErrors($validator)->withInput();
        } 
        else 
        {
            $user_info = array(
                "email" => $request->email,
                "password" => $request->password
            );

            if (auth()->guard("admin")->attempt($user_info)) {

                $logged_user_details = auth()->guard("admin")->user();
                session(["is_active" => 1]);
                session(["user_details" => $logged_user_details]);

                return redirect("/dashboard");
            } 
            else {

                $error_message = "Invalid credentials";
                return redirect()->back()->withErrors($error_message);
            }
        }
    }

    public function logout() 
    {
        Session::flush();
        Auth::guard("admin")->logout();
        return redirect("/login");
    }
}
