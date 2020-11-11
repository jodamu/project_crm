@extends('adminlte::layouts.app')

@section('htmlheader_title','Listado de Empresas')  {{-- titulo pestaña  pagina --}}

@section('contentheader_title','Listado de Empresas')  {{-- nombre pagina --}}


@section('breadcrumb')
<li class="active">Cargos</li>
@endsection




@section('content')
<div>
    <a href="" class="btn btn-success">  <i class="fa fa-plus"></i> Agregar</a>
</div>
<table class="table table-bordered">
    <tr class="bg-info">
        <th>ID</th>
        <th>NOMBRE</th>
        <th>TELEFONO</th>
        <th>EMAIL</th>
        <th>TIPO CLIENTE</th>
        <th>ACCIONES</th>
    </tr>
@for ($i = 1; $i <= 50; $i++)
    

    
    <tr>
        <td>{{ $i }}</td>
        <td>Empresa {{ $i }}</td>
        <td>Telefono {{ $i }}</td>
        <td>Email {{ $i }}</td>
        <td>prospecto {{ $i }}</td>
        <td>
            <div class="btn-group">
                
                {{-- BOTON EDITAR --}}
                <a href="" class="btn btn-warning">  <i class="fa fa-edit"></i>   </a>
              
                {{-- BOTON ELIMINAR --}}
                <form style="float: right;" method="POST" action="">
                @csrf
                @method('DELETE')
                
                <button  type="submit" class="btn btn-danger "> <i class="fa fa-trash"></i> </button>
                </form>
                 {{-- FIN BOTON ELIMINAR --}}
               
              </div>

              

        </td>
    </tr>
    @endfor
</table>

{{-- {{ $cargos->links() }} --}}

@endsection

