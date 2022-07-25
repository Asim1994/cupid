<?php


use App\PartnerPreference;

 function CheckMatchingPercentage($income , $occupation ,$family, $manglik){
    $user_details = PartnerPreference::where('user_id',Auth::id())->first();

    $user_occupation= explode(",",$user_details->occupation);
    $user_family_type= explode(",",$user_details->family_type);

    ($user_details->expected_income == $income) ? ($percentage_income=25) : ($percentage_income=0);
    ($user_details->manglik == $manglik) ? ($percentage_manglik=25) : ($percentage_manglik=0);
    

    if (in_array($occupation, $user_occupation))
    {  $percentage_occupation=25; } else { $percentage_occupation=0; }

    if (in_array($family, $user_family_type))
    {  $percentage_family=25; } else { $percentage_family=0;}

    $final_percentage = $percentage_income +  $percentage_manglik +  $percentage_occupation + $percentage_family;

     return  ($final_percentage); 
}

 function Age($dob){
     $diff = date_diff(date_create($dob), date_create(date("Y-m-d")));
     $age = $diff->format('%y');
     return  ($age);

}