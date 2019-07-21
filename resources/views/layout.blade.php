<!DOCTYPE html>
<html lang="en">
<head>
	
  <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
   <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script> -->
  
  <title>SLICK </title>


  <!-- Required meta tags -->
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="keywords" content="Bootstrap, Landing page, Template, Business, Service">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="author" content="Grayrids">
   
    <!--======  <title>Water Engineering Services</title> ======-->
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

<body>    <!-- Header Section Start -->
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
                <a class="nav-link page-scroll" href="home">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link page-scroll" href="#services">About</a>
              </li>  
              <li class="nav-item">
                <a class="nav-link page-scroll" href="#features">Services</a>
              </li>                            
              <li class="nav-item">
                <a class="nav-link page-scroll" href="home">Showcase</a>
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

@yield('content')

</div>
	</body>
  
	</html>