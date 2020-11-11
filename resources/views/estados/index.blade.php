@extends('adminlte::layouts.app')

@section('htmlheader_title','Listado de estados')  {{-- titulo pestaña  pagina --}}

@section('contentheader_title','Listado de estados')  {{-- nombre pagina --}}


@section('breadcrumb')
<li class="active">Estados</li>
@endsection




@section('content')
<div>
    <a href="{{ route('estado.create') }}" class="btn btn-success">  <i class="fa fa-plus"></i> Agregar</a>
</div>
<table class="table table-bordered">
    <tr class="bg-info">
        <th>ID</th>
        <th>NOMBRE</th>
        <th>PAIS</th>
        <th>ACCIONES</th>
    </tr>
@foreach ($estados as $estado)
    
    <tr>
        <td>{{ $estado->id }}</td>
        <td>{{ $estado->name }}</td>
        <td>{{ $estado->pais->name }}</td>
        <td>
            <div class="btn-group">
                
                {{-- BOTON EDITAR --}}
                <a href="{{ url('/estado/'.$estado->id .'/edit') }}" class="btn btn-warning">  <i class="fa fa-edit"></i>   </a>
              
                {{-- BOTON ELIMINAR --}}
                <a href="{{ route('estado.show',$estado->id ) }}" class="btn btn-danger">  <i class="fa fa-trash"></i>   </a>
                
                 {{-- FIN BOTON ELIMINAR --}}
               
              </div>

              

        </td>
    </tr>

    @endforeach

</table>

{{ $estados->links() }}

@endsection

