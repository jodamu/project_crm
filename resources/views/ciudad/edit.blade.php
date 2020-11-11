@extends('adminlte::layouts.app')

@section('htmlheader_title','Editar Ciudad')  {{-- titulo pestaña  pagina --}}

@section('contentheader_title','Editar Ciudad')  {{-- nombre pagina --}}


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
<form method="POST" action="{{ route('ciudad.update', $ciudad->id) }}">
  @csrf
  @method('PUT')
    <div class="form-group">
      <label for="estado">Estado</label>
      <select class="form-control" id="estado" name="estado_id">
        @foreach ($estados as $estado)
            @if ($estado->id==$ciudad->estado_id)
                <option selected value="{{ $estado->id }}">{{ $estado->name }}</option>
            @else
                <option value="{{ $estado->id }}">{{ $estado->name }}</option>
            @endif
        @endforeach
      </select>
    </div>
    <div class="form-group">
      <label for="estado">Ciudad</label>
      <input type="text" class="form-control" id="estado" name="name" value="{{ $ciudad->name }}">
    </div>

    <button type="submit" class="btn btn-primary">Guardar</button>
  </form>
</div>

@endsection

