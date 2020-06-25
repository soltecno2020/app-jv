<div class="navbar-custom">
    <div class="container-fluid">
        <div id="navigation">
            <!-- Navigation Menu-->
            <ul class="navigation-menu text-center">
                <li class="has-submenu ">
                    <a href="{{ url('/') }}"><i class="mdi mdi-home"></i>Home</a>
                </li>
                
                <li class="has-submenu">
                    <a href="#"><i class="mdi mdi-account-box"></i>Usuario</a>
                </li>    

                <li class="has-submenu">
                    <a href="{{ route('viviendas.index') }}"><i class="mdi mdi-home-variant"></i>Vivienda</a>
                </li>

                <li class="has-submenu">
                    <a href="#"><i class="mdi mdi-newspaper"></i>Noticia</a>
                    <ul class="submenu">
                        <li class="">
                            <a href="{{ route('noticias.index') }}">Lista de noticias</a>
                        </li>
                        <li class="">
                            <a href="#">Ver noticias</a>
                        </li>
                    </ul>
                    
                </li>        


                <li class="has-submenu ">
                    <a href="#"><i class="mdi mdi-calendar-clock"></i>Calendario</a>
                </li>

                <li class="has-submenu ">
                    <a href="#"><i class="mdi mdi-pencil-box"></i>Contacto</a>
                </li>
                    
                <li class="has-submenu ">
                    <a href="#"><i class="mdi mdi-cash"></i>Cuotas</a>
                </li>

                <li class="has-submenu">
                    <a href="#"><i class="mdi mdi-cards"></i>Administración</a>
                    <ul class="submenu">
                        <li class="">
                            <a href="{{ route('tipoEventos.index') }}">Tipo Eventos</a>
                        </li>
                        <li class="">
                            <a href="{{ route('tipoConsultas.index') }}">Tipo Consultas</a>
                        </li>
                    </ul>
                </li>
            </ul><!-- End navigation menu -->
        </div> <!-- end #navigation -->
    </div> <!-- end container -->
</div>