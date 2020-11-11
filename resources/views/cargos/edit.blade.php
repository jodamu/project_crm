@extends('adminlte::layouts.app')

@section('htmlheader_title','Editar Cargo')  {{-- titulo pestaña  pagina --}}

@section('contentheader_title','Editar Cargo')  {{-- nombre pagina --}}


@section('breadcrumb')
<li class=""><a href="{{ url('/cargos') }}">Cargos</a></li>

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
<form method="POST" action="{{ route('cargos.update', $cargo->id ) }}">
  @csrf
  @method('PUT')
    <div class="form-group">
      <label for="cargo">Cargo</label>
      <input type="text" class="form-control" id="cargo" name="name" value="{{ $cargo->name }}">
    </div>

    <button type="submit" class="btn btn-primary">Actualizar</button>
  </form>
</div>

@endsection

