<div class="navbar-custom">
    <div class="container-fluid">
        <div id="navigation">
            <!-- Navigation Menu-->
            <ul class="navigation-menu text-center">
                <li class="has-submenu ">
                    <a href="{{ route('home') }}"><i class="mdi mdi-home"></i>Home</a>
                </li>
                <!--<li class="has-submenu">
                    <a href="{{ route('viviendas.index') }}"><i class="mdi mdi-home-variant"></i>Vivienda</a>
                </li>
                -->

                <li class="has-submenu">
                    <a href="{{ route('noticias.mostrar') }}"><i class="mdi mdi-newspaper"></i>Noticia</a>
                </li>        

                <li class="has-submenu ">
                    <a href="{{ route('calendario.index')}}"><i class="mdi mdi-calendar-clock"></i>Calendario</a>
                </li>

                <li class="has-submenu ">
                    <a href="{{ route('formularioscontactos.create')}}"><i class="mdi mdi-pencil-box"></i>Contacto</a>
                </li>
                    
                <li class="has-submenu ">
                    <a href="#"><i class="mdi mdi-cash"></i>Cuotas</a>
                </li>
                <li class="has-submenu">
                    <a href="{{ route('administrador') }}"><i class="mdi mdi-cards"></i>Administración</a>
                </li>
            </ul><!-- End navigation menu -->
        </div> <!-- end #navigation -->
    </div> <!-- end container -->
</div>