@extends('adminlte::layouts.app')

@section('htmlheader_title','Crear Ciudad')  {{-- titulo pestaña  pagina --}}

@section('contentheader_title','Crear Ciudad')  {{-- nombre pagina --}}


@section('breadcrumb')
<li class=""><a href="{{ url('/ciudad') }}">Ciudad</a></li>

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
<form method="POST" action="{{ route('ciudad.store') }}">
  @csrf
    <div class="form-group">
      <label for="estado">Estado</label>
      <select class="form-control" id="estado" name="estado_id">
        @foreach ($estados as $estado)
            <option value="{{ $estado->id }}">{{ $estado->pais->name }} <=> {{ $estado->name }}</option>
        @endforeach
      </select>
    </div>
    <div class="form-group">
      <label for="ciudad">Ciudad</label>
      <input type="text" class="form-control" id="ciudad" name="name">
    </div>

    <button type="submit" class="btn btn-primary">Guardar</button>
  </form>
</div>

@endsection

