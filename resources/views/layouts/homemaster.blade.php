<!DOCTYPE html>
<html>
<head>
  <link rel="shortcut icon" href="images/logo.jpg">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title')</title>
  {{-- Css --}}
  <link href="{{ url('css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
  <link href="{{ url('css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
  <link href="{{ url('css/slick.css') }}" rel="stylesheet" type="text/css">
  {{-- <link href="{{ url('css/jquery.fancybox.css') }}" rel="stylesheet" type="text/css"> --}}
  <link href="{{ url('css/theme.css') }}" rel="stylesheet" type="text/css">
  <link href="{{ url('css/style.css') }}" rel="stylesheet" type="text/css">
</head>
<body style="background-color: #eee;">
  <a class="scrollToTop" href="#"><i class="fa fa-angle-up"></i></a>
  <div class="container">
    <header id="header">
      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
          <div class="header_top" style="padding-top: 20px;">
            <div class="header_top_left">
              <script> document.write(new Date().toDateString());</script>
            </div>
            <ul class="top_nav">
              <div class="header_top_right">
                <div class = "btn-group">
                 <button type = "button" class = "btn dropdown-toggle" data-toggle = "dropdown" style="background: #353535;color: white;">
                  User
                </button>
                <ul class = "dropdown-menu" role = "menu">
                  <li><a href = "/login">Login</a></li>
                  <li><a href = "/register">Register</a></li>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="header_bottom">
              <div class="logo_area"><a href="/" class="logo"><img src="{{asset('img/logo.gif')}}" alt=""></a></div>
            </div>
          </div>
        </div>
        <section id="navArea">
          <nav class="" role="navigation">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
              <ul class="nav navbar-nav main_nav">
                <li class="active"><a href="/">Home</a></li>
                {{-- <li><a href="#">Technologya</a></li> --}}
                <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Category <span class="caret"></span></a>
                  <ul class="dropdown-menu" role="menu">
                    @foreach($category as $row)
                    <li><a href="#">{{ $row->name }}</a></li>
                    @endforeach
                  </ul>
                </li>
                <li><a href="#">Laptops</a></li>
              </ul>
            </div>
            <hr><br>
          </nav>
        </section>
      </header>
      @yield('content');
      {{-- Js --}}
      <script src="js/jquery.min.js"></script>
      <script src="js/wow.min.js"></script>
      <script src="js/bootstrap.min.js"></script>
      <script src="js/slick.min.js"></script>
      <script src="js/jquery.li-scroller.1.0.js"></script>
      <script src="js/jquery.newsTicker.min.js"></script>
      <script src="js/jquery.fancybox.pack.js"></script>
      <script src="js/custom.js"></script>
      @yield('scripts');
    </body>
    </html>