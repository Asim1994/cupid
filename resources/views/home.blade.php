@extends('layouts.app')

@section('content')

<!DOCTYPE html>
<!-- html -->
<html>
<!-- head -->

<!-- Mirrored from demo.w3layouts.com/demos_new/template_demo/07-06-2017/match-demo_Free/360227837/web/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 24 Jul 2022 07:37:32 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
<title>Match a Matrimonial Category Bootstrap Responsive Web Template | index :: w3layouts</title>
<link href="{{asset('css/bootstrap.css')}}" rel="stylesheet" type="text/css" media="all" /><!-- bootstrap-CSS -->
<link href="{{asset('css/font-awesome.css')}}" rel="stylesheet" type="text/css" media="all" /><!-- Fontawesome-CSS -->
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->

<script type='text/javascript' src='js/jquery-2.2.3.min.js'></script>
<!-- Custom Theme files -->

<link href="{{asset('css/menu.css')}}" rel="stylesheet" type="text/css" media="all" /> <!-- menu style --> 
<!--theme-style-->
<link href="{{asset('css/style.css')}}" rel="stylesheet" type="text/css" media="all" />  
<!--//theme-style-->
<link rel="stylesheet" type="text/css" href="{{asset('css/easy-responsive-tabs.css')}}" />
<!--meta data-->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta charset="utf-8">
<!-- //nav smooth scroll -->            
<link rel="stylesheet" href="css/intlTelInput.css">
</head>
<!-- //head -->
<meta name="robots" content="noindex">
<body> 
<!-- header -->
<header>
    <!--  Navigation Start -->
 <div class="navbar navbar-inverse-blue navbar">
    <!--<div class="navbar navbar-inverse-blue navbar-fixed-top">-->
      <div class="navbar-inner">
        <div class="container">
           <div class="pull-right">
            <nav class="navbar nav_bottom" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            </nav>
           </div> <!-- end pull-right -->
          <div class="clearfix"> </div>
        </div> <!-- end container -->
      </div> <!-- end navbar-inner -->
    </div> <!-- end navbar-inverse-blue -->
