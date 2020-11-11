@extends('adminlte::layouts.app')

@section('htmlheader_title','Tipo de negociación')  {{-- titulo pestaña  pagina --}}

@section('contentheader_title','Tipo de negociación')  {{-- nombre pagina --}}


@section('breadcrumb')
<li class=""><a href="{{ url('/tiponegociacion') }}">Tipo de negociación</a></li>

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
<form method="POST" action="{{ route('tiponegociacion.update', $tiponegociacion->id ) }}">
  @csrf
  @method('PUT')
    <div class="form-group">
      <label for="tiponegociacion">Tipo de negociación</label>
      <input type="text" class="form-control" id="tiponegociacion" name="name" value="{{ $tiponegociacion->name }}">
    </div>

    <button type="submit" class="btn btn-primary">Actualizar</button>
  </form>
</div>

@endsection

