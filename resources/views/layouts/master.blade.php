<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    @yield('title')
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <!-- CSS Files -->
  <link href="{{ asset('assets/css/bootstrap.min') }}.css" rel="stylesheet" />
  <link href="{{ asset('assets/css/now-ui-dashboard.css?v=1.5.0') }}" rel="stylesheet" />
</head>

<body class="">
  <div class="wrapper">
    <div class="sidebar" data-color="blue" style="font-size: 18px;">
      <div class="logo simple-text logo-normal">
        <a class="simple-text logo-normal text-align-center font-weight-bold">
          {{Auth::user()->role->type}}
          Panel
        </a>
      </div>

      <div class="sidebar-wrapper" id="sidebar-wrapper">
        <ul class="nav">
          <li class="{{'home' == request()->path()? 'active' : ''}}">
            <a href="{{route('home')}}">
              <i class="now-ui-icons design_app"></i>
              <p>Dashboard</p>
            </a>
          </li >
          @if (Auth::user()->role->type == 'writer')
          <li class="{{'create-post' == request()->path()? 'active' : ''}}">
            <a href="/create-post">
              <i class="now-ui-icons education_atom"></i>
              <p>Create Post</p>
            </a>
          </li>
          <li class="{{'post-mgmt' == request()->path()? 'active' : ''}}">
            <a href="/post-mgmt">
              <i class="now-ui-icons location_map-big"></i>
              <p>Your Posts</p>
            </a>
          </li>
          @endif
          @if (Auth::user()->role->type == 'admin')
          <li class="{{'users' == request()->path()? 'active' : ''}}">
            <a href="{{ route('getUsers') }}">
              <i class="now-ui-icons users_single-02"></i>
              <p>User Management</p>
            </a>
          </li>
          <li class="{{'categories' == request()->path()? 'active' : ''}}">
            <a href="./categories">
              <i class="now-ui-icons media-2_sound-wave"></i>
              <p>Categories</p>
            </a>
          </li>
          <div class="dropdown btn btn-info btn-sm font-weight-bold" style=" width: 80%;">
            <a class=" " data-toggle="dropdown" id="navbarDropdownMenuLink1">
              <i class="now-ui-icons education_paper"></i>
              <p>Manage Sponsors</p>
            </a>
            <ul class="dropdown-menu m-4" style="  width: 100%; text-align: center; background-color: #333; border-radius: 2em;" aria-labelledby="navbarDropdownMenuLink1">
              <li class="{{'pending-posts' == request()->path()? 'active' : ''}}">
                <a href="{{ route('pending.sponsor') }}">
                  <i class="now-ui-icons sport_user-run"></i>
                  <p>Pending Ads</p>
                </a>
              </li>
              <li class="{{'manage-posts' == request()->path()? 'active' : ''}}">
                <a href="{{ route('approved.sponsor') }}">
                  <i class="now-ui-icons files_single-copy-04"></i>
                  <p>Approved Ads</p>
                </a>
              </li>
              <li class="{{'declined-posts' == request()->path()? 'active' : ''}}">
                <a href="{{ route('declined.sponsor') }}">
                  <i class="now-ui-icons design_scissors"></i>
                  <p>Declined Ads</p>
                </a>
              </li>
            </ul>
          </div>
          @endif
          @if (Auth::user()->role->type == 'admin' || Auth::user()->role->type == 'editor')
          <div class="dropdown btn btn-info btn-sm font-weight-bold" style=" width: 80%;">
            <a class=" " data-toggle="dropdown" id="navbarDropdownMenuLink1">
              <i class="now-ui-icons education_paper"></i>
              <p>Manage Posts</p>
            </a>
            <ul class="dropdown-menu m-4" style="  width: 100%; text-align: center; background-color: #333; border-radius: 2em;" aria-labelledby="navbarDropdownMenuLink1">
              <li class="{{'pending-posts' == request()->path()? 'active' : ''}}">
                <a href="{{ route('pendingPosts') }}">
                  <i class="now-ui-icons sport_user-run"></i>
                  <p>Pending Posts</p>
                </a>
              </li>
              <li class="{{'manage-posts' == request()->path()? 'active' : ''}}">
                <a href="{{ route('approvedPosts') }}">
                  <i class="now-ui-icons files_single-copy-04"></i>
                  <p>Approved Posts</p>
                </a>
              </li>
              <li class="{{'declined-posts' == request()->path()? 'active' : ''}}">
                <a href="{{ route('declinedPosts') }}">
                  <i class="now-ui-icons design_scissors"></i>
                  <p>Declined Posts</p>
                </a>
              </li>
            </ul>
          </div>
          @endif
          <li>
            <a href="{{route('user.profile')}}">
              <i class="fa fa-asterisk"></i>
              <p>Settings</p>
            </a>
          </li>
        </ul>
      </div>
    </div>
    <div class="main-panel" id="main-panel">

      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent  bg-primary  navbar-absolute">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <div class="navbar-toggle">
              <button type="button" class="navbar-toggler">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </button>
            </div>
            <a class="navbar-brand" href="#"></a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end" id="navigation">
            <ul class="navbar-nav">
              <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                  <img height="25px" width="25px" class="profile-user-img ml-5 shadow" style="border-radius: 50%; border:2px solid;" src="{{ asset('userImage/'.auth()->user()->image) }}"
                  alt="User profile picture">
                  {{ Auth::user()->name }} <span class="caret"></span>
                </a>

                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="{{ route('newshome.index') }}">Home</a>
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
              <!-- <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="now-ui-icons location_world"></i>
                  <p>
                    <span class="d-lg-none d-md-block">Some Actions</span>
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="#">Action</a>
                  <a class="dropdown-item" href="#">Another action</a>
                  <a class="dropdown-item" href="#">Something else here</a>
                </div>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#pablo">
                  <i class="now-ui-icons users_single-02"></i>
                  <p>
                    <span class="d-lg-none d-md-block">Account</span>
                  </p>
                </a>
              </li> -->
            </ul>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->

      <div class="panel-header panel-header-sm">
      </div>
      <div class="content">
        @yield('content')
      </div>

      <footer class="footer">
        <div class=" container-fluid ">
          <nav>
            <ul>
              <li>
              </li>
            </ul>
          </nav>
        </div>
      </footer>
    </div>
  </div>
  <!--   Core JS Files   -->
  <script src="{{ asset('assets/js/core/jquery.min.js') }}"></script>
  <script src="{{ asset('assets/js/core/popper.min.js') }}"></script>
  <script src="{{ asset('assets/js/core/bootstrap.min.js') }}"></script>
  <script src="{{ asset('assets/js/plugins/perfect-scrollbar.jquery.min.js') }}"></script>
  <!-- Chart JS -->
  <script src="{{ asset('assets/js/plugins/chartjs.min.js') }}"></script>
  <!--  Notifications Plugin    -->
  <script src="{{ asset('assets/js/plugins/bootstrap-notify.js') }}"></script>
  <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="{{ asset('assets/js/now-ui-dashboard.min.js?v=1.5.0') }}" type="text/javascript"></script><!-- Now Ui Dashboard DEMO methods, don't include it in your project! -->
  <script src="{{ asset('assets/demo/demo.js') }}"></script>
  @yield('scripts')
</body>

</html>
