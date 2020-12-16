<!DOCTYPE html>
<html lang="en">
<head>
<title>Colo Shop</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="Colo Shop Template">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="stylesheet" type="text/css" href="{{ asset('frontend_assets/styles/bootstrap4/bootstrap.min.css')}}">
<link href="{{ asset('frontend_assets/plugins/font-awesome-4.7.0/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
<link href="{{ asset('frontend_assets/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="{{ asset( 'frontend_assets/plugins/OwlCarousel2-2.2.1/owl.carousel.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset( 'frontend_assets/plugins/OwlCarousel2-2.2.1/owl.theme.default.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset( 'frontend_assets/plugins/OwlCarousel2-2.2.1/animate.css')}}">


@yield('link')

</head>

<body>

<div class="super_container">

  <!-- Header -->
  <header class="header trans_300">

    <!-- Main Navigation -->

    <div class="main_nav_container">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-right">
            <div class="logo_container">
              <a href="{{route('home')}}">colo<span>shop</span></a>
            </div>
            <nav class="navbar">
              <ul class="navbar_menu d-none d-md-block">
                <li><a href="{{route('home')}}">home</a></li>
                <li class="dropdown">


                  <a href="#" class="dropdown-toggle" id="dropdownMenuButton" data-toggle="dropdown">Category</a>
                  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                  <x-category-component></x-category-component>
                </div>

                </li>
                <li><a href="{{route('category')}}">Shop</a></li>
                <li><a href="contact.html">contact</a></li>
                 @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('login')}}">Login</a>
                            </li>
                            
                                <li class="nav-item">
                                   <a class="nav-link" href="{{route('register')}}">Register</a>
                                </li>
                          
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                  <a href="{{route('history')}}" class="dropdown-item">Order History</a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                                 
                            </li>
                        @endguest
              </ul>
              <ul class="navbar_user">
                <li><a href="#"><i class="fa fa-search" aria-hidden="true"></i></a></li>
                <li class="checkout">
                  <a href="{{route('cart')}}" id="cart">
                    <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                    <span id="checkout_items " class="checkout_items cartNoti badge"></span>
                  </a>
                </li>
                <li class="checkout">
                  <span class="cartAmount">11000kS</span>
                </li>
              </ul>
              <div class="hamburger_container">
                <i class="fa fa-bars" aria-hidden="true"></i>
              </div>
            </nav>
          </div>
        </div>
      </div>
    </div>

  </header>

  @yield('content')

  <!-- Benefit -->

  <div class="benefit">
    <div class="container">
      <div class="row benefit_row">
        <div class="col-lg-3 benefit_col">
          <div class="benefit_item d-flex flex-row align-items-center">
            <div class="benefit_icon"><i class="fa fa-truck" aria-hidden="true"></i></div>
            <div class="benefit_content">
              <h6>free shipping</h6>
              <p>Suffered Alteration in Some Form</p>
            </div>
          </div>
        </div>
        <div class="col-lg-3 benefit_col">
          <div class="benefit_item d-flex flex-row align-items-center">
            <div class="benefit_icon"><i class="fa fa-money" aria-hidden="true"></i></div>
            <div class="benefit_content">
              <h6>cach on delivery</h6>
              <p>The Internet Tend To Repeat</p>
            </div>
          </div>
        </div>
        <div class="col-lg-3 benefit_col">
          <div class="benefit_item d-flex flex-row align-items-center">
            <div class="benefit_icon"><i class="fa fa-undo" aria-hidden="true"></i></div>
            <div class="benefit_content">
              <h6>45 days return</h6>
              <p>Making it Look Like Readable</p>
            </div>
          </div>
        </div>
        <div class="col-lg-3 benefit_col">
          <div class="benefit_item d-flex flex-row align-items-center">
            <div class="benefit_icon"><i class="fa fa-clock-o" aria-hidden="true"></i></div>
            <div class="benefit_content">
              <h6>opening all week</h6>
              <p>8AM - 09PM</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  
  

  <!-- Newsletter -->

  <div class="newsletter">
    <div class="container">
      <div class="row">
        <div class="col-lg-6">
          <div class="newsletter_text d-flex flex-column justify-content-center align-items-lg-start align-items-md-center text-center">
            <h4>Newsletter</h4>
            <p>Subscribe to our newsletter and get 20% off your first purchase</p>
          </div>
        </div>
        <div class="col-lg-6">
          <form action="post">
            <div class="newsletter_form d-flex flex-md-row flex-column flex-xs-column align-items-center justify-content-lg-end justify-content-center">
              <input id="newsletter_email" type="email" placeholder="Your email" required="required" data-error="Valid email is required.">
              <button id="newsletter_submit" type="submit" class="newsletter_submit_btn trans_300" value="Submit">subscribe</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>


  

  <!-- Footer -->

  <footer class="footer">
    <div class="container">
      <div class="row">
        <div class="col-lg-6">
          <div class="footer_nav_container d-flex flex-sm-row flex-column align-items-center justify-content-lg-start justify-content-center text-center">
            <ul class="footer_nav">
              <li><a href="#">Blog</a></li>
              <li><a href="#">FAQs</a></li>
              <li><a href="contact.html">Contact us</a></li>
            </ul>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="footer_social d-flex flex-row align-items-center justify-content-lg-end justify-content-center">
            <ul>
              <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
              <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
              <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
              <li><a href="#"><i class="fa fa-skype" aria-hidden="true"></i></a></li>
              <li><a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
            </ul>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-12">
          <div class="footer_nav_container">
            <div class="cr">©2018 All Rights Reserverd. Made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="#">Colorlib</a> &amp; distributed by <a href="https://themewagon.com">ThemeWagon</a></div>
          </div>
        </div>
      </div>
    </div>
  </footer>

  

</div>

<script src="{{ asset( 'frontend_assets/js/jquery-3.2.1.min.js')}}"></script>
<script src="{{ asset( 'frontend_assets/styles/bootstrap4/popper.js')}}"></script>
<script src="{{ asset( 'frontend_assets/styles/bootstrap4/bootstrap.min.js')}}"></script>
<script src="{{ asset( 'frontend_assets/plugins/Isotope/isotope.pkgd.min.js')}}"></script>
<script src="{{ asset( 'frontend_assets/plugins/OwlCarousel2-2.2.1/owl.carousel.js')}}"></script>
<script src="{{ asset( 'frontend_assets/plugins/easing/easing.js')}}"></script>
<script src="{{ asset( 'frontend_assets/js/custom.js')}}"></script>
<script type="text/javascript" src="{{ asset( 'frontend_assets/js/cart.js')}}"></script>

@yield('script')
</body>

</html>
