	<!DOCTYPE html>
		<html lang="en">
		<head>
			<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
			<!-- Meta, title, CSS, favicons, etc. -->
			<meta charset="utf-8">
			<meta http-equiv="X-UA-Compatible" content="IE=edg  e">
			<meta name="viewport" content="width=device-width, initial-scale=1">
			<link rel="icon" href="images/favicon.ico" type="image/ico" />

			<title>Gestor de Citas! | </title>
			<!-- Bootstrap -->
			<link href="{{asset('assets/dashboard/vendors/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet">
			<!-- Font Awesome -->
			<link href="{{asset('assets/dashboard/vendors/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
			<!-- NProgress -->
			<link href="{{asset('assets/dashboard/vendors/nprogress/nprogress')}}" rel="stylesheet">			
			<!-- Custom Theme Style -->
			<link href="{{asset('assets/dashboard/build/css/custom.min.css')}}" rel="stylesheet">
		</head>

		<body class="nav-md">
			<div class="container body">
			<div class="main_container">
				<div class="col-md-3 left_col">
				<div class="left_col scroll-view">
					<!-- menu profile quick info -->
					<div class="profile clearfix">
					<div class="profile_pic">
						<img src="{{asset('assets/dashboard/images/img.jpg')}}" alt="..." class="img-circle profile_img">
					</div>
					<div class="profile_info">
						<span>Bienvenido,</span>
						<a class="navbar-brand" href="{{ url('/') }}">
						
                        </a>						
					</div>
					</div>
					<!-- /menu profile quick info -->

					<br />

					<!-- sidebar menu -->
					<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
					<div class="menu_section">
						<h3>General</h3>
						<ul class="nav side-menu">
						<li><a><i class="fa fa-home"></i> Principal <span class="fa fa-chevron-down"></span></a>
							<ul class="nav child_menu">
							<li><a href="index.html">Opcion 1</a></li>
							<li><a href="index2.html">Opcion 2</a></li>						  
							</ul>
						</li>
						<li><a><i class="fa fa-edit"></i>Profesionales <span class="fa fa-chevron-down"></span></a>
							<ul class="nav child_menu">
							<li><a href="#">Opciones</a></li>
							
							</ul>
						</li>
						<li><a><i class="fa fa-desktop"></i> Usarios <span class="fa fa-chevron-down"></span></a>
							<ul class="nav child_menu">
							<li><a href="general_elements.html">Opcion 1</a></li>
							<li><a href="media_gallery.html">Opcion 2</a></li>
							
							</ul>
						</li>
						<li><a><i class="fa fa-table"></i> Reportes <span class="fa fa-chevron-down"></span></a>
							<ul class="nav child_menu">
							<li><a href="#">Reporte 1</a></li>
							<li><a href="#">Reporte 2</a></li>
							</ul>
						</li>
						<li><a><i class="fa fa-bar-chart-o"></i> Calendario <span class="fa fa-chevron-down"></span></a>
							<ul class="nav child_menu">
							<li><a href="chartjs.html">Opciones</a></li>
							
							</ul>
						</li>					 
						</ul>
					</div>

					</div>
					<!-- /sidebar menu -->

					<!-- /menu footer buttons -->
					<div class="sidebar-footer hidden-small">
					<a data-toggle="tooltip" data-placement="top" title="Settings">
						<span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
					</a>
					<a data-toggle="tooltip" data-placement="top" title="FullScreen">
						<span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
					</a>
					<a data-toggle="tooltip" data-placement="top" title="Lock">
						<span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
					</a>					
                   
					<a data-toggle="tooltip" data-placement="top" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
													 document.getElementById('logout-form').submit();">
													 <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                                       
                    </a>

					</div>
					<!-- /menu footer buttons -->
				</div>
				</div>

				<!-- top navigation -->
				<div class="top_nav">
				<div class="nav_menu">
					<div class="nav toggle">
						<a id="menu_toggle"><i class="fa fa-bars"></i></a>
					</div>
					<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">               
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
						@yield('logueado')
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            {{ Auth::user()->names.' '.Auth::user()->lastnames }}
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                            </form>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
				</div>
				</div>
		

				<!-- page content -->
				<div class="right_col" role="main">
				<!-- top tiles -->
				<div class="row" style="display: inline-block;" >
				@yield('content')
				</div>
				</div>
				
				<footer>
				<div class="pull-right">
					Ingenieria del Software II  <a href="https://autonoma.edu.co">UAM</a>
				</div>
				<div class="clearfix"></div>
				</footer>
				<!-- /footer content -->
			</div>
			</div>

			<!-- jQuery -->
			<script src="{{asset('assets/dashboard/vendors/jquery/dist/jquery.min.js')}}"></script>
			<!-- Bootstrap -->
			<script src="{{asset('assets/dashboard/vendors/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
			
			
			<!-- Custom Theme Scripts -->
			<script src="{{asset('assets/dashboard/build/js/custom.min.js')}}"></script>
			
		</body>
		</html>
