@extends('layouts.app')
 @section('content')

 <style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>

@php
 
$genders = Request::has('gender') ? Request::get('gender') : [];
$min_price = Request::has('min_price') ? Request::get('min_price') : null;
$family_types = Request::has('family_type') ? Request::get('family_type') : [];
$manglik = Request::has('manglik') ? Request::get('manglik') : [];
$ages = Request::has('age') ? Request::get('age') : [];  
@endphp



 <div class="container">
     <form id="post-form"  method="GET">
     

        <h3>By Gender</h3>
        <ul>
          <li>  <input   type="checkbox"  onclick="return true" name="gender[]" id="brand-194663664-1" value="Male" {{ in_array('Male', $genders) ? 'checked' :''  }} > Male  </li>
          <li>  <input  type="checkbox"  onclick="return true" name="gender[]" id="brand-194663664-1" value="Female" {{ in_array('Female', $genders) ? 'checked' :''  }}  > Female  </li>
        </ul>

        
     <h3>By Income</h3>
       <ul>
        @if(isset($min_price))
                 <li> <input type="range"   class="range" name="min_price" min="10" max="20000" value="{{Request::get('min_price')}}" id="lower"></li>

                 <li> <input type="range"  class="range" name="max_price" min="10" max="20000" value="{{Request::get('max_price')}}" id="upper"></li>
                  @else
                 <li> <input type="range"   class="range" name="min_price" min="10" max="20000" value="10" id="lower"></li>

                 <li> <input type="range"  class="range" name="max_price" min="10" max="20000" value="20000" id="upper"></li>
                  @endif
         
      </ul>

      <h3>By Family Type</h3>
       <ul>
           <li>  <input   type="checkbox"  onclick="return true" name="family_type[]" id="brand-194663664-1" value="Joint_family" {{ in_array('Joint_family', $family_types) ? 'checked' :''  }}  > Joint family  </li>
          <li>  <input  type="checkbox"  onclick="return true" name="family_type[]" id="brand-194663664-1" value="Nuclear_family" {{ in_array('Nuclear_family', $family_types) ? 'checked' :''  }}  > Nuclear family  </li>
      </ul>

       <h3>By Manglik</h3>
       <ul>
           <li>  <input   type="checkbox"  onclick="return true" name="manglik[]" id="brand-194663664-1" value="Yes" {{ in_array('Yes', $manglik) ? 'checked' :''  }}   > Yes  </li>
          <li>  <input  type="checkbox"  onclick="return true" name="manglik[]" id="brand-194663664-1" value="No" {{ in_array('No', $manglik) ? 'checked' :''  }}  >No </li>
      </ul>
   </form>

 
            <h2>All Users</h2>

            <table class="show_here ">
                
              <tr>
                <th>Name</th>
                <th>Age</th>
                <th>Gender</th>
                <th>Income</th>
                <th>Family Type</th>
                <th>Manglik</th>
              </tr>
             @forelse($all_users as $all_user)
               @php $diff = date_diff(date_create($all_user['dob']), date_create(date("Y-m-d")));  @endphp
              <tr class="show_here">
                <td>{{$all_user['first_name']}}  {{$all_user['last_name']}}</td>
                <td> {{ $diff->format('%y') }} yrs</td>
                <td>{{$all_user['gender']}}</td>
                <td>{{$all_user['annual_income']}}</td>
                <td>{{$all_user['family_type']}}</td>
                <td>{{$all_user['manglik']}}</td>
              </tr>
                @empty @endforelse
             
            </table>
        </div>
 
 </div>
    
    <script>
  var lowerSlider = document.querySelector('#lower');
  var upperSlider = document.querySelector('#upper');

  document.querySelector('#two').value = upperSlider.value;
  document.querySelector('#one').value = lowerSlider.value;

  var lowerVal = parseInt(lowerSlider.value);
  var upperVal = parseInt(upperSlider.value);

  upperSlider.oninput = function() {
    lowerVal = parseInt(lowerSlider.value);
    upperVal = parseInt(upperSlider.value);

    if (upperVal < lowerVal + 4) {
      lowerSlider.value = upperVal - 4;
      if (lowerVal == lowerSlider.min) {
        upperSlider.value = 4;
      }
    }
    document.querySelector('#two').value = this.value
  };

  lowerSlider.oninput = function() {
    lowerVal = parseInt(lowerSlider.value);
    upperVal = parseInt(upperSlider.value);
    if (lowerVal > upperVal - 4) {
      upperSlider.value = lowerVal + 4;
      if (upperVal == upperSlider.max) {
        lowerSlider.value = parseInt(upperSlider.max) - 4;
      }
    }
    document.querySelector('#one').value = this.value
  };
</script>
 
  <!---728x90--->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" crossorigin="anonymous"></script>
<script type="text/javascript">
 $(document).on("change", "#post-form", function (t) {
                 t.preventDefault();
                    var o = $(t.currentTarget);
                    let stateObj = 'user_view';
                        window.history.replaceState(stateObj, 
                        "Page 3", "all-user-filter?"+o.closest("form").serialize()); 

                        $('.show_here').css('text-align','center');
                        $(".show_here").html('<div class="fa-3x" style="color: #ff5063;"><i class="fa fa-spinner fa-spin"></i></div>');
                                        
                        $.ajax({
                            url: '/ajax-users',
                            data: o.closest("form").serialize(),
                            type: "GET",
                            success: function (j) {
                                console.log(j)
                                 $('.show_here').css('justify-content','');
                                 $(".show_here").html(j.data.html);
                             
                              },
                            error: function (j) {
                                o.removeClass("button-loading"), a(j, o.closest("form"));
                            },
                        });
                });

  </script>
@endsection