@extends('adminlte::layouts.app')

@section('htmlheader_title','Ver Producto')  {{-- titulo pestaña  pagina --}}

@section('contentheader_title','Ver Producto')  {{-- nombre pagina --}}


@section('breadcrumb')
<li class=""><a href="{{ url('/producto') }}">Producto</a></li>

<li class="active">{{ $producto->nombre }}</li>
@endsection




@section('content')

<div class="jumbotron container">
    <h1 class="display-4">{{ $producto->nombre }}</h1>
    <p class="lead">{{ $producto->descripcion }}</p>
    <hr class="my-4">
    <p>
        <ul class="list-group col-4">
            <li class="list-group-item d-flex justify-content-between align-items-center">
            Cantidad
            <span class="badge badge-primary badge-pill">{{ $producto->stock }}</span>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center">
            Valor
            <span class="badge badge-primary badge-pill">{{ $producto->valor }}</span>
            </li>
            
        </ul>
    </p>
    <form style="float: right;" method="POST" action="{{ route('producto.destroy',$producto->id) }}">
        @csrf
        @method('DELETE')
        
        <button  onclick="return confirm('¿Realmente deseas eliminar este producto?')" type="submit" class="btn btn-danger "> <i class="fa fa-trash"></i> Eliminar</button>
        </form>
    </div>

@endsection