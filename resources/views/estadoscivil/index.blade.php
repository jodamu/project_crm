@extends('adminlte::layouts.app')

@section('htmlheader_title','Listado de estado civil')  {{-- titulo pestaña  pagina --}}

@section('contentheader_title','Listado de estado civil')  {{-- nombre pagina --}}



@section('breadcrumb')
<li class="active">Estado Civil</li>
@endsection
@section('content')
<div>
    <a href="{{ route('estadoscivil.create') }}" class="btn btn-success">  <i class="fa fa-plus"></i> Agregar</a>
</div>
<table class="table table-bordered">
    <tr class="bg-info">
        <th>ID</th>
        <th>NOMBRE</th>
        <th>ACCIONES</th>
    </tr>
@foreach ($estadoscivils as $estadosciviles)
    
    <tr>
        <td>{{ $estadosciviles->id }}</td>
        <td>{{ $estadosciviles->name }}</td>
        <td>
            <div class="btn-group">
                
                {{-- BOTON EDITAR --}}
                <a href="{{ url('/estadoscivil/'.$estadosciviles->id .'/edit') }}" class="btn btn-warning">  <i class="fa fa-edit"></i>   </a>
              
                {{-- BOTON ELIMINAR --}}
                <a href="{{ route('estadoscivil.show',$estadosciviles->id ) }}" class="btn btn-danger">  <i class="fa fa-trash"></i>   </a>
                
                 {{-- FIN BOTON ELIMINAR --}}
               
              </div>

              

        </td>
    </tr>

    @endforeach

</table>

{{ $estadoscivils->links() }}

@endsection
