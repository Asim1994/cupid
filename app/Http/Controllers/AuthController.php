<?php

namespace App\Http\Controllers;
use App\User;
use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

 

class AuthController extends Controller
{
 
   public function loginProcess(Request $request)
    {

      $rules = ['email' => 'required', 'password' => 'required'];
       $validation = Validator::make($request->all(), $rules);
        if ($validation->fails()) {
             return redirect()->back()->withErrors($validation)->withInput($request->all());
        }
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
           if (Auth::user()->role==0) {
                      return redirect('/admin/home');
                    } else {
                      return redirect('/home');
                    }


            // return redirect()->intended('dashboard')
            //             ->withSuccess('Signed in');
        }
  
        return redirect("login")->withSuccess('Login details are not valid');
    }
     

    
}
