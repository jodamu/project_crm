<!DOCTYPE html>

<?php 
//  $porcion = explode(".", Route::current()->getName());
//  echo $porcion[0];
setlocale(LC_MONETARY, 'es_ES');
 ?>
 
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

@section('htmlheader')
    @include('adminlte::layouts.partials.htmlheader')
@show

<style>
    .main-header .navbar {
    -webkit-transition: margin-left .3s ease-in-out;
    -o-transition: margin-left .3s ease-in-out;
    transition: margin-left .3s ease-in-out;
    margin-bottom: 0;
    margin-left: 0px;
    border: none;
    min-height: 50px;
    border-radius: 0;
}
.select2-container--default .select2-selection--single {
    
    height: 35px;
    width: 182px;
}
.select2-container--default .select2-dropdown.select2-dropdown--below {
        width: 180px;
}
.dataTables_wrapper {
    margin-top: 25px;
}
</style>
@yield('css')

<!--
BODY TAG OPTIONS:
=================
Apply one or more of the following classes to get the
desired effect
|---------------------------------------------------------|
| SKINS         | skin-blue                               |
|               | skin-black                              |
|               | skin-purple                             |
|               | skin-yellow                             |
|               | skin-red                                |
|               | skin-green                              |
|---------------------------------------------------------|
|LAYOUT OPTIONS | fixed                                   |
|               | layout-boxed                            |
|               | layout-top-nav                          |
|               | sidebar-collapse                        |
|               | sidebar-mini                            |
|---------------------------------------------------------|
-->
<body class="skin-blue sidebar-mini">
<div id="app" v-cloak>
    <div class="wrapper">

    @include('adminlte::layouts.partials.mainheader')

    @include('adminlte::layouts.partials.sidebar')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

        @include('adminlte::layouts.partials.contentheader')

        <!-- Main content -->
        <section class="content">
                {{-- mensajes --}}

                @if(session('status'))
                <div class="alert alert-success alert-dismissible" id="mensaje" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    {{ session('status') }}
                </div>
                @endif

                

            <!-- Your Page Content Here -->
            
            @yield('content')
            
        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->

    @include('adminlte::layouts.partials.controlsidebar')

    @include('adminlte::layouts.partials.footer')

</div><!-- ./wrapper -->
</div>
@section('scripts')
    @include('adminlte::layouts.partials.scripts')
@show
 @yield('sc')
<script>
    $(document).ready(function(){    
        $("#mensaje").fadeOut(6000);
    });
</script>

</body>
</html>
