@extends('adminlte::layouts.app')

@section('htmlheader_title','Listado de Ciudades')  {{-- titulo pestaña  pagina --}}

@section('contentheader_title','Listado de Ciudades')  {{-- nombre pagina --}}


@section('breadcrumb')
<li class="active">Ciudades</li>
@endsection




@section('content')
<div>
    <a href="{{ route('ciudad.create') }}" class="btn btn-success">  <i class="fa fa-plus"></i> Agregar</a>
</div>
<table id="example" class="display responsive nowrap">
    <thead>
    <tr class="bg-info">
        <th>ID</th>
        <th>NOMBRE</th>
        <th>PAIS</th>
        <th>ESTADO</th>
        <th>ACCIONES</th>
    </tr>
</thead>
<tbody>
@foreach ($ciudades as $ciudad)
    
    <tr>
        <td>{{ $ciudad->id }}</td>
        <td>{{ $ciudad->name }}</td>
        <td>{{ $ciudad->estado->pais->name }}</td>
        <td>{{ $ciudad->estado->name }}</td>
        <td>
            <div class="btn-group">
                
                {{-- BOTON EDITAR --}}
                <a href="{{ url('/ciudad/'.$ciudad->id .'/edit') }}" class="btn btn-warning">  <i class="fa fa-edit"></i>   </a>
            
                {{-- BOTON ELIMINAR --}}
                <a href="{{ route('ciudad.show',$ciudad->id ) }}" class="btn btn-danger">  <i class="fa fa-trash"></i>   </a>
                
                {{-- FIN BOTON ELIMINAR --}}
            
            </div>

            

        </td>
    </tr>

    @endforeach
    </tbody>
</table>



@section('scriptss')
    
@endsection
@endsection

