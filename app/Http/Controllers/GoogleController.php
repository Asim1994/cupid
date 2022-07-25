<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Socialite;
use Auth;
use Exception;
use App\User;



class GoogleController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }
      
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function handleGoogleCallback()
    {
        try {
    
            $user = Socialite::driver('google')->user();
     
            $finduser = User::where('google_id', $user->id)->first();
     
            if($finduser){
     
                Auth::login($finduser);
    
                return redirect('/home');
     
            }else{
                $newUser = User::create([
                    'first_name' => $user->name,
		            'last_name' => $user->last_name ?? null,
		            'email' => $user->email,
		            'password' => Hash::make('12345678'),
		            'dob' => null,
		            'gender' => null,
		            'annual_income' => null,
		            'occupation' => null,
		            'family_type' =>null,
		            'manglik' =>null,
		            'role' => 2,
                ]);
    
                Auth::login($newUser);
     
                return redirect('/home');
            }
    
        } catch (Exception $e) {
        	Log::info('Some exception found in index' . $e->getMessage());
            dd($e->getMessage());
        }
    }
}
