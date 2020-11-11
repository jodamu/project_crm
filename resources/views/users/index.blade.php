@extends('adminlte::layouts.app')

@section('htmlheader_title','Usuarios')  {{-- titulo pestaña  pagina --}}

@section('contentheader_title','Listado de Usuarios')  {{-- nombre pagina --}}


@section('breadcrumb')
<li class="active">Usuarios</li>
@endsection

@section('content')

<div>
    <a href="{{ route('user.create') }}" class="btn btn-success">  <i class="fa fa-plus"></i> Agregar</a>
</div>
<table class="table table-bordered">
    <thead>

        
    <tr class="bg-info">
        <th>NOMBRE</th>
        <th>EMAIL</th>
        <th>ROLE</th>
        <th>ACCIONES</th>
        
    </tr>
    </thead>
    <tbody>
    
@foreach ($users as $user)
    
    <tr>
        
        <td>{{ $user->name }}</td>
        <td>{{ $user->email }}</td>
        <td>{{ $user->role }}</td>
        <td>
            <div class="btn-group">
                
                {{-- BOTON EDITAR --}}
                <a href="{{ url('/user/'.$user->id .'/edit') }}" class="btn btn-warning">  <i class="fa fa-edit"></i>   </a>
            
                {{-- BOTON ELIMINAR --}}
                <a href="{{ route('user.show',$user->id ) }}" class="btn btn-danger">  <i class="fa fa-trash"></i>   </a>
                
                {{-- FIN BOTON ELIMINAR --}}
            
            </div>

            

        </td>
    </tr>

    @endforeach
</tbody>

</table>


@endsection