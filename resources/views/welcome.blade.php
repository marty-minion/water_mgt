<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="keywords" content="Bootstrap, Landing page, Template, Business, Service">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="author" content="Grayrids">
    <title>Slick - Bootstrap 4 Template</title>
    <!--====== Favicon Icon ======-->
    <link rel="shortcut icon" href="{{URL::asset('images/index/2.png')}}" type="image/png">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{URL::asset('css/index/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{URL::asset('css/index/animate.css')}}">
    <link rel="stylesheet" href="{{URL::asset('css/index/LineIcons.css')}}">
    <link rel="stylesheet" href="{{URL::asset('css/index/owl.carousel.css')}}">
    <link rel="stylesheet" href="{{URL::asset('css/index/owl.theme.css')}}">
    <link rel="stylesheet" href="{{URL::asset('css/index/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{URL::asset('css/index/nivo-lightbox.css')}}">
    <link rel="stylesheet" href="{{URL::asset('css/index/main.css')}}">    
    <link rel="stylesheet" href="{{URL::asset('css/index/responsive.css')}}">

  </head>
  
  <body>

    <!-- Header Section Start -->
    <header id="home" class="hero-area">    
      <div class="overlay">
        <span></span>
        <span></span>
      </div>
      <nav class="navbar navbar-expand-md bg-inverse fixed-top scrolling-navbar">
        <div class="container">
          <a href="index.html" class="navbar-brand"><img src="{{URL::asset('images/index/logo.png')}}" alt=""></a>       
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <i class="lni-menu"></i>
          </button>
          <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav mr-auto w-100 justify-content-end">
              <li class="nav-item">
                <a class="nav-link page-scroll" href="#home">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link page-scroll" href="#services">About</a>
              </li>  
              <li class="nav-item">
                <a class="nav-link page-scroll" href="#features">Services</a>
              </li>                            
              <li class="nav-item">
                <a class="nav-link page-scroll" href="#showcase">Showcase</a>
              </li>       
              <li class="nav-item">
                <a class="nav-link page-scroll" href="#pricing">Pricing</a>
              </li>     
              <li class="nav-item">
                <a class="nav-link page-scroll" href="#team">Team</a>
              </li> 
              <li class="nav-item">
                <a class="nav-link page-scroll" href="#blog">Blog</a>
              </li>  
              <li class="nav-item">
                <a class="nav-link page-scroll" href="#contact">Contact</a>
              </li> 
              @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
            </ul>
          </div>
        </div>
      </nav>  
      <div class="container">      
        <div class="row space-100">
          <div class="col-lg-6 col-md-12 col-xs-12">
            <div class="contents">
              <h2 class="head-title">Vesatile system  <br>For Business and Startups</h2>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab <br>dolores ea fugiat nesciunt quisquam.</p>
              <div class="header-button">
                

                @guest
                           
                                <a class="btn btn-border-filled" href="{{ route('login') }}">{{ __('Login') }}</a>
                     
                                <a href="#contact" class="btn btn-border page-scroll">Contact Us</a>
                        @else
                                <a  class="btn btn-border-filled nav-link " href="{{ route('home') }}" role="button"  aria-haspopup="true" aria-expanded="false" v-pre>
                                    Dashboard <span class="caret"></span>
                                </a>

                              
                        @endguest

                
              </div>
            </div>
          </div>
          <div class="col-lg-6 col-md-12 col-xs-12 p-0">
            <div class="intro-img">
              <img src="{{URL::asset('images/index/intro-new.png')}}" alt="">
            </div>            
          </div>
        </div> 
      </div>             
    </header>
    <!-- Header Section End --> 


    <!-- Services Section Start -->
    <section id="services" class="section">
      <div class="container">

        <div class="row">
          <!-- Start Col -->
          <div class="col-lg-4 col-md-6 col-xs-12">
            <div class="services-item text-center">
              <div class="icon">
                <i class="lni-cog"></i>
              </div>
              <h4>Bootstrap 4</h4>
              <p>Share processes and data secure lona need to know basis Our team assured your web site is always safe.</p>
            </div>
          </div>
          <!-- End Col -->
          <!-- Start Col -->
          <div class="col-lg-4 col-md-6 col-xs-12">
            <div class="services-item text-center">
              <div class="icon">
                <i class="lni-brush"></i>
              </div>
              <h4>Slick Design</h4>
              <p>Share processes and data secure lona need to know basis Our team assured your web site is always safe.</p>
            </div>
          </div>
          <!-- End Col -->
          <!-- Start Col -->
          <div class="col-lg-4 col-md-6 col-xs-12">
            <div class="services-item text-center">
              <div class="icon">
                <i class="lni-heart"></i>
              </div>
              <h4>Crafted with Love</h4>
              <p>Share processes and data secure lona need to know basis Our team assured your web site is always safe.</p>
            </div>
          </div>
          <!-- End Col -->

        </div>
      </div>
    </section>
    <!-- Services Section End -->



    <!-- Business Plan Section Start -->
    <section id="business-plan">
      <div class="container">

        <div class="row">
          <!-- Start Col -->
          <div class="col-lg-6 col-md-12 pl-0 pt-70 pr-5">
            <div class="business-item-img">
              <img src="{{URL::asset('images/index/business/business-img.png')}}" class="img-fluid" alt="">
            </div>
          </div>
          <!-- End Col -->
          <!-- Start Col -->
          <div class="col-lg-6 col-md-12 pl-4">
            <div class="business-item-info">
              <h3>Crafted For Business, Startup and Agency Websites</h3>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do <br> tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim <br> veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea <br> commodo consequat. Duis aute irure dolor in reprehenderit in voluptate <br> velit esse cillum dolore eu fugiat nulla pariatur.</p>

              <a class="btn btn-common" href="#">download</a>
            </div>
          </div>
          <!-- End Col -->

        </div>
      </div>
    </section>
    <!-- Business Plan Section End -->



    <!-- Cool Fetatures Section Start -->
    <section id="features" class="section">
      <div class="container">
        <!-- Start Row -->
        <div class="row">
          <div class="col-lg-12">
            <div class="features-text section-header text-center">  
              <div>   
                <h2 class="section-title">Features of our service</h2>
                <div class="desc-text">
                  <p> these and much much more.</p>
                </div>
              </div> 
            </div>
          </div>

        </div>
        <!-- End Row -->
        <!-- Start Row -->
        <div class="row featured-bg">
         <!-- Start Col -->
          <div class="col-lg-6 col-md-6 col-xs-12 p-0">
             <!-- Start Fetatures -->
            <div class="feature-item featured-border1">
               <div class="feature-icon float-left">
                 <i class="lni-coffee-cup"></i>
               </div>
               <div class="feature-info float-left">
                 <h4>Easy to Customize</h4>
                <p>simple and friendly</p>
                </div>
            </div>
            <!-- End Fetatures -->
          </div>
           <!-- End Col -->
          
         <!-- Start Col -->
          <div class="col-lg-6 col-md-6 col-xs-12 p-0">
             <!-- Start Fetatures -->
            <div class="feature-item featured-border2">
               <div class="feature-icon float-left">
                 <i class="lni-briefcase"></i>
               </div>
               <div class="feature-info float-left">
                 <h4>Device dynamic</h4>
                 <p>
                   get reports and statistics easily
                 </p>
               </div>
            </div>
            <!-- End Fetatures -->
          </div>
           <!-- End Col -->
          
         <!-- Start Col -->
          <div class="col-lg-6 col-md-6 col-xs-12 p-0">
             <!-- Start Fetatures -->
            <div class="feature-item featured-border1">
               <div class="feature-icon float-left">
                 <i class="lni-invention"></i>
               </div>
               <div class="feature-info float-left">
                 <h4>Clean & Trendy Design</h4>
                 <p>easy to use design</p>
               </div>
            </div>
            <!-- End Fetatures -->
          </div>
           <!-- End Col -->
          
         <!-- Start Col -->
          <div class="col-lg-6 col-md-6 col-xs-12 p-0">
             <!-- Start Fetatures -->
            <div class="feature-item featured-border2">
               <div class="feature-icon float-left">
                <i class="lni-layers"></i>
               </div>
               <div class="feature-info float-left">
                 <h4>Easily Scalable</h4>
                 <p>
                Built for medium and large scale enterprises   
                </p>
               </div>
            </div>
            <!-- End Fetatures -->
          </div>
           <!-- End Col -->
          
         <!-- Start Col -->
          <div class="col-lg-6 col-md-6 col-xs-12 p-0">
             <!-- Start Fetatures -->
            <div class="feature-item featured-border3">
               <div class="feature-icon float-left">
                 <i class="lni-reload"></i>
               </div>
               <div class="feature-info float-left">
                 <h4>Rapid  Updates</h4>
                 <p>Rapid feature release cycle</p>
               </div>
            </div>
            <!-- End Fetatures -->
          </div>
           <!-- End Col -->
          
         <!-- Start Col -->
          <div class="col-lg-6 col-md-6 col-xs-12 p-0">
             <!-- Start Fetatures -->
            <div class="feature-item">
               <div class="feature-icon float-left">
                 <i class="lni-support"></i>
               </div>
               <div class="feature-info float-left">
                 <h4>Premier Support</h4>
                 <p> 24/7 online Support.</p>
               </div>
            </div>
            <!-- End Fetatures -->
          </div>
           <!-- End Col -->
          

        </div>
        <!-- End Row -->
      </div>
    </section>
    <!-- Cool Fetatures Section End --> 


    <!-- Contact Us Section -->
    <section id="contact" class="section">
      <!-- Container Starts -->
      <div class="container">
        <!-- Start Row -->
        <div class="row">
          <div class="col-lg-12">
            <div class="contact-text section-header text-center">  
              <div>   
                <h2 class="section-title">Get In Touch</h2>
                <div class="desc-text">
                  <p>Comment, Suggestion , feddback : all is welcome</p>
                </div>
              </div> 
            </div>
          </div>

        </div>
        <!-- End Row -->
        <!-- Start Row -->
        <div class="row">
          <!-- Start Col -->
          <div class="col-lg-6 col-md-12">
          <form id="contactForm">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <input type="text" class="form-control" id="name" name="name" placeholder="Name" required data-error="Please enter your name">
                  <div class="help-block with-errors"></div>
                </div>                                 
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <input type="text" placeholder="Subject" id="msg_subject" class="form-control" name="msg_subject" required data-error="Please enter your subject">
                  <div class="help-block with-errors"></div>
                </div> 
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <input type="text" class="form-control" id="email" name="email" placeholder="Email" required data-error="Please enter your Email">
                  <div class="help-block with-errors"></div>
                </div>                                 
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <input type="text" placeholder="Budget" id="budget" class="form-control" name="budget" required data-error="Please enter your Budget">
                  <div class="help-block with-errors"></div>
                </div> 
              </div>
              <div class="col-md-12">
                <div class="form-group"> 
                  <textarea class="form-control" id="message"  name="message" placeholder="Write Message" rows="4" data-error="Write your message" required></textarea>
                  <div class="help-block with-errors"></div>
                </div>
                <div class="submit-button">
                  <button class="btn btn-common" id="submit" type="submit">Submit</button>
                  <div id="msgSubmit" class="h3 hidden"></div> 
                  <div class="clearfix"></div> 
                </div>
              </div>
            </div>            
          </form>
          </div>
          <!-- End Col -->
          <!-- Start Col -->
          <div class="col-lg-1">
            
          </div>
          <!-- End Col -->
          <!-- Start Col -->
          <div class="col-lg-4 col-md-12">
            <div class="contact-img">
              <img src="{{URL::asset('images/index/contact/01.png')}}" class="img-fluid" alt="">
            </div>
          </div>
          <!-- End Col -->
          <!-- Start Col -->
          <div class="col-lg-1">
          </div>
          <!-- End Col -->

        </div>
        <!-- End Row -->
      </div>
    </section>
    <!-- Contact Us Section End -->

    <!-- Footer Section Start -->
    <footer>
      <!-- Footer Area Start -->
      <section id="footer-Content">
        <div class="container">
          <!-- Start Row -->
          <div class="row">

          <!-- Start Col -->
            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-6 col-mb-12">
              
              <div class="footer-logo">
               <img src="{{URL::asset('images/index/footer-logo.png')}}" alt="">
              </div>
            </div>
             <!-- End Col -->
              <!-- Start Col -->
            <div class="col-lg-2 col-md-6 col-sm-6 col-xs-6 col-mb-12">
              <div class="widget">
                <h3 class="block-title">Company</h3>
                <ul class="menu">
                  <li><a href="#">  - About Us</a></li>
                  <li><a href="#">- Career</a></li>
                  <li><a href="#">- Blog</a></li>
                  <li><a href="#">- Press</a></li>
                </ul>
              </div>
            </div>
             <!-- End Col -->
              <!-- Start Col -->
            <div class="col-lg-2 col-md-6 col-sm-6 col-xs-6 col-mb-12">
              <div class="widget">
                <h3 class="block-title">Product</h3>
                <ul class="menu">
                  <li><a href="#">  - Customer Service</a></li>
                  <li><a href="#">- Enterprise</a></li>
                  <li><a href="#">- Price</a></li>
                  <li><a href="#">- Scurity</a></li>
                  <li><a href="#">- Why SLICK?</a></li>
                </ul>
              </div>
            </div>
             <!-- End Col -->
              <!-- Start Col -->
            <div class="col-lg-2 col-md-6 col-sm-6 col-xs-6 col-mb-12">
              <div class="widget">
                <h3 class="block-title">Download App</h3>
                <ul class="menu">
                  <li><a href="#">  - Android App</a></li>
                  <li><a href="#">- IOS App</a></li>
                  <li><a href="#">- Windows App</a></li>
                  <li><a href="#">- Play Store</a></li>
                  <li><a href="#">- IOS Store</a></li>
                </ul>
              </div>
            </div>
             <!-- End Col -->
              <!-- Start Col -->
            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-6 col-mb-12">
              <div class="widget">
                <h3 class="block-title">Subscribe Now</h3>
                <p>Appropriately implement calysts for change visa wireless catalysts for change. </p>
                <div class="subscribe-area">
                  <input type="email" class="form-control" placeholder="Enter Email">
                  <span><i class="lni-chevron-right"></i></span>
                </div>
              </div>
            </div>
            <!-- End Col -->
          </div>
          <!-- End Row -->
        </div>
        <!-- Copyright Start  -->

        <div class="copyright">
          <div class="container">
            <!-- Star Row -->
            <div class="row">
              <div class="col-md-12">
                <div class="site-info text-center">
                  <p>Crafted by <a href="http://uideck.com" rel="nofollow">UIdeck</a></p>
                </div>              
                
              </div>
              <!-- End Col -->
            </div>
            <!-- End Row -->
          </div>
        </div>
      <!-- Copyright End -->
      </section>
      <!-- Footer area End -->
      
    </footer>
    <!-- Footer Section End --> 


    <!-- Go To Top Link -->
    <a href="#" class="back-to-top">
      <i class="lni-chevron-up"></i>
    </a> 

    <!-- Preloader -->
    <div id="preloader">
      <div class="loader" id="loader-1"></div>
    </div>
    <!-- End Preloader -->

    <!-- jQuery first, then Tether, then Bootstrap JS. -->
    <script src="{{URL::asset('js/index/jquery-min.js')}}"></script>
    <script src="{{URL::asset('js/index/popper.min.js')}}"></script>
    <script src="{{URL::asset('js/index/bootstrap.min.js')}}"></script>
    <script src="{{URL::asset('js/index/owl.carousel.js')}}"></script>      
    <script src="{{URL::asset('js/index/jquery.nav.js')}}"></script>    
    <script src="{{URL::asset('js/index/scrolling-nav.js')}}"></script>    
    <script src="{{URL::asset('js/index/jquery.easing.min.js')}}"></script>     
    <script src="{{URL::asset('js/index/nivo-lightbox.js')}}"></script>     
    <script src="{{URL::asset('js/index/jquery.magnific-popup.min.js')}}"></script>      
    <script src="{{URL::asset('js/index/main.js')}}"></script>
    
  </body>
</html>