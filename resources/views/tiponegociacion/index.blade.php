@extends('adminlte::layouts.app')

@section('htmlheader_title','Tipos de negociación')  {{-- titulo pestaña  pagina --}}

@section('contentheader_title','Listado de Tipos de negociación')  {{-- nombre pagina --}}


@section('breadcrumb')
<li class="active">Tipos de negociación</li>
@endsection

@section('content')

<div>
    <a href="{{ route('tiponegociacion.create') }}" class="btn btn-success">  <i class="fa fa-plus"></i> Agregar</a>
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
@foreach ($tiponegociacions as $tiponegociacion)
    
    <tr>
        <td>{{ $tiponegociacion->id }}</td>
        <td>{{ $tiponegociacion->name }}</td>
        <td>
            <div class="btn-group">
                
                {{-- BOTON EDITAR --}}
                <a href="{{ url('/tiponegociacion/'.$tiponegociacion->id .'/edit') }}" class="btn btn-warning">  <i class="fa fa-edit"></i>   </a>
              
                {{-- BOTON ELIMINAR --}}
                <a href="{{ route('tiponegociacion.show',$tiponegociacion->id ) }}" class="btn btn-danger">  <i class="fa fa-trash"></i>   </a>
                
                 {{-- FIN BOTON ELIMINAR --}}
               
              </div>

              

        </td>
    </tr>

    @endforeach
</tbody>
</table>

{{ $tiponegociacions->links() }}


@endsection