@extends('adminlte::layouts.app')

@section('htmlheader_title','Crear Estado')  {{-- titulo pestaña  pagina --}}

@section('contentheader_title','Crear Estado')  {{-- nombre pagina --}}


@section('breadcrumb')
<li class=""><a href="{{ url('/estado') }}">Estado</a></li>

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
<form method="POST" action="{{ route('estado.store') }}">
  @csrf
    <div class="form-group">
      <label for="pais">Pais</label>
      <select class="form-control" id="pais" name="pais_id">
        @foreach ($paises as $pais)
            <option value="{{ $pais->id }}">{{ $pais->name }}</option>
        @endforeach
      </select>
    </div>
    <div class="form-group">
      <label for="estado">Estado</label>
      <input type="text" class="form-control" id="estado" name="name">
    </div>

    <button type="submit" class="btn btn-primary">Guardar</button>
  </form>
</div>

@endsection

