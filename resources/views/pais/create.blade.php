@extends('adminlte::layouts.app')

@section('htmlheader_title','Crear Pais')  {{-- titulo pestaña  pagina --}}

@section('contentheader_title','Crear Pais')  {{-- nombre pagina --}}


@section('breadcrumb')
<li class=""><a href="{{ url('/pais') }}">Pais</a></li>

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
<form method="POST" action="{{ route('pais.store') }}">
  @csrf
    <div class="form-group">
      <label for="pais">Pais</label>
      <input type="text" class="form-control" id="pais" name="name">
    </div>

    <button type="submit" class="btn btn-primary">Guardar</button>
  </form>
</div>

@endsection

