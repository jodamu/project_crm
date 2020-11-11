@extends('adminlte::layouts.app')

@section('htmlheader_title','Tipos')  {{-- titulo pestaña  pagina --}}

@section('contentheader_title','Listado de Tipos')  {{-- nombre pagina --}}


@section('breadcrumb')
<li class="active">Tipos</li>
@endsection

@section('content')

<div>
    <a href="{{ route('tipo.create') }}" class="btn btn-success">  <i class="fa fa-plus"></i> Agregar</a>
</div>
<table class="table table-bordered">
    <tr class="bg-info">
        <th>ID</th>
        <th>NOMBRE</th>
        <th>ACCIONES</th>
    </tr>
    
@foreach ($tipos as $tipo)
    
    <tr>
        <td>{{ $tipo->id }}</td>
        <td>{{ $tipo->name }}</td>
        <td>
            <div class="btn-group">
                
                {{-- BOTON EDITAR --}}
                <a href="{{ url('/tipo/'.$tipo->id .'/edit') }}" class="btn btn-warning">  <i class="fa fa-edit"></i>   </a>
              
                {{-- BOTON ELIMINAR --}}
                <a href="{{ route('tipo.show',$tipo->id ) }}" class="btn btn-danger">  <i class="fa fa-trash"></i>   </a>
                
                 {{-- FIN BOTON ELIMINAR --}}
               
              </div>

              

        </td>
    </tr>

    @endforeach

</table>

{{ $tipos->links() }}


@endsection