@extends('adminlte::layouts.app')

@section('htmlheader_title','Editar pais')  {{-- titulo pestaña  pagina --}}

@section('contentheader_title','Editar pais')  {{-- nombre pagina --}}


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
<form method="POST" action="{{ route('pais.update', $pais->id) }}">
  @csrf
  @method('PUT')
    
    <div class="form-group">
      <label for="estado">Pais</label>
      <input type="text" class="form-control" id="estado" name="name" value="{{ $pais->name }}">
    </div>

    <button type="submit" class="btn btn-primary">Guardar</button>
  </form>
</div>

@endsection

