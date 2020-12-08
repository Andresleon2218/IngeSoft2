<!-- top navigation -->
<div class="top_nav">
    <div class="nav_menu">
        <div class="nav toggle">
            <a id="menu_toggle"><i class="fa fa-bars"></i></a>
        </div>
        <nav class="navbar navbar-expand-md">
            <div class="container">
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <h2>@yield('title')</h2>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button"
                        onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                                Cerrar sesión
                            <i class="fa fa-sign-out-alt"></i>
                        </a>
                        <form id="logout-form" action="{{route('logout')}}" method="post" class="d-none">
                            @csrf
                        </form>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</div>
