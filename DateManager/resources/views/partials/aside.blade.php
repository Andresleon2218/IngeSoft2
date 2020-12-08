<div class="col-md-3 left_col">
    <div class="left_col scroll-view">
        <!-- menu profile quick info -->
        <div class="profile clearfix">
            <div class="profile_pic">
                <img src="{{asset('assets/dashboard/images/img.jpg')}}" alt="..." class="img-circle profile_img">
            </div>
            <div class="profile_info">
                <a href="{{ route('profile') }}">
                    <span>{{ Auth::user()->names }} {{ Auth::user()->lastnames }}</span>
                </a>
            </div>
        </div>
        <!-- /menu profile quick info -->

        <br />

        <!-- sidebar menu -->
        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">
                <h3>Gestor de citas</h3>
                <ul class="nav side-menu">
                    <li><a><i class="fa fa-user"></i>Perfil <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="{{route('profile')}}">Mis datos</a></li>
                            <li><a href="{{route('profile.edit')}}">Actualizar datos</a></li>
                            <li>
                                <a data-target="#delete-modal" data-action="{{route('profile.delete')}}" data-name="{{Auth::user()->names}} {{Auth::user()->lastnames}}" data-toggle="modal">
                                    Eliminar mi cuenta
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li><a><i class="fa fa-dashboard"></i>Administración <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="{{route('professional.index')}}">Profesionales</a></li>
                            <li><a href="{{route('specialty.index')}}">Especialidades</a></li>
                            <li><a href="{{route('client.index')}}">Usuarios</a></li>
                        </ul>
                    </li>
                    <li><a><i class="fa fa-graduation-cap"></i>Profesional <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="{{route('indexPro')}}">Mis horarios</a></li>
                            <li><a href="{{route('indexPro')}}">Mis citas</a></li>
                        </ul>
                    </li>
                    <li><a><i class="fa fa-desktop"></i>Usuario <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="general_elements.html">Mis citas</a></li>
                            <li><a href="{{route('professional.index')}}">Profesionales</a></li>
                            <li><a href="{{route('specialty.index')}}">Especialidades</a></li>
                        </ul>
                    </li>
                </ul>
            </div>

        </div>
        <!-- /sidebar menu -->
    </div>
</div>
