<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\User;
use App\PartnerPreference;
use Validator;
use Request as Re;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {   
     try {
      
         $all_users = User::where(function ($query) {

                $partnerpreference = PartnerPreference::where('user_id',Auth::id())->first();

                $occupation = $partnerpreference->occupation ?? null;
                $family_type = $partnerpreference->family_type ?? null;
                $manglik = $partnerpreference->manglik ?? null;

                $occupations = explode(",",$occupation);
                $family_types = explode(",",$family_type);
              

            if (isset($occupations)) {
                foreach ($occupations as $occupation) {
                 $query->orWhere('occupation',$occupation)-> first();
                
                }
            }

            if (isset($family_types)) {
                foreach ($family_types as $family_type) {
                 $query->orWhere('family_type',$family_type)-> first();
                
                }
            }
         $query->where('manglik', $manglik);
        });

        $all_users = $all_users->orderBy('id','desc')->where('status', '=', 1)->paginate(50)->appends(request()->query());
        $data['all_users'] = $all_users;
        return view('home', $data);
        
      } catch (Exception $e) {
        Log::info('Some exception found in index' . $e);
        return redirect()->back()->with('message', 'Something went Wrong');
       
      } 
    }

     public function ShowPartnerPreference()
    {   
      try {
        $data['details'] = PartnerPreference::where('user_id',Auth::id())->first();
        return view('partner_preference', $data);
      } catch (Exception $e) {
        Log::info('Some exception found in index' . $e);
        return redirect()->back()->with('message', 'Something went Wrong');
       
      } 
    }


     public function SavePartnerPreference(Request $request) {
       try {
        $rules = ['expected_income' => 'required', 'occupation' => 'required', 'family_type' => 'required', 'manglik' => 'required',];
        $customMessages = [
        'expected_income.required' => 'Expected Income is required',
        'occupation.required'  => 'Occupation is required',
        'family_type.required'  => 'Family Type is required',
        'manglik.required'  => 'Manglik is required',
        ];


        $validation = Validator::make($request->all(), $rules,$customMessages);
        if ($validation->fails()) {
             return redirect()->back()->withErrors($validation)->withInput($request->all());
        }

        $inputs = $request->input();


         $occupation = $inputs['occupation'] ?? null;
         $family_type = $inputs['family_type'] ?? null;

         if($occupation!=null){
            $occupation = implode(",",$occupation);
          }

         if($family_type!=null){
           $family_type = implode(",",$family_type);
          }


        $inputs['user_id'] = Auth::id();
         $inputs['occupation'] = $occupation;
        $inputs['family_type'] = $family_type;
        
         
        PartnerPreference::updateOrCreate(['id' => $inputs['id']], $inputs);
        return redirect()->back()->with('message', 'Partner Preference Added succesfully !!');
     } catch (Exception $e) {
        Log::info('Some exception found in SavePartnerPreference' . $e);
        return redirect()->back()->with('message', 'Something went Wrong');
       
     } 
       
      
    }

     public function adminindex()
    {  
         $data['all_users']= User::where('role',2)->get();
         return view('adminhome',$data); 
    } 

     public function ajax_all_users(Request $request) {
        try {

           $all_users = User::where(function ($query) {

                $min_price = Re::has('min_price') ? Re::get('min_price') : null;
                $max_price = Re::has('max_price') ? Re::get('max_price') : null;
                
              
                $ages = Re::has('age') ? Re::get('age') : []; //blank array
                $genders = Re::has('gender') ? Re::get('gender') : []; //blank array
                $family_types = Re::has('family_type') ? Re::get('family_type') : []; //blank array
                 $mangliks = Re::has('manglik') ? Re::get('manglik') : []; //blank array
               
              
 
            // if (isset($ages)) {
            //     foreach ($ages as $ages) {
            //      $query->orWhere('occupation',$occupation)-> first();
                
            //     }
            // }

         if (isset($min_price) && isset($max_price)) {
              $query->Where('annual_income', '>=', $min_price)->Where('annual_income', '<=', $max_price)->first();
          }

            if (isset($genders)) {
                foreach ($genders as $gender) {
                 $query->orWhere('gender',$gender)->first();
                
                }
            }

            if (isset($family_types)) {
                foreach ($family_types as $family_type) {
                 $query->Where('family_type',$family_type)->first();
                
                }
            }

             if (isset($mangliks)) {
                foreach ($mangliks as $manglik) {
                 $query->Where('manglik',$manglik)->first();
                
                }
            }

         
        });

        $all_users = $all_users->orderBy('id','desc')->paginate(50)->appends(request()->query());

       $html = '';
          foreach ($all_users as $all_user) {

             $html.= '<tr>
                <td>'.$all_user['first_name'].'  '.$all_user['last_name'].'</td>
                <td>2 yrs</td>
                <td>'.$all_user['gender'].'</td>
                <td>'.$all_user['annual_income'].'</td>
                <td>'.$all_user['family_type'].'</td>
                <td>'.$all_user['manglik'].'</td>
              </tr>';
          }

           $content = ['html' => $html];
           return response()->json(['data' => $content, 'message' => 'success'], 200);
            
        } catch (Exception $e) {
            
        }
     }

    public function filter_all_users(Request $request) {
        try {

           $all_users = User::where(function ($query) {

            $min_price = Re::has('min_price') ? Re::get('min_price') : null;
            $max_price = Re::has('max_price') ? Re::get('max_price') : null;
            $genders = Re::has('gender') ? Re::get('gender') : []; //blank array
            $family_types = Re::has('family_type') ? Re::get('family_type') : []; //blank array
            $mangliks = Re::has('manglik') ? Re::get('manglik') : []; //blank array
               
              
 
            

         if (isset($min_price) && isset($max_price)) {
              $query->orWhere('annual_income', '>=', $min_price)->orWhere('annual_income', '<=', $max_price)->first();
          }

            if (isset($genders)) {
                foreach ($genders as $gender) {
                 $query->orWhere('gender',$gender)->first();
                
                }
            }

            if (isset($family_types)) {
                foreach ($family_types as $family_type) {
                 $query->Where('family_type',$family_type)->first();
                
                }
            }

             if (isset($mangliks)) {
                foreach ($mangliks as $manglik) {
                 $query->Where('manglik',$manglik)->first();
                
                }
            }

         
        });

        $all_users = $all_users->orderBy('id','desc')->paginate(50)->appends(request()->query());
         $data['all_users'] = $all_users;
         return view('adminhome',$data);
 
            
        } catch (Exception $e) {
            
        }
     }
     
}
