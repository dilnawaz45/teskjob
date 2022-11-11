<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class LoginController extends Controller
{
    //
    public function manager_login(Request $request){
        $request->validate([
            "username" => "required",
            "password" => "required"
        ]);

        $data = User::where(["username" => $request->username, "password" => $request->password, "type" => "MANAGER"])->first();
        
        if($data['username'] == $request->username && $data['password'] == $request->password){
            $request->session()->put([
                "username" => $data->username,
                "password" => $data->password,
                "type" => $data->type,
            ]);
            return redirect( route('manager_dashboard') );
        }
        else{
            $request->session()->flash("status", "Invalid Username/Password");
            return redirect( route('manager_login') );
        }
    }
    public function employee_login(Request $request){
        $request->validate([
            "username" => "required",
            "password" => "required"
        ]);

        $data = User::where(["username" => $request->username, "password" => $request->password, "type" => "EMPLOYEE"])->first();
        
        if($data['username'] == $request->username && $data['password'] == $request->password){
            $request->session()->put([
                "username" => $data->username,
                "password" => $data->password,
                "type" => $data->type,
            ]);
            return redirect( route('employee_dashboard') );
        }
        else{
            $request->session()->flash("status", "Invalid Username/Password");
            return redirect( route('employee_login') );
        }
    }
}
