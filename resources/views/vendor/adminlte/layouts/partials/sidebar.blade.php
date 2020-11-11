<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        @if (! Auth::guest())
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="{{ Gravatar::get($user->email) }}" class="img-circle" alt="User Image" />
                </div>
                <div class="pull-left info">
                    <p style="overflow: hidden;text-overflow: ellipsis;max-width: 160px;" data-toggle="tooltip" title="{{ Auth::user()->name }}">{{ Auth::user()->name }}</p>
                    <!-- Status -->
                    <a href="#"><i class="fa fa-circle text-success"></i> {{ trans('adminlte_lang::message.online') }}</a>
                </div>
            </div>
        @endif

        <!-- search form (Optional) -->
        {{-- <form action="{{ route(request()->segment(1).".buscar") }}" method="post" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="{{ trans('adminlte_lang::message.search') }}..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
        </form> --}}
        <!-- /.search form -->

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">{{ trans('adminlte_lang::message.header') }}</li>
            <!-- Optionally, you can add icons to the links -->
            <li class=""><a href="{{ url('home') }}"><i class='fa fa-link'></i> <span>Dashboard </span></a></li>
            <li  @if (Request::url() == route('negociacion.index')) class="active" @endif ><a href="{{ url('/negociacion') }}"><i class="fas fa-business-time"></i> <span>Negociaciones</span></a></li>
            <li ><a href="{{ url('/contacto') }}"><i class="far fa-id-card"></i> <span>Contactos</span></a></li>
            <li @if (Request::url() == route('empresa.index')) class="active" @endif ><a href="{{ url('/empresa') }}"><i class='fa fa-link'></i> <span>Compañias</span></a></li>
            <li  ><a href="{{ url('/producto') }}"><i class="fab fa-product-hunt"></i> <span>Productos</span></a></li>
            <li @if (Request::url() == route('evento.index')) class="active" @endif ><a href="{{ url('/evento') }}"><i class="far fa-calendar-alt"></i> <span>Agenda</span></a></li>
            <li class="treeview active">
                <a href="#"><i class='fa fa-link'></i> <span>Configuraciones</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li class="treeview  active">
                        <a href="#"><i class='fa fa-link'></i> <span>Ubicacion</span> <i class="fa fa-angle-left pull-right"></i></a>
                        <ul class="treeview-menu">
                            <li @if (request()->segment(1) == 'pais')) class="active" @endif><a href="{{ url('/pais') }}">pais</a></li>
                            <li @if (request()->segment(1) == 'estado')) class="active" @endif><a href="{{ url('/estado') }}">Estado</a></li>
                            <li @if (request()->segment(1) == 'ciudad')) class="active" @endif><a href="{{ url('/ciudad') }}">Ciudad</a></li>
                        </ul>
                    </li>  

                    <li  @if (request()->segment(1) == 'cargos')) class="active" @endif ><a href="{{ url('/cargos') }}">Cargos</a></li>
                    <li  @if (request()->segment(1) == 'sector')) class="active" @endif ><a href="{{ url('/sector') }}">Sector</a></li>
                    <li  @if (request()->segment(1) == 'estadoscivil')) class="active" @endif ><a href="{{ url('/estadoscivil') }}">Estado Civil</a></li>
                    <li  @if (request()->segment(1) == 'tipo')) class="active" @endif ><a href="{{ url('/tipo') }}">Tipos de Clientes</a></li>
                    <li  @if (request()->segment(1) == 'tiponegociacion')) class="active" @endif ><a href="{{ url('/tiponegociacion') }}">Tipos de Negociación</a></li>
                </ul>
            </li>
        </ul><!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>
