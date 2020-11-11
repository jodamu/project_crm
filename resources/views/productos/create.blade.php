@extends('adminlte::layouts.app')

@section('htmlheader_title','Crear Productos')  {{-- titulo pestaña  pagina --}}

@section('contentheader_title','Crear Productos')  {{-- nombre pagina --}}


@section('breadcrumb')
<li class=""><a href="{{ url('/producto') }}">Productos</a></li>

<li class="active">Crear</li>
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
<form method="POST" action="{{ route('producto.store') }}">
  @csrf
    <div class="form-group">
      <label for="producto">Producto</label>
      <input type="text" class="form-control" id="producto" name="nombre">
    </div>
    <div class="form-group">
      <label for="descripcion">Descripcion</label>
      <textarea  class="form-control" id="descripcion" name="descripcion"></textarea>
    </div>
    <div class="form-group">
      <label for="stock">Stock</label>
      <input type="number" class="form-control" id="stock" name="stock">
    </div>
    <div class="form-group">
      <label for="valor">Valor</label>
      <input type="text" class="form-control" id="valor" name="valor">
    </div>

    

    <button type="submit" class="btn btn-primary">Guardar</button>
  </form>
</div>

@endsection

