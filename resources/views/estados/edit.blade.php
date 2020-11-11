@extends('adminlte::layouts.app')

@section('htmlheader_title','Editar Estado')  {{-- titulo pestaña  pagina --}}

@section('contentheader_title','Editar Estado')  {{-- nombre pagina --}}


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
<form method="POST" action="{{ route('estado.update', $estado->id) }}">
  @csrf
  @method('PUT')
    <div class="form-group">
      <label for="pais">Pais</label>
      <select class="form-control" id="pais" name="pais_id">
        @foreach ($paises as $pais)
            @if ($pais->id==$estado->pais_id)
                <option selected value="{{ $pais->id }}">{{ $pais->name }}</option>
            @else
                <option value="{{ $pais->id }}">{{ $pais->name }}</option>
            @endif
        @endforeach
      </select>
    </div>
    <div class="form-group">
      <label for="estado">Pais</label>
      <input type="text" class="form-control" id="estado" name="name" value="{{ $estado->name }}">
    </div>

    <button type="submit" class="btn btn-primary">Guardar</button>
  </form>
</div>

@endsection

