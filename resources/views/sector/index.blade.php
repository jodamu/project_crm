@extends('adminlte::layouts.app')

@section('htmlheader_title','Listado de sectores')  {{-- titulo pestaña  pagina --}}

@section('contentheader_title','Listado de sectores')  {{-- nombre pagina --}}


@section('breadcrumb')
<li class="active">Sector</li>
@endsection




@section('content')
<div>
    <a href="{{ route('sector.create') }}" class="btn btn-success">  <i class="fa fa-plus"></i> Agregar</a>
</div>
<table class="table table-bordered">
    <thead>
            <tr class="bg-info">
        <th>ID</th>
        <th>NOMBRE</th>
        <th>ACCIONES</th>
    </tr>
</thead>
<tbody>
@foreach ($sectors as $sector)
    
    <tr>
        <td>{{ $sector->id }}</td>
        <td>{{ $sector->name }}</td>
        <td>
            <div class="btn-group">
                
                {{-- BOTON EDITAR --}}
                <a href="{{ url('/sector/'.$sector->id .'/edit') }}" class="btn btn-warning">  <i class="fa fa-edit"></i>   </a>
              
                {{-- BOTON ELIMINAR --}}
                <a href="{{ route('sector.show',$sector->id ) }}" class="btn btn-danger">  <i class="fa fa-trash"></i>   </a>
                
                 {{-- FIN BOTON ELIMINAR --}}
               
              </div>

              

        </td>
    </tr>

    @endforeach
</tbody>
</table>

{{ $sectors->links() }}

@endsection

