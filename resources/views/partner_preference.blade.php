@extends('layouts.app')
<link href="https://code.jquery.com/ui/1.12.1/themes/ui-lightness/jquery-ui.css"  rel="stylesheet" />
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Partner Preference ') }}</div>
                @if(session()->has('message'))
                <div class="alert alert-success">
                {{ session()->get('message') }}
                </div>
                @endif
                <div class="card-body">
                    <form method="POST" action="{{ route('save.partner.preference') }}">
                        @csrf
                      <input name="id"  type="hidden" value="@if(isset($details)) {{$details->id}}  @endif"  readonly="">
                       <div class="form-group row">
                            <label for="annual_income" class="col-md-4 col-form-label text-md-right">{{ __('Annual Income') }}</label>

                            <div class="col-md-6">


                              <!--   <p>
                                <label for="amount">Price range:</label>
                                <input type="text" id="amount" readonly style="border:0; color:#f6931f; font-weight:bold;">
                                </p>

                                <div id="slider-range"></div>
 -->


                                <input id="expected_income" type="range" class="form-control @error('expected_income') is-invalid @enderror" name="expected_income" value="{{ old('expected_income') }}"   autocomplete="expected_income">
                                 @error('expected_income')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                         <div class="form-group row">
                            <label for="occupation" class="col-md-4 col-form-label text-md-right">{{ __('Occupation') }}</label>
                              <div class="col-md-6">
                                 <select name="occupation[]"  multiple   class="form-control @error('occupation') is-invalid @enderror">
                                    <option value="Private_job">Private job</option>
                                    <option value="Government_Job">Government Job</option>
                                    <option value="Business">Business</option>
                                </select>
                                 @error('occupation')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                         <div class="form-group row">
                            <label for="family_type"  class="col-md-4 col-form-label text-md-right">{{ __('Family Type') }}</label>
                              <div class="col-md-6">
                                 <select name="family_type[]" multiple   class="form-control @error('family_type') is-invalid @enderror">
                                   
                                    <option value="Joint_family" >Joint family</option>
                                    <option value="Nuclear_family">Nuclear family</option>
                                </select>
                                 @error('family_type')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                          <div class="form-group row">
                            <label for="manglik" class="col-md-4 col-form-label text-md-right">{{ __('Manglik') }}</label>
                              <div class="col-md-6">
                                 <select name="manglik"     class="form-control @error('manglik') is-invalid @enderror">

                                    <option value="Yes">Yes</option>
                                    <option value="No">No</option>
                                  </select>
                                 @error('manglik')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                       

                       

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Submit') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<script>
$(document).ready(function() {
    $( "#slider-range" ).slider({
      range: true,
      min: 0,
      max: 500,
      values: [ 75, 300 ],
      slide: function( event, ui ) {
        $( "#amount" ).val( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
      }
    });
    $( "#amount" ).val( "$" + $( "#slider-range" ).slider( "values", 0 ) +
      " - $" + $( "#slider-range" ).slider( "values", 1 ) );
  } );
  </script>

