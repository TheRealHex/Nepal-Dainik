@include('frontend.partials.top-header')
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
                                </ul>
                            </div>
                        </div>
                    </ul>
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
                        <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Category <span class="caret"></span></a>
                            <ul class="dropdown-menu" role="menu">
                                @foreach($category as $row)
                                <li><a href="#">{{ $row->name }}</a></li>
                                @endforeach
                            </ul>
                        </li>
                        <li><a href="{{route('newshome.contact')}}">Contact</a></li>
                    </ul>
                </div>
                <hr>
            </nav>
        </section>
    </header>