<!-- ============================  Navigation End ============================ -->
</header>
 
  <!---728x90---> 
        <!-- featured profiles -->          
            <div class="w3layouts_featured-profiles">
                <div class="container">
                <!-- slider -->
                <div class="agile_featured-profiles">
                    <h2>Featured Profiles</h2>
                    
                            <ul id="flexiselDemo3">
                                <li>
                                  @forelse($all_users as $all_user)
                                  @php $diff = date_diff(date_create($all_user['dob']), date_create(date("Y-m-d"))); 
                                  

                                  @endphp
                                    <div class="col-md-3 biseller-column">
                                        <a href="#">
                                            <div class="profile-image">
                                                <img src="{{asset('images/p1.jpg')}}" class="img-responsive" alt="profile image">
                                                <div class="agile-overlay">
                                                <h4>Profile ID: PID{{$all_user['id']}}</h4>
                                                    <ul>
                                                        <li><span>FullName</span>: {{$all_user['first_name']}}  {{$all_user['last_name']}}</li>
                                                        <li><span>Gender</span>: {{$all_user['gender']}}</li>
                                                        <li><span>Occupation</span>: {{$all_user['occupation']}}</li>
                                                        <li><span>Family Type</span>: {{$all_user['family_type']}}</li>
                                                        <li><span>Manglik</span>: {{$all_user['manglik']}}</li>
                                                        <li><span>Match %</span>:  {{ CheckMatchingPercentage($all_user['annual_income'],$all_user['occupation'],$all_user['family_type'],$all_user['manglik']) }}% </li>
                                                         <li><span>Age</span>: {{ $diff->format('%y') }} yrs</li>
                                                       
                                                    </ul>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                      @empty @endforelse
                                </li>
                             </ul>
                    </div>   
            </div>
            <!-- //slider -->               
            </div>
            <script type="text/javascript" src="js/jquery.flexisel.js"></script><!-- flexisel-js -->    
                    <script type="text/javascript">
                         $(window).load(function() {
                            $("#flexiselDemo3").flexisel({
                                visibleItems:1,
                                animationSpeed: 1000,
                                autoPlay: false,
                                autoPlaySpeed: 5000,            
                                pauseOnHover: true,
                                enableResponsiveBreakpoints: true,
                                responsiveBreakpoints: { 
                                    portrait: { 
                                        changePoint:480,
                                        visibleItems:1
                                    }, 
                                    landscape: { 
                                        changePoint:640,
                                        visibleItems:1
                                    },
                                    tablet: { 
                                        changePoint:768,
                                        visibleItems:1
                                    }
                                }
                            });
                            
                        });
                       </script>
            <!-- //featured profiles -->           
                       
        <!-- mobile-app -->
            <div class="wthree-mobilaapp main-grid-border">
                <div class="container">
                    <div class="app">
                        <div class="col-md-6 w3ls_app-left mpl">
                            <h3>Matrimonial mobile app on your smartphone!</h3>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p>
                            <div class="agileits_app-devices">
                                <h5>Download the App</h5>
                                <a href="#"><img src="images/1.png" alt=""></a>
                                <a href="#"><img src="images/2.png" alt=""></a>
                                <div class="clearfix"> </div>
                            </div>
                        </div>
                        <div class="col-md-offset-1 col-md-5 app-image">
                            <img src="images/mob.png" alt="">
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
            <!-- /mobile-app -->
    
    <!-- browse profiles -->
    <div class="w3layouts-browse text-center">
        <div class="container">
            <h3>Browse Matchmaking Profiles by</h3>
            <div class="col-md-4 w3-browse-grid">
                <h4>By Country</h4>
                <ul>
                    <li><a href="nri_list.html">Country 1</a></li>
                    <li><a href="nri_list.html">Country 2</a></li>
                    <li><a href="nri_list.html">Country 3</a></li>
                    <li><a href="nri_list.html">Country 4</a></li>
                    <li><a href="nri_list.html">Country 5</a></li>
                    <li><a href="nri_list.html">Country 6</a></li>
                    <li><a href="nri_list.html">Country 7</a></li>
                    <li><a href="nri_list.html">Country 8</a></li>
                    <li><a href="nri_list.html">Country 9</a></li>
                    <li><a href="nri_list.html">Country 10</a></li>
                    <li><a href="nri_list.html">Country 11</a></li>
                    <li class="more"><a href="nri_list.html">more..</a></li>
                </ul>
            </div>
            <div class="col-md-4 w3-browse-grid">
                <h4>By Religion</h4>
                <ul>
                    <li><a href="r_list.html">Religion 1</a></li>
                    <li><a href="r_list.html">Religion 2</a></li>
                    <li><a href="r_list.html">Religion 3</a></li>
                    <li><a href="r_list.html">Religion 4</a></li>
                    <li><a href="r_list.html">Religion 5</a></li>
                    <li><a href="r_list.html">Religion 6</a></li>
                    <li><a href="r_list.html">Religion 7</a></li>
                    <li><a href="r_list.html">Religion 8</a></li>
                    <li><a href="r_list.html">Religion 9</a></li>
                    <li><a href="r_list.html">Religion 10</a></li>
                    <li><a href="r_list.html">Religion 11</a></li>
                    <li class="more"><a href="r_list.html">more..</a></li>
                </ul>
            </div>
            <div class="col-md-4 w3-browse-grid">
                <h4>By Community</h4>
                <ul>
                    <li><a href="r_list.html">Community 1</a></li>
                    <li><a href="r_list.html">Community 2</a></li>
                    <li><a href="r_list.html">Community 3</a></li>
                    <li><a href="r_list.html">Community 4</a></li>
                    <li><a href="r_list.html">Community 5</a></li>
                    <li><a href="r_list.html">Community 6</a></li>
                    <li><a href="r_list.html">Community 7</a></li>
                    <li><a href="r_list.html">Community 8</a></li>
                    <li><a href="r_list.html">Community 9</a></li>
                    <li class="more"><a href="r_list.html">more..</a></li>
                </ul>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
    <!-- //browse profiles -->
    
    <!-- Assisted Service -->
    <div class="agile-assisted-service text-center">
        <h4>Assisted Service</h4>
        <p>Our Relationship Managers have helped thousands of members find their life partners.</p>
        <a href="assisted_services.html">Know More</a>
    </div>
    <!-- //Assisted Service -->
    
    <!-- Location -->
    <div class="location w3layouts">
        <div class="container">
            <div class="col-md-6 col-sm-6 w3layouts location-grids location-grids-1">
                <h3>Where We Are</h3>
                <h5>Our Branches</h5>
                <p>250+ branches across World, Largest Network of its Kind.</p>
            </div>
            <div class="col-md-6 col-sm-6 w3layouts location-grids location-grids-2">
                <a href="contact.html"><img src="images/location.jpg" class="img-responsive" alt="Agileits W3layouts" /></a>
            </div>
            <div class="clearfix"></div>            
        </div>
    </div>
    <!-- //Location -->
    
    <!-- Get started -->
    <div class="w3layous-story text-center">
        <div class="container">
            <h4>Your story is waiting to happen!  <a class="scroll" href="#home">Get started</a></h4>
        </div>
    </div>
    <!-- //Get started -->
    
<!-- footer -->
<footer>
    <div class="footer">
        <div class="container">
            <div class="footer-info w3-agileits-info">
                <div class="col-md-4 address-left agileinfo">
                    <div class="footer-logo header-logo">
                        <h6>Get in Touch.</h6>
                    </div>
                    <ul>
                        <li><i class="fa fa-map-marker"></i> 123 San Sebastian, New York City USA.</li>
                        <li><i class="fa fa-mobile"></i> 333 222 3333 </li>
                        <li><i class="fa fa-phone"></i> +222 11 4444 </li>
                        <li><i class="fa fa-envelope-o"></i> <a href="mailto:example@mail.com"> mail@example.com</a></li>
                    </ul> 
                </div>
                <div class="col-md-8 address-right">
                    <div class="col-md-4 footer-grids">
                        <h3>Company</h3>
                        <ul>
                            <li><a href="about.html">About Us</a></li>
                            <li><a href="feedback.html">Feedback</a></li>  
                            <li><a href="help.html">Help</a></li>  
                            <li><a href="tips.html">Safety Tips</a></li>
                            <li><a href="typo.html">Typography</a></li>
                            <li><a href="icons.html">Icons Page</a></li>
                        </ul>
                    </div>
                    <div class="col-md-4 footer-grids">
                        <h3>Quick links</h3>
                        <ul>
                            <li><a href="terms.html">Terms of use</a></li>
                            <li><a href="privacy_policy.html">Privacy Policy</a></li>
                            <li><a href="contact.html">Contact Us</a></li>
                            <li><a href="faq.html">FAQ</a></li>
                            <li><a href="sitemap.html">Sitemap</a></li>
                        </ul> 
                    </div>
                    <div class="col-md-4 footer-grids">
                        <h3>Follow Us on</h3>
                        <section class="social">
                        <ul>
                            <li><a class="icon fb" href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a class="icon tw" href="#"><i class="fa fa-twitter"></i></a></li>  
                            <li><a class="icon gp" href="#"><i class="fa fa-google-plus"></i></a></li>
                        </ul>
                        </section>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>  
    <div class="copy-right"> 
        <div class="container">
            <p>© 2017 Match. All rights reserved | Design by <a href="http://w3layouts.com/"> W3layouts.</a></p>
        </div>
    </div> 
</footer>
<!-- //footer -->   
<!-- menu js aim -->
    <script src="{{asset('js/jquery.menu-aim.js')}}"> </script>
    <script src="{{asset('js/main.js')}}"></script> <!-- Resource jQuery -->
    <!-- //menu js aim -->      
<!-- Calendar -->
    <link rel="stylesheet" href="{{asset('css/jquery-ui.css')}}" />
  <!-- for bootstrap working -->
        <script src="{{asset('js/bootstrap.js')}}"></script>
 
    <a href="#" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
    <!-- for smooth scrolling -->
    <script type="text/javascript" src="{{asset('js/move-top.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/easing.js')}}"></script>
    <script type="text/javascript">
    jQuery(document).ready(function($) {
        $(".scroll").click(function(event){     
            event.preventDefault();
            $('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
        });
    });
    </script>
    <!-- //for smooth scrolling -->
</body>
<!-- //body -->

 
</html>
<!-- //html -->

@endsection
