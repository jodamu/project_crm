@extends('adminlte::layouts.app')

@section('htmlheader_title','Editar Producto')  {{-- titulo pestaña  pagina --}}

@section('contentheader_title','Editar Producto')  {{-- nombre pagina --}}


@section('breadcrumb')
<li class=""><a href="{{ url('/producto') }}">Producto</a></li>

<li class="active">Editar</li>
@endsection




@section('content')
@if ($errors->any())
<div class="alert alert-danger">
    <h6>Por favor corrige los errores debajo:</h6>
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
<div class="container">
<form method="POST" action="{{ route('producto.update',$producto->id) }}">
  @csrf
  @method('PUT')
    <div class="form-group">
      <label for="producto">Producto</label>
      <input type="text" class="form-control" id="producto" name="nombre" value="{{ $producto->nombre }}">
    </div>
    <div class="form-group">
      <label for="descripcion">Descripcion</label>
      <textarea  class="form-control" id="descripcion" name="descripcion">{{ $producto->descripcion }}</textarea>
    </div>
    <div class="form-group">
      <label for="stock">Stock</label>
      <input type="number" class="form-control" id="stock" name="stock" value="{{ $producto->stock }}">
    </div>
    <div class="form-group">
      <label for="valor_compra">Valor Compra</label>
      <input type="text" class="form-control" id="valor_compra" name="valor_compra" value="{{ $producto->valor_compra }}">
    </div>
    
    <div class="form-group">
      <label for="valor_venta">Valor Venta</label>
      <input type="text" class="form-control" id="valor_venta" name="valor_venta" value="{{ $producto->valor_venta }}">
    </div>

    

    <button type="submit" class="btn btn-primary">Guardar</button>
  </form>
</div>

@endsection

