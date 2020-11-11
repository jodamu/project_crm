@extends('adminlte::layouts.app')

@section('htmlheader_title','Listado de paises')  {{-- titulo pestaña  pagina --}}

@section('contentheader_title','Listado de paises')  {{-- nombre pagina --}}


@section('breadcrumb')
<li class="active">Pais</li>
@endsection

@section('content')
<div style="display: flex; justify-content: space-between;">
    <a href="{{ route('pais.create') }}" class="btn btn-success">  <i class="fa fa-plus"></i> Agregar</a>

</div>
<table class="table table-bordered">
    <thead>
    <tr class="bg-info">
        <th>ID</th>
        <th>NOMBRE</th>
        <th>ACCIONES  {{ $q ?? ''}}</th>
    </tr>
</thead>
<tbody>
@foreach ($paises as $pais)
    
    <tr>
        <td>{{ $pais->id }}</td>
        <td>{{ $pais->name }}</td>
        <td>
            <div class="btn-group">
                
                {{-- BOTON EDITAR --}}
                <a href="{{ url('/pais/'.$pais->id .'/edit') }}" class="btn btn-warning">  <i class="fa fa-edit"></i>   </a>
            
                {{-- BOTON ELIMINAR --}}
                <a href="{{ route('pais.show',$pais->id ) }}" class="btn btn-danger">  <i class="fa fa-trash"></i>   </a>
                
                {{-- FIN BOTON ELIMINAR --}}
            
            </div>

            

        </td>
    </tr>

    @endforeach
    </tbody>
</table>



@endsection

