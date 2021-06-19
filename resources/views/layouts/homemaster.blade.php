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

    @yield('scripts')
</body>
</html>