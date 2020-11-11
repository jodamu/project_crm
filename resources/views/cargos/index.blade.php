@extends('adminlte::layouts.app')

@section('htmlheader_title','Listado de Cargos')  {{-- titulo pestaña  pagina --}}

@section('contentheader_title','Listado de Cargos')  {{-- nombre pagina --}}


@section('breadcrumb')
<li class="active">Cargos</li>
@endsection




@section('content')
<div>
    <a href="{{ route('cargos.create') }}" class="btn btn-success">  <i class="fa fa-plus"></i> Agregar</a>
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
@foreach ($cargos as $cargo)
    
    <tr>
        <td>{{ $cargo->id }}</td>
        <td>{{ $cargo->name }}</td>
        <td>
            <div class="btn-group">
                
                {{-- BOTON EDITAR --}}
                <a href="{{ url('/cargos/'.$cargo->id .'/edit') }}" class="btn btn-warning">  <i class="fa fa-edit"></i>   </a>
            
                {{-- BOTON ELIMINAR --}}
                <form style="float: right;" method="POST" action="{{ route('cargos.destroy',$cargo->id) }}">
                @csrf
                @method('DELETE')
                
                <button  type="submit" class="btn btn-danger "> <i class="fa fa-trash"></i> </button>
                </form>
                {{-- FIN BOTON ELIMINAR --}}
            

                {{-- BOTON show --}}
                <a href="{{ route('cargos.show',$cargo->id) }}" class="btn btn-info">  <i class="fa fa-edit"></i>   </a>
            
            </div>

            

        </td>
    </tr>

    @endforeach
</tbody>
</table>

{{ $cargos->links() }}

@endsection

