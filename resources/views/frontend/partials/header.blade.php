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
                        <div class="header_top_right" id="top">
                            <form action="{{route('search')}}" method="get">
                                {{ csrf_field() }}
                                {{ method_field('PUT') }}
                                <input style="background-color: #eee; font-size: 15px; border-color: transparent; border-radius: 2em; padding-left: 1em;" type="text" name="search" id="search" placeholder="Search">
                                <button class = "btn" style=" border-radius: 6px;">
                                    <i class="fa fa-search"></i>
                                </button>
                                <div class = "btn-group">
                                    <button type = "button" class = "btn dropdown-toggle" data-toggle = "dropdown" style=" border-radius: 6px;">
                                        <i class="fa fa-user"></i>
                                    </button>
                                    <ul class = "dropdown-menu " role = "menu">
                                        <!-- Authentication Links -->
                                        @guest
                                        <li class="">
                                            <a class="" href="{{ route('login') }}">{{ __('Login') }}</a>
                                        </li>
                                        @if (Route::has('register'))
                                        <li class="">
                                            <a class="" href="{{ route('register') }}">{{ __('Register') }}</a>
                                        </li>
                                        @endif
                                        @else
                                        {{ Auth::user()->name }} 
                                        <li>
                                            <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    </li>
                                    @endguest
                                </ul>
                            </div>
                        </form>
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
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar" style="height: 2.7em;"> <span class="sr-only">Toggle navigation</span> <span><i class="fa fa-arrow-down"></i></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <br>
                    <ul class="nav navbar-nav main_nav">
                        <li class="active"><a href="/">Home</a></li>
                        {{-- <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Category <span class="caret"></span></a> --}}
                            {{-- <ul class="dropdown-menu" role="menu"> --}}
                                @foreach($category as $row)
                                <li><a href="{{route('newshome.category',$row->name )}}">{{ $row->name }}</a></li>
                                @endforeach
                                <li><a href="https://covid19.mohp.gov.np/" target="_blank">Covid 19</a></li>
                            </ul>
                        </div>
                        <hr>
                    </nav>
                </section>
            </header>
