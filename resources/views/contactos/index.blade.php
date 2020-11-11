@extends('adminlte::layouts.app')

@section('htmlheader_title','Listado de Contactos')  {{-- titulo pestaña  pagina --}}

@section('contentheader_title','Listado de Contactos')  {{-- nombre pagina --}}


@section('breadcrumb')
<li class="active">Cargos</li>
@endsection


@section('content')
<div>
    <a href="" class="btn btn-success">  <i class="fa fa-plus"></i> Agregar</a>
</div>
<table class="table table-bordered">
    <thead>
    <tr class="bg-info">

        <th>NOMBRE</th>
        <th>PAIS</th>
        <th>ESTADO</th>
        <th>CIUDAD</th>
        <th>TELEFONO</th>
        <th>EMAIL</th>
        <th>TIPO CLIENTE</th>
        <th>ACCIONES</th>
    </tr>
</thead>
<tbody>

@foreach ($contactos as $contacto)



    <tr>

        <td>{{ $contacto->nombre_completo($contacto) }}</td>
        <td>{{ $contacto->ciudad->estado->pais->name }}</td>
        <td>{{ $contacto->ciudad->estado->name }}</td>
        <td>{{ $contacto->ciudad->name }}</td>
        <td>{{ $contacto->telefono }}</td>
        <td>{{ $contacto->email }}</td>
        <td>{{ $contacto->tipo->name }}</td>
        <td>
            <div style="display: flex;justify-content: space-around;" class="btn-group">
                {{-- BOTON Vista --}}
                <a href="{{ route('contacto.show', $contacto->id) }}" class="btn btn-info">  <i class="fa fa-eye"></i>   </a>

                {{-- BOTON EDITAR --}}
                <a href="{{ route('contacto.edit', $contacto->id) }}" class="btn btn-warning">  <i class="fa fa-edit"></i>   </a>

                {{-- BOTON ELIMINAR --}}
                <form  method="POST" action="">
                @csrf
                @method('DELETE')

                <button  type="submit" class="btn btn-danger "> <i class="fa fa-trash"></i> </button>
                </form>
                 {{-- FIN BOTON ELIMINAR --}}

              </div>



        </td>
    </tr>
    @endforeach
</tbody>
</table>

{{-- {{ $cargos->links() }} --}}

@endsection

